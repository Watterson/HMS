@extends('layouts.doctor_app')
@section('main')
  <div class="col-12 ">
    <div class="alert alert-warning alert-dismissible fade  col-md-10 offset-md-1" style="display: none" role="alert">
       The record will be created on completion of the appointment
    </div>
    <div class="row col- pl-2 py-3 px-3 px-sm-0">
      <button type="button" class="btn btn-danger text-white apt-time col-md-3" id="cancelAppointment" value="" > Cancel Appointment </button>
      <button type="button" class="btn btn-success text-white apt-time col-md-3 offset-md-6 " id="submitAppointment" value="{{$patient->id}}" > Submit Appointment </button>
    </div>
      <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">Patient Info</a>
          <a class="nav-item nav-link" id="nav-appointments-tab" data-toggle="tab" href="#nav-appointments" role="tab" aria-controls="nav-appointments" aria-selected="false">Previous Appointments</a>
          <a class="nav-item nav-link" id="nav-allergies-tab" data-toggle="tab" href="#nav-allergies" role="tab" aria-controls="nav-allergies" aria-selected="false">Allergies</a>
          <a class="nav-item nav-link" id="nav-medhis-tab" data-toggle="tab" href="#nav-medhis" role="tab" aria-controls="nav-medhis" aria-selected="false">Perscriptions</a>
          <a class="nav-item nav-link" id="nav-famhis-tab" data-toggle="tab" href="#nav-famhis" role="tab" aria-controls="nav-famhis" aria-selected="false">Family History</a>
          <a class="nav-item nav-link" id="nav-lab-tab" data-toggle="tab" href="#nav-lab" role="tab" aria-controls="nav-lab" aria-selected="false">Lab Request</a>
        </div>
      </nav>
      <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
          <div class="container row">
              <div class="col-4">
                <img src="{{url('/images/profile-img.png')}}" >
              </div>
              <div class="col-4">
                <h2 style="text-decoration:underline;">{{ $patient->first_name }} {{ $patient->last_name }}</h2>
                <p><strong>D.O.B: </strong>{{$patient->dob}} </p>
                @if($vitalsCurrent == null)
                <h4>No Vitals Recorded</h5>
                @else
                <p><strong>Height: </strong>{{$vitalsCurrent->height}} </p>
                <p><strong>Weight: </strong>{{$vitalsCurrent->weight}} </p>
                <p><strong>Body Temperature: </strong>{{$vitalsCurrent->body_temp}} </p>
                <p><strong>Pulse: </strong>{{$vitalsCurrent->pulse}} </p>
                <p><strong>Respiratory Rate: </strong>{{$vitalsCurrent->resp_rate}} </p>
                <p><strong>Bood Pressure: </strong>{{$vitalsCurrent->blood_pressure}} </p>
                @endif
              </div>
              <div class="col-4">
                <table style="height: 100%;">
                  <tbody>
                    <tr>
                      <td class="align-middle">
                        <button type="button" class="btn btn-primary text-white apt-time" id="2" value="2" data-toggle="modal" data-target="#vitalsModal">Update Vitals</button>
                      </td>
                    </tr>
                  </tbody>
                </table>


              </div>
            </div>
            <div class="row justify-content-center  mt-4">
                <div class="col-lg-10 ">
                    <div class="card">
                        <div class="card-header">
                          <div class=" row">
                              <div class="col-10">
                                  <strong>Previous Vitals</strong>
                              </div>

                            </div>
                        </div>
                        <div class="card-block">
                          <table class="table table-striped">
                            <tr>
                              <th>Date </td>
                              <th>Height</th>
                              <th>Weight</th>
                              <th>Body Temperature</th>
                              <th>Pulse</th>
                              <th>Respiratory Rate</th>
                              <th>Blood Pressure</th>
                            </tr>
                            @foreach($vitalsAll as $vitals)
                            <tr>
                              <td>{{ $vitals->created_at->toFormattedDateString() }}</td>
                              <td>>{{$vitals->height}}</td>
                              <td>{{$vitals->weight}}</td>
                              <td>{{$vitals->body_temp}}</td>
                              <td>{{$vitals->pulse}}</td>
                              <td>{{$vitals->resp_rate}}</td>
                              <td>{{$vitals->blood_pressure}}</td>
                            </tr>
                            @endforeach
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-appointments" role="tabpanel" aria-labelledby="nav-appointments-tab">
          <div class="card ">
            <div class="card-header ">
              Previous Appointments
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Reason</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($aptPrevious as $apt)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$apt->appointment_date}}</td>
                    @if($apt->appointment_time === 9 ||$apt->appointment_time === 10 ||$apt->appointment_time === 11)
                    <td>{{$apt->appointment_time}}:00am</td>
                    @elseif($apt->appointment_time === 12 ||$apt->appointment_time === 2 ||$apt->appointment_time === 3 ||$apt->appointment_time === 4 ||$apt->appointment_time === 5)
                    <td>{{$apt->appointment_time}}:00pm</td>
                    @endif
                    <td>{{$apt->first_name}}{{$apt->last_name}}</td>
                    <td>{{$apt->reason}}</td>
                    <td class="text-right"><a href="{{url('doctor/appointments/view?aptId='.$apt->id)}}" class="btn btn-link" role="button">Veiw Details</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-allergies" role="tabpanel" aria-labelledby="nav-allergies-tab">
          <div class="row justify-content-center  mt-4">
              <div class="col-lg-10 ">
                  <div class="card">
                      <div class="card-header">
                        <div class=" row">
                            <div class="col-9">
                                <strong>Allergies</strong>
                            </div>
                            <div class="col-3 text-center">
                              <button type="button" class="btn btn-primary text-white apt-time"  value="" data-toggle="modal" data-target="#allergyModal">Add Patient Allergy</button>
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
        </div>
        <div class="tab-pane fade" id="nav-medhis" role="tabpanel" aria-labelledby="nav-medhis-tab">
          <div class="row justify-content-center  mt-4">
              <div class="col-lg-10 ">
                  <div class="card">
                      <div class="card-header">
                        <div class=" row">
                            <div class="col-10">
                                <strong>Current Prescriptions</strong>
                            </div>
                              <div class="col-2 text-center">
                                <button type="button" class="btn btn-primary text-white apt-time"  value="" data-toggle="modal" data-target="#prescriptionsModal">Add perscription</button>
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
                            <th>Start Date</th>
                            <th>End Date</th>
                      		</tr>
                          @foreach($presCurrent as $prescription)
                      		<tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{url('doctor/appointment/view/prescription/view?$prescription='.$prescription->id)}}">{{$prescription->name}}</td>
                            <td>{{$prescription->description}}</td>
                            <td>{{$prescription->dose}}</td>
                            <td>{{$prescription->dose_duration}}</td>
                            <td>{{$prescription->quantity}}</td>
                            <td>{{$prescription->start_date}}</td>
                            <td>{{$prescription->end_date}}</td>
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
                                <strong>Previous Prescriptions</strong>
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
                            <th>Start Date</th>
                            <th>End Date</th>
                          </tr>
                          @foreach($presPrevious as $prescription)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{url('doctor/appointment/view/prescription/view?$prescription='.$prescription->id)}}">{{$prescription->name}}</td>
                            <td>{{$prescription->description}}</td>
                            <td>{{$prescription->dose}}</td>
                            <td>{{$prescription->dose_duration}}</td>
                            <td>{{$prescription->quantity}}</td>
                            <td>{{$prescription->start_date}}</td>
                            <td>{{$prescription->end_date}}</td>
                          </tr>
                          @endforeach
                        </table>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-famhis" role="tabpanel" aria-labelledby="nav-famhis-tab">
          <div class="row justify-content-center  mt-4">
              <div class="col-lg-10 ">
                  <div class="card">
                      <div class="card-header">
                        <div class=" row">
                            <div class="col-10">
                                <strong>Family History</strong>
                            </div>
                              <div class="col-2 text-center">
                                <button type="button" class="btn btn-primary text-white apt-time"  value="" data-toggle="modal" data-target="#famhisModal">Add Record</button>
                              </div>
                        </div>
                      </div>
                      <div class="card-block">
                      	<table class="table table-striped">
                      		<tr>
                            <th> # </td>
                            <th>Condition</th>
                      			<th>Description</th>
                            <th>Severity</th>
                            <th>Contracted</th>
                      		</tr>
                          @foreach($family as $history)
                      		<tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$history->name}}</td>
                            <td>{{$history->description}}</td>
                            <td>{{$history->contracted}}</td>
                      		</tr>
                          @endforeach
                      	</table>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="tab-pane fade" id="nav-lab" role="tabpanel" aria-labelledby="nav-lab-tab">
          <div class="row justify-content-center  mt-4">
              <div class="col-lg-10 ">
                  <div class="card">
                      <div class="card-header">
                        <div class=" row">
                            <div class="col-10">
                                <strong>Lab Results</strong>
                            </div>
                            <div class="col-2 text-center">
                              <button type="button" class="btn btn-primary text-white apt-time"  value="" data-toggle="modal" data-target="#labModal">Request Results</button>
                            </div>
                          </div>
                      </div>
                      <div class="card-block">
                      	<table class="table table-striped">
                      		<tr>
                            <th> # </td>
                            <th>Date Requested</th>
                      			<th>Date Returned</th>
                            <th>Type</th>
                            <th>Completed</th>
                      		</tr>

                      		<tr>
                            <td>1</td>
                            <td>01/04/2019</td>
                            <td>N/A</td>
                            <td>Scan</td>
                            <td>False</td>
                      		</tr>
                      	</table>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
