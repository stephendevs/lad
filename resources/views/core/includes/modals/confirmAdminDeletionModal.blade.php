<div class="modal" id="confirmAdminDeletionModal" role="dialog" aria-labelledby="confirmAdminDeletionModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Confirm Action</h6>
            </div>
            <div class="modal-body">
                {{ 'Are you sure you want to delete '.$admin->username }}
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-sm btn-success" data-dismiss="modal">Cancel</a>
                <a href="{{ route('ldashboardAdminDestroy', ['id' => $admin->id]) }}" class="btn btn-sm btn-danger">Continue</a>
            </div>
        </div>
    </div>
</div>