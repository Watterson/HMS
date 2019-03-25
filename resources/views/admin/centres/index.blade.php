@extends('layouts.admin')
@section('main')

<div class="row justify-content-center  mt-4">
    <div class="col-lg-10 ">
        <div class="card">
            <div class="card-header">
              <div class=" row">
                  <div class="col-10">
                      <strong>Centres</strong>
                  </div>
                    <div class="col-2 text-center">
                      <a href="{{url('admin/centres/add')}}" class="btn btn-link" role="button">Add Centre</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
            	<table class="table table-striped">
            		<tr>
                  <th>Centre ID</th>
            			<th>Name</th>
                  <th>Address</th>
                  <th>Doctors</th>
            			<?/*<th></th>*/?>

            		</tr>

            		<tr>
                  <td></td>
                  <td></td>
                  <td></td>
            		</tr>

            	</table>
            </div>
        </div>
    </div>
</div>

@endsection
