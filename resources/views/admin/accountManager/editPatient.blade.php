@extends('layouts.admin')
@section('main')
<div class="row mt-4">
    <div class="col-lg-8 offset-lg-2">
        <a href="{{url('admin/user')}}" >< All Users</a>

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
                <div class="form-group @if($errors->first('password')) has-danger @endif">
                    <label class="control-label">Password</label>
                    <div class="controls">
                        {!! Form::password('password',['class'=>'form-control']) !!}

                        @if($errors->first('password'))
                            <div class="form-control-feedback">{{$errors->first('password')}}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->first('password')) has-danger @endif">
                    <label class="control-label">Password Confirmation</label>
                    <div class="controls">
                        {!! Form::password('password_confirmation',['class'=>'form-control']) !!}

                        @if($errors->first('password'))
                            <div class="form-control-feedback">{{$errors->first('password')}}</div>
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
                <div class="form-group @if($errors->first('mobile')) has-danger @endif">
                    <label class="control-label">Mobile</label>
                    <div class="controls">
                        {!! Form::text('mobile',$patient['mobile'], ['class'=>'form-control']) !!}

                        @if($errors->first('mobile'))
                            <div class="form-control-feedback">{{$errors->first('mobile')}}</div>
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

@endsection
