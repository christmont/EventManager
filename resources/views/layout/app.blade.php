<!DOCTYPE html>
<html>
@include('layout.head');
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"> <span>Event Management System</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="logo.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              
                <ul class="nav side-menu">
                  <li><a href="/"><i class="fa fa-home"> </i> Home</a>
                 
                  </li>
                  <li><a  href="/event/register"><i class="fa fa-calendar" aria-hidden="true" ></i> Events </a>
                    
                  </li>
                  <li><a href="/subevent/register"><i class="fa fa-calendar-o" aria-hidden="true"  ></i> SubEvents 
                    
                 </li></a>
                  <li><a href="/guest/register"><i  class="fa fa-user" aria-hidden="true"  ></i> Guest </a>
                   
                  </li>
                  <li><a href="/partner/register"><i class="fa fa-building" aria-hidden="true"  ></i> Company </a>
                   
                  </li>
                  <li><a><i class="fa fa-clone"  href="#"></i>Reports <span class="fa fa-chevron-down"></span> </a>
                    <ul class="nav child_menu">
                      <li><a href="#">Event</a></li>
                      <li><a href="#">SubEvent</a></li>
                    </ul>
                  </li>
                  </li>
                  <li><a><i class="fa fa-key" aria-hidden="true"  href=""></i> Access Control </a>
                   
                  </li>
                </ul>
              </div>
            
            </div>
            <!-- /sidebar menu -->

        
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   
                    <li>
                      
                    </li>
                    
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          @yield('content');

        </div>
        <!-- /page content -->

        <!-- footer content -->
        
        <!-- /footer content -->
      </div>
    </div>

    
  
  </body>
@include('layout.javascript');

  



  

</html>
