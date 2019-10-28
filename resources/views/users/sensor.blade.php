@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'sensor',
    'activePage' => 'user',
    'activeNav' => '',
])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Add Fuel Monitoring Sensor') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('log') }}" class="btn btn-primary btn-round">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <button onclick="myFunction()" class="btn btn-primary" style="float:right; border-radius:10px">Create New</button>
                </div>
                <div class="col-md-6">
                    <button onclick="myFun()" class="btn btn-primary" style="border-radius:10px">Update</button>
                </div>
            </div>

           
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
              
            </table>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
    <div class="row" id="ad_sensor" style="display:none">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="places-buttons">
              <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                  <h4 class="card-title">
                    Add Fuel Monitoring
                    </h4>
                </div>
              </div>
              <form action="{{route('create')}}" method="POST">
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
                    <button type="submit" class="btn btn-primary" style="border-radius:10px">Create</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row" id="upd_sensor" style="display:none">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="places-buttons">
              <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                  <h4 class="card-title">
                    Update Status
                    </h4>
                </div>
              </div>
              <form action="{{route('status_log')}}" method="POST">
              @csrf 
              <input type="hidden" name="id" value="" />
              <div class="row" align="center">
                <div class="col-md-12">
                    <label>Fuel Monitoring Name:</label>
                    <input type="text" name="name" value="" placeholder="Enter Sensor" />
                </div>
                <div class="col-md-12" name="id" value="">
                    <label>Fuel Monitoring Status:</label>
                    <select name="status">
                        <option value="0" >0</option>
                        <option value="1" selected>1</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" style="border-radius:10px">Update</button>
                </div>
              </div>
              </form>

              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row" id="upd1_sensor" style="display:none">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="places-buttons">
              <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                  <h4 class="card-title">
                    Update Fill Level
                    </h4>
                </div>
              </div>
              <form action="{{route('fillLevel_log')}}" method="POST">
              @csrf 
              <input type="hidden" name="id" value="" />
                <div class="row" align="center">
                  <div class="col-md-12">
                      <label>Fuel Monitoring Name:</label>
                      <input type="text" name="name" value="" placeholder="Enter Sensor" />
                  </div>
                
                
                  <div class="col-md-12">
                      <label>Fuel Monitoring Level:</label>
                      <input type="double" name="fillLevel" value="" placeholder="00.00 %" />
                  </div>

                  <div class="col-md-12">
                      <button type="submit" class="btn btn-primary" style="border-radius:10px">Update</button>
                  </div>
                </div>
              </form>

              
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>

    <script>
    function myFunction() {
  var x = document.getElementById("ad_sensor");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFun() {
  var x = document.getElementById("upd_sensor");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
  var x = document.getElementById("upd1_sensor");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

    
  </script>
@endsection