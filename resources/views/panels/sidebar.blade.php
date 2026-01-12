<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <!-- <div class="sidenav-header d-flex "> -->
        <div class="sidenav-header d-flex ">
            <!-- User Info-->
                                       <a href="{{ route('admin.dash') }}">
                <div class="sidenav-header-inner text-center">                       <h2 class="h5">Admin panel</h2><span></span>
                       </div>
           </a>
                   </div>

        <!-- Sidebar Navigation Menus-->

        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">


                    <li class="{{ request()->routeIs('admin.dash') ? 'active' : '' }}">
    <a href="{{ route('admin.dash') }}">
        <i class=""></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="{{ request()->routeIs('admin.admin_users') ? 'active' : '' }}">
    <a href="{{ route('admin.admin_users') }}">
        <i class=""></i>
        <span>Users</span>
    </a>
</li>

<li class="{{ request()->routeIs('admin.list_cms_page') ? 'active' : '' }}">
    <a href="{{ route('admin.list_cms_page') }}">
        <i class=""></i>
        <span>CMS Pages</span>
    </a>
</li>

<li class="{{ request()->routeIs('admin.list_product*') ? 'active' : '' }}">
    <a href="{{ route('admin.list_product') }}">
        <i class="material-icons"></i>
        <span>Products</span>
    </a>
</li>


                


            </ul>

        </div>
    </div>
</nav>
