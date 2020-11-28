
@include('dashboard.user.confirmAccount');

<!-- Content Header (Page header) --> 
<br>
<br>
<section class="content-header font">
    <h1 class="font" >
        {{ __('profile') }}
    </h1>
    <ol class="breadcrumb font">
        <li><a href="#" onclick="showPage('dashboard/main')" ><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
        <li class="active">{{ __('profile') }}</li>
    </ol>
</section>
  

<section class="content">
    @if (Auth::user()->type == 'student')
    <div class="alert alert-danger" style="direction: rtl" >
        {{ __('researches notes result') }}
    </div>
    <br>
    @endif

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ url('/') }}/image/user.png" alt="User profile picture">

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

              
              <p class="text-muted text-center">{{ __(Auth::user()->type) }}</p>

              @if (Auth::user()->account_confirm == null)
              <center>
                  <br>
                  <button class="btn btn-primary btn-flat" onclick="$('.confirm_account_modal').modal('show')" >{{ __('confirm_account') }}</button>
              </center>
              <br>
              @endif
              <ul class="list-group list-group-unbordered">
                @if (Auth::user()->type == 'student')
                <li class="list-group-item">
                  <b>{{ __('researches') }}</b> <a class="pull-right">{{ number_format(Auth::user()->toStudent()->researchs()->count()) }}</a>
                </li>
                <li class="list-group-item">
                  <b>{{ __('courses') }}</b> <a class="pull-right">{{ number_format(Auth::user()->toStudent()->courses()->count()) }}</a>
                </li>
                @endif 
                @if (Auth::user()->type == 'doctor')
                <li class="list-group-item">
                  <b>{{ __('researches') }}</b> <a class="pull-right">{{ number_format(Auth::user()->toDoctor()->researchs()->count()) }}</a>
                </li>
                <li class="list-group-item">
                  <b>{{ __('courses') }}</b> <a class="pull-right">{{ number_format(Auth::user()->toDoctor()->courses()->count()) }}</a>
                </li>
                @endif 
              </ul>

              <a href="#" class="btn btn-primary btn-block hidden"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
 
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ __('personal info') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> {{ __('name') }}</strong>

              <p class="text-muted">
                {{ Auth::user()->name }}
              </p>

              <hr>

              @if (Auth::user()->type == 'student')
              <strong><i class="fa fa-map-marker margin-r-5"></i> {{ __('code') }}</strong>

              <p class="text-muted">
                {{ Auth::user()->code }}</p>

              <hr>
              
              <strong><i class="fa fa-book margin-r-5"></i> {{ __('level') }}</strong>

              <p class="text-muted">
                {{ optional(Auth::user()->toStudent()->level)->name }}
              </p>

              <hr>
              <strong><i class="fa fa-bank margin-r-5"></i> {{ __('department') }}</strong>

              <p class="text-muted">
                {{ optional(Auth::user()->toStudent()->department)->name }}
              </p>

              <hr>
              @endif 

              <strong><i class="fa fa-book margin-r-5"></i> {{ __('phone') }}</strong>

              <p class="text-muted">
                {{ Auth::user()->phone }}
              </p>

              <hr>


              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="{{ !request()->tab? 'active' : '' }}"><a href="#activity" data-toggle="tab">{{ __('Activities') }}</a></li>
              <li class="{{ request()->tab=='login_history'? 'active' : '' }}" ><a href="#loginHistory" data-toggle="tab">{{ __('login history') }}</a></li> 
              <li><a href="#timeline" data-toggle="tab">{{ __('setting') }}</a></li> 
               
              <li><a href="#password" data-toggle="tab">{{ __('change password') }}</a></li> 
              <li><a href="#phone" data-toggle="tab">{{ __('change phone') }}</a></li>  
            </ul>
            <div class="tab-content">
                
              <div class="active tab-pane" id="activity"> 
                   <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <?php 
                    $currentDate = '';
                  ?>
                  @foreach(Auth::user()->notifications()->orderBy('created_at', 'desc')->get() as $item)
                  
                  @if (date('Y-m-d', strtotime($item->created_at)) != $currentDate)
                  <li class="time-label">
                        <span class="bg-red">
                          {{ date('Y-m-d', strtotime($item->created_at)) }}
                        </span>
                  </li>
                  @endif
                  <!-- timeline item -->
                  <li>
                    <i class="{{ $item->icon }} {{ App\helper\Helper::randColor() }}"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> {{ date('H:i', strtotime($item->created_at)) }}</span>

                      <h3 class="timeline-header"><a href="#">{{ $item->title }}</a></h3>

                      <div class="timeline-body">
                       {{ $item->body }}
                      </div> 
                    </div>
                  </li>
                  
                  
                  <?php 
                    $currentDate = date('Y-m-d', strtotime($item->created_at));
                  ?>  
                  @endforeach
                 
                </ul>
              </div>
              <!-- /.tab-pane -->
               
              <div class="tab-pane" id="timeline">
                <!-- The timeline --> 
                 <form action="{{ url('/') }}/dashboard/profile/update" autocomplete="off" class="form" method="post"  >
                    {{ csrf_field() }} 
                    <div class="form-group has-feedback">
                        <label>{{ __('name') }}</label>
                        <input required="" type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" placeholder="{{ __('name') }}">
                        <span class="fa fa-user form-control-feedback"></span>
                    </div>  
                    @if (Auth::user()->type == 'student')
                    <div class="form-group has-feedback">
                        <label>{{ __('code') }}</label>
                        <input required="" type="text" name="code" class="form-control" value="{{ Auth::user()->code }}" placeholder="{{ __('code') }}">
                        <span class="fa fa-barcode form-control-feedback"></span>
                    </div> 
                    <div class="form-group has-feedback">
                        <label>{{ __('level') }}</label>
                        <input required="" type="text" name="level" class="form-control" value="{{ Auth::user()->level }}" placeholder="{{ __('level') }}">
                        <span class="fa fa-graduation-cap form-control-feedback"></span>
                    </div>  
                    @endif
                
                    <br>
                    <div class="">
                        <!-- /.col -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('submit') }}</button> 
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
              </div>
              <!-- /.tab-pane -->
 
              
              
              <div class="tab-pane" id="loginHistory">
                <!-- The timeline --> 
                <table class="table table-border" id="table" >
                    <thead>
                        <tr>
                            <th>{{ __('datetime') }}</th>
                            <th>{{ __('ip') }}</th>
                            <th>{{ __('device info') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Auth::user()->loginHistories()->orderBy("id", 'ASC')->get() as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->ip }}</td>
                            <td>{!! $item->phone_details !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
              
              <div class="tab-pane" id="password">
                <!-- The timeline --> 
                 <form action="{{ url('/') }}/dashboard/profile/update-password" autocomplete="off" class="form" method="post"  >
                    {{ csrf_field() }}  
                    <div class="form-group has-feedback">
                        <label>{{ __('old password') }}</label>
                        <input required="" type="password" name="old_password" autocomplete="off" value=""  class="form-control" placeholder="{{ __('password') }}">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label>{{ __('new password') }}</label>
                        <input required="" type="password" name="new_password"  value="" autocomplete="off" class="form-control" placeholder="{{ __('confirm password') }}">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label>{{ __('confirm password') }}</label>
                        <input required="" type="password" name="confirm_password"  value="" autocomplete="off" class="form-control" placeholder="{{ __('confirm password') }}">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <br>
                    <div class="">
                        <!-- /.col -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('submit') }}</button> 
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
              </div>
              
              <div class="tab-pane" id="phone">
                <!-- The timeline --> 
                 <form action="{{ url('/') }}/dashboard/profile/update-phone" autocomplete="off" class="form" method="post"  >
                    {{ csrf_field() }}  
                    <div class="form-group has-feedback">
                        <label>{{ __('new phone') }}</label>
                        <input required="" type="text" name="phone" autocomplete="off"  class="form-control" placeholder="{{ __('phone') }}">
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label>{{ __('confirm phone') }}</label>
                        <input required="" type="text" name="confirm_phone" autocomplete="off"  value=""  class="form-control" placeholder="{{ __('confirm phone') }}">
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div> 
                    <br>
                    <div class="">
                        <!-- /.col -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('submit') }}</button> 
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
 
<script>
    formAjax(false, function(r){
        $('.confirm_account_modal').modal('hide');
        showPage('dashboard/profile');
        
    }); 
    
$(document).ready(function() {
     $('#table').DataTable({ 
         "pageLength": 10,
         
     });
      
        
}); 
</script>
 