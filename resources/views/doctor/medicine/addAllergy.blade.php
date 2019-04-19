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
                {!! Form::open(['url'=>'doctor/allergy/add','class'=>'']) !!}

                <div class="form-group @if($errors->first('type')) has-danger @endif">
                    <label class="control-label">Type</label>
                    <div class="controls">
                        {!! Form::text('type','',['class'=>'form-control']) !!}

                        @if($errors->first('type'))
                            <div class="form-control-feedback">{{$errors->first('type')}}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group @if($errors->first('agent')) has-danger @endif">
                    <label class="control-label">Agent:</label>
                    <div class="controls">
                        {!! Form::text('agent','',['class'=>'form-control']) !!}

                        @if($errors->first('description'))
                            <div class="form-control-feedback">{{$errors->first('agent')}}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group @if($errors->first('dose')) has-danger @endif">
                    <label class="control-label">Reaction: </label>
                    <div class="controls">
                        {!! Form::text('reaction','',['class'=>'form-control']) !!}

                        @if($errors->first('reaction'))
                            <div class="form-control-feedback">{{$errors->first('reaction')}}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->first('severity')) has-danger @endif">
                    <label class="control-label">Severity:</label>
                    <div class="controls">
                        {!! Form::text('severity','',['class'=>'form-control']) !!}

                        @if($errors->first('severity'))
                            <div class="form-control-feedback">{{$errors->first('severity')}}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->first('source')) has-danger @endif">
                    <label class="control-label">Source:</label>
                    <div class="controls">
                        {!! Form::text('source','',['class'=>'form-control']) !!}

                        @if($errors->first('source'))
                            <div class="form-control-feedback">{{$errors->first('source')}}</div>
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
