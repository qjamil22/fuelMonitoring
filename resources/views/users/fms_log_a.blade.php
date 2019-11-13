@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'fms_log',
    'activePage' => 'user',
    'activeNav' => 'sidebar_u',
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
                                <h3 class="mb-0">{{ __('Fuel Monitoring Logs') }}</h3>
                            </div>

                            <div class="col-4 text-right">
                                <a href="{{ route('log_a') }}" class="btn btn-primary btn-round">{{ __('Back') }}</a>
                            </div>

    
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="row">
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
              <table id="curr" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>{{ __('Fuel Monitoring Name') }}</th>
                    <th>{{ __('Current Door Status') }}</th>
                    <th>{{ __('Current Fuel Level') }}</th>
                    <th>{{ __('Voltage') }}</th>
                    <th>{{ __('Current') }}</th>
                    <th>{{ __('Power') }}</th>
                    <th>{{ __('Temperature') }}</th>
                    <th>{{ __('Gen_Status') }}</th>
                  </tr>
                </thead>

                <tfoot>
                  <tr>
                    <th>{{ __('Fuel Monitoring Name') }}</th>
                    <th>{{ __('Current Door Status') }}</th>
                    <th>{{ __('Current Fuel Level') }}</th>
                    <th>{{ __('Voltage') }}</th>
                    <th>{{ __('Current') }}</th>
                    <th>{{ __('Power') }}</th>
                    <th>{{ __('Temperature') }}</th>
                    <th>{{ __('Gen_Status') }}</th>
                  </tr>
                </tfoot>
              
                <tbody>
                  <tr>
                    <td>{{$fms->name}}</td>
                    @if($fms->status == 1)
                            <td> Door Open </td>
                       @else
                            <td>Door Close</td>
                        @endif
                    <!-- <td>{{$fms->status}}</td> -->
                    <td>{{$fms->fillLevel}}</td>
                    <td>{{$fms->voltage}}</td>
                  <td>{{$fms->current}}</td>
                  <td>{{$fms->power}}</td>
                  <td>{{$fms->temperature}}</td>
                  @if($fms->genStatus == 1)
                            <td> Generator On </td>
                       @else
                            <td>Generator Off</td>
                        @endif
                  </tr>
                </tbody>
              </table>
          </div>
          <!-- end content-->
        </div>

        <div class="panel-header panel-header-lg">
        <canvas id="temperatureChart"></canvas>
      </div>

      <div class="row">
        <div class="col-md-6">
        <div class="card card-chart">
            <div class="card-header">
              <h4 class="card-title">Generator</h4>
            </div>
          <div class="panel-header panel-header-lg">
            <canvas id="genChart"></canvas>
          </div>
          </div>
        </div>

        <div class="col-md-6">
        <div class="card card-chart">
            <div class="card-header">
              <h4 class="card-title">Door Open</h4>
            </div>
        <div class="panel-header panel-header-lg">
        <canvas id="doorChart"></canvas>
      </div>
      </div>
        </div>
      </div>

    <div class="row">
      <div class="col-md-2">
        
            <div class="row">
                <div class="col-md-12" align="center">
                    <button onclick="myFunction()" class="btn btn-primary" style="border-radius:10px">Door Status Log</button>
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
        
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->

      

      <div class="col-md-2">
        
            <div class="row">
                <div class="col-md-12" align="center">
                    <button onclick="myFun()" class="btn btn-primary" style="border-radius:10px">Fuel FillLevel Log</button>
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

        <div class="col-md-1.71">
        
            <div class="row">
                <div class="col-md-12" align="center">
                    <button onclick="myFun1()" class="btn btn-primary" style="border-radius:10px">Voltage Log</button>
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
        
        <!--  end card  -->
      </div>

      <div class="col-md-2">
        
            <div class="row">
                <div class="col-md-12" align="center">
                    <button onclick="myFun2()" class="btn btn-primary" style="border-radius:10px">Current Log</button>
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
        
        <!--  end card  -->
      </div>

      <div class="col-md-1.71">
        
            <div class="row">
                <div class="col-md-12" align="center">
                    <button onclick="myFun3()" class="btn btn-primary" style="border-radius:10px">Power Log</button>
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
        
        <!--  end card  -->
      </div>

      <div class="col-md-2">
        
            <div class="row">
                <div class="col-md-12" align="center">
                    <button onclick="myFun4()" class="btn btn-primary" style="border-radius:10px">Temperature Log</button>
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
        
        <!--  end card  -->
      </div>

      <div class="col-md-1.71">
        
            <div class="row">
                <div class="col-md-12" align="center">
                    <button onclick="myFun5()" class="btn btn-primary" style="border-radius:10px">Generator Status Log</button>
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
        
        <!--  end card  -->
      </div>
      
    </div>

    


    <div class="row" id="door_log" style="display:none">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="places-buttons">
              <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                  <h4 class="card-title">
                    Door Status Log
                    </h4>
                </div>
              </div>
              <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Door Status') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('T0') }}</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Door Status') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('T0') }}</th>
                </tr>
              </tfoot>
              
              <tbody>
             <!-- Wrtie Something -->
                @foreach($status_logs as $sl)
                    <tr align="center">
                        <td> {{$fms->name}} </td>
                        @if($sl->status == 1)
                            <td> Door Open </td>
                       @else
                            <td>Door Close</td>
                        @endif
                        <td> {{$sl->created_at}}</td>
                        <td> {{$sl->updated_at}}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
            </div>
          </div>
        </div>
      </div>
      <!-- start chart -->

    <div class="content">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          
            
            <div class="card-body">
              <!-- <div class="chart-area">
                <canvas id="barChartSimpleGradientsNumbers"></canvas>
              </div> -->
              <div class="panel-header panel-header-lg" style="display:none">
        <canvas id="doorChart"></canvas>
      </div>
            
          </div>
        </div>



      <div class="col-lg-4" style="display:none">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">Global Sales</h5>
            <h4 class="card-title">Shipped Products</h4>
            <div class="dropdown">
              <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                <i class="now-ui-icons loader_gear"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <a class="dropdown-item text-danger" href="#">Remove Data</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="lineChartExample"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
            </div>
          </div>
        </div>
      </div>

      
      <div class="col-lg-4 col-md-6" style="display:none">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">2018 Sales</h5>
            <h4 class="card-title">All products</h4>
            <div class="dropdown">
              <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                <i class="now-ui-icons loader_gear"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <a class="dropdown-item text-danger" href="#">Remove Data</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
  </div>

      <!-- end chart -->
    </div>

    <div class="row" id="fuel_log" style="display:none">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="places-buttons">
              <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                  <h4 class="card-title">
                    Fuel FillLevel Log
                    </h4>
                </div>
              </div>
              <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Fuel Level') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Fuel Level') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                </tr>
              </tfoot>
                
              <tbody>
             <!-- Write Something -->
                  @foreach($fill_level_logs as $fl)
                    <tr align="center">
                        <td> {{$fms->name}} </td>
                        @if($fl->fillLevel >= 90)
                            <td> Full ({{$fl->fillLevel}}) </td>
                        @else
                            <td>({{$fl->fillLevel}})</td>
                        @endif
                        <td> {{$fl->created_at}}</td>
                        <td> {{$fl->updated_at}}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Line Chart -->
      <div class="panel-header panel-header-lg" style="display:none">
        <canvas id="fillLevelChart"></canvas>
      </div>
      
  <!-- end chart -->
    </div>

    <div class="row" id="voltage_log" style="display:none">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="places-buttons">
              <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                  <h4 class="card-title">
                    Voltage Log
                    </h4>
                </div>
              </div>
              <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Voltage') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Voltage') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                </tr>
              </tfoot>
                
              <tbody>
             <!-- Write Something -->
                  @foreach($voltage_logs as $vl)
                    <tr align="center">
                        <td> {{$fms->name}} </td>
                        <td> {{$vl->voltage}} </td>
                        <td> {{$vl->created_at}}</td>
                        <td> {{$vl->updated_at}}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Line Chart -->
      <div class="panel-header panel-header-lg"  style="display:none">
        <canvas id="voltageChart"></canvas>
      </div>
      
  <!-- end chart -->
    </div>

    <div class="row" id="current_log" style="display:none">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="places-buttons">
              <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                  <h4 class="card-title">
                    Current Log
                    </h4>
                </div>
              </div>
              <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Current') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Current') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                </tr>
              </tfoot>
                
              <tbody>
             <!-- Write Something -->
                  @foreach($current_logs as $cl)
                    <tr align="center">
                        <td> {{$fms->name}} </td>
                        <td> {{$cl->current}} </td>
                        <td> {{$cl->created_at}}</td>
                        <td> {{$cl->updated_at}}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Line Chart -->
      <div class="panel-header panel-header-lg"  style="display:none">
        <canvas id="currentChart"></canvas>
      </div>
      
  <!-- end chart -->
    </div>

    <div class="row" id="power_log" style="display:none">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="places-buttons">
              <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                  <h4 class="card-title">
                    Power Log
                    </h4>
                </div>
              </div>
              <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Power') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Power') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                </tr>
              </tfoot>
                
              <tbody>
             <!-- Write Something -->
                  @foreach($power_logs as $pl)
                    <tr align="center">
                        <td> {{$fms->name}} </td>
                        <td> {{$pl->Power}} </td>
                        <td> {{$pl->created_at}}</td>
                        <td> {{$pl->updated_at}}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Line Chart -->
      <div class="panel-header panel-header-lg" style="display:none">
        <canvas id="powerChart"></canvas>
      </div>
      
  <!-- end chart -->
    </div>

    <div class="row" id="temperature_log" style="display:none">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="places-buttons">
              <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                  <h4 class="card-title">
                    Temperature Log
                    </h4>
                </div>
              </div>
              <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Temperature') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Temperature') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                </tr>
              </tfoot>
                
              <tbody>
             <!-- Write Something -->
                  @foreach($temperature_logs as $tl)
                    <tr align="center">
                        <td> {{$fms->name}} </td>
                        <td> {{$tl->temperature}} </td>
                        <td> {{$tl->created_at}}</td>
                        <td> {{$tl->updated_at}}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Line Chart -->
      <div class="panel-header panel-header-lg" style="display:none">
        <canvas id="temperatureChart"></canvas>
      </div>
      
  <!-- end chart -->
    </div>

    <div class="row" id="generator_log" style="display:none">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="places-buttons">
              <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                  <h4 class="card-title">
                    Generater Log
                    </h4>
                </div>
              </div>
              <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Genrater Status') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Genrater Status') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                </tr>
              </tfoot>
                
              <tbody>
             <!-- Write Something -->
                  @foreach($gen_status_logs as $gl)
                    <tr align="center">
                        <td> {{$fms->name}} </td>
                        @if($gl->gen_status == 1)
                            <td> Generator On </td>
                        @else
                            <td> Generator Off</td>
                        @endif
                        <td> {{$gl->created_at}}</td>
                        <td> {{$gl->updated_at}}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Line Chart -->
      <div class="panel-header panel-header-lg" style="display:none">
        <canvas id="genChart"></canvas>
      </div>
      
  <!-- end chart -->
    </div>

   
    
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

            var pusher = new Pusher('cb63405c99491817179a', {
              cluster: 'ap1',
              forceTLS: true
            });

            var channel = pusher.subscribe('{{$user->id}}-channel');
            channel.bind('notification', function(data) {
                
              color = 'primary';

                  $.notify({
                      icon: "now-ui-icons ui-1_bell-53",
                      message: data
                  }, {
                      type: color,
                      timer: 8000,
                      placement: {
                          from: 'bottom',
                          align: 'right'
                      }
                  });
            });

            channel.bind('update-fillLevel', function(data) {
              //alert(JSON.stringify(data));
            });

            channel.bind('update-status', function(data) {
             //alert(JSON.stringify(data));
            });
            
    </script>
    

