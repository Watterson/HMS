@extends('layouts.admin')
@section('main')

<div class="row justify-content-center">
    <!-- <div class="col-md-10">
        <div class="card">
            <div class="card-header">Register User</div>

            <div class="card-block justify-content-left">
                <form method="POST" action="{{url('/admin/user/add') }}">
                    @csrf
                  <div class="row">
                    <div class="form-group row col col-sm-12 col-xs-12">
                        <label for="name" class="col-md-3 col-form-label text-md-center">{{ __('Name') }}</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row col col-sm-12 col-xs-12">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                  </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>


                      <div class="form-group  row">
                        <label class="col-md-4 col-form-label text-md-right" for="role">Role</label>
                        <div class="col-md-6">
                          <select id="role" name="role" class="form-control">
                            <option value="" selected>Choose...</option>
                            <option value="doctor">Doctor</option>
                            <option value="patient">Patient</option>

                          </select>
                          @if ($errors->has('role'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('role') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                            Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <div class="col-lg-10 ">
      <div class="card">
          <div class="card-header">
              <strong>Register User</strong>
          </div>

            {!! Form::open(['url'=>'admin/user','class'=>'form-control']) !!}
            <div class="card-block text-left" >
            <div class="row">
              <div class="form-group  col-lg-6 col-md-6 col-sm-12 col-xs-12 @if($errors->first('userName')) has-danger @endif">
                <label for="userName">Name</label>
                <div class="controls">
                    {!! Form::text('name','',['class'=>'form-control']) !!}

                    @if($errors->first('name'))
                        <div class="form-control-feedback">{{$errors->first('name')}}</div>
                    @endif
                </div>
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 @if($errors->first('email')) has-danger @endif" >
                <label class="control-label">Email (login)</label>
                <div class="controls">
                    {!! Form::text('email','',['class'=>'form-control']) !!}

                    @if($errors->first('email'))
                        <div class="form-control-feedback">{{$errors->first('email')}}</div>
                    @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 @if($errors->first('password')) has-danger @endif">
                  <label class="control-label">Password</label>
                  <div class="controls">
                      {!! Form::password('password',['class'=>'form-control']) !!}

                      @if($errors->first('password'))
                          <div class="form-control-feedback">{{$errors->first('password')}}</div>
                      @endif
                  </div>
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 @if($errors->first('password')) has-danger @endif">
                <label class="control-label">Password Confirmation</label>
                <div class="controls">
                    {!! Form::password('password_confirmation',['class'=>'form-control']) !!}

                    @if($errors->first('password'))
                        <div class="form-control-feedback">{{$errors->first('password')}}</div>
                    @endif
                </div>
              </div>

            <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12 offset-lg-4 offset-md-3 offset-sm-12 offset-xs-12 ">
              <div class="form-group   @if($errors->first('role')) has-danger @endif text-center">
                <label for="role">Role</label>
                <select id="role" name='role' class="form-control">
                  <option selected>Choose...</option>
                  <option value="doctor">Doctor</option>
                  <option value="patient">Patient</option>

                </select>
              </div>

            <div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary mb-2 ">Submit User</button>
              </div>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
    <div class="col-lg-10 ">
        <div class="card">
            <div class="card-header">
                <strong>User Accounts</strong>
            </div>
            <div class="card-block">
            	<table class="table table-striped">
            		<tr>
                  <th>Name</th>
            			<th>Email</th>
                  <th>Role</th>
                        <th></th>
            			<?/*<th></th>*/?>

            		</tr>
            		@foreach($users as $user)
            		<tr>
            			<td><a href="{{url('admin/user/veiw?userId='.$user->id)}}">{{ $user->name }}</a></td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->role }}</td>
            		</tr>
            		@endforeach

            	</table>
            </div>
        </div>
    </div>
</div>

@endsection
