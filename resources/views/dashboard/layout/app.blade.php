
<?php $startLoadTime = time(); ?>
<!-- Content Header (Page header) -->

<br>
<br>
<section class="content-header font">
    <h1 class="font" >
        @yield("title")
    </h1>
    <ol class="breadcrumb font">
        <li><a href="#" onclick="showPage('dashboard/main')" ><i class="fa fa-dashboard"></i> لوحة التحكم</a></li>
        <li class="active">@yield("title")</li>
    </ol>
</section>

<!-- Add button -->
<div class="w3-display-bottom{{ Lang::getLang() == 'ar'? 'left' : 'right' }} w3-padding floatbtn-place hidden" >
    <button class="btn w3-blue shadow btn-float w3-animate-zoom modal-trigger"
            data-toggle="modal"
            data-target="#addModal" >
        <i class="fa fa-plus"></i>
    </button>
</div>

<!-- Main content -->
<section class="content" style="direction: rtl">
    <div class="w3-white round shadow w3-animate-opacity w3-padding table-responsive">
    <div class="w3-block w3-border-bottom w3-border-gray w3-padding" >
        <button  class="btn btn-primary btn-flat w3-animate-zoom modal-trigger app-add-button"
            data-toggle="modal"
            data-target="#addModal" >{{ __('add') }}</button>
        
        @yield("headers")
    </div>
        <br>
        @yield("content")
    </div>
    <!-- /.row -->
    
            <div class="footer w3-padding w3-orange w3-block hidden" >
                <br>
                <center class="w3- font" >
                   <a href="http://www.sphinxat.com" target="_blank" class="" >
                     جميع الحقوق محفوظه لدى شركة سفنكس للتكنولوجى المتقدمه 01000122247
                    </a>
                </center>
            </div>
</section>
<!-- /.content -->


@yield("additional")


@yield("js")

<script>
    console.log('document loatded in {{ (time() - $startLoadTime) . " S" }}');
    $(document).ready(function () {
        $('select').each(function(r){
            
            if ($(this).attr('select2') != 'off')
                $(this).select2();
            
        });
        

    });

    // load float button sound
    $(".btn-float").mouseup(function () {
        playSound("click4");
    });
</script>
