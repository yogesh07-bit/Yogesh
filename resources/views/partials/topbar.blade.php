 <!-- Topbar -->
 <nav class="main-menu">
    </nav>
                <div class="u-header-topbar bg-gray-1 border-0 py-2 d-none d-xl-block">
                    <div class="container">
                        <div class="d-flex align-items-center">
                            <div class="topbar-left">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item u-header-topbar__nav-item u-header-topbar__nav-item-no-border mr-0">                                        
                                    
                                        @foreach ($data['company_data'] as $item)
                                            @if ($item->info_type == "company_phone")
                                            <a href="tel:{{ $item->data }}" class="u-header-topbar__nav-link"><i class="ec ec-phone text-primary mr-1"></i>
                                                {{ $item->data }}
                                            </a>
                                            @endif
                                        @endforeach                                   

                                    </li>




                                    <li class="list-inline-item u-header-topbar__nav-item u-header-topbar__nav-item-no-border">

                                        @foreach ($data['company_data'] as $item)
                                            @if ($item->info_type == "company_email")
                                            <a href="mailto:{{ $item->data }}" class="u-header-topbar__nav-link"><i class="ec ec-mail text-primary mr-1"></i>
                                                {{ $item->data }}
                                            </a>
                                            @endif
                                        @endforeach  

                                    </li>
                                </ul>
                            </div>
                            <div class="topbar-right ml-auto">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <a href="#" class="u-header-topbar__nav-link"><i class="ec ec-map-pointer mr-1"></i> Store Locator</a>
                                    </li>
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <a href="../shop/track-your-order.html" class="u-header-topbar__nav-link"><i class="ec ec-transport mr-1"></i> Track Your Order</a>
                                    </li>
                                    
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <!-- Account Sidebar Toggle Button -->
                                        <a id="sidebarNavToggler" href="javascript:;" role="button" class="u-header-topbar__nav-link"
                                            aria-controls="sidebarContent"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                            data-unfold-event="click"
                                            data-unfold-hide-on-scroll="false"
                                            data-unfold-target="#sidebarContent"
                                            data-unfold-type="css-animation"
                                            data-unfold-animation-in="fadeInRight"
                                            data-unfold-animation-out="fadeOutRight"
                                            data-unfold-duration="500">
                                            <i class="ec ec-user mr-1"></i> Register <span class="text-gray-50">or</span> Sign in
                                        </a>
                                        <!-- End Account Sidebar Toggle Button -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Topbar -->