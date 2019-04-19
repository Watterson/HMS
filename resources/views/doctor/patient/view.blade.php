@extends('layouts.doctor_app')
@section('main')
<div class="row mt-4">
  <div class="col-12 ">
    <a href="{{url('doctor/patients')}}" >< All Users</a>
      <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General Info</a>
          <a class="nav-item nav-link" id="nav-appointments-tab" data-toggle="tab" href="#nav-appointments" role="tab" aria-controls="nav-appointments" aria-selected="false">Appointments</a>
          <a class="nav-item nav-link" id="nav-allergies-tab" data-toggle="tab" href="#nav-allergies" role="tab" aria-controls="nav-allergies" aria-selected="false">Allergies</a>
          <a class="nav-item nav-link" id="nav-medhis-tab" data-toggle="tab" href="#nav-medhis" role="tab" aria-controls="nav-medhis" aria-selected="false">Medical Hitory</a>
          <a class="nav-item nav-link" id="nav-famhis-tab" data-toggle="tab" href="#nav-famhis" role="tab" aria-controls="nav-famhis" aria-selected="false">Family History</a>
          <a class="nav-item nav-link" id="nav-lab-tab" data-toggle="tab" href="#nav-lab" role="tab" aria-controls="nav-lab" aria-selected="false">Lab Results</a>
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
                <p><strong>Email: </strong>{{$user->email}} </p>
                <p><strong>Mobile: </strong>{{$patient->mobile}} </p>
                <p><strong>D.O.B: </strong>{{$patient->dob}} </p>
                <p><strong>Address: </strong>{{$patient->address}} </p>
                <p><strong>Postcode: </strong>{{$patient->postcode}} </p>
                <p><strong>County: </strong>{{$patient->county}} </p>
                <p><strong>Next of Kin: </strong>{{$patient->kin}} </p>
              </div>
              <div class="col-4">
              <table style="height: 100%;">
                <tbody>
                  <tr>
                    <td class="align-middle"><a href="{{url('doctor/patients/edit?user='.$patient->id)}}" type="link" id="btn-link" class="btn btn-sm btn-primary " ><i class="fas fa-eye"></i> Edit Details</a></td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-appointments" role="tabpanel" aria-labelledby="nav-appointments-tab">
          <div class="card ">
            <div class="card-header ">
              <div class="row">
                <div class="col-9">
                  Future Appointments
                </div>
                <div class="col-3">
                  <a href="{{url('admin/patient/appointments/add?user='.$patient->id)}}" class="btn btn-link" role="button">Add Appointment</a>
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
                    <td>19/03/2019</td>
                    <td>10:30am</td>
                    <td>Mark</td>
                    <td>Byron Street</td>
                    <td>Sore Head</td>
                    <td>3 Days Away</td>
                    <td class="text-right"><a href="#" class="btn btn-link" role="button">Alter</a></td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
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
                    <th scope="col">Centre</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>19/03/2019</td>
                    <td>10:30am</td>
                    <td>Mark</td>
                    <td>Byron Street</td>
                    <td>Sore Head</td>
                    <td>Prescription of pqinkillers </td>
                    <td class="text-right"><a href="#" class="btn btn-link" role="button">Veiw Details</a></td>
                  </tr>
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
        </div>
        <div class="tab-pane fade" id="nav-medhis" role="tabpanel" aria-labelledby="nav-medhis-tab">
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

                          </div>
                      </div>
                      <div class="card-block">
                      	<table class="table table-striped">
                      		<tr>
                            <th> # </td>
                            <th>Condition</th>
                      			<th>Description</th>
                            <th>Severity</th>
                            <th>Current Risk</th>
                      		</tr>

                      		<tr>
                            <td>1</td>
                            <td>Diabetes</td>
                            <td>The body doesn't produce enough insulin, or the body's cells don't react to insulin</td>
                            <td>Life threatening</td>
                            <td>High</td>
                      		</tr>
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
