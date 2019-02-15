@extends('templates.admin')
@section('main')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <a href="{{url('admin/patients')}}" >< Return </a>

        <div class="card">
            <div class="card-header">
                <strong>Add Account</strong>
            </div>
            <div class="card-block">
                {!! Form::open(['url'=>'admin/patients/add','class'=>'']) !!}

                <div class="form-group @if($errors->first('name')) has-danger @endif">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        {!! Form::text('name',null,['class'=>'form-control']) !!}

                        @if($errors->first('name'))
                            <div class="form-control-feedback">{{$errors->first('name')}}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group @if($errors->first('email')) has-danger @endif">
                    <label class="control-label">Email (login)</label>
                    <div class="controls">
                        {!! Form::text('email',null,['class'=>'form-control']) !!}

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
                <div class="form-group @if($errors->first('role')) has-danger @endif">
                    <label class="control-label">Role</label>
                    <div class="controls">
                        {!! Form::text('role',null, ['class'=>'form-control']) !!}

                        @if($errors->first('role'))
                            <div class="form-control-feedback">{{$errors->first('role')}}</div>
                        @endif
                    </div>
                </div>


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Add</button>
            </div>
        </div>
    </div>
</div>

@endsection
