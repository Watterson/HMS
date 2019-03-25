@extends('layouts.doctor_app')
@section('main')
<div class="row mt-4">
        <div class="col-lg-8 offset-lg-2">
          <a href="{{ url()->previous() }}" >< Cancel Edit</a>

              <div class="card">
                  <div class="card-header">
                      <strong>Edit Patient</strong>
                  </div>
                  <div class="card-block">
                      {!! Form::open(['url'=>'admin/user/edit_patient','class'=>'']) !!}
                      {!! Form::hidden('id') !!}

                      <div class="form-group @if($errors->first('first_name')) has-danger @endif">
                          <label class="control-label">First Name</label>
                          <div class="controls">
                              {!! Form::text('first_name',$patient['first_name'],['class'=>'form-control']) !!}

                              @if($errors->first('first_name'))
                                  <div class="form-control-feedback">{{$errors->first('last_name')}}</div>
                              @endif
                          </div>
                      </div>

                      <div class="form-group @if($errors->first('last_name')) has-danger @endif">
                          <label class="control-label">Last Name</label>
                          <div class="controls">
                              {!! Form::text('last_name',$patient['last_name'],['class'=>'form-control']) !!}

                              @if($errors->first('last_name'))
                                  <div class="form-control-feedback">{{$errors->first('last_name')}}</div>
                              @endif
                          </div>
                      </div>

                      <div class="form-group @if($errors->first('email')) has-danger @endif">
                          <label class="control-label">Email (login)</label>
                          <div class="controls">
                              {!! Form::text('email',$patient['email'],['class'=>'form-control']) !!}

                              @if($errors->first('email'))
                                  <div class="form-control-feedback">{{$errors->first('email')}}</div>
                              @endif
                          </div>
                      </div>
                      <div class="form-group @if($errors->first('mobile')) has-danger @endif">
                          <label class="control-label">Mobile</label>
                          <div class="controls">
                              {!! Form::text('mobile',$patient['mobile'], ['class'=>'form-control']) !!}

                              @if($errors->first('mobile'))
                                  <div class="form-control-feedback">{{$errors->first('mobile')}}</div>
                              @endif
                          </div>
                      </div>
                      <div class="form-group @if($errors->first('address')) has-danger @endif">
                          <label class="control-label">Address</label>
                          <div class="controls">
                              {!! Form::text('address',$patient['address'], ['class'=>'form-control']) !!}

                              @if($errors->first('address'))
                                  <div class="form-control-feedback">{{$errors->first('address')}}</div>
                              @endif
                          </div>
                      </div>
                      <div class="form-group @if($errors->first('postcode')) has-danger @endif">
                          <label class="control-label">Postcode</label>
                          <div class="controls">
                              {!! Form::text('postcode',$patient['postcode'], ['class'=>'form-control']) !!}

                              @if($errors->first('postcode'))
                                  <div class="form-control-feedback">{{$errors->first('postcode')}}</div>
                              @endif
                          </div>
                      </div>
                      <div class="form-group @if($errors->first('city')) has-danger @endif">
                          <label class="control-label">City</label>
                          <div class="controls">
                              {!! Form::text('city',$patient['city'], ['class'=>'form-control']) !!}

                              @if($errors->first('city'))
                                  <div class="form-control-feedback">{{$errors->first('city')}}</div>
                              @endif
                          </div>
                      </div>
                      <div class="form-group @if($errors->first('county')) has-danger @endif">
                          <label class="control-label">County</label>
                          <div class="controls">
                              {!! Form::text('county',$patient['county'], ['class'=>'form-control']) !!}

                              @if($errors->first('county'))
                                  <div class="form-control-feedback">{{$errors->first('county')}}</div>
                              @endif
                          </div>
                      </div>
                      <div class="form-group @if($errors->first('dob')) has-danger @endif">
                          <label class="control-label">Dob</label>
                          <div class="controls">
                              {!! Form::text('dob',$patient['dob'], ['class'=>'form-control']) !!}

                              @if($errors->first('dob'))
                                  <div class="form-control-feedback">{{$errors->first('dob')}}</div>
                              @endif
                          </div>
                      </div>
                      <div class="form-group @if($errors->first('kin')) has-danger @endif">
                          <label class="control-label">Next of Kin</label>
                          <div class="controls">
                              {!! Form::text('kin',$patient['kin'], ['class'=>'form-control']) !!}

                              @if($errors->first('kin'))
                                  <div class="form-control-feedback">{{$errors->first('kin')}}</div>
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="card-footer text-center">
                      <button type="submit" id="btn-save" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Save</button>
                  </div>
              </div>
          </div>
        </div>
</div>

@endsection
