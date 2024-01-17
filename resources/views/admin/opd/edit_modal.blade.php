<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="editModal{{ $opd->id }}Label">Edit Data OPD</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <div class="modal-body">
            <!-- Form Edit -->
            <form action="{{ route('admin.opd.update', ['opd' => $opd->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="nama">Nama OPD:</label>
                <div class="form-group">
                    <input type="text" name="nama" class="form-control" value="{{ $opd->nama }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>