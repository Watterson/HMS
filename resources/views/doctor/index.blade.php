@extends('layouts.app')

@section('css_includes')

@endsection

@section('main')

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
              <td></td>
              <td></td>
              <td><a href="{{url('admin/user/veiw?userId='.$user->id)}}">{{ $user->name }}</a></td> -->
              <td>{{ $user->email }}</td>
               <td>{{ $user->role }}</td>
            </tr>
            @endforeach

          </table>
        </div>
    </div>
@endsection

@section('js_includes')

@endsection
