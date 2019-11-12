@extends('layouts.app', [
  'namePage' => 'User Details',
  'class' => 'sidebar-mini',
  'activePage' => 'notifications',
])

@section('content')
  <div class="panel-header">
    <div class="header text-center">
      <h2 class="title">Sensor Details</h2>
      </p>
    </div>
  </div>
  
  <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Fuel Monitoring</h4>
            <div class="col-12 mt-2">
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
                  <th>{{ __('Fuel Level') }}</th>
                  <th>{{ __('Voltage') }}</th>
                  <th>{{ __('Current') }}</th>
                  <th>{{ __('Power') }}</th>
                  <th>{{ __('Temperature') }}</th>
                  <th>{{ __('Gen_Status') }}</th>
                  <th>{{ __('Logs') }}</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Door Status') }}</th>
                  <th>{{ __('Fuel Level') }}</th>
                  <th>{{ __('Voltage') }}</th>
                  <th>{{ __('Current') }}</th>
                  <th>{{ __('Power') }}</th>
                  <th>{{ __('Temperature') }}</th>
                  <th>{{ __('Gen_Status') }}</th>
                  <th>{{ __('Logs') }}</th>
                </tr>
              </tfoot>
              
              <tbody>
              @foreach($fms as $f)
              <tr>
                  <td>{{$f->name}}</td>
                  @if($f->status == 1)
                            <td> Door Open </td>
                       @else
                            <td>Door Close</td>
                        @endif
                  <!-- <td>{{$f->status}}</td> -->
                  <td>{{$f->fillLevel}}</td>
                  <td>{{$f->voltage}}</td>
                  <td>{{$f->current}}</td>
                  <td>{{$f->power}}</td>
                  <td>{{$f->temperature}}</td>
                  @if($f->gen_status == 1)
                            <td> Generator On </td>
                       @else
                            <td> Generator Off </td>
                        @endif
                  <td class="MuiTableCell-root SmartBoxesTable-tableCell-1257 MuiTableCell-body">
                    <!-- <a href="{{ route('fms_log') }}/{{$fms['fms_id']}}" class="btn btn-primary btn-round">See Logs</a> -->
                  
                    <form method="POST" action="{{route('fms_log_a')}}">
                    @csrf
                    <input type="hidden" value="{{$f->id}}" name="id">
                        <div class="col-sm-6">
                          <button type="submit" class="btn btn-primary" style="border-radius:10px" id="log"> See Logs </button>
                        </div>       
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            {{ $fms->links() }}
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
@endsection