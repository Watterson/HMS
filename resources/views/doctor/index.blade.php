@extends('layouts.doctor_app2')

@section('css_includes')

@endsection

@section('main')

<!-- <div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
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

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->
<div class="col-lg-10 offset-lg-1">
  <div class="card">
      <div class="card-header">
          <strong>Register User</strong>
      </div>


        <div class="card-block text-left" >
          {!! Form::open(['url'=>'doctor/patient/add','class'=>'']) !!}
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


          <div class="text-center">
            <button type="submit" class="btn btn-primary mb-2 ">Submit User</button>
          </div>
      </div>
    </div>
    </div>
  </div>
  </div>
<div class="col-lg-10 offset-lg-1">
    <div class="card">
        <div class="card-header">
            <strong>Patients</strong>
        </div>
        <div class="card-block">
          <table class="table table-striped">
            <tr>
              <th>Name</th>
              <th>Email</th>

            </tr>
            @foreach($users as $user)
            <tr>
              <td><a href="{{url('doctor/patient/edit?user='.$user->id)}}">{{ $user->name }}</a></td>
              <td>{{ $user->email }}</td>
            </tr>
            @endforeach

          </table>
        </div>
    </div>
@endsection

@section('js_includes')

@endsection
