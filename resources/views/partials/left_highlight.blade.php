@if ($data['left_banner']!='')

                <!-- Deals-and-tabs -->
                <div class="mb-5">
                    <div class="row">
                        <!-- Deal -->
                        <div class="col-md-auto mb-6 mb-md-0">
                            <div class="p-3 border border-width-2 border-primary borders-radius-20 bg-white min-width-370">
                                <div class="d-flex justify-content-between align-items-center m-1 ml-2">
                                    <h3 class="font-size-22 mb-0 font-weight-normal text-lh-28 max-width-120">{{$data['left_banner']->offer_title }}</h3>
                                    <div class="d-flex align-items-center flex-column justify-content-center bg-primary rounded-pill height-75 width-75 text-lh-1 text-white">
                                        {!! $data['left_banner']->offer_discount_label !!}
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img width="320" height="300" class="img-fluid" src="{!! asset( $data['left_banner']->highlighted) !!}"></a>
                                </div>
                                <h5 class="mb-2 font-size-14 text-center mx-auto max-width-180 text-lh-18"><a href="../shop/single-product-fullwidth.html" class="text-violet1 font-weight-bold">{!! $data['left_banner']->product_title !!}</a></h5>
                                <div class="d-flex align-items-center justify-content-center mb-3">
                                    <del class="font-size-18 mr-2 text-gray-2">₹99,00</del>
                                    <ins class="font-size-30 text-red text-decoration-none">₹{!! $data['left_banner']->mrp !!}</ins>
                                </div>
                                <div class="mb-3 mx-2">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="">Availavle: <strong>6</strong></span>
                                        <span class="">Already Sold: <strong>28</strong></span>
                                    </div>
                                    <div class="rounded-pill bg-gray-3 height-20 position-relative">
                                        <span class="position-absolute left-0 top-0 bottom-0 rounded-pill w-30 bg-primary"></span>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <h6 class="font-size-15 text-gray-2 text-center mb-3">Hurry Up! Offer ends in:</h6>
                                    <div class="js-countdown d-flex justify-content-center"                                        
                                        data-end-date="{{ $data['left_banner']->offer_end_timer }}" 
                                        data-hours-format="%H"
                                        data-minutes-format="%M"
                                        data-seconds-format="%S">
                                        <div class="text-lh-1">
                                            <div class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                                                <span class="js-cd-hours"></span>
                                            </div>
                                            <div class="text-gray-2 font-size-12 text-center">HOURS</div>
                                        </div>
                                        <div class="mx-1 pt-1 text-gray-2 font-size-24">:</div>
                                        <div class="text-lh-1">
                                            <div class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                                                <span class="js-cd-minutes"></span>
                                            </div>
                                            <div class="text-gray-2 font-size-12 text-center">MINS</div>
                                        </div>
                                        <div class="mx-1 pt-1 text-gray-2 font-size-24">:</div>
                                        <div class="text-lh-1">
                                            <div class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                                                <span class="js-cd-seconds"></span>
                                            </div>
                                            <div class="text-gray-2 font-size-12 text-center">SECS</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-none p-3 border border-width-2 border-primary borders-radius-20 bg-white min-width-370">
                                <div class="d-flex justify-content-between align-items-center m-1 ml-2">
                                    <div class="bg-gray-1 bg-animation rounded height-20 w-50"></div>
                                    <div class="bg-gray-1 bg-animation u-lg-avatar rounded-circle"></div>
                                </div>
                                <div class="mb-4">
                                    <div class="bg-gray-1 height-300"></div>
                                </div>
                                <div class="mb-4">
                                    <div class="bg-gray-1 bg-animation rounded height-20 w-60 mx-auto mb-1"></div>
                                    <div class="bg-gray-1 bg-animation rounded height-20 w-50 mx-auto"></div>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-4">
                                    <div class="bg-gray-1 bg-animation rounded height-12 w-20 ml-auto mr-2"></div>
                                    <div class="bg-gray-1 bg-animation rounded height-20 w-30 mr-auto"></div>
                                </div>
                                <div class="mb-3 mx-2">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="bg-gray-1 bg-animation rounded height-12 w-30"></div>
                                        <div class="bg-gray-1 bg-animation rounded height-12 w-30"></div>
                                    </div>
                                    <div class="rounded-pill bg-gray-1 height-20 position-relative">

                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="bg-gray-1 bg-animation rounded height-12 w-60 mx-auto mb-3"></div>
                                    <div class="d-flex justify-content-center">
                                        <div class="">
                                            <div class="u-avatar bg-gray-1 bg-animation rounded mb-1"></div>
                                            <div class="bg-gray-1 bg-animation rounded height-12 w-90 mx-auto"></div>
                                        </div>
                                        <div class="mx-1 pt-1 text-gray-1 font-size-24">:</div>
                                        <div class="">
                                            <div class="u-avatar bg-gray-1 bg-animation rounded mb-1"></div>
                                            <div class="bg-gray-1 bg-animation rounded height-12 w-90 mx-auto"></div>
                                        </div>
                                        <div class="mx-1 pt-1 text-gray-1 font-size-24">:</div>
                                        <div class="">
                                            <div class="u-avatar bg-gray-1 bg-animation rounded mb-1"></div>
                                            <div class="bg-gray-1 bg-animation rounded height-12 w-90 mx-auto"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Deal -->

@endif

                        <!-- Tab Prodcut -->
                        <div class="col">
                            <!-- Features Section -->
                            <div class="">
                                <!-- Nav Classic -->
                                <div class="position-relative bg-white text-center z-index-2">
      <ul class="nav nav-classic nav-tab justify-content-center" id="pills-tab" role="tablist">
      @foreach ($data['sections'] as $item)
     
       <li class="nav-item">
            <a class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }}" 
               id="pills-{{ Str::slug($item->section_title, '-') }}-tab" 
               data-toggle="tab" 
               href="#pills-{{ Str::slug($item->section_title, '-') }}" 
               role="tab" 
               aria-controls="pills-{{ Str::slug($item->section_title, '-') }}" 
               aria-selected="{{ $loop->iteration == 0 ? 'true' : 'false' }}">
               @if($item->display_title == '1')
                {{ $item->section_title }}
                @endif
            </a>
        </li>

        @endforeach


<!-- End Nav Classic -->

<!-- Tab Content -->
<div class="tab-content" id="pills-tabContent">
  
    @foreach ($data['sections'] as $item)
        @include('partials.section.'.$item->section_template)   
    @endforeach


</div>

                                    
                                    </div>
 
                                    </div>
                                </div>
                                <!-- End Tab Content -->
                            </div>
                            <!-- End Features Section -->
                        </div>
                        <!-- End Tab Prodcut -->
                    </div>
                </div>
                <!-- End Deals-and-tabs -->