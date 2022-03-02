<div class="modal fade" id="{{ 'editAdminModal'.$admin->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ 'Edit '.$admin->username.' Details' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ route('ldashboardAdminUpdate', ['id' => $admin->id]) }}" method="POST">
                @csrf
                <div class="modal-body row">
                    <div class="col-lg-4 mb-2">
                        <label for="firstName">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{ (old('first_name')) ? old('first_name') : $admin->first_name }}" />
                        <small class="text-danger">
                            {{ $errors->first('first_name') }}
                        </small>
                    </div>
                    <div class="col-lg-4 mb-2">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{ (old('last_name')) ? old('last_name') : $admin->last_name }}" />
                        <small class="text-danger">
                            {{ $errors->first('username') }}
                        </small>
                    </div>
                    <div class="col-lg-4 mb-2">
                        <label for="username">UserName</label>
                        <input type="text" name="username" class="form-control" value="{{ (old('username')) ? old('username') : $admin->username }}" />
                        <small class="text-danger">
                            {{ $errors->first('username') }}
                        </small>
                    </div>
                    <div class="col-lg-8 mb-2">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ (old('email')) ? old('email') : $admin->email }}" />
                        <small class="text-danger">
                            {{ $errors->first('email') }}
                        </small>
                    </div>
                    <div class="col-lg-4">
                        <label for="role">{{ __('Role') }}</label>
                        <select name="is_super" class="form-control" style="font-size: 13px;">
                            @if ($admin->is_super)
                                <option value="0">Ordinary Admin</option>
                                 <option value="1" selected>Super Admin</option>
                            @else
                                 <option value="0" selected>Ordinary Admin</option>
                                 <option value="1">Super Admin</option>
                            @endif
                                                
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>