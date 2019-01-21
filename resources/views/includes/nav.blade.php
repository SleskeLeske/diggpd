
      <a id="menu-toggle" class="btn btn-dark btn-lg toggle">
        <div class="menu-bar">
          <div class="top-bar"></div>
          <div class="mid-bar"></div>
          <div class="bottom-bar"></div>
        </div>
      </a>
      <nav id="sidebar-wrapper">
        <a id="menu-close" class="btn btn-light btn-lg pull-right cross toggle"><i class="fa fa-times" aria-hidden="true"></i></a>
        <div class="sidebar-brand">
          <a href="#topp" class="scroll" onclick=$("#menu-close").click();><img src="{!! asset('img/dpd-logo-white.png') !!}" class="img-responsive" alt="Digg På Døren"></a>
        </div>

        <ul class="sidebar-nav">

          <hr class="nav-hr">

          <li>
            <a href="/" class="scroll" onclick=$("#menu-close").click();>Hovedside</a>
          </li>
          <li>
            <a href="/om-oss" class="scroll" onclick=$("#menu-close").click();>Om oss</a>
          </li>
        <!--  <li>
            <a href="/faq" class="scroll" onclick=$("#menu-close").click();>FAQ</a>
          </li> -->


          <hr class="nav-hr">
        @if (Auth::check())
//hei
              <li>
                <a href="/logout" class="scroll" onclick=$("#menu-close").click();>Logg ut <i class="fa fa-user" aria-hidden="true"></i></a>
              </li>

              <hr class="nav-hr">
              <li>
                <a href="{{route('getCredit')}}" class="scroll" onclick=$("#menu-close").click();>Kjøp kreditter <i class="fa fa-user" aria-hidden="true"></i></a>
              </li>
              @if (Auth::user()->admin == 1)
              <li>
                <a href="/admin" class="scroll" onclick=$("#menu-close").click();>Admin <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </li>
              @endif

              @if (Auth::user()->driver == 1)
              <li>
                <a href="/driver" class="scroll" onclick=$("#menu-close").click();>Sjåfør <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </li>
              @endif
              @if (Auth::user()->confirmed == 0)
              <li>
                <a href="{{route('auth.verify')}}" class="scroll" onclick=$("#menu-close").click();>Bekreft konto</a>
              </li>
              @endif
              <!--@if (Auth::user()->client == 1)
              <li>
                <a href="{{route('client.index')}}" class="scroll" onclick=$("#menu-close").click();>Min restaurant <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </li>
              @endif-->

              <li>
                <a href="{{route('user.order', Auth::user()->id)}}" class="scroll" onclick=$("#menu-close").click();>Mine ordre</a>
              </li>

            @else

              <li>
                <a href="{{route('login')}}" class="scroll" onclick=$("#menu-close").click();>Login <i class="fa fa-user" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="/register" class="scroll" onclick=$("#menu-close").click();>Registrer <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </li>


            @endif


            <hr class="nav-hr">
            <li><a class="scroll" onclick=$("#menu-close").click(); href="{{route('cart.index')}}">Handlevogn<i class="fas fa-shopping-cart"></i>

</a></li>
        </ul>
      </nav>
