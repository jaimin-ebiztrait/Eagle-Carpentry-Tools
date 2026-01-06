<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <!-- <div class="sidenav-header d-flex "> -->
        <div class="sidenav-header d-flex ">
            <!-- User Info-->
                                       <a href="https://www.spotplus.fr/admin/dashboard">
                <div class="sidenav-header-inner text-center"><img src="https://www.spotplus.fr/public/uploads/profile/admin-image.jpg" alt="person" class="img-fluid rounded-circle mCS_img_loaded">                          <h2 class="h5">Admin Dynamic Website</h2><span>Administrator</span>
                       </div>
           </a>
                   </div>

        <!-- Sidebar Navigation Menus-->

        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">


                     <li class="">
                        <a href="{{ route('admin.dash') }}" class="">
                            <i class=""></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{ route('admin.admin_users') }}" class="">
                            <i class=""></i>
                            <span>Users</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{ route('admin.list_cms_page') }}" class="">
                            <i class=""></i>
                            <span>CMS Pages</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="#" class="">
                            <i class="material-icons"></i>
                            <span>Profile</span>
                        </a>
                    </li>

               <li class="">
                    <a href="" class="">
                        <i class="material-icons"></i>
                        <span>Products</span>
                    </a>
                </li>

                


            </ul>

        </div>
    </div>
</nav>
