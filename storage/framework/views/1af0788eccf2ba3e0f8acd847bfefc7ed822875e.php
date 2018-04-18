              <?php if(Auth::user()->role == 1): ?>
                <!-- nav for an admin-->
                <nav class="nav-primary hidden-xs">
                  <ul class="nav">
                    <li >
                      <a href="/admin/home"  >
                        <i class="fa fa-dashboard icon">
                          <b class="bg-danger"></b>
                        </i>
                        <span>Home</span>
                      </a>
                    </li>
                    <li  class="active">
                      <a href="#layout"   class="active">
                        <i class="fa fa-columns icon">
                          <b class="bg-warning"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Admin Control</span>
                      </a>
                      <ul class="nav lt">
                        <li  class="active">
                          <a href="#"  class="active">                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Add Account</span>
                          </a>
                        </li>
                        <li >
                          <a href="#" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Data Account</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li >
                      <a href="#uikit"  >
                        <i class="fa fa-shopping-cart icon">
                          <b class="bg-success"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Reservasi</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="reservation" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Tambah Reservasi</span>
                          </a>
                        </li>
                        <li >
                          <a href="reservation" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Data Reservasi</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li >
                      <a href="rute"  >
                        <b class="badge bg-danger pull-right">3</b>
                        <i class="fa fa-map-marker icon">
                          <b class="bg-primary dker"></b>
                        </i>
                        <span>Rute Travel</span>
                      </a>
                    </li>
                    <li >
                      <a href="customer"  >
                        <i class="fa fa-user icon">
                          <b class="bg-info"></b>
                        </i>
                        <span>Customer</span>
                      </a>
                    </li>
                    <li >
                      <a href="#"  >
                        <i class="fa fa-plane icon">
                          <b class="bg-info"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>Transportasi</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="transportation" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Data Transportasi</span>
                          </a>
                        </li>
                        <li >
                          <a href="type-transportation" >                                                        
                            <i class="fa fa-angle-right"></i>
                            <span>Type Transportasi</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </nav>
                <!-- / nav -->
                <?php else: ?>
                <!-- nav for an user-->
                <nav class="nav-primary hidden-xs">
                  <ul class="nav">
                    <li >
                      <a href="/user/home"  >
                        <i class="fa fa-dashboard icon">
                          <b class="bg-danger"></b>
                        </i>
                        <span>Home</span>
                      </a>
                    </li>
                  </ul>
                </nav>
                <!-- / nav for user -->
              <?php endif; ?>
