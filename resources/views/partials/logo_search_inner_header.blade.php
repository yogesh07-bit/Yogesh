                <!-- Logo-Search-header-icons -->
                <div class="py-2 py-xl-4 bg-primary-down-lg">
                    <div class="container my-0dot5 my-xl-0">
                        <div class="row align-items-center">
                            <!-- Logo-offcanvas-menu -->
                            <div class="col-auto">
                                <!-- Nav -->
                                <nav class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between max-width-270 min-width-270">

                                    <!-- Logo -->
                                     @foreach ($data['company_data'] as $item)
                                     @if ($item->info_type == "company_url")
                                    <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center"
                                     href="{{ $item->data }}" aria-label="Electro">
                                       @endif  
                                    @endforeach        
                                           @foreach ($data['company_data'] as $item)
                                              @if ($item->info_type == "company_logo")
                                             <img src="{{ asset($item->data) }}">  
                                             @endif
                                            @endforeach 
                                    </a>

                                    

                                    <!-- End Logo -->
                                                                          

                                    <!-- Fullscreen Toggle Button -->
                                    <button id="sidebarHeaderInvokerMenu" type="button" class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0"
                                        aria-controls="sidebarHeader"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        data-unfold-event="click"
                                        data-unfold-hide-on-scroll="false"
                                        data-unfold-target="#sidebarHeader1"
                                        data-unfold-type="css-animation"
                                        data-unfold-animation-in="fadeInLeft"
                                        data-unfold-animation-out="fadeOutLeft"
                                        data-unfold-duration="500">
                                        <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                            <span class="u-hamburger__inner"></span>
                                        </span>
                                    </button>
                                    <!-- End Fullscreen Toggle Button -->
                                </nav>
                                <!-- End Nav -->

                                <!-- ========== HEADER SIDEBAR ========== -->
                                <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left" aria-labelledby="sidebarHeaderInvoker">
                                    <div class="u-sidebar__scroller">
                                        <div class="u-sidebar__container">
                                            <div class="u-header-sidebar__footer-offset">
                                                <!-- Toggle Button -->
                                                <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-4 bg-white">
                                                    <button type="button" class="close ml-auto"
                                                        aria-controls="sidebarHeader"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        data-unfold-event="click"
                                                        data-unfold-hide-on-scroll="false"
                                                        data-unfold-target="#sidebarHeader1"
                                                        data-unfold-type="css-animation"
                                                        data-unfold-animation-in="fadeInLeft"
                                                        data-unfold-animation-out="fadeOutLeft"
                                                        data-unfold-duration="500">
                                                        <span aria-hidden="true"><i class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                                                    </button>
                                                </div>
                                                <!-- End Toggle Button -->

                                                <!-- Content -->
                                                <div class="js-scrollbar u-sidebar__body">
                                                    <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                                                        <!-- Logo -->
                                                        <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center mb-3" href="index.html" aria-label="Electro">
                                                            <img src="public/assets/img/logo_export.png">
                                                        </a>
                                                        <!-- End Logo -->

                                                        <!-- List -->
                                                        <ul id="headerSidebarList" class="u-header-collapse__nav">
                                                            <!-- Value of the Day -->
                                                            <li class="">
                                                                <a class="u-header-collapse__nav-link font-weight-bold" href="#">Value of the Day</a>
                                                            </li>
                                                            <!-- End Value of the Day -->

                                                            <!-- Top 100 Offers -->
                                                            <li class="">
                                                                <a class="u-header-collapse__nav-link font-weight-bold" href="#">Top 100 Offers</a>
                                                            </li>
                                                            <!-- End Top 100 Offers -->

                                                            <!-- New Arrivals -->
                                                            <li class="">
                                                                <a class="u-header-collapse__nav-link font-weight-bold" href="#">New Arrivals</a>
                                                            </li>
                                                            <!-- End New Arrivals -->

                                                            <!-- Computers & Accessories -->
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarComputersCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarComputersCollapse">
                                                                    Computers & Accessories
                                                                </a>

                                                                <div id="headerSidebarComputersCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                                    <ul class="u-header-collapse__nav-list">
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Computers &amp; Accessories</span></li>
                                                                        <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">All Computers & Accessories</a></li>
                                                                        <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Laptops, Desktops & Monitors</a></li>
                                                                        <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Printers & Ink</a></li>
                                                                        <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Networking & Internet Devices</a></li>
                                                                        <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Computer Accessories</a></li>
                                                                        <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Software</a></li>
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Office & Stationery</span></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Office & Stationery</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Electronics</a></li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- End Computers & Accessories -->

                                                            <!-- Cameras, Audio & Video -->
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarCamerasCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarCamerasCollapse">
                                                                    Cameras, Audio & Video
                                                                </a>

                                                                <div id="headerSidebarCamerasCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                                    <ul class="u-header-collapse__nav-list">
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Cameras & Photography</span></li>
                                                                        <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Lenses</a></li>
                                                                        <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Camera Accessories</a></li>
                                                                        <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Security & Surveillance</a></li>
                                                                        <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Binoculars & Telescopes</a></li>
                                                                        <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Camcorders</a></li>
                                                                        <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Software</a></li>
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Audio & Video</span></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Audio & Video</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Headphones & Speakers</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Electronics</a></li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- End Cameras, Audio & Video -->

                                                            <!-- Mobiles & Tablets -->
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarMobilesCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarMobilesCollapse">
                                                                    Mobiles & Tablets
                                                                </a>

                                                                <div id="headerSidebarMobilesCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                                    <ul class="u-header-collapse__nav-list">
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Mobiles & Tablets</span></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Mobile Phones</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Smartphones</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Refurbished Mobiles</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Cases & Covers</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Mobile Accessories</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Cases & Covers</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Tablets</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Tablet Accessories</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Electronics</a></li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- End Mobiles & Tablets -->

                                                            <!-- Movies, Music & Video -->
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarMoviesCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarMoviesCollapse">
                                                                    Movies, Music & Video
                                                                </a>

                                                                <div id="headerSidebarMoviesCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                                    <ul class="u-header-collapse__nav-list">
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Movies & TV Shows</span></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Movies & TV Shows</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All English</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Hindi</a></li>
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Video Games</span></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">PC Games</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Consoles</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Accessories</a></li>
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Music</span></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Music</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Indian Classical</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Musical Instruments</a></li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- End Movies, Music & Video -->

                                                            <!-- TV & Audio -->
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarTvCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarTvCollapse">
                                                                    TV & Audio
                                                                </a>

                                                                <div id="headerSidebarTvCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                                    <ul class="u-header-collapse__nav-list">
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Audio & Video</span></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Audio & Video</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Televisions</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Headphones</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Speakers</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Audio & Video Accessories</a></li>
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Music</span></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Televisions</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Headphones</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Electro Home Appliances</a></li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- End TV & Audio -->

                                                            <!-- Watches & Eyewear -->
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarWatchesCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarWatchesCollapse">
                                                                    Watches & Eyewear
                                                                </a>

                                                                <div id="headerSidebarWatchesCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                                    <ul class="u-header-collapse__nav-list">
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Watches</span></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Watches</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Men's Watches</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Women's Watches</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Premium Watches</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Deals on Watches</a></li>
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Eyewear</span></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Men's Sunglasses</a></li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- End Watches & Eyewear -->

                                                            <!-- Car, Motorbike & Industrial -->
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarCarCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarCarCollapse">
                                                                    Car, Motorbike & Industrial
                                                                </a>

                                                                <div id="headerSidebarCarCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                                    <ul class="u-header-collapse__nav-list">
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Car & Motorbike</span></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Cars & Bikes</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Car & Bike Care</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Lubricants</a></li>
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Shop for Bike</span></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Helmets & Gloves</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Bike Parts</a></li>
                                                                        <li><span class="u-header-sidebar__sub-menu-title">Industrial Supplies</span></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Industrial Supplies</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Lab & Scientific</a></li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- End Car, Motorbike & Industrial -->

                                                            <!-- Accessories -->
                                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarAccessoriesCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarAccessoriesCollapse">
                                                                    Accessories
                                                                </a>

                                                                <div id="headerSidebarAccessoriesCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                                    <ul class="u-header-collapse__nav-list">
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Cases</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Chargers</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Headphone Accessories</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Headphone Cases</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Headphones</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">All Industrial Supplies</a></li>
                                                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Lab & Scientific</a></li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <!-- End Accessories -->
                                                        </ul>
                                                        <!-- End List -->
                                                    </div>
                                                </div>
                                                <!-- End Content -->
                                            </div>
                                            <!-- Footer -->
                                            <footer id="SVGwaveWithDots" class="svg-preloader u-header-sidebar__footer">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item pr-3">
                                                        <a class="u-header-sidebar__footer-link text-gray-90" href="#">Privacy</a>
                                                    </li>
                                                    <li class="list-inline-item pr-3">
                                                        <a class="u-header-sidebar__footer-link text-gray-90" href="#">Terms</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a class="u-header-sidebar__footer-link text-gray-90" href="#">
                                                            <i class="fas fa-info-circle"></i>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <!-- SVG Background Shape -->
                                                <div class="position-absolute right-0 bottom-0 left-0 z-index-n1">
                                                    <img class="js-svg-injector" src="public/assets/svg/components/wave-bottom-with-dots.svg" alt="Image Description"
                                                    data-parent="#SVGwaveWithDots">
                                                </div>
                                                <!-- End SVG Background Shape -->
                                            </footer>
                                            <!-- End Footer -->
                                        </div>
                                    </div>
                                </aside>
                                <!-- ========== END HEADER SIDEBAR ========== -->
                            </div>
                            <!-- End Logo-offcanvas-menu -->
                            

                              <!-- Secondary Menu -->
                        <div class="col">
                            <!-- Nav -->
                            <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
                                <!-- Navigation -->
                                <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                    <ul class="navbar-nav u-header__navbar-nav">
                                        <!-- Home -->

                                         <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                            data-event="click"
                                            data-animation-in="slideInUp"
                                            data-animation-out="fadeOut"
                                            data-position="left">
                                            <a id="homeMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle text-sale" href="javascript:;" aria-haspopup="true" aria-expanded="false">Super Deals</a>

                                            <!-- Home - Mega Menu -->
                                            <div class="hs-mega-menu w-100 u-header__sub-menu" aria-labelledby="homeMegaMenu">
                                                <div class="row u-header__mega-menu-wrapper">
                                                    <div class="col-md-3">
                                                        <span class="u-header__sub-menu-title">Home & Static Pages</span>
                                                        <ul class="u-header__sub-menu-nav-group">
                                                            <li><a href="index.html" class="nav-link u-header__sub-menu-nav-link">Home v1</a></li>
                                                            <li><a href="home-v2.html" class="nav-link u-header__sub-menu-nav-link">Home v2</a></li>
                                                            <li><a href="home-v3.html" class="nav-link u-header__sub-menu-nav-link">Home v3</a></li>
                                                            <li><a href="home-v3-full-color-bg.html" class="nav-link u-header__sub-menu-nav-link">Home v3.1</a></li>
                                                            <li><a href="home-v4.html" class="nav-link u-header__sub-menu-nav-link">Home v4</a></li>
                                                            <li><a href="home-v5.html" class="nav-link u-header__sub-menu-nav-link">Home v5</a></li>
                                                            <li><a href="home-v6.html" class="nav-link u-header__sub-menu-nav-link">Home v6</a></li>
                                                            <li><a href="home-v7.html" class="nav-link u-header__sub-menu-nav-link">Home v7</a></li>
                                                            <li><a href="home-v8.html" class="nav-link u-header__sub-menu-nav-link">Home v8</a></li>
                                                            <li><a href="home-v9.html" class="nav-link u-header__sub-menu-nav-link">Home v9</a></li>
                                                            <li><a href="home-v10.html" class="nav-link u-header__sub-menu-nav-link">Home v10</a></li>
                                                            <li><a href="home-v11.html" class="nav-link u-header__sub-menu-nav-link">Home v11</a></li>
                                                            <li><a href="about.html" class="nav-link u-header__sub-menu-nav-link">About</a></li>
                                                            <li><a href="contact-v1.html" class="nav-link u-header__sub-menu-nav-link">Contact v1</a></li>
                                                            <li><a href="contact-v2.html" class="nav-link u-header__sub-menu-nav-link">Contact v2</a></li>
                                                            <li><a href="faq.html" class="nav-link u-header__sub-menu-nav-link">FAQ</a></li>
                                                            <li><a href="store-directory.html" class="nav-link u-header__sub-menu-nav-link">Store Directory</a></li>
                                                            <li><a href="terms-and-conditions.html" class="nav-link u-header__sub-menu-nav-link">Terms and Conditions</a></li>
                                                            <li><a href="404.html" class="nav-link u-header__sub-menu-nav-link">404</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="u-header__sub-menu-title">Shop Pages</span>
                                                        <ul class="u-header__sub-menu-nav-group mb-3">
                                                            <li><a href="../shop/shop-grid.html" class="nav-link u-header__sub-menu-nav-link">Shop Grid</a></li>
                                                            <li><a href="../shop/shop-grid-extended.html" class="nav-link u-header__sub-menu-nav-link">Shop Grid Extended</a></li>
                                                            <li><a href="../shop/shop-list-view.html" class="nav-link u-header__sub-menu-nav-link">Shop List View</a></li>
                                                            <li><a href="../shop/shop-list-view-small.html" class="nav-link u-header__sub-menu-nav-link">Shop List View Small</a></li>
                                                            <li><a href="../shop/shop-left-sidebar.html" class="nav-link u-header__sub-menu-nav-link">Shop Left Sidebar</a></li>
                                                            <li><a href="../shop/shop-full-width.html" class="nav-link u-header__sub-menu-nav-link">Shop Full width</a></li>
                                                            <li><a href="../shop/shop-right-sidebar.html" class="nav-link u-header__sub-menu-nav-link">Shop Right Sidebar</a></li>
                                                        </ul>
                                                        <span class="u-header__sub-menu-title">Product Categories</span>
                                                        <ul class="u-header__sub-menu-nav-group">
                                                            <li><a href="../shop/product-categories-4-column-sidebar.html" class="nav-link u-header__sub-menu-nav-link">4 Column Sidebar</a></li>
                                                            <li><a href="../shop/product-categories-5-column-sidebar.html" class="nav-link u-header__sub-menu-nav-link">5 Column Sidebar</a></li>
                                                            <li><a href="../shop/product-categories-6-column-full-width.html" class="nav-link u-header__sub-menu-nav-link">6 Column Full width</a></li>
                                                            <li><a href="../shop/product-categories-7-column-full-width.html" class="nav-link u-header__sub-menu-nav-link">7 Column Full width</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="u-header__sub-menu-title">Single Product Pages</span>
                                                        <ul class="u-header__sub-menu-nav-group mb-3">
                                                            <li><a href="../shop/single-product-extended.html" class="nav-link u-header__sub-menu-nav-link">Single Product Extended</a></li>
                                                            <li><a href="../shop/single-product-fullwidth.html" class="nav-link u-header__sub-menu-nav-link">Single Product Fullwidth</a></li>
                                                            <li><a href="../shop/single-product-sidebar.html" class="nav-link u-header__sub-menu-nav-link">Single Product Sidebar</a></li>
                                                        </ul>
                                                        <span class="u-header__sub-menu-title">Ecommerce Pages</span>
                                                        <ul class="u-header__sub-menu-nav-group">
                                                            <li><a href="../shop/shop.html" class="nav-link u-header__sub-menu-nav-link">Shop</a></li>
                                                            <li><a href="../shop/cart.html" class="nav-link u-header__sub-menu-nav-link">Cart</a></li>
                                                            <li><a href="../shop/checkout.html" class="nav-link u-header__sub-menu-nav-link">Checkout</a></li>
                                                            <li><a href="../shop/my-account.html" class="nav-link u-header__sub-menu-nav-link">My Account</a></li>
                                                            <li><a href="../shop/track-your-order.html" class="nav-link u-header__sub-menu-nav-link">Track your Order</a></li>
                                                            <li><a href="../shop/compare.html" class="nav-link u-header__sub-menu-nav-link">Compare</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="u-header__sub-menu-title">Blog Pages</span>
                                                        <ul class="u-header__sub-menu-nav-group mb-3">
                                                            <li><a href="../blog/blog-v1.html" class="nav-link u-header__sub-menu-nav-link">Blog v1</a></li>
                                                            <li><a href="../blog/blog-v2.html" class="nav-link u-header__sub-menu-nav-link">Blog v2</a></li>
                                                            <li><a href="../blog/blog-v3.html" class="nav-link u-header__sub-menu-nav-link">Blog v3</a></li>
                                                            <li><a href="../blog/blog-full-width.html" class="nav-link u-header__sub-menu-nav-link">Blog Full Width</a></li>
                                                            <li><a href="../blog/single-blog-post.html" class="nav-link u-header__sub-menu-nav-link">Single Blog Post</a></li>
                                                        </ul>
                                                        <span class="u-header__sub-menu-title">Shop Columns</span>
                                                        <ul class="u-header__sub-menu-nav-group">
                                                            <li><a href="../shop/shop-7-columns-full-width.html" class="nav-link u-header__sub-menu-nav-link">7 Column Full width</a></li>
                                                            <li><a href="../shop/shop-6-columns-full-width.html" class="nav-link u-header__sub-menu-nav-link">6 Column Full width</a></li>
                                                            <li><a href="../shop/shop-5-columns-sidebar.html" class="nav-link u-header__sub-menu-nav-link">5 Column Sidebar</a></li>
                                                            <li><a href="../shop/shop-4-columns-sidebar.html" class="nav-link u-header__sub-menu-nav-link">4 Column Sidebar</a></li>
                                                            <li><a href="../shop/shop-3-columns-sidebar.html" class="nav-link u-header__sub-menu-nav-link">3 Column Sidebar</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Home - Mega Menu -->
                                        </li>
                                        <!-- End Home -->

                                    @foreach ($data['prime_menu'] as $item)
                                        @if ($item->menu_type=='sub_menu')

                                            <li class="nav-item hs-has-mega-menu u-header__nav-item"
                                            data-event="click"
                                            data-animation-in="slideInUp"
                                            data-animation-out="fadeOut"
                                            data-position="left">
                                            <a id="homeMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle text-sale" href="javascript:;" aria-haspopup="true" aria-expanded="false">{{ $item->menu_items }}</a>

                                            <div class="hs-mega-menu w-100 u-header__sub-menu" aria-labelledby="homeMegaMenu">
                                                <div class="row u-header__mega-menu-wrapper">
                                                    <div class="col-md-3">
                                                        <span class="u-header__sub-menu-title">Home & Static Pages</span>
                                                        <ul class="u-header__sub-menu-nav-group">
                                                            <li><a href="index.html" class="nav-link u-header__sub-menu-nav-link">Home v1</a>
                                                                Load submenu by ajax if holder is empty
                                                            </li>
                                                        </ul>    
                                                    </div>
                                                    </div>
                                                    </div>


                                            </li>

                                            @else

                                        <li class="nav-item u-header__nav-item">
                                        <a class="nav-link u-header__nav-link" href="{{ $item->menu_link }}" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">{{ $item->menu_items }}</a>
                                        </li>
                                            @endif
                                      @endforeach   
                                     
                                        <!-- Button -->
                                        <li class="nav-item u-header__nav-last-item">
                                             @foreach ($data['company_data'] as $item)
                                              @if ($item->info_type == "custom_header_message")

                                               <a class="text-gray-90" href="#" target="_blank">
                                               {{ asset($item->data) }}
                                            </a>

                                             
                                             @endif
                                            @endforeach 

                                           
                                        </li>
                                        <!-- End Button -->
                                    </ul>
                                </div>
                                <!-- End Navigation -->
                            </nav>
                            <!-- End Nav -->
                        </div>
                        <!-- End Secondary Menu -->
                            
                        </div>
                    </div>
                </div>
                <!-- End Logo-Search-header-icons -->