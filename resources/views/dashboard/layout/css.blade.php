
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<!-- website title -->
<title>{{ optional(App\Setting::find(5))->value }}</title>

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ url('/') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">

<!-- Material Design
<link rel="stylesheet" href="{{ url('/') }}/css/materialize.min.css">
-->

<link rel="stylesheet" href="{{ url('/') }}/bower_components/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
<!-- Material Design
<link rel="stylesheet" href="{{ url('/') }}/dist/css/bootstrap-material-design.min.css">
<link rel="stylesheet" href="{{ url('/') }}/dist/css/ripples.min.css">
-->

<link rel="stylesheet" href="{{ url('/') }}/dist/css/MaterialAdminLTE.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{ url('/') }}/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="{{ url('/') }}/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="{{ url('/') }}/bower_components/select2/dist/css/select2.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ url('/') }}/dist/css/AdminLTE_ar.css">

<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ url('/') }}/dist/css/skins/_all-skins.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('/') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{ url('/') }}/plugins/timepicker/bootstrap-timepicker.min.css">

<!-- my style -->
<link rel="stylesheet" href="{{ url('/') }}/css/w3.css">
<link rel="stylesheet" href="{{ url('/') }}/css/iziToast.css">
<link rel="stylesheet" href="{{ url('/') }}/css/app.css">
<link rel="stylesheet" href="{{ url('/') }}/css/owl.carousel.min.css">
<link rel="stylesheet" href="{{ url('/') }}/css/owl.theme.default.min.css">
<link rel="stylesheet" href="{{ url('/') }}/css/bootstrap-switch.css">

<!-- print library -->
<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">

<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Text+Me+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

<!-- jQuery 3 -->
<script src="{{ url('/') }}/js/jquery-3.2.1.min.js"></script>


<link rel="shortcut icon" href="{{ url('/') }}/image/logo.jpg" type="image/x-icon">

<!-- commen style -->
<style>
    *, .font, h1, h2, h3, h4, h5, h6 {
        font-family: 'Cairo', sans-serif;
    }

    body, html {
        overflow: auto!important;
    }
    body {
        background-image: url('{{ url("/image")  }}/background-main.webp')!important;
        background-size: cover!important;
        background-repeat: no-repeat!important;
    }

    .modal, .table {
        direction: rtl;
    }



    .treeview-menu {
        padding-right: 35px!important;
    }

    select {
        padding: 0px!important;
        padding-left: 10px!important;
        padding-right: 10px!important;
    }

    .select2 {
        width: 100%!important;
    }

    .dt-button {
        display: inline-block!important;
        padding: 6px 12px!important;
        margin-bottom: 0!important;
        font-size: 14px!important;
        font-weight: 400!important;
        line-height: 1.42857143!important;
        text-align: center!important;
        white-space: nowrap!important;
        vertical-align: middle!important;
        -ms-touch-action: manipulation!important;
        touch-action: manipulation!important;
        cursor: pointer!important;
        -webkit-user-select: none!important;
        -moz-user-select: none!important;
        -ms-user-select: none!important;
        user-select: none!important;
        background-image: none!important;
        border: 1px solid transparent!important;
        border-radius: 4px!important;
        color: #333!important;
        background-color: #fff!important;
        border-color: #ccc!important;
    }

    th, td, label, table {
        text-align: right;
    }

    .content-wrapper {
        margin: 0px!important;
        background: rgba(0,0,0,0.5)!important;
    }
</style>

<!-- commen script -->
<script>
var public_path = '{{ url("/") }}';
</script>

<script>
    // url of the public path
    var url = '{{ url("/") }}';
    // max uploaded file size
    var MAX_UPLOADED_FILE = 5; // 5 MB

    // max uploaded image size
    var MAX_UPLOADED_IMAGE = 3; // 3 MB

    var ERROR_UPLOAD_FILE_MESSAGE = '{{ __("can not upload file more than 3 mb") }}';

    var TITLE = "{{ __('new notfications') }}";
    var BODY = "{{ __('you have {n} notifications') }}";
</script>
