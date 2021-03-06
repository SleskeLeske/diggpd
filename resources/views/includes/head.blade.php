<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no,maximum-scale=1">
    <title>@yield('title')</title>

    <!-- Css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{!! asset('vendor/owlcarousel/dist/assets/owl.carousel.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('vendor/owlcarousel/dist/assets/owl.theme.default.min.css') !!}">


    <link href="{!! asset('css/ionicons.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    @yield('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="{!! asset('css/app.css') !!}" media="all" rel="stylesheet" type="text/css" />
  </head>
