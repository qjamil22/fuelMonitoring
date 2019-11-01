@extends('layouts.app', [
  'namePage' => 'Notifications',
  'class' => 'sidebar-mini',
  'activePage' => 'notifications',
])

@section('content')
  <div class="panel-header">
    <div class="header text-center">
      <h2 class="title">Notifications</h2>
      <p class="category">Handcrafted by our friend
        <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. Please checkout the
        <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a>
      </p>
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
                    Notifications Places
                    <p class="category">Click to view notifications</p>
                  </h4>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8 ml-auto mr-auto">
                  <div class="row">
                    <div class="col-md-4">
                      <button class="btn btn-primary btn-block" onclick="nowuiDashboard.showNotification('top','left')">Top Left</button>
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-primary btn-block" onclick="nowuiDashboard.showNotification('top','center')">Top Center</button>
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-primary btn-block" onclick="nowuiDashboard.showNotification('top','right')">Top Right</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8 ml-auto mr-auto">
                  <div class="row">
                    <div class="col-md-4">
                      <button class="btn btn-primary btn-block" onclick="nowuiDashboard.showNotification('bottom','left')">Bottom Left</button>
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-primary btn-block" onclick="nowuiDashboard.showNotification('bottom','center')">Bottom Center</button>
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-primary btn-block" onclick="nowuiDashboard.showNotification('bottom','right','uiowebh34uio')">Bottom Right</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection