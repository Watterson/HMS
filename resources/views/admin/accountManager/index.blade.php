@extends('layouts.admin')
@section('main')

<div class="row justify-content-center  mt-4">
    <div class="col-lg-10 ">
        <div class="card">
            <div class="card-header">
              <div class=" row">
                  <div class="col-8">
                      <strong>User Accounts</strong>
                  </div>
                    <div class=" col-2 text-right">
                      <a href="{{url('admin/user/add_patient')}}" class="btn btn-link" role="button">Add Patient</a>
                    </div>
                    <div class="col-2 text-center">
                      <a href="{{url('admin/user/add_doctor')}}" class="btn btn-link" role="button">Add Doctor</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
            	<table class="table table-striped">
            		<tr>
                  <th>User ID</th>
            			<th>Email</th>
                  <th>Role</th>
            			<?/*<th></th>*/?>

            		</tr>
            		@foreach($users as $user)
            		<tr>
                  <td>{{ $user->id }}</td>
                  <td><a href="{{url('admin/user/edit?user='.$user->id)}}">{{ $user->email }}</td>
                  <td>{{ $user->role }}</td>
            		</tr>
            		@endforeach

            	</table>
            </div>
        </div>
    </div>
</div>

@endsection
