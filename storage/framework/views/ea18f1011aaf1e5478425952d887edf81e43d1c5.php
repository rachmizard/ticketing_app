<!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <?php if(Auth::user()->role == 1): ?>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard <span class="label label-rouded label-primary pull-right">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/">Home </a></li>
                                <li><a href="home">Menu Dashboard </a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Admin Control</li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Customer</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/admin/customer">Check Customer</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-shopping-cart"></i><span class="hide-menu">Reservasi</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/admin/reservation">Data Reservasi</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-map-marker"></i><span class="hide-menu">Rute Travel</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="rute">Data Rute</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-plane"></i><span class="hide-menu">Transportasi</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/admin/transportation">Data Transportasi</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <?php endif; ?>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