@section('modals')
<div class="modal fade " id="vitalsModal" tabindex="-1" role="dialog" aria-labelledby="VitalsModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ConfirmationModalLabel">Update Patients Vitals</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="vitalsHeight" class="col-sm-6 col-form-label">Height: </label>
          <div class="col-sm-6">
            <div class="input-group ">
              <input type="text"  class="form-control" id="vitalsHeight" style="text-align: right;" value="">
              <div class="input-group-append">
                <div class="input-group-text">Cm</div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="vitalsWeight" class="col-sm-6 col-form-label">Weight: </label>
          <div class="col-sm-6">
            <div class="input-group ">
              <input type="text"  class="form-control" id="vitalsWeight" style="text-align: right;" value="">
              <div class="input-group-append">
                <div class="input-group-text">Kg</div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="body_temp" class="col-sm-6 col-form-label">Body Temperature: </label>
          <div class="col-sm-6">
            <div class="input-group ">
              <input type="text"  class="form-control" id="body_temp" style="text-align: right;" value="">
              <div class="input-group-append">
                <div class="input-group-text">Celsius</div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="pulse" class="col-sm-6 col-form-label">Pulse: </label>
          <div class="col-sm-6">
            <div class="input-group ">
              <input type="text"  class="form-control" id="pulse" style="text-align: right;" value="">
              <div class="input-group-append">
                <div class="input-group-text">Bpm</div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="resp_rate" class="col-sm-6 col-form-label">Respiratory Rate: </label>
          <div class="col-sm-6 ">
            <div class="input-group ">
              <input type="text"  class="form-control" id="resp_rate" style="text-align: right;" value="">
              <div class="input-group-append">
                <div class="input-group-text">Bpm</div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="blood_pressure" class="col-sm-6 col-form-label">Blood Pressure:</label>
          <div class="col-sm-6 ">
            <div class="input-group ">
              <input type="text"  class="form-control" id="blood_pressure" style="text-align: right;" value="">
              <div class="input-group-append">
                <div class="input-group-text">mmHg</div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row" >
          <label for="notes" class="col-sm-6 col-form-label">Notes: </label>
          <div class="col-sm-6">
            <div class="input-group ">
              <textarea type="text"  class="form-control" id="vitalNotes" row="3"></textarea>

            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="confirmVitals">Update</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade " id="prescriptionsModal" tabindex="-1" role="dialog" aria-labelledby="prescriptionsModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ConfirmationModalLabel">Issue Prescription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="problem" class="col-sm-6 col-form-label">Problem: </label>
          <div class="col-sm-6">
            <div class="input-group">
              <input type="text"  class="form-control" id="problem"  value="">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="solution" class="col-sm-6 col-form-label">Solution: </label>
          <div class="col-sm-6">
            <div class="input-group">
              <input type="text"  class="form-control" id="solution"  value="">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="perscription_med" class="col-sm-6 col-form-label" >Perscription: </label>
          <div class="col-sm-6">
            <select class="custom-select my-1 mr-sm-2" id="perscription_med">
              <option selected>Please Select...</option>
              @foreach($medicines as $medicine)
              <option value="{{$medicine->id}}" >{{$medicine->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="dose" class="col-sm-6 col-form-label">Dose: </label>
          <div class="col-sm-6">
            <div class="input-group ">
              <input type="text"  class="form-control" id="dose"  value="">
              <div class="input-group-append">
                <div class="input-group-text">mg</div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="dose_duration" class="col-sm-6 col-form-label">Dose duration: </label>
          <div class="col-sm-6">
            <div class="input-group ">
              <input type="text"  class="form-control" id="dose_duration" value="">
              <div class="input-group-append">
                <div class="input-group-text">Hrs</div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="quantity" class="col-sm-6 col-form-label">Quantity: </label>
          <div class="col-sm-6 ">
            <div class="input-group ">
              <input type="text"  class="form-control" id="quantity" value="">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="start_date" class="col-sm-6 col-form-label">Start date:</label>
          <div class="col-sm-6 ">
            <div class="input-group ">
              <input type="date" class="form-control" id="start_date"  >
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="end_date" class="col-sm-6 col-form-label">End date:</label>
          <div class="col-sm-6 ">
            <div class="input-group ">
              <input type="date" class="form-control" id="end_date"  >
            </div>
          </div>
        </div>
        <div class="form-group row" >
          <label for="perscriptionNotes" class="col-sm-6 col-form-label">Notes: </label>
          <div class="col-sm-6">
            <div class="input-group ">
              <textarea type="text"  class="form-control" id="perscriptionNotes" row="3"></textarea>

            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="confirmPerscription">Confirm</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade " id="famhisModal" tabindex="-1" role="dialog" aria-labelledby="famhisModalModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ConfirmationModalLabel">Add Family Disease</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="famDisease" class="col-sm-6 col-form-label" >Condition: </label>
          <div class="col-sm-6">
            <select class="custom-select my-1 mr-sm-2" id="famDisease">
              <option selected>Please Select...</option>
              @foreach($famhisDesease as $desease)
              <option value="{{$desease->id}}" >{{$desease->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="contracted" class="col-sm-6 col-form-label">Contracted: </label>
          <div class="col-sm-6">
            <select class="custom-select" id="contracted">
              <option selected>Please Select...</option>
              <option value="true">Yes</option>
              <option value="false">No</option>
            </select>
          </div>
        </div>
        <div class="form-group row" >
          <label for="severity" class="col-sm-6 col-form-label">Severity: </label>
          <div class="col-sm-6">
            <div class="input-group ">
              <input type="text"  class="form-control" id="severity" value="">

            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="treatment_available" class="col-sm-6 col-form-label">Treatment Available: </label>
          <div class="col-sm-6 ">
            <select class="custom-select" id="treatment_available">
              <option selected>Please Select...</option>
              <option value="true">Yes</option>
              <option value="false">No</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="treatment_perscribed" class="col-sm-6 col-form-label">Treatment Perscribed:</label>
          <div class="col-sm-6 ">
            <select class="custom-select" id="treatment_perscribed">
              <option selected>Please Select...</option>
              <option value="true">Yes</option>
              <option value="false">No</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="confirmFamHis">Confirm</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade " id="labModal" tabindex="-1" role="dialog" aria-labelledby="labModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ConfirmationModalLabel">Request Lab Results</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="labType" class="col-sm-6 col-form-label" >Type: </label>
          <div class="col-sm-6">
            <select class="custom-select my-1 mr-sm-2" id="labType">
              <option selected>Please Select...</option>
              @foreach($labType as $type)
              <option value="{{$type}}" >{{$type}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row" >
          <label for="labNotes" class="col-sm-6 col-form-label">Notes: </label>
          <div class="col-sm-6">
            <div class="input-group ">
              <textarea type="text"  class="form-control" id="labNotes" row="3"></textarea>

            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="confirmLab">Confirm</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade " id="allergyModal" tabindex="-1" role="dialog" aria-labelledby="allergyModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ConfirmationModalLabel">Add Patient Allergy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="allergyType" class="col-sm-6 col-form-label" >Type: </label>
          <div class="col-sm-6">
            <select class="custom-select my-1 mr-sm-2" id="allergyType">
              <option selected>Please Select...</option>
              @foreach($allergies as $allergy)
              <option value="{{$allergy->id}}" >{{$allergy->type}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="allergySeverity" class="col-sm-6 col-form-label">Severity: </label>
          <div class="col-sm-6">
            <div class="input-group ">
              <input type="text"  class="form-control" id="allergySeverity" style="text-align: right;" value="">
            </div>
          </div>
        </div>
        <div class="form-group row" >
          <label for="allergyNotes" class="col-sm-6 col-form-label">Notes: </label>
          <div class="col-sm-6">
            <div class="input-group ">
              <textarea type="text"  class="form-control" id="allergyNotes" row="3"></textarea>

            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="confirmAllergy">Update</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js_includes')
<script type="text/javascript">
var appointment = [];
var perscription = {
  "medicine_id" : "",
  "problem" : "",
  "solution" : "",
  "dose" : "",
  "dose_duration" : "",
  "quantity" : "",
  "start" : "",
  "end" : "",
};
var allergy = {
  "type" : "",
  "agent" : "",
  "severity" : "",
  "source" : "",
  "notes" : "",
};
var lab = {
  "type" : "",
  "notes" : "",
};
var familyHistory = {
  "contracted" : "",
  "disease_id" : "",
  "severity" : "",
  "treatment_available" : "",
  "treatment_perscribed" : "",
};
var vitals = {
  "height" : "",
  "weight" : "",
  "body_temp" : "",
  "pulse" : "",
  "resp_rate" : "",
  "blood_pressure" : "",
  "notes" : "",
};

function updatePerscription() {
  perscription.medicine_id = $('#perscription_med').val();
  perscription.problem = $('#problem').val();
  perscription.solution = $('#solution').val();
  perscription.dose = $('#dose').val();
  perscription.dose_duration = $('#dose_duration').val();
  perscription.quantity = $('#quantity').val();
  perscription.start = $('#satrt_date').val();
  perscription.end = $('#end_date').val();
  perscription.notes = $('#perscriptionNotes').val();
  console.log(perscription);
}
function updateAllergy() {
  allergy.type = $('#allergyType').val();
  allergy.severity = $('#allergySeverity').val();
  allergy.notes = $('#allergyNotes').val();
  console.log(allergy);
}
function updateLab() {
  lab.type = $('#labType').val();
  lab.notes = $('#labNotes').val();
  console.log(lab);
}
function updateFamilyHistory() {
  familyHistory.contracted = $('#contracted').val();
  familyHistory.disease_id = $('#disease_id').val();
  familyHistory.severity = $('#severity').val();
  familyHistory.treatment_available = $('#treatment_available').val();
  familyHistory.treatment_perscribed = $('#treatment_perscribed').val();
  console.log(familyHistory);
}
function updateVitals() {
  vitals.height = $('#vitalsHeight').val();
  vitals.weight = $('#vitalsWeight').val();
  vitals.body_temp = $('#body_temp').val();
  vitals.pulse = $('#pulse').val();
  vitals.resp_rate = $('#resp_rate').val();
  vitals.blood_pressure = $('#blood_pressure').val();
  vitals.notes = $('#vitalNotes').val();
  console.log(vitals);
}

function updateAppointment() {
  appointment.push(vitals);
  appointment.push(perscription);
  appointment.push(allergy);
  appointment.push(lab);
  appointment.push(familyHistory);
  console.log(appointment);
}
function submitAppointment(){
  $.ajax({
           type:'POST',
           url:'/doctor/appointments/submit',
           data:{appointment:appointment },
           success:function(d){
              console.log(d);
              window.location.href = "/doctor/appointments";
           }
        });
}
$(function()
{

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $('#confirmVitals').click(function() {
    updateVitals();
    $('#vitalsModal').modal('hide');
  });
  $('#confirmAllergy').click(function() {
    updateAllergy();
    $('#allergyModal').modal('hide');
  });
  $('#confirmPerscription').click(function() {
    updatePerscription();
    $('#perscriptionsModal').modal('hide');
  });
  $('#confirmLab').click(function() {
    updateLab();
    $('#labModal').modal('hide');
  });
  $('#confirmFamHis').click(function() {
    updateFamilyHistory();
    $('#famhisModal').modal('hide');
  });
  $('#submitAppointment').click(function() {
    updateAppointment();
    submitAppointment();
  });
});
</script>
@endsection
