@extends('layouts.app')
@section('js_includes')
<    <script type="text/javascript" src="{{url('/js/patientIndex.js')}}"></script>

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
              <div class=" col-md-4 text-center offset-md-2" id="chooseCentre">
                <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Select Centre
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Byrom Street</a>
                    <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Kenny</a>
                    <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Lime Street</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"> Concert square</a>
                </div>
              </div>
              <div class=" col-md-4 text-center " id="chooseDoctor">
                <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Select Doctor
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Dr John</a>
                    <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Dr Bucky</a>
                    <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Surgery</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"> Allergy Related</a>
                </div>
              </div>
              <div class="col-md-10 offset-md-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Reason:</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="reasonHelp" placeholder="E.g Sore head">
                  <small id="reasonHelp" class="form-text text-muted">What is the reason for making an appointment?</small>
                </div>
              </div>
              <div class="col-md-4 offset-md-4 ">
                <div class="form-group">
                  <label for="date">Date:</label>
                  <input type="date" class="form-control" id="date" data-provide="datepicker" >
                </div>
              </div>
              <div class="col-md-12 text-center">
                <button type="submit" id="btn-save" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Search Availability</button>
              </div>
              <div>
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                  <div class="card-body text-center">
                    <h1 class="card-title">10:00am</h1>
                  </div>
                </div>
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                  <div class="card-body text-center">
                    <h1 class="card-title">9:00am</h1>
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
@endsection
