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
                          {{$patientCount}}
                       </h3>

                       <p>{{ __('Total Patients') }}</p>
                   </div>
                   <div class="icon">
                      <i class=" icon-people"></i>
                   </div>
                   <a href="{{('/doctor/user')}}" class="small-box-footer">All Patients <i
                               class="fa fa-arrow-circle-right"></i></a>
               </div>

           </div>
           <div class="col-lg-3 col-xs-6">
               <!-- small box -->
               <div class="small-box bg-aqua">
                   <div class="inner">
                       <h3>
                              {{$patientCount}}
                       </h3>

                       <p>{{ __('Total Patients') }}</p>
                   </div>
                   <div class="icon">
                       <i class=" icon-people"></i>
                   </div>
                   <a href="#" class="small-box-footer">All Tasks <i
                               class="fa fa-arrow-circle-right"></i></a>
               </div>

           </div>
           <div class="col-lg-3 col-xs-6">
               <!-- small box -->
               <div class="small-box bg-aqua">
                   <div class="inner">
                       <h3>
                            5
                       </h3>

                       <p>{{ __('Tasks completed this month') }}</p>
                   </div>
                   <div class="icon">
                       <i class="ion ion-ios-book-outline"></i>
                   </div>
                   <a href="#" class="small-box-footer">All Tasks <i
                               class="fa fa-arrow-circle-right"></i></a>
               </div>

           </div>
           <div class="col-lg-3 col-xs-6">
               <!-- small box -->
               <div class="small-box bg-aqua">
                   <div class="inner">
                       <h3>
                            5
                       </h3>

                       <p>{{ __('Tasks completed this month') }}</p>
                   </div>
                   <div class="icon">
                       <i class="ion ion-ios-book-outline"></i>
                   </div>
                   <a href="#" class="small-box-footer">All Tasks <i
                               class="fa fa-arrow-circle-right"></i></a>
               </div>

           </div>
         </div>

       </div>
           <!-- ./col -->
@endsection
