

<!-- Products-4-1-4 -->
<div class="products-group-4-1-4 space-1 bg-gray-7">
                <h2 class="sr-only">Products Grid</h2>
                <div class="container">
                    <!-- Nav Classic -->
                    <div class="position-relative text-center z-index-2 mb-3">
                        <ul class="nav nav-classic nav-tab nav-tab-sm px-md-3 justify-content-start justify-content-lg-center flex-nowrap flex-lg-wrap overflow-auto overflow-lg-visble border-md-down-bottom-0 pb-1 pb-lg-0 mb-n1 mb-lg-0" id="pills-tab-1" role="tablist">

                            @foreach ($data['center_section'] as $item)
                            

                               <li class="nav-item flex-shrink-0 flex-lg-shrink-1">
                                <a class="nav-link  
                                @if ($loop->iteration == 1) active @endif 
                                " 
                                id="section_{{$item->id}}-tab" data-toggle="pill" href="#section_{{$item->id}}" role="tab" aria-controls="section_{{$item->id}}" aria-selected="true">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                         {{$item->section_title}}
                                    </div>
                                </a>
                            </li>

                            @endforeach 

                        
                            
                        </ul>
                    </div>
                    <!-- End Nav Classic -->

                    <!-- Tab Content -->
                    <div class="tab-content" id="Tpills-tabContent">

                         @foreach ($data['center_section'] as $item)

                        <div class="tab-pane fade pt-2 
                        @if ($loop->iteration == 1) active show @endif 
                         " id="section_{{$item->id}}" role="tabpanel" aria-labelledby="section_{{$item->id}}-tab">
                            <div class="row no-gutters">
                                <div class="col-md-3 col-wd-4 d-md-flex d-wd-block">

                                    <!-- left list -->
                                    <ul class="row list-unstyled products-group no-gutters mb-0 flex-xl-column flex-wd-row">
                                    @foreach ($item->products as $product)


                                        @if ($loop->iteration < 5)

                                        <li class="col-xl-6 product-item max-width-xl-100 remove-divider">
                                            <div class="product-item__outer h-100 w-100 prodcut-box-shadow">
                                                <div class="product-item__inner bg-white p-3">
                                                    <div class="product-item__body pb-xl-2">
                                                        <div class="mb-2"><a href="{{ $product->id }}" class="font-size-12 text-gray-5">
                                    
                                     
                                                        </a></div>
                                                        <h5 class="mb-1 product-item__title"><a href="{{ $product->id }}" class="text-violet1 font-weight-bold"> {{ $product->product_title }}</a></h5>
                                                        <div class="mb-2">
                                                            <a href="{{ $product->id }}" class="d-block text-center"><img class="img-fluid" src="{{ asset($product->images->highlighted) }}" alt="Image Description"></a>
                                                        </div>
                                                        <div class="flex-center-between mb-1">
                                                            <div class="prodcut-price">
                                                                <div class="text-gray-100">₹{{ $product->mrp }}</div>
                                                            </div>
                                                            <div class="d-xl-block prodcut-add-cart">
                                                                <a href="{{ $product->id }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">                    
                                                            <a href="{{ $product->id }}" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Add to Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endif
                                    @endforeach
                                        
                                    </ul>
                                    <!-- end left list -->

                                </div>
                                <div class="col-md-6 col-wd-4 products-group-1">
                                    <!-- featured item -->
                                    <ul class="row list-unstyled products-group no-gutters bg-white h-100 mb-0">
                                        @foreach ($item->products as $product)
                                        @if ($loop->iteration == 5)
                                        <li class="col product-item remove-divider">
                                            <div class="product-item__outer h-100 w-100 prodcut-box-shadow">
                                                <div class="product-item__inner bg-white p-3">
                                                    <div class="product-item__body d-flex flex-column">
                                                        <div class="mb-1">
                                                            <div class="mb-2"><a href="{{ $product->id }}" class="font-size-12 text-gray-5">{{ $product->category->category_name }}</a></div>
                                                            <h5 class="mb-0 product-item__title"><a href="{{ $product->id }}" class="text-violet1 font-weight-bold">{{ $product->product_title }}</a></h5>
                                                        </div>
                                              
                                                       
                                                        <div class="mb-1 min-height-4-1-4">
                                                            <a href="#" class="d-block text-center my-4 mt-lg-6 mb-lg-5 mt-xl-0 mb-xl-0 mt-wd-6 mb-wd-5"><img width="564" height="520" class="img-fluid" src="{{ asset($product->images->highlighted) }}" alt="Image Description"></a>



                    @if ($product->images->file_url)

                                            @php
                                                $gallery_images = explode(',', $product->images->file_url);
                                            @endphp



                                                            <!-- Gallery -->
                                                            <div class="row mx-gutters-2 mb-3">

                                                 @foreach ($gallery_images as $gm)
                                                 <div class="col-auto">
                                                                    <!-- Gallery -->
                                                                    <a class="js-fancybox max-width-60 u-media-viewer" href="javascript:;" data-src="{{$gm}}" data-fancybox="fancyboxGallery6" data-caption="Electro in frames - image #01" data-speed="700" data-is-infinite="true">
                                                                        <img class="img-fluid border" src="{{asset($gm)}}" alt="Image Description">

                                                                        <span class="u-media-viewer__container">
                                                                            <span class="u-media-viewer__icon">
                                                                                <span class="fas fa-plus u-media-viewer__icon-inner"></span>
                                                                            </span>
                                                                        </span>
                                                                    </a>
                                                                    <!-- End Gallery -->
                                                                </div>
                                               @endforeach 
                                                                                                                            

                                                               
                                            <div class="col"></div>
                                                            </div>
                                                            <!-- End Gallery -->
                                                        </div>
 @endif
                                                        <div class="flex-center-between">
                                                            <div class="prodcut-price">
                                                                <div class="text-gray-100">₹{{ $product->mrp }}</div>
                                                            </div>
                                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                                <a href="{{ $product->id }}" class="btn-add-cart btn-add-cart__wide btn-primary transition-3d-hover"><i class="ec ec-add-to-cart mr-2"></i> Add to Cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            
                                                            <a href="{{ $product->id }}" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Add to Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach

                                    </ul>
                                    <!-- end featured item -->
                                </div>
                                <div class="col-md-3 col-wd-4 d-md-flex d-wd-block">
                                    <!-- right list -->
                                    <ul class="row list-unstyled products-group no-gutters mb-0 flex-xl-column flex-wd-row">
                                        @foreach ($item->products as $product)


                                         @if ($loop->iteration > 5 && $loop->iteration < 9)

                                        <li class="col-xl-6 product-item max-width-xl-100 remove-divider">
                                            <div class="product-item__outer h-100 w-100 prodcut-box-shadow">
                                                <div class="product-item__inner bg-white p-3">
                                                    <div class="product-item__body pb-xl-2">
                                                        <div class="mb-2"><a href="{{ $product->id }}" class="font-size-12 text-gray-5">
                                    {{ $product->category->category_name }}
                                                        </a></div>
                                                        <h5 class="mb-1 product-item__title"><a href="{{ $product->id }}" class="text-violet1 font-weight-bold"> {{ $product->product_title }}</a></h5>
                                                        <div class="mb-2">
                                                            <a href="{{ $product->id }}" class="d-block text-center"><img class="img-fluid" src="{{ asset($product->images->highlighted) }}" alt="Image Description"></a>
                                                        </div>
                                                        <div class="flex-center-between mb-1">
                                                            <div class="prodcut-price">
                                                                <div class="text-gray-100">₹{{ $product->mrp }}</div>
                                                            </div>
                                                            <div class="d-xl-block prodcut-add-cart">
                                                                <a href="{{ $product->id }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">                    
                                                            <a href="{{ $product->id }}" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Add to Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        @endif

                                    @endforeach
                                        
                                    </ul>
                                    <!-- end right list -->
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                        
                    </div>
                    <!-- End Tab Content -->
                </div>

              
            </div>

<!-- End Products-4-1-4 -->            