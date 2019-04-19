@extends('layouts.doctor_app')

@section('css_includes')

@endsection

@section('main')
<div class="col-md-12">
  <div class="card ">
    <div class="card-header ">
      <div class="row">
        <div class="col-10">
          Future Appointments
        </div>
        <div class="col-2">
          <a href="{{url('doctor/appointments/add')}}" class="btn btn-link" role="button">Add Appointment</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table class="table ">
        <thead>
          <tr>
            <th scope="col-md-1">#</th>
            <th scope="col-md-1">Date</th>
            <th scope="col-md-1">Time</th>
            <th scope="col-md-2">Patient</th>
            <th scope="col-md-5">Reason</th>
            <th class="text-center" scope="col-md-1">Appointment Confirmation</th>
            <th class="text-center" scope="col-md-1">View more details </th>
          </tr>
        </thead>
        <tbody>
          @foreach($aptsFuture as $apt)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$apt->appointment_date}}</td>
            @if($apt->appointment_time === 9 ||$apt->appointment_time === 10 ||$apt->appointment_time === 11)
            <td>{{$apt->appointment_time}}:00am</td>
            @elseif($apt->appointment_time === 12 ||$apt->appointment_time === 2 ||$apt->appointment_time === 3 ||$apt->appointment_time === 4 ||$apt->appointment_time === 5)
            <td>{{$apt->appointment_time}}:00pm</td>
            @endif
            <td>{{$apt->first_name}} {{$apt->last_name}}</td>
            <td>{{$apt->reason}}</td>
            @if($apt->confirmed === false)
            <td class="text-center"><a href="{{url('doctor/appointments/confirm?aptId='.$apt->id)}}" class="btn btn-success mr-1" val="{{$apt->id}}" onclick="return confirm('Are you sure you want to confirm appointment?')" role="button">Confirm</a><a href="{{url('doctor/appointments/confirm?aptId='.$apt->id)}}" class="btn btn-danger" val="{{$apt->id}}" role="button" onclick="return confirm('Are you sure you are unavailable for this appointment?')">Unavailable</a></td>
            @else
            <td>Confirmed!</td>
            @endif
            <td class="text-center"><a href="{{url('doctor/appointments/view?aptId='.$apt->id)}}" class="btn btn-primary" role="button">Begin Appointment</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
  <div class="card ">
    <div class="card-header ">
      <div class="row">
        <div class="col-10">
          Previous Appointments
        </div>

      </div>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Doctor</th>
            <th scope="col">Centre</th>
            <th scope="col">Reason</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>2019-03-19</td>
            <td>10:00am</td>
            <td>Dr Bloggs</td>
            <td>Byron Street</td>
            <td>Sore Head</td>
            <td>Completed</td>
            <td class="text-center"><a href="{{url('doctor/appointments/view?aptId='.$apt->id)}}" class="btn btn-primary" role="button">Veiw Appointment</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection

@section('js_includes')

@endsection
