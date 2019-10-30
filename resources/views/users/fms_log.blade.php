@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'fms_log',
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
                                <h3 class="mb-0">{{ __('Fuel Monitoring Logs') }}</h3>
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
      <div class="col-md-6">
        <div class="card">
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
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->

      <div class="col-md-6">
        <div class="card">
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
                  <th>{{ __('T0') }}</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Fuel Level') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('T0') }}</th>
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
    </div>


    

  
@endsection

@push('js')
  <script>
    // $(document).ready(function() {
    //   // Javascript method's body can be found in assets/js/demos.js
    //   demo.initDashboardPageCharts();

    // });

    function myFunction() {
  var x = document.getElementById("door_log");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFun() {
  var x = document.getElementById("fuel_log");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

    </script>
@endpush