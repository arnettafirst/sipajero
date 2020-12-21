<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Comment extends Model
{
    protected $guarded = [];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('d F Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class, 'discussion_id');
    }
}
