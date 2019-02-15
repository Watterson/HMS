@extends('templates.admin')
@section('main')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <a href="{{url('admin/accounts')}}" >< Managers</a>

        <div class="card">
            <div class="card-header">
                <strong>Edit - {{ $manager->name }}</strong>
            </div>
            <div class="card-block">
                {!! Form::model($manager,['uri'=>'admin/accounts/add','class'=>'']) !!}
                {!! Form::hidden('id') !!}

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
                <div class="form-group @if($errors->first('phone')) has-danger @endif">
                    <label class="control-label">Phone</label>
                    <div class="controls">
                        {!! Form::text('phone',null, ['class'=>'form-control']) !!}

                        @if($errors->first('phone'))
                            <div class="form-control-feedback">{{$errors->first('phone')}}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group @if($errors->first('mobile')) has-danger @endif">
                    <label class="control-label">Mobile</label>
                    <div class="controls">
                        {!! Form::text('mobile',null, ['class'=>'form-control']) !!}

                        @if($errors->first('mobile'))
                            <div class="form-control-feedback">{{$errors->first('mobile')}}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" id="btn-save" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Save</button>
            </div>
        </div>
    </div>
</div>

@endsection
