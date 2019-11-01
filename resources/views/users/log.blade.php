@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Dashboard',
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
                                <h3 class="mb-0">{{ __('Dashboard') }}</h3>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        

  <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
          <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('sensor') }}">{{ __('Fuel Monitoring Sensor') }}</a>
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
                  <th>{{ __('Logs') }}</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>{{ __('Fuel Monitoring Name') }}</th>
                  <th>{{ __('Door Status') }}</th>
                  <th>{{ __('Fuel Level') }}</th>
                  <th>{{ __('Logs') }}</th>
                </tr>
              </tfoot>
              
              <tbody>
              @foreach($fms as $f)
                <tr>
                  <td>{{$f->name}}</td>
                  <td>{{$f->status}}</td>
                  <td>{{$f->fillLevel}}</td>
                  <td class="MuiTableCell-root SmartBoxesTable-tableCell-1257 MuiTableCell-body">
                    <!-- <a href="{{ route('fms_log') }}/{{$fms['fms_id']}}" class="btn btn-primary btn-round">See Logs</a> -->
                  
                    <form method="POST" action="{{route('fms_log')}}">
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

@push('js')
  
@endpush