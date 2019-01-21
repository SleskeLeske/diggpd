{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->

            <!-- ADMIN VERSION -->

            @if(Auth::check() && Auth::user()->admin == 1)
            <li class="current"><a href="{{route('admin.index')}}"><i class="glyphicon glyphicon-home"></i>
                    Dashboard</a></li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Produkter
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('product.index')}}">Alle produkter</a></li>
                    <li><a href="{{route('product.create')}}">Legg til produkt</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Kategorier
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{route('category.index')}}">Legg til kategori</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Bestillinger
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{url('admin/orders/pending-quick')}}">Ventende hurtig-bestillinger</a></li>
                    <li><a href="{{url('admin/orders/delivered-quick')}}">Leverte hurtig-bestillinger</a></li>
                    <li><a href="{{url('admin/orders/pending-day')}}">Ventende dags-bestillinger</a></li>
                    <li><a href="{{url('admin/orders/delivered-day')}}">Leverte dags-bestillinger</a></li>
                    <li><a href="{{url('admin/orders')}}">Alle bestillinger</a></li>
                  </ul>
                  </li>
                  <li class="submenu">
                      <a href="#">
                          <i class="glyphicon glyphicon-list"></i> Brukere
                          <span class="caret pull-right"></span>
                      </a>
                      <!-- Sub menu -->
                      <ul>
                          <li><a href="{{url('admin/users')}}">Alle brukere</a></li>
                          <li><a href="{{route('admin.user.create')}}">Legg til bruker/klient</a></li>
                        </ul>
                        </li>
                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-list"></i> Topp-bildet
                                <span class="caret pull-right"></span>
                            </a>
                            <!-- Sub menu -->
                            <ul>
                                <li><a href="#">Legg til/rediger toppbildet</a></li>
                              </ul>
                              </li>
                              <li class="submenu">
                                  <a href="#">
                                      <i class="glyphicon glyphicon-list"></i> Admin
                                      <span class="caret pull-right"></span>
                                  </a>
                                  <!-- Sub menu -->
                                  <ul>
                                      <li><a href="{{route('admin.password')}}">Rediger passord</a></li>
                                      <li><a href="{{route('admin.website-status')}}">Nettside status</a></li>
                                    </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="#">
                                            <i class="glyphicon glyphicon-list"></i> Postnumre
                                            <span class="caret pull-right"></span>
                                        </a>
                                        <!-- Sub menu -->
                                        <ul>
                                            <li><a href="{{route('postnr.index')}}">Alle postnumre</a></li>
                                          </ul>
                                          </li>

                     @endif

                      <!-- CLIENT VERSION -->
                     @if(Auth::check() && Auth::user()->client == 1)
                    <li class="current"><a href="{{route('client.index')}}"><i class="glyphicon glyphicon-home"></i>
                            Dashboard</a></li>
                    <li class="submenu">
                        <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Produkter
                            <span class="caret pull-right"></span>
                        </a>
                        <!-- Sub menu -->
                        <ul>
                            <li><a href="{{route('product.index')}}">Alle produkter</a></li>
                            <li><a href="{{route('product.create')}}">Legg til produkt</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Bestillinger
                            <span class="caret pull-right"></span>
                        </a>
                        <!-- Sub menu -->
                        <ul>
                            <li><a href="{{url('client/orders/pending')}}">Ventende bestillinger</a></li>
                            <li><a href="{{url('client/orders/delivered')}}">Leverte bestillinger</a></li>
                            <li><a href="{{url('client/orders')}}">Alle bestillinger</a></li>
                          </ul>
                          </li>
                        <li class="submenu">
                            <a href="#">
                                <i class="glyphicon glyphicon-list"></i> Topp-bildet
                                  <span class="caret pull-right"></span>
                              </a>
                                <!-- Sub menu -->
                            <ul>
                              <li><a href="{{route('client.getHeaderImg')}}">Legg til/rediger toppbildet</a></li>
                        </ul>
                        </li>
          @endif
    </div>
</div> <!-- ADMIN SIDE NAV-->
