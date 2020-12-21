<div class="modal fade" id="addHarvestModal" tabindex="-1" role="dialog" aria-labelledby="addHarvestModal"
     aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Panen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.harvest.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Bulan</label>
                        <div class="input-group">
                            <input id="month" type="date" class="form-control{{ $errors->has('month') ? ' is-invalid' : '' }}" name="month" value="{{ old('month') }}" required>
                            <div class="invalid-feedback">
                                {{ $errors->first('month') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Hasil Panen</label>
                        <div class="input-group">
                            <input id="production" type="number" class="form-control{{ $errors->has('production') ? ' is-invalid' : '' }}" name="production" value="{{ old('production') }}" placeholder="Satuan KG">
                            <div class="invalid-feedback">
                                {{ $errors->first('production') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
