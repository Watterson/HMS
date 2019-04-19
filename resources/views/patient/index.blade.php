@extends('layouts.app')
@section('js_includes')

@endsection

@section('main')
<div class=" row " >
        <div class="col-md-4 offset-md-1">
            <div class="card">
                <div class="card-header">Your Details</div>
                <div class="card-body row">

                      <div class="offset-md-2 col-md-8">
                        <img style="align: center; width: 90%; " src="{{url('/images/profile-img.png')}}" >

                      </div>
                      </div>
                      <div class="ml-4">
                        <h2 style="text-decoration:underline;">{{ $user->first_name }} {{ $user->last_name }}</h2>
                        <p><strong>Email: </strong>{{$user->email}} </p>
                        <p><strong>Mobile: </strong>{{$user->mobile}} </p>
                        <p><strong>D.O.B: </strong>{{$user->dob}} </p>
                        <p><strong>Address: </strong>{{$user->address}} </p>
                        <p><strong>Postcode: </strong>{{$user->postcode}} </p>
                        <p><strong>County: </strong>{{$user->county}} </p>
                        <p><strong>Next of Kin: </strong>{{$user->kin}} </p>
                      </div>
                      <div class="text-center mb-3">
                        <a href="{{url('/edit')}}" type="link" id="btn-link" class="btn btn-sm btn-primary " ><i class="fas fa-eye"></i> Edit Details</a>
                      </div>
                    </div>
                  </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">Book Appointment</div>
            <div class="card-body row" >
              <div class=" col-md-5 text-center offset-md-1 form-group" id="chooseCentre">
                <label for="centreSelect">Centres:</label>
                <select class="form-control" id="centreSelect" data-style="btn-primary" data-width="auto">
                  <option class="dropdown-item " value="" active >Please select</option>s
                  @foreach($centres as $centre)
                  <option class="dropdown-item "  value="{{$centre->id}}">{{$centre->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class=" col-md-5 text-center " id="chooseDoctor">
                <label for="doctorSelect">Doctors:   </label>
                <select class="form-control" id="doctorSelect" data-style="btn-primary" data-width="auto" disabled>
                  <option class="dropdown-item " value="" active >Please select</option>
                  @foreach($doctors as $doctor)
                  <option class="dropdown-item {{$doctor->centre_id}} doctorOptions" value="{{$doctor->id}}">Dr {{$doctor->first_name}} {{$doctor->last_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-10 offset-md-1">
                <div class="form-group">
                  <label for="reason">Reason:</label>
                  <input type="text" class="form-control" id="reason" aria-describedby="reasonHelp" placeholder="E.g Sore head">
                  <small id="reasonHelp" class="form-text text-muted">What is the reason for making an appointment?</small>
                </div>
              </div>
              <div class="col-md-4 offset-md-4 ">
                <div class="form-group">
                  <label for="date">Date:</label>
                  <input type="date" class="form-control" id="date"  >
                </div>
              </div>
              <div class="col-md-12 mb-3 text-center">
                <button type="submit" id="search" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Search Availability</button>
              </div>
              <div id="avaiableTimes" style="display:none;">
                <div class="row mb-2 offset-md-2">
                  <div class="col-md-2 m-2" >
                    <button type="button" class="btn btn-success text-white apt-time" id="9" value="9" data-toggle="modal" data-target="#ConfirmationModal">9:00am</button>
                  </div>
                  <div class="col-md-2 m-2 " >
                    <button type="button" class="btn btn-success text-white apt-time" id="10" value="10" data-toggle="modal" data-target="#ConfirmationModal">10:00am</button>
                  </div>
                  <div class="col-md-2 m-2" >
                    <button type="button" class="btn btn-success text-white apt-time" id="11" value="11" data-toggle="modal" data-target="#ConfirmationModal">11:00am</button>
                  </div>
                  <div class="col-md-2 m-2" >
                    <button type="button" class="btn btn-success text-white apt-time" id="12" value="12" data-toggle="modal" data-target="#ConfirmationModal">12:00pm</button>
                  </div>
                </div>
                <div class="row mb-2 offset-md-2">
                  <div class="col-md-2 m-2" >
                    <button type="button" class="btn btn-success text-white apt-time" id="2" value="2" data-toggle="modal" data-target="#ConfirmationModal"> 2:00pm </button>
                  </div>
                  <div class="col-md-2 m-2" >
                    <button type="button" class="btn btn-success text-white apt-time" id="3" value="3" data-toggle="modal" data-target="#ConfirmationModal"> 3:00pm </button>
                  </div>
                  <div class="col-md-2 m-2" >
                    <button type="button" class="btn btn-success text-white apt-time" id="4" value="4" data-toggle="modal" data-target="#ConfirmationModal"> 4:00pm </button>
                  </div>
                  <div class="col-md-2 m-2" >
                    <button type="button" class="btn btn-success text-white apt-time" id="5" value="5" data-toggle="modal" data-target="#ConfirmationModal"> 5:00pm </button>
                  </div>
                </div>
              </div>
              <!-- <div class="col-md-11 row mt-3 ml-3 rounded border border-primary" hidden>
                <div class="col-md-12 text-center mt-3">
                  <h4>Please choose suitable appointment time</h4>
                </div>
                <div class="nav flex-column nav-pills col-md-4 mt-3 offset-md-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Monday</a>
                  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Tuesday</a>
                  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Wednesday</a>
                  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Thursday</a>
                  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Fridays</a>

                </div>
                <div class="tab-content col-md-6 mt-3 ml-2" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                      <div class="card-body text-center">
                        <h1 class="card-title">10:00am</h1>
                      </div>
                    </div>
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                      <div class="card-body text-center">
                        <h1 class="card-title">12:00am</h1>
                      </div>
                    </div>
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                      <div class="card-body text-center">
                        <h1 class="card-title">1:00pm</h1>
                      </div>
                    </div>
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                      <div class="card-body text-center">
                        <h1 class="card-title">3:00pm</h1>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-body text-center">
                          <h1 class="card-title">9:00am</h1>
                        </div>
                      </div>
                      <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-body text-center">
                          <h1 class="card-title">10:00am</h1>
                        </div>
                      </div>
                      <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-body text-center">
                          <h1 class="card-title">3:00pm</h1>
                        </div>
                      </div>
                      <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-body text-center">
                          <h1 class="card-title">4:00pm</h1>
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
</div>
<div class="modal fade" id="ConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="ConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ConfirmationModalLabel">Confirm Appointment Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="centreModal" class="col-sm-2 col-form-label">Centre: </label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="centreModal" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="doctorModal" class="col-sm-2 col-form-label">Doctor: </label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="doctorModal" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="reasonModal" class="col-sm-2 col-form-label">Reason: </label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="reasonModal" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="dateModal" class="col-sm-2 col-form-label">Date: </label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="dateModal" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="timeModal" class="col-sm-2 col-form-label">Time: </label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="timeModal" value="">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="confirmBtn">Confirm</button>
      </div>
    </div>
  </div>
</div>

@endsection