@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts({!! json_encode($avgFillLevel) !!}, {!! json_encode($dateLabels) !!} , {!! json_encode($statusCount) !!},{!! json_encode($avgVoltage) !!}, {!! json_encode($avgCurrent) !!}, {!! json_encode($avgPower) !!},{!! json_encode($avgTemperature) !!},{!! json_encode($avgGenStatus) !!}, );


    });

    function myFunction() {
  var x = document.getElementById("door_log");
  // demo.initDashboardPageCharts( {!! json_encode($dateLabels) !!} , {!! json_encode($statusCount) !!} );
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFun() {
  var x = document.getElementById("fuel_log");
  //demo.initDashboardPageCharts({!! json_encode($avgFillLevel) !!}, {!! json_encode($dateLabels) !!});
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFun1() {
  var x = document.getElementById("voltage_log");
  //demo.initDashboardPageCharts({!! json_encode($avgVoltage) !!}, {!! json_encode($dateLabels) !!});
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFun2() {
  var x = document.getElementById("current_log");
 // demo.initDashboardPageCharts({!! json_encode($avgCurrent) !!}, {!! json_encode($dateLabels) !!});
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFun3() {
  var x = document.getElementById("power_log");
 // demo.initDashboardPageCharts({!! json_encode($avgPower) !!}, {!! json_encode($dateLabels) !!});
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFun4() {
  var x = document.getElementById("temperature_log");
 // demo.initDashboardPageCharts({!! json_encode($avgTemperature) !!}, {!! json_encode($dateLabels) !!});
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFun5() {
  var x = document.getElementById("generator_log");
//  demo.initDashboardPageCharts({!! json_encode($avgGenStatus) !!}, {!! json_encode($dateLabels) !!});
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
    </script>
@endpush