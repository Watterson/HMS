@extends('layouts.doctor_app')

@section('css_includes')

@endsection

@section('main')


<div class="col-lg-10 offset-lg-1">
    <div class="card">
        <div class="card-header">
          <div class=" row">
              <div class="col-10">
                  <strong>User Accounts</strong>
              </div>
                <div class=" col-2 text-right">
                  <a href="{{url('doctor/patients/add')}}" class="btn btn-link" role="button">Add Patient</a>
                </div>
             </div>
           </div>
         </div>
          @foreach($patients as $patient)
          <div class="card ">
          <div class="container row">
              <div class="col-4">
                <img src="{{url('/images/profile-img.png')}}" >
              </div>
              <div class="col-4">
                <h2 style="text-decoration:underline;">{{ $patient->first_name }} {{ $patient->last_name }}</h2>
                <p><strong>D.O.B: </strong>N/A </p>
                <p><strong>Last Appointmet: </strong>N/A </p>
                <p><strong>Next Appointmet: </strong>N/A </p>
                <p><strong>Lab Results: </strong>Pending </p>
              </div>
              <div class="col-4">
              <table style="height: 100%;">
                <tbody>
                  <tr>
                    <td class="align-middle"><a href="{{url('doctor/patients/view?user='.$patient->id)}}" type="link" id="btn-link" class="btn btn-sm btn-primary " ><i class="fas fa-eye"></i> Veiw Details</a></td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>
          </div>
          @endforeach

      </div>
    </div>
@endsection

@section('js_includes')
@endsection
