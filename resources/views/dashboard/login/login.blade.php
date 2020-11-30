<!doctype html>
<html lang="">
    <head>
        <!-- load css files -->
        {!! view("dashboard.layout.css") !!}

        <style>
            body, html {
                overflow: auto!important;
            }
            body {
                background-image: url('{{ url("/image/login2.jpg")  }}')!important;
                background-size: cover!important;
                background-repeat: no-repeat!important;
            }

            .auth-container {
                display: none;
            }

            .doctor-container {
                display: block;
            }

        </style>
    </head>
    <body class="hold-transition login-page w3-light-gray" style="overflow: auto!important">

        <div id="root" style="overflow: auto!important" >

            <!-- Content Wrapper. Contains page content -->
            <div class="login-box w3-animate-top " style="margin-top: 30px" >
                <div class="login- text-center">
                    <img src="{{ url('/image/logo.jpg') }}" class="w3-center w3-round"  width="90px" > 
                    <br>
                    <a href="#"  class="w3-text-white w3-large" style="text-shadow: 2px 2px black;"  ><b>المعهد العالى للسياحة و الفنادق و الحاسب الآلى السيوف - الإسكندرية</b></a>
                </div>
                <!-- /.login-logo -->
                <div class="login-box-body w3-card">
                    <p class="login-box-msg">{{ __('login to your dashboard control') }}</p> 
                    <p  class="login-box-msg w3-text-red">{{ __('note: you must enter the number in english (phone, sms_code, password, code)') }}</p>
                    <center>
                        <div class="btn-group" role="group" aria-label="...">
                             <button type="button" class="btn btn-default" onclick="$('.auth-container, .auth-card').slideUp(500);$('.doctor-container, .doctor-login-card').slideDown(500)" >{{ __('doctor') }}</button>
                            <button type="button" class="btn btn-default" onclick="$('.auth-container, .auth-card').slideUp(500);$('.admin-container, .admin-login-card').slideDown(500)" >{{ __('admin') }}</button>
                        </div>
                    </center> 
                    @include('dashboard.login.doctor')

                    @include('dashboard.login.admin')

                    @include('dashboard.login.complain')
                    <br>
                    <p class="login-box-msg">
                        <a href="#" class="w3-large w3-text-red text-capitalize" onclick="$('.auth-container').slideUp(500);$('.complain-container').slideDown(500)">
                            <i class="fa fa-frown-o" style="padding: 5px" ></i>
                            {{ __('i have a complaint') }}
                        </a>
                    </p>



                </div>
                <!-- /.login-box-body -->
            </div>
            

        </div>

        <!-- load js files -->
        {!! view("dashboard.layout.js") !!}

        <!-- message scripts -->
        {!! view("dashboard.layout.msg") !!}
    </body>
</html>


