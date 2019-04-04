@extends('layouts.admin')
@section('main')

<div class="row justify-content-center  mt-4">
    <div class="col-lg-10 ">
        <div class="card">
            <div class="card-header">
              <div class=" row">
                  <div class="col-10">
                      <strong>Centres</strong>
                  </div>
                    <div class="col-2 text-center">
                      <a href="{{url('admin/centres/add')}}" class="btn btn-link" role="button">Add Centre</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
            	<table class="table table-striped">
            		<tr>
                  <th> # </td>
                  <th>Centre Name</th>
            			<th>Email</th>
                  <th>Address</th>
                  <th>Postcode</th>
            			<th>Doctors</th>
            		</tr>
                @foreach($centres as $centre)
            		<tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><a href="{{url('admin/centres/edit?centre='.$centre->id)}}">{{$centre->name}}</td>
                  <td>{{$centre->email}}</td>
                  <td>{{$centre->address}}</td>
                  <td>{{$centre->postcode}}</td>
                  <td>{{$centre->doctorCount}}</td>
            		</tr>
                @endforeach
            	</table>
            </div>
        </div>
    </div>
</div>

@endsection
