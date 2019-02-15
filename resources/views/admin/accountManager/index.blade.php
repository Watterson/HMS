@extends('layouts.admin')
@section('main')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header">
                <strong>Manager Account</strong>
                <a href="{{url('admin/patients/add')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Add Manager</a>
            </div>
            <div class="card-block">
            	<table class="table table-striped">
            		<tr>
                  <th>Name</th>
            			<th>Email</th>
                  <th>Role</th>
                        <th></th>
            			<?/*<th></th>*/?>

            		</tr>
            		@foreach($users as $user)
            		<tr>
            			<td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->role }}</td>
            			<td><a href="{{url('admin/accounts/centres?managerId='.$user->id)}}"></a></td>
                        <td class="text-right"><a href="{{url('admin/patients/view?accountId='.$user->id)}}" class="btn btn-primary btn-sm">View</a></td>
            			<?/*<td class="text-right"><a href="{{url('admin/accounts/edit?accountId='.$manager->id)}}" class="btn btn-primary btn-sm">Edit</a></td>*/?>
            		</tr>
            		@endforeach

            	</table>
            </div>
        </div>
    </div>
</div>

@endsection
