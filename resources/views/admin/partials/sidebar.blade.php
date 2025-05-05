<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
    <div>


        <div class="logo-wrapper">

        @foreach ($company_data as $item)
                                     @if ($item->info_type == "company_logo")
                                     <a href="{{route('admin.dashboard')}}"><img class="img-fluid for-light" src="{{ asset($item->data) }}" alt="">

          <img class="img-fluid for-dark" src="{{ asset($item->data) }}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i>

                                       @endif
                                    @endforeach
            </div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('public/admin/assets/images/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <!-- Sidebar links here -->
                     <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{ asset('public/assets/images/logo-icon.png')}}" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true">        </i></div>
                  </li>
                  <li class="sidebar-list">
                   <a class="sidebar-link sidebar-title active" href="#">
                    <i class="icofont icofont-fire"></i>
                      <span >Dashboard              </span></a>
                    <ul class="sidebar-submenu" style="display: block;">
                      <li>
                        <a class="active" href="{{ route('admin.dashboard') }}">
                        E-commerce</a></li>
                      <li><a  href="#">Inventory</a></li>
                    </ul>
                  </li>

                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title " href="#">
                      <i class="icofont icofont-fire"></i>
                      <span >Products</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="">View Product</a></li>
                      <li><a href="{{ route('admin.product.add_product') }}">Add Product</a></li>
                      <li><a href="{{ route('admin.category') }}">View Category</a></li>


                    </ul>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title " href="#">
                      <i class="icofont icofont-fire"></i>
                      <span >Brands</span></a>
                    <ul class="sidebar-submenu">
                    <li><a href="{{ route('admin.brands.index') }}">View Brands</a></li>
                      <li><a href="{{ route('admin.brand.create') }}">Add Brand</a></li>

                    </ul>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title " href="#">
                      <i class="icofont icofont-fire"></i>
                      <span >Tax Slabs</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="{{ route('admin.tax.slab') }}">View Tax slabs</a></li>
                      <!-- <li><a href="">Add New Tax</a></li> -->
                    </ul>
                  </li>

                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title " href="#">
                      <i class="icofont icofont-fire"></i>
                      <span >Discounts</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="{{ route('admin.discount') }}">View All Discounts</a></li>
                      <li><a href="{{ route("admin.discount.create") }}">Add New Discount</a></li>
                    </ul>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title " href="#">
                      <i class="icofont icofont-fire"></i>
                      <span >Menus</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="{{route('admin.menu')}}">View All Menu</a></li>
                      <li><a href="">Add New Menu</a></li>
                    </ul>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title " href="#">
                      <i class="icofont icofont-fire"></i>
                      <span >Orders</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="">View All Order</a></li>
                      <li><a href="">Create New Order</a></li>
                    </ul>
                  </li>
                 <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title " href="#">
                      <i class="icofont icofont-fire"></i>
                      <span >Customers</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="">View All Customer</a></li>
                      <li><a href="">Add New Customer</a></li>
                    </ul>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title " href="#">
                      <i class="icofont icofont-fire"></i>
                      <span >Staff</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="">View All Staff</a></li>
                      <li><a href="">Add New Staff</a></li>
                    </ul>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title " href="#">
                      <i class="icofont icofont-fire"></i>
                      <span >Banner Mangement</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="{{route('banner')}}">View All Banner</a></li>
                      <li><a href="">Add New Banner</a></li>

                    </ul>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title " href="#">
                      <i class="icofont icofont-fire"></i>
                      <span >Section Mangement</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="{{ route('admin.section') }}">View All Section</a></li>
                    </ul>
                  </li>

                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}">
                      <i class="icofont icofont-fire"></i>
                      <span>View Website</span></a>
                  </li>

                  <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.company') }}">
                      <i class="icofont icofont-fire"></i>
                      <span>Company Details</span></a>
                  </li>

                 <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="file-manager.html">
                      <i class="icofont icofont-fire"></i>
                      <span>File manager</span></a></li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->
