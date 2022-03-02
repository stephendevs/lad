<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="{{ 'confirmBlockAdminModal'.$admin->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ route('ldashboardAdminBlock', ['id' => $admin->id]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    Are you sure you want to block <span class="text-primary">{{ $admin->username }}</span><br />
                    <small>{{ $admin->username }} Wont be able to access admin panel.</small>
                    <div class="mt-2 form-group form-check">
                        <input type="checkbox" name="notify" class="form-input-check" id="notify" />
                        <label for="notify" class="form-check-label">Notify {{ $admin->username }}</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-md btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-md btn-danger">Block</button>
                </div>
            </form>
            
        </div>
    </div>
</div>