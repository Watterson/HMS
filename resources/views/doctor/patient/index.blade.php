@extends('layouts.doctor_app')

@section('css_includes')

@endsection

@section('main')


<div class="col-lg-10 offset-lg-1">
    <div class="card">
        <div class="card-header">
          <div class=" row">
              <div class="col-8">
                  <strong>User Accounts</strong>
              </div>
                <div class=" col-2 text-right">
                  <a href="{{url('doctor/patients/add')}}" class="btn btn-link" role="button">Add Patient</a>
                </div>
            </div>
        </div>
        <div class="card-block">
          <table class="table table-striped">
            <tr>
              <th>Name</th>
              <th>Email</th>
            </tr>
            @foreach($patients as $patient)
            <tr>
              <td><a href="{{url('doctor/patients/edit?user='.$patient->id)}}">{{ $patient->first_name }} {{ $patient->last_name }}</a></td>
              <td>{{ $patient->email }}</td>
            </tr>
            @endforeach

          </table>
        </div>
    </div>
@endsection

@section('js_includes')

@endsection
