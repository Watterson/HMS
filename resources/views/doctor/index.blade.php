@extends('layouts.doctor_app')

@section('css_includes')
   <link href="{{ asset('css/dashboardboxes.css') }}" rel="stylesheet">
@endsection

@section('js_includes')

@endsection

@section('main')
    <div class="div">
<!-- Small boxes (Stat box) -->
       <div class="row">
           <div class="col-lg-3 col-xs-6">
               <!-- small box -->
               <div class="small-box bg-aqua ">
                   <div class="inner">
                       <h3>
                        7
                       </h3>

                       <p>{{ __('Total Patients') }}</p>
                   </div>
                   <div class="icon">
                      <i class=" icon-people"></i>
                   </div>
                   <a href="{{('/doctor/user')}}" class="small-box-footer"> <i
                               class="fa fa-arrow-circle-right"></i></a>
               </div>

           </div>
           <div class="col-lg-3 col-xs-6">
               <!-- small box -->
               <div class="small-box bg-aqua">
                   <div class="inner">
                       <h3>
                              3
                       </h3>

                       <p>{{ __('Appointments today') }}</p>
                   </div>
                   <div class="icon">
                       <i class=" icon-list"></i>
                   </div>
                   <a href="#" class="small-box-footer"><i
                               class="fa fa-arrow-circle-right"></i></a>
               </div>

           </div>
           <div class="col-lg-3 col-xs-6">
               <!-- small box -->
               <div class="small-box bg-aqua">
                   <div class="inner">
                       <h3>
                            4
                       </h3>

                       <p>{{ __('Available appointment slots') }}</p>
                   </div>
                   <div class="icon">
                       <i class=" icon-list"></i>
                   </div>
                   <a href="#" class="small-box-footer"> <i
                               class="fa fa-arrow-circle-right"></i></a>
               </div>

           </div>
           <div class="col-lg-3 col-xs-6">
               <!-- small box -->
               <div class="small-box bg-aqua">
                   <div class="inner">
                       <h3>
                            2
                       </h3>

                       <p>{{ __('Completed appointment slots') }}</p>
                   </div>
                   <div class="icon">
                       <i class=" icon-check"></i>
                   </div>
                   <a href="#" class="small-box-footer"> <i
                               class="fa fa-arrow-circle-right"></i></a>
               </div>

           </div>
         </div>

       </div>
       <div class="col-lg-10 offset-lg-1">
         <div class="card">
            <div class="card-header">
             Search All Patients
            </div>
            <div class="card-body ">
              <div class="row">
              <div class="col-md-4">
                <form method="get" action="/doctor/searchSurname">
                    {{csrf_field()}}
                 <div class="form-group">
                   <label for="surname">Surname:</label>
                   <input type="text" class="form-control" id="surname" aria-describedby="surnameHelp" placeholder="">
                   <small id="surnameHelp" class="form-text text-muted">Search for patient using their surname</small>
                 </div>
                 <button type="submit" class="btn btn-primary">Search</button>
               </form>
             </div>

            <div class="col-md-4">
              <form method="get" action="/doctor/searchDob">
                  {{csrf_field()}}
               <div class="form-group">
                 <label for="dob">D.O.B:</label>
                 <input type="date" class="form-control" id="dob" aria-describedby="dobHelp" placeholder="">
                 <small id="dobHelp" class="form-text text-muted">Search for patient using their date of birth</small>
               </div>
               <button type="submit" class="btn btn-primary">Search</button>
             </form>
           </div>
           <div class="col-md-4 ">
             <form method="get" action="/patient/searchAddress">
                 {{csrf_field()}}
              <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" aria-describedby="addressHelp" placeholder="">
                <small id="addressHelp" class="form-text text-muted">Search for patient using their address</small>
              </div>
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
          </div>

         <div class="col-md-12 mt-5">
           <table class="table table-striped">
             <tr>
               <th> # </td>
               <th>Patient Name</th>
               <th>D.O.B</th>
               <th>Address</th>
             </tr>
             @foreach($patients as $patient)
             <tr>
               <td>{{ $loop->iteration }}</td>
               <td><a href="{{url('doctor/patients/edit?user='.$patient->id)}}">{{$patient->first_name}} {{$patient->last_name}}</td>
               <td>{{$patient->dob}}</td>
               <td>{{$patient->address}}</td>

             </tr>
             @endforeach
           </table>
        </div>
         </div>
       </div>
           <!-- ./col -->
@endsection
