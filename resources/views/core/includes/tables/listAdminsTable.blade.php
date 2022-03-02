@if (count($admins))
<!-- Admin Table Listing -->
<div class="table-responsive admins-table" id="adminsTable" data-ajaxurl="hello">
     <table class="table table-borderless">
          <thead>
               <th></th>
               <th>Details</th>
               <th>Account Status</th>
               <th>Active</th>
               <th>Since</th>
               <th></th>
          </thead>
          <tbody>
               @foreach ($admins as $admin)
                    <tr class="">
                         <td width="50px">
                              <img src="{{ asset('stephendevs/lad/img/avator.jpg') }}" alt="avator" class="img-fluid rounded-circle" />
                         </td>
                         <td>
                              <span class="d-block text-primary">
                                   <a href="{{ ($admin->user != null) ? route('lad.admins.show', ['username' => $admin->user->name]) : '' }}"><h6 class="mb-0">{{ ($admin->user) ? $admin->user->name : '' }}</h6></a>
                              </span>
                              <small class="d-block">{{ ($admin->user) ? $admin->user->email : '' }}</small>
                              <small class="text-success">{{ ($admin->is_super) ? __('Super Account') : __('')}}</small>
                         </td>
                         <td>
                              <small class="d-block">Account Blocked</small>
                              <small class="d-block"><a href="">Unblock</a></small>
                         </td>
                         <td>
                              <small class="d-block">3 Hrs Ago</small>
                              <small class="d-block"><a href="">View Activity</a></small>
                         </td>
                         <td>
                              <small>{{ $admin->created_at }}</small>
                         </td>
                         <td>
                              <a class="btn btn-sm btn-danger delete-admin" href="{{ route('lad.admins.destroy' , ['id' => $admin->id]) }}"><i class="fa fa-trash"></i></a>
                              <a href="{{ route('lad.admins.show', ['username' => $admin->username]) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                              <a href="{{ route('lad.admins.activitylog', ['username' => $admin->username]) }}" class="btn btn-sm btn-primary"><i class="fa fa-file"></i></a>
                         </td>
                    </tr>
               @endforeach
          </tbody>
          
     </table>
     <div class="pagination mt-4">
          {{ $admins->links() }}
     </div>
</div>
     <!-- //Admin Table Listing -->
@else
     <div>
          You are the only admin available, add admins to manage your platform.....!
     </div>         
@endif