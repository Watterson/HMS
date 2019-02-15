@extends('templates.admin')
@section('main')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
    	<a href="{{url('admin/accounts')}}" >< Managers</a>

        <div class="card">
            <div class="card-header"><strong>View account manager</strong>
            </div>
            <div class="card-block">
            	<table class="table table-bordered">
            		<tr>
            			<th>Name</th>
            			<td>{{$manager->name}}</td>
            		</tr>
            		<tr>
            			<th>Email</th>
            			<td>{{$manager->email}}</td>
            		</tr>
            		<tr>
            			<th>Phone</th>
            			<td>{{$manager->mobile}}</td>
            		</tr>
            		<tr>
            			<th>Landline</th>
            			<td>{{$manager->phone}}</td>
            		</tr>
            	</table>
            </div>
            <div class="card-footer">
                <a href="{{url('admin/accounts/edit?accountId='.$manager->id)}}" id="btn-edit" class="btn btn-primary btn-sm">Edit</a>
            </div>

        </div>
    </div>
</div>

@endsection
