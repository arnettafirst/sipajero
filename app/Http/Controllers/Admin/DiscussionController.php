<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Discussion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discussions = Discussion::orderBy('created_at', 'ASC')->paginate(10);

        return view('admin.discussion.index', compact('discussions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discussion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required|string',
            'contents'  => 'required'
        ]);

        Discussion::create([
            'title'     => $request->title,
            'slug'      => strtolower($request->title) . time(),
            'contents'  => $request->contents,
            'excerpt'   => Str::words(strip_tags(html_entity_decode($request->contents)), 8),
            'user_id'   => Auth::id()
        ]);

        return redirect()->route('discussion')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $discussion = Discussion::where('slug', $slug)->firstOrFail();
        $comments = Comment::where('discussion_id', $discussion->id)->get();

        return view('discussion-detail', compact('discussion', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $discussion = Discussion::where('slug', $slug)->whereId(Auth::id())->firstOrFail();

        return view('admin.discussion.edit', compact('discussion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'     => 'required|string',
            'contents'  => 'required'
        ]);

        $discussion = Discussion::findOrFail($id);

        $discussion->update([
            'title'     => $request->title,
            'slug'      => strtolower($request->title) . time(),
            'contents'  => $request->contents,
            'excerpt'   => Str::words(strip_tags(html_entity_decode($request->contents)), 8),
            'user_id'   => Auth::id()
        ]);

        return redirect()->route('discussion.detail', $discussion->slug)->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addComment(Request $request, $slug)
    {
        $this->validate($request, [
            'contents'  => 'required'
        ]);

        $discussion = Discussion::where('slug', $slug)->firstOrFail();

        Comment::create([
            'contents'      => $request->contents,
            'user_id'       => Auth::id(),
            'discussion_id' => $discussion->id
        ]);

        return redirect()->back();
    }
}
