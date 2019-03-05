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
           <!-- ./col -->
@endsection
