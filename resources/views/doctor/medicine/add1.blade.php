@extends('layouts.doctor_app')
@section('main')
<div class="row mt-4">
    <div class="col-lg-8 offset-lg-2">
        <a href="{{url('admin/medicine')}}" >< All Medicines</a>

        <div class="card">
            <div class="card-header">
                <strong>Add Medicine</strong>
            </div>
            <div class="card-block">
                {!! Form::open(['url'=>'doctor/medicine/add','class'=>'']) !!}

                <div class="form-group @if($errors->first('first_name')) has-danger @endif">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        {!! Form::text('name','',['class'=>'form-control']) !!}

                        @if($errors->first('name'))
                            <div class="form-control-feedback">{{$errors->first('name')}}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group @if($errors->first('description')) has-danger @endif">
                    <label class="control-label">Description:</label>
                    <div class="controls">
                        {!! Form::text('description','',['class'=>'form-control']) !!}

                        @if($errors->first('description'))
                            <div class="form-control-feedback">{{$errors->first('description')}}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group @if($errors->first('dose')) has-danger @endif">
                    <label class="control-label">Dose </label>
                    <div class="controls">
                        {!! Form::text('dose','',['class'=>'form-control']) !!}

                        @if($errors->first('dose'))
                            <div class="form-control-feedback">{{$errors->first('dose')}}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->first('duration')) has-danger @endif">
                    <label class="control-label">Duration:</label>
                    <div class="controls">
                        {!! Form::text('duration','',['class'=>'form-control']) !!}

                        @if($errors->first('duration'))
                            <div class="form-control-feedback">{{$errors->first('duration')}}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->first('quantity')) has-danger @endif">
                    <label class="control-label">Quantity:</label>
                    <div class="controls">
                        {!! Form::text('quantity','',['class'=>'form-control']) !!}

                        @if($errors->first('quantity'))
                            <div class="form-control-feedback">{{$errors->first('quantity')}}</div>
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
