<div class="modal fade" id="{{ 'confirmUnlockAdminModal'.$admin->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ route('ldashboardAdminUnblock', ['id' => $admin->id]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    Are you sure you want to unblock <span class="text-primary">{{ $admin->username }}</span><br />
                    <small>{{ $admin->username }} will be able to access admin panel again.</small>
                    <div class="mt-2 form-group form-check">
                        <input type="checkbox" name="notify" class="form-input-check" id="notify" />
                        <label for="notify" class="form-check-label">Notify {{ $admin->username }}</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-md btn-success">Unblock</button>
                </div>
            </form>
            
        </div>
    </div>
</div>