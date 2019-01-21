<!DOCTYPE html>
<html>
<head>
    <title>Admin Area</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" media="screen" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
        <link href="{!! asset('css/app.css') !!}" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

@include('admin.layout.includes.header')
<div class="page-content">
        @if(Session::has('message'))
            <div class="alert alert-info">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    <div class="row">
        @include('admin.layout.includes.sidenav')
        <div class="col-md-10 display-area">
            <div class="row text-center">
                <div class="col-md-10 col-md-offset-1">
                    <div class="content-box-large">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div><!--/Display area after sidenav-->
    </div>

</div><!--/Page Content-->


<script src="{{asset('js/parsley.min.js')}}"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $(".submenu > a").click(function (e) {
            e.preventDefault();
            var $li = $(this).parent("li");
            var $ul = $(this).next("ul");
            if ($li.hasClass("open")) {
                $ul.slideUp(350);
                $li.removeClass("open");
            } else {
                $(".nav > li > ul").slideUp(350);
                $(".nav > li").removeClass("open");
                $ul.slideDown(350);
                $li.addClass("open");
            }
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.js"></script>
@yield('js')
</body>
</html>
