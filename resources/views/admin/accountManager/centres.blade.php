@extends('templates.admin')
@section('main')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <a href="{{ url('admin/accounts') }}">< Back to managers</a>
        <div class="card">
            <div class="card-header">
                <strong>Centres for - {{$accountManager->name}}</strong>
            </div>
            {{Form::open(['url'=>'accounts/centres']) }}
                <div class="card-block">
                	<table class="table table-striped">
                		@foreach($centres as $centre)
                		<tr>
                			<th><a href="{{url('admin/centres/view?centreId='.$centre->id)}}">{{ $centre->name }}</a></th>
                			<td><a class="btn btn-sm btn-primary" href="{{url('admin/centres/edit?centreId='.$centre->id.'#account')}}">Edit</a></td>
                		</tr>
                		@endforeach
                	</table>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection