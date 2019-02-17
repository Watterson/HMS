@extends('layouts.admin')
@section('main')

<div class="row">
    <div class="col-lg-10 offset-lg-1">
      <div class="card">
          <div class="card-header">
              <strong>Add User</strong>
          </div>
          <div class="card-block text-center" >
            {!! Form::open(['url'=>'admin/user/add','class'=>'form-control']) !!}
            <div class="row">
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 @if($errors->first('userName')) has-danger @endif">
                <label for="userName">Name</label>
                <div class="controls">
                    {!! Form::text('userName','Joe Bloggs',['class'=>'form-control']) !!}

                    @if($errors->first('userName'))
                        <div class="form-control-feedback">{{$errors->first('userName')}}</div>
                    @endif
                </div>
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 @if($errors->first('email')) has-danger @endif" >
                <label class="control-label">Email (login)</label>
                <div class="controls">
                    {!! Form::text('email','Joe@gmail.com',['class'=>'form-control']) !!}

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
              <div class="form-group   @if($errors->first('role')) has-danger @endif">
                <label for="role">Role</label>
                <select id="role" class="form-control">
                  <option selected>Choose...</option>
                  @foreach($roles as $role)
                  <option value="{{$role->id}}">{{$role->role}}</option>
                  @endforeach
                </select>
              </div>
            <button type="submit" class="btn btn-primary mb-2">Submit User</button>
            <div>
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="col-lg-10 offset-lg-1">
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
