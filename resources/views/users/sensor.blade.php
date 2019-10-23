@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Create sensor',
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
                                <h3 class="mb-0">{{ __('Add New Sensor') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('home') }}" class="btn btn-primary btn-round">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection