
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="index-2.html">
                    <img src="{{ asset('Backend/assets/img/logo.svg') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="index-2.html" class="nav-link"> CORK </a>
            </li>
            <li class="nav-item toggle-sidebar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left sidebarCollapse"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            </li>
        </ul>

        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">

            <!-- ******DASHBOARD SIDEBAR****** -->
            <li class="menu @if( Route::currentRouteNamed('dashboard') ) active @endif">
                <a href="{{route('dashboard')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <!-- ******DASHBOARD SIDEBAR****** -->


            <!-- ****************************** -->
            <!-- *********Menu Header********** -->
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>Ecommerce Function</span></div>
            </li>
            <!-- *********Menu Header********** -->
            <!-- ****************************** -->

            <!-- ******Brand SIDEBAR****** -->
            <li class="menu @if( Route::currentRouteNamed('brand.manage') || Route::currentRouteNamed('brand.create') || Route::currentRouteNamed('brand.edit')  ) active @endif">
                <a href="#brand" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span>Brand</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="brand" data-parent="#accordionExample">
                    <li class="@if( Route::currentRouteNamed('brand.manage') ) active @endif">
                        <a href="{{ route('brand.manage') }}">Brand Manage</a>
                    </li>
                    <li class="@if( Route::currentRouteNamed('brand.create') ) active @endif">
                        <a href="{{ route('brand.create') }}">Brand Create</a>
                    </li>
                </ul>
            </li>
            <!-- ******Brand SIDEBAR****** -->

            <!-- ******Brand SIDEBAR****** -->
            <li class="menu @if( Route::currentRouteNamed('category.manage') || Route::currentRouteNamed('category.create') || Route::currentRouteNamed('category.edit') ) active @endif">
                <a href="#category" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span>Category</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="category" data-parent="#accordionExample">
                    <li class="@if( Route::currentRouteNamed('category.manage') ) active @endif">
                        <a href="{{ route('category.manage') }}">Category Manage</a>
                    </li>
                    <li class="@if( Route::currentRouteNamed('category.create') ) active @endif">
                        <a href="{{ route('category.create') }}">Category Create</a>
                    </li>
                </ul>
            </li>
            <!-- ******Brand SIDEBAR****** -->


            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>Shop Management</span></div>
            </li>

             <li class="menu @if( Route::currentRouteNamed('product.manage') || Route::currentRouteNamed('product.create') || Route::currentRouteNamed('product.edit') ) active @endif">
                <a href="#product" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span>Product</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="product" data-parent="#accordionExample">
                    <li class="@if( Route::currentRouteNamed('product.manage') ) active @endif">
                        <a href="{{ route('product.manage') }}">Product Manage</a>
                    </li>
                    <li class="@if( Route::currentRouteNamed('product.create') ) active @endif">
                        <a href="{{ route('product.create') }}">Product Create</a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>Shipping Address</span></div>
            </li>

            <!-- ******Brand SIDEBAR****** -->
            <li class="menu @if( Route::currentRouteNamed('country.manage') || Route::currentRouteNamed('country.create') || Route::currentRouteNamed('country.edit')  ) active @endif">
                <a href="#country" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span>Country</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="country" data-parent="#country">
                    <li class="@if( Route::currentRouteNamed('country.manage') ) active @endif">
                        <a href="{{ route('country.manage') }}">Country Manage</a>
                    </li>
                    <li class="@if( Route::currentRouteNamed('country.create') ) active @endif">
                        <a href="{{ route('country.create') }}">Country Create</a>
                    </li>
                </ul>
            </li>
            <!-- ******Brand SIDEBAR****** -->

            <!-- ******Brand SIDEBAR****** -->
            <li class="menu @if( Route::currentRouteNamed('division.manage') || Route::currentRouteNamed('division.create') || Route::currentRouteNamed('division.edit')  ) active @endif">
                <a href="#division" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span>Division</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="division" data-parent="#accordionExample">
                    <li class="@if( Route::currentRouteNamed('division.manage') ) active @endif">
                        <a href="{{ route('division.manage') }}">Division Manage</a>
                    </li>
                    <li class="@if( Route::currentRouteNamed('division.create') ) active @endif">
                        <a href="{{ route('division.create') }}">Division Create</a>
                    </li>
                </ul>
            </li>
            <!-- ******Brand SIDEBAR****** -->

            <!-- ******Brand SIDEBAR****** -->
            <li class="menu @if( Route::currentRouteNamed('district.manage') || Route::currentRouteNamed('district.create') || Route::currentRouteNamed('district.edit')  ) active @endif">
                <a href="#district" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span>District</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="district" data-parent="#accordionExample">
                    <li class="@if( Route::currentRouteNamed('district.manage') ) active @endif">
                        <a href="{{ route('district.manage') }}">District Manage</a>
                    </li>
                    <li class="@if( Route::currentRouteNamed('district.create') ) active @endif">
                        <a href="{{ route('district.create') }}">District Create</a>
                    </li>
                </ul>
            </li>
            <!-- ******Brand SIDEBAR****** -->


        </ul>

    </nav>

</div>
