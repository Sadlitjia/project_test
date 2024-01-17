<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModal{{ $opd->id }}Label">Delete Data OPD</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Form Delete -->
            <form method="post" action="{{ route('admin.opd.destroy', ['opd' => $opd->id]) }}">
                
                @csrf
                @method('DELETE')

                <p>Anda yakin ingin menghapus data OPD "{{ $opd->nama }}"?</p>

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>