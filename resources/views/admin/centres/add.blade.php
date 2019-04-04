@extends('layouts.admin')
@section('main')
<div class="row mt-4">
    <div class="col-lg-8 offset-lg-2">
        <a href="{{url('admin/centres')}}" >< All Centres</a>

        <div class="card">
            <div class="card-header">
                <strong>Add Centre</strong>
            </div>
            <div class="card-block">
                {!! Form::open(['url'=>'admin/centres/add','class'=>'']) !!}

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
                    <label class="control-label">Address:</label>
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
                <div class="form-group @if($errors->first('postcode')) has-danger @endif">
                    <label class="control-label">Postcode:</label>
                    <div class="controls">
                        {!! Form::text('postcode','',['class'=>'form-control']) !!}

                        @if($errors->first('postcode'))
                            <div class="form-control-feedback">{{$errors->first('postcode')}}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->first('county')) has-danger @endif">
                    <label class="control-label">County:</label>
                    <div class="controls">
                        {!! Form::text('county','',['class'=>'form-control']) !!}

                        @if($errors->first('county'))
                            <div class="form-control-feedback">{{$errors->first('county')}}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->first('phone')) has-danger @endif">
                    <label class="control-label">Contact Number:</label>
                    <div class="controls">
                        {!! Form::text('phone','',['class'=>'form-control']) !!}

                        @if($errors->first('phone'))
                            <div class="form-control-feedback">{{$errors->first('phone')}}</div>
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
