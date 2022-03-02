<div class="modal" id="quickCreateAdminModal" role="dialog" aria-labelledby="quickCreateAdminModal" data-backdrop="static">
    <div class="modal-dialog modal-sm shown">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">{{ 'Create Administrator' }}</h6>
            </div>
            <div class="modal-body">

                <form action="{{route('lad.admins.quick.create')}}" method="POST" class="row" class="">
                    @csrf

                    <div class="col-12 mb-2">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="Enter Username" />
                        <small class="error_user_name text-danger error" id="errorUsername">
                            {{ $errors->first('username') }}
                        </small>
                    </div>

                    <div class="col-12 mb-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Enter Email" required />
                        <small class="error_email_name text-danger error" id="errorEmail">
                            {{ $errors->first('email') }}
                        </small>
                    </div>

                    <div class="col-12 mb-2">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" />
                        <small class="error-password text-danger error" id="errorPassword">
                            {{ $errors->first('password') }}
                        </small>
                    </div>

                    <div class="col-12 mb-2">
                        <label for="passwordConfirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="passwordConfirmation" placeholder="Confirm password" />
                        <small class="error-password-confirmation text-danger error" id="errorPasswordConfirmation"></small>
                    </div>

                    <div class="col-12 mt-2 form-group form-checl">
                        <input type="checkbox" name="alert" class="form-input-check" id="alert" />
                        <label for="alert" class="form-check-label">Send Notification To New Admin</label>

                    </div>


                    <div class="col-12 mt-5">
                        <button type="button" data-dismiss="modal" class="btn btn-sm btn-secondary">Cancel</button>
                        <button type="reset" class="btn btn-sm btn-warning">Reset Form</button>
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>