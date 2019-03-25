@extends('layouts.admin')
@section('main')
<div class="row mt-4">
    <div class="col-lg-8 offset-lg-2">
        <a href="{{url('admin/centres')}}" >< All Centres</a>

        <div class="card">
            <div class="card-header">
                <strong>Edit Centre</strong>
            </div>
            <div class="card-block">
                {!! Form::open(['url'=>'admin/centres/edit','class'=>'']) !!}
                {!! Form::hidden('id') !!}

                <div class="form-group @if($errors->first('first_name')) has-danger @endif">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        {!! Form::text('name','',['class'=>'form-control']) !!}

                        @if($errors->first('name'))
                            <div class="form-control-feedback">{{$errors->first('name')}}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group @if($errors->first('address')) has-danger @endif">
                    <label class="control-label">Address</label>
                    <div class="controls">
                        {!! Form::text('address','',['class'=>'form-control']) !!}

                        @if($errors->first('address'))
                            <div class="form-control-feedback">{{$errors->first('address')}}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group @if($errors->first('email')) has-danger @endif">
                    <label class="control-label">Email (login)</label>
                    <div class="controls">
                        {!! Form::text('email','',['class'=>'form-control']) !!}

                        @if($errors->first('email'))
                            <div class="form-control-feedback">{{$errors->first('email')}}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->first('landline')) has-danger @endif">
                    <label class="control-label">Contact Number</label>
                    <div class="controls">
                        {!! Form::password('landline',['class'=>'form-control']) !!}

                        @if($errors->first('landline'))
                            <div class="form-control-feedback">{{$errors->first('landline')}}</div>
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
