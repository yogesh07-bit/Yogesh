<!-- Single Product Body -->
<pre>
<!-- {{ json_encode($data['item_details'], JSON_PRETTY_PRINT ) }} -->
</pre>



                <div class="mb-14">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-5 mb-4 mb-md-0">
                            <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
                                data-infinite="true"
                                data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                                data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                                data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                                data-nav-for="#sliderSyncingThumb">
 @if ($data['item_details']['images']->file_url)

                                            @php
                                                $gallery_images = explode(',', $data['item_details']['images']->file_url);
                                            @endphp

                                        @foreach ($gallery_images as $gm)

                                    <div class="js-slide">
                                        <img class="img-fluid" src="{{asset($gm)}}" alt="Image Description">
                                    </div>

                                        @endforeach 

                                         @endif

                                
                            </div>

                            <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                                data-infinite="true"
                                data-slides-show="5"
                                data-is-thumbs="true"
                                data-nav-for="#sliderSyncingNav">

                                 @if ($data['item_details']['images']->file_url)

                                            @php
                                                $gallery_images = explode(',', $data['item_details']['images']->file_url);
                                            @endphp

                                        @foreach ($gallery_images as $gm)

                                        <div class="js-slide" style="cursor: pointer;">
                                    <img class="img-fluid" src="{{asset($gm)}}"" alt="Image Description">
                                </div>


                                        @endforeach 

                                         @endif

    

                            </div>
                        </div>



                        <div class="col-md-6 col-lg-4 col-xl-4 mb-md-6 mb-lg-0">
                            <div class="mb-2">
                                <div class="border-bottom mb-3 pb-md-1 pb-3">
                                    <a href="{{url('category/' . $data['item_details']->category_slug . '/' . $data['item_details']->product_category ) }}" class="font-size-12 text-gray-5 mb-2 d-inline-block">{{$data['item_details']['category']->category_name}}</a>
                                    <h2 class="font-size-25 text-lh-1dot2">{{$data['item_details']->product_title}}</h2>
                                    <div class="mb-2">
                                        <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">
                                            <div class="text-warning mr-2">
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="fas fa-star"></small>
                                                <small class="far fa-star text-muted"></small>
                                            </div>
                                            <span class="text-secondary font-size-13">(3 customer reviews)</span>
                                        </a>
                                    </div>
                                    <div class="d-md-flex align-items-center">
                                        
                                        <div class="ml-md-3 text-gray-9 font-size-14">Availability: <span class="text-green font-weight-bold">26 in stock</span></div>
                                    </div>
                                </div>
                                <div class="flex-horizontal-center flex-wrap mb-4">
                                    <a href="#" class="text-gray-6 font-size-13 mr-2"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    
                                </div>
                                <div class="mb-2">
                                    @foreach ($data['item_details']['description'] as $item_desc)

                                        @if ($item_desc->display_title==0)
                                            {!! $item_desc->description !!}
                                        @endif

                                    @endforeach

                                </div>
                                <p></p>
                                <p><strong>SKU</strong>: FW511948218</p>
                                
                            </div>
                        </div>

                        <div class="mx-md-auto mx-lg-0 col-md-6 col-lg-4 col-xl-3" bis_skin_checked="1">
                            <div class="mb-2" bis_skin_checked="1">
                                <div class="card p-5 border-width-2 border-color-1 borders-radius-17" bis_skin_checked="1">
                                    <div class="text-gray-9 font-size-14 pb-2 border-color-1 border-bottom mb-3" bis_skin_checked="1">Availability: <span class="text-green font-weight-bold">26 in stock</span></div>
                                    <div class="mb-3" bis_skin_checked="1">
                                        <div class="font-size-36" bis_skin_checked="1">₹{{$data['item_details']->mrp}}</div>
                                    </div>
                                    <div class="mb-3" bis_skin_checked="1">
                                        <h6 class="font-size-14">Quantity</h6>
                                        <!-- Quantity -->
                                        <div class="border rounded-pill py-1 w-md-60 height-35 px-3 border-color-1" bis_skin_checked="1">
                                            <div class="js-quantity row align-items-center" bis_skin_checked="1">
                                                <div class="col" bis_skin_checked="1">
                                                    <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="text" value="1">
                                                </div>
                                                <div class="col-auto pr-1" bis_skin_checked="1">
                                                    <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                                        <small class="fas fa-minus btn-icon__inner"></small>
                                                    </a>
                                                    <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                                        <small class="fas fa-plus btn-icon__inner"></small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Quantity -->
                                    </div>
                                   <div class=" py-3 mb-4">
                                    <div class="d-flex align-items-center">
                                        <h6 class="font-size-14 mb-0">Color</h6>
                                        <!-- Select -->
                                        <select class="js-select selectpicker dropdown-select ml-3"
                                            data-style="btn-sm bg-white font-weight-normal py-2 border">
                                            <option value="one" selected>White with Gold</option>
                                            <option value="two">Red</option>
                                            <option value="three">Green</option>
                                            <option value="four">Blue</option>
                                        </select>
                                        <!-- End Select -->
                                    </div>
                                </div>
                                    <div class="mb-2 pb-0dot5" bis_skin_checked="1">
                                        <a href="#" class="btn btn-block btn-primary-dark"><i class="ec ec-add-to-cart mr-2 font-size-20"></i> Add to Cart</a>
                                    </div>
                                    <div class="mb-3" bis_skin_checked="1">
                                        <a href="#" class="btn btn-block btn-dark">Buy Now</a>
                                    </div>
                                    <div class="flex-content-center flex-wrap" bis_skin_checked="1">
                                        <a href="#" class="text-gray-6 font-size-13 mr-2"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- End Single Product Body -->
                <!-- Single Product Tab -->
                <div class="mb-8">
                    <div class="position-relative position-md-static px-md-6">
                        <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0" id="pills-tab-8" role="tablist">                            

                            @foreach ($data['item_details']['description'] as $item_desc)

                             @if ($item_desc->display_title==1)

                                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                <a class="nav-link 
                                   
                                " id="Jpills-{{$item_desc-> id }}-tab" data-toggle="pill" href="#Jpills-{{$item_desc-> id }}" role="tab" aria-controls="Jpills-{{$item_desc-> id }}" aria-selected="true">{{$item_desc-> title }}

                                </a>
                            </li>        
                            @endif                      

                            @endforeach



                            <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                <a class="nav-link active show " id="Jpills-product-review-tab" data-toggle="pill" href="#Jpills-product-review" role="tab" aria-controls="Jpills-product-review" aria-selected="true">Reviews</a>
                            </li>
                           
                        </ul>
                    </div>
                    <!-- Tab Content -->
                    <div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                        <div class="tab-content" id="Jpills-tabContent">

                             @foreach ($data['item_details']['description'] as $item_desc)

                             @if ($item_desc->display_title==1)

                             <div class="tab-pane fade                           
                              " id="Jpills-{{$item_desc-> id }}" role="tabpanel" aria-labelledby="Jpills-{{$item_desc-> id }}-tab">
                                <div class="row no-gutters">
                                        {!! $item_desc-> description !!}
                                </div>
                            </div>

                            @endif
                            @endforeach

                            <div class="tab-pane fade   active show " id="Jpills-product-review" role="tabpanel" aria-labelledby="Jpills-product-review-tab" bis_skin_checked="1">
                                <div class="row mb-8" bis_skin_checked="1">
                                    <div class="col-md-6" bis_skin_checked="1">
                                        <div class="mb-3" bis_skin_checked="1">
                                            <h3 class="font-size-18 mb-6">Based on 3 reviews</h3>
                                            <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">4.3</h2>
                                            <div class="text-lh-1" bis_skin_checked="1">overall</div>
                                        </div>

                                        <!-- Ratings -->
                                        <ul class="list-unstyled">
                                            <li class="py-1">
                                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                                    <div class="col-auto mb-2 mb-md-0" bis_skin_checked="1">
                                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;" bis_skin_checked="1">
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto mb-2 mb-md-0" bis_skin_checked="1">
                                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;" bis_skin_checked="1">
                                                            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto text-right" bis_skin_checked="1">
                                                        <span class="text-gray-90">205</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-1">
                                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                                    <div class="col-auto mb-2 mb-md-0" bis_skin_checked="1">
                                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;" bis_skin_checked="1">
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto mb-2 mb-md-0" bis_skin_checked="1">
                                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;" bis_skin_checked="1">
                                                            <div class="progress-bar" role="progressbar" style="width: 53%;" aria-valuenow="53" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto text-right" bis_skin_checked="1">
                                                        <span class="text-gray-90">55</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-1">
                                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                                    <div class="col-auto mb-2 mb-md-0" bis_skin_checked="1">
                                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;" bis_skin_checked="1">
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto mb-2 mb-md-0" bis_skin_checked="1">
                                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;" bis_skin_checked="1">
                                                            <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto text-right" bis_skin_checked="1">
                                                        <span class="text-gray-90">23</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-1">
                                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                                    <div class="col-auto mb-2 mb-md-0" bis_skin_checked="1">
                                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;" bis_skin_checked="1">
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto mb-2 mb-md-0" bis_skin_checked="1">
                                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;" bis_skin_checked="1">
                                                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto text-right" bis_skin_checked="1">
                                                        <span class="text-muted">0</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="py-1">
                                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                                    <div class="col-auto mb-2 mb-md-0" bis_skin_checked="1">
                                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;" bis_skin_checked="1">
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto mb-2 mb-md-0" bis_skin_checked="1">
                                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;" bis_skin_checked="1">
                                                            <div class="progress-bar" role="progressbar" style="width: 1%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto text-right" bis_skin_checked="1">
                                                        <span class="text-gray-90">4</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- End Ratings -->
                                    </div>
                                    <div class="col-md-6" bis_skin_checked="1">
                                        <h3 class="font-size-18 mb-5">Add a review</h3>
                                        <!-- Form -->
                                        <form class="js-validate" novalidate="novalidate">
                                            <div class="row align-items-center mb-4" bis_skin_checked="1">
                                                <div class="col-md-4 col-lg-3" bis_skin_checked="1">
                                                    <label for="rating" class="form-label mb-0">Your Review</label>
                                                </div>
                                                <div class="col-md-8 col-lg-9" bis_skin_checked="1">
                                                    <a href="#" class="d-block">
                                                        <div class="text-warning text-ls-n2 font-size-16" bis_skin_checked="1">
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="js-form-message form-group mb-3 row" bis_skin_checked="1">
                                                <div class="col-md-4 col-lg-3" bis_skin_checked="1">
                                                    <label for="descriptionTextarea" class="form-label">Your Review</label>
                                                </div>
                                                <div class="col-md-8 col-lg-9" bis_skin_checked="1">
                                                    <textarea class="form-control" rows="3" id="descriptionTextarea" data-msg="Please enter your message." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                                                </div>
                                            </div>
                                            <div class="js-form-message form-group mb-3 row" bis_skin_checked="1">
                                                <div class="col-md-4 col-lg-3" bis_skin_checked="1">
                                                    <label for="inputName" class="form-label">Name <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-8 col-lg-9" bis_skin_checked="1">
                                                    <input type="text" class="form-control" name="name" id="inputName" aria-label="Alex Hecker" required="" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success">
                                                </div>
                                            </div>
                                            <div class="js-form-message form-group mb-3 row" bis_skin_checked="1">
                                                <div class="col-md-4 col-lg-3" bis_skin_checked="1">
                                                    <label for="emailAddress" class="form-label">Email <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-8 col-lg-9" bis_skin_checked="1">
                                                    <input type="email" class="form-control" name="emailAddress" id="emailAddress" aria-label="alexhecker@pixeel.com" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                                </div>
                                            </div>
                                            <div class="row" bis_skin_checked="1">
                                                <div class="offset-md-4 offset-lg-3 col-auto" bis_skin_checked="1">
                                                    <button type="submit" class="btn btn-primary-dark btn-wide transition-3d-hover">Add Review</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Form -->
                                    </div>
                                </div>
                                <!-- Review -->
                                <div class="border-bottom border-color-1 pb-4 mb-4" bis_skin_checked="1">
                                    <!-- Review Rating -->
                                    <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2" bis_skin_checked="1">
                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;" bis_skin_checked="1">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                    </div>
                                    <!-- End Review Rating -->

                                    <p class="text-gray-90">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p>

                                    <!-- Reviewer -->
                                    <div class="mb-2" bis_skin_checked="1">
                                        <strong>John Doe</strong>
                                        <span class="font-size-13 text-gray-23">- April 3, 2019</span>
                                    </div>
                                    <!-- End Reviewer -->
                                </div>
                                <!-- End Review -->
                                <!-- Review -->
                                
                                <!-- End Review -->
                                <!-- Review -->
                                
                                <!-- End Review -->
                            </div>
                           
                           
                        </div>
                    </div>
                    <!-- End Tab Content -->
                </div>
                <!-- End Single Product Tab -->