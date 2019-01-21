@include('includes.head')

@include('includes.nav')
@include('includes.cart')
@include('includes.header')
<body>

  @include('includes.car-logo')
@include('includes.flash')
  @yield('content')
@include('includes.footer')
