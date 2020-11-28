
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="font w3-xxlarge" >
        {{ __('dashboard') }} 
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">{{ __('dashboard') }}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content" style="overflow: auto!important" > 
    
    <div class="text-center container-fluid" >
        
        <a class="col-lg-4 col-md-3 col-sm-12  col-xs-12" style="cursor: pointer" target="_blank" href="{{ Auth::user()->online_exam }}" >
            <div class="w3-white w3-round shadow w3-padding text-center" >
                <img src="{{ url('/image/online_exam.svg') }}" style="max-width: 150px" >
                <br>
                <br>
                <span class="w3-xlarge" >نظام ادارة الامتحانات عن بعد</span>
            </div>
        </a>
        
        <a class="col-lg-4 col-md-3 col-sm-12  col-xs-12" style="cursor: pointer" target="_blank" href="{{ Auth::user()->online_lms }}" >
            <div class="w3-white w3-round shadow w3-padding text-center" >
                <img src="{{ url('/image/online_lms.svg') }}" style="max-width: 150px" >
                <br>
                <br>
                <span class="w3-xlarge"  >نظام ادارة المحتوى التعليمى</span>
            </div>
        </a>
        
        <a class="col-lg-4 col-md-3 col-sm-12  col-xs-12" style="cursor: pointer" target="_blank" href="{{ Auth::user()->online_research }}" >
            <div class="w3-white w3-round shadow w3-padding text-center" >
                <img src="{{ url('/image/online_research.svg') }}" style="max-width: 150px" >
                <br>
                <br>
                <span class="w3-xlarge"  >نظام ادارة مشروعات وابحاث الطلاب</span>
            </div>
        </a>
        
    </div>
     

</section> 