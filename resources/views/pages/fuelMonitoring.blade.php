@extends('layouts.app', [
  'namePage' => 'FuelMonitoring',
  'class' => 'sidebar-mini',
  'activePage' => 'fuelMonitoring',
])

@section('content')
  <div class="panel-header">
    <div class="header text-center">
      <h2 class="title">Fuel Monitoring</h2>
      
    </div>
  </div>
  <div class="content">
    <div class="row">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="places-buttons">
              <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                  <h4 class="card-title">
                    Scheduling Place
                    </h4>
                </div>
              </div>
              <form action="{{route('fuelMonitoring')}}" method="POST">
              @csrf 
              <div class="row" align="center">
                <div class="col-md-12">
                    <label>Name:</label>
                    <input type="text" name="name" value="" placeholder="Enter Sensor" />
                </div>

                <!-- <div class="col-md-12">
                    <label>Status:</label>
                    <select name="status">
                        <option value="" >0</option>
                        <option value="" >1</option>
                    </select>
                </div>
              
              
                <div class="col-md-12">
                    <label>Level:</label>
                    <input type="double" name="level" value="" placeholder="00.00 %" />
                </div> -->

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submitt</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection