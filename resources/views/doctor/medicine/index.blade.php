@extends('layouts.doctor_app')

@section('css_includes')

@endsection

@section('main')
<div class="row justify-content-center  mt-4">
    <div class="col-lg-10 ">
        <div class="card">
            <div class="card-header">
              <div class=" row">
                  <div class="col-10">
                      <strong>Medicines</strong>
                  </div>
                    <div class="col-2 text-center">
                      <a href="{{url('doctor/medicine/add')}}" class="btn btn-link" role="button">Add Medicine</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
            	<table class="table table-striped">
            		<tr>
                  <th> # </td>
                  <th>Medication Name</th>
            			<th>Description</th>
                  <th>Dose</th>
                  <th>Duration</th>
                  <th>Quantity</th>

            		</tr>
                @foreach($medicines as $medicine)
            		<tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><a href="{{url('doctor/medicine/edit?medicine='.$medicine->id)}}">{{$medicine->name}}</td>
                  <td>{{$medicine->description}}</td>
                  <td>{{$medicine->dose}}</td>
                  <td>{{$medicine->duration}}</td>
                  <td>{{$medicine->quantity}}</td>
            		</tr>
                @endforeach
            	</table>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center  mt-4">
    <div class="col-lg-10 ">
        <div class="card">
            <div class="card-header">
              <div class=" row">
                  <div class="col-10">
                      <strong>Allergies</strong>
                  </div>
                    <div class="col-2 text-center">
                      <a href="{{url('doctor/allergy/add')}}" class="btn btn-link" role="button">Add Allergy</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
              <table class="table table-striped">
                <tr>
                  <th> # </td>
                  <th>Allergy Type</th>
                  <th>Agent</th>
                  <th>Reaction</th>
                  <th>Severity</th>
                  <th>Source</th>

                </tr>
                @foreach($allergies as $allergy)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><a href="{{url('doctor/allergy/edit?allergy='.$allergy->id)}}">{{$allergy->type}}</td>
                  <td>{{$allergy->agent}}</td>
                  <td>{{$allergy->reaction}}</td>
                  <td>{{$allergy->severity}}</td>
                  <td>{{$allergy->source}}</td>
                </tr>
                @endforeach
              </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js_includes')

@endsection
