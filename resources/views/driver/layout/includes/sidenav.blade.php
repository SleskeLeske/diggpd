{{-- Side Navigation --}}
{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Bestillinger
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{url('driver/orders/pending')}}">Ventende bestillinger</a></li>
                    <li><a href="{{url('driver/orders/delivered')}}">Leverte bestillinger</a></li>
                    <li><a href="{{url('driver/orders')}}">Alle bestillinger</a></li>
                  </ul>
                  </li>
          </ul>
    </div>
</div> <!-- ADMIN SIDE NAV-->
