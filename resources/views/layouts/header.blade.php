<!DOCTYPE html>
<html lang="en">

<head>
    {{--  META SECTION  --}}
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    {{--  END META SECTION  --}}

    <link rel="shortcut icon" type="image/x-icon" href="{{ env('APP_URL') }}/resources/img/favicon.ico">
    <title>Dootell</title>


    {{--  CSS INCLUDE  --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/resources/sass/theme.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/resources/sass/custom.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/resources/sass/jquery-ui.css') }}">

    {{--  EOF CSS INCLUDE  --}}
    <link rel="stylesheet" href="{{ URL::asset('/resources/sass/style1.css') }}">



    {{--  datatable CSS  --}}
    <link rel="stylesheet" href="{{ URL::asset('resources/datatable/css/jquery.dataTables.css') }}">
    {{--  tost msg  --}}
    <link href="{{ URL::asset('/resources/toastr/toastr.min.css') }}" rel="stylesheet">
    {{--  Sweetalert  --}}
    <link href="{{ URL::asset('/resources/sweetalert/sweetalert.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css">

    <link rel="stylesheet" href="{{ URL::asset('/resources/sass/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/resources/sass/bootstrap-datetimepicker.css') }}">

    {{--  <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />  --}}
    <link rel="stylesheet" href="{{ URL::asset('/resources/sass/multi_select/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/resources/sass/multi_select/multiselect.css') }}">
    <!-- toggle button -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/resources/sass/bootstrap-toggle.min.css') }}" />

</head>
