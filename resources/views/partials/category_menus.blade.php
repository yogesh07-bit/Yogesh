            <!-- Categories Carousel -->
            <div class="border-top bg-primary border-color-8 mb-4">
                <div class="container position-relative">
                    <div class="js-slick-carousel u-slick u-slick--gutters-0 position-static overflow-hidden u-slick-overflow-visble px-1 py-3 text-lh-38"
                        data-arrows-classes="d-none d-xl-block u-slick__arrow-normal u-slick__arrow-centered--y rounded-circle text-black font-size-30 z-index-2"
                        data-arrow-left-classes="fa fa-angle-left u-slick__arrow-inner--left left-n16"
                        data-arrow-right-classes="fa fa-angle-right u-slick__arrow-inner--right right-n20"
                        data-pagi-classes="d-xl-none text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--dark u-slick__pagination--long mb-2 z-index-n1 mt-4 pt-1"
                        data-slides-show="10"
                        data-slides-scroll="1"
                        data-responsive='[{
                          "breakpoint": 1600,
                          "settings": {
                            "slidesToShow": 10
                          }
                        }, {
                            "breakpoint": 1200,
                            "settings": {
                              "slidesToShow": 6
                            }
                        }, {
                          "breakpoint": 992,
                          "settings": {
                            "slidesToShow": 5
                          }
                        }, {
                          "breakpoint": 768,
                          "settings": {
                            "slidesToShow": 3
                          }
                        }, {
                          "breakpoint": 554,
                          "settings": {
                            "slidesToShow": 2
                          }
                        }]'>


 @foreach ($data['horizontal_category_menu'] as $item)
  
    <div class="js-slide">
            <a href="../shop/product-categories-7-column-full-width.html" class="d-block text-center  width-122 mx-auto">
                <div class="text-white">
                    <i class="ec ec-art font-size-30"></i>
                </div>
                <div class="px-2 pt-2">
                    <h6 class="font-weight-semi-bold font-size-13 text-white mb-0 text-lh-1dot2">{{$item->menu_items}}</h6>
                </div>
            </a>
        </div>

@endforeach 

                        <div class="js-slide">
                            <a href="../shop/product-categories-7-column-full-width.html" class="d-block text-center  width-122 mx-auto">
                                <div class="text-white">
                                    <i class="ec ec-art font-size-30"></i>
                                </div>
                                <div class="px-2 pt-2">
                                    <h6 class="font-weight-semi-bold font-size-13 text-white mb-0 text-lh-1dot2">Art & Craft</h6>
                                </div>
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="../shop/product-categories-7-column-full-width.html" class="d-block text-center  width-122 mx-auto">
                                <div class="text-white">
                                    <i class="ec ec-acc font-size-30"></i>
                                </div>
                                <div class="px-2 pt-2">
                                    <h6 class="font-weight-semi-bold font-size-13 text-white mb-0 text-lh-1dot2">Accessories</h6>
                                </div>
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="../shop/product-categories-7-column-full-width.html" class="d-block text-center  width-122 mx-auto">
                                <div class="text-white">
                                    <i class="ec ec-book font-size-30"></i>
                                </div>
                                <div class="px-2 pt-2">
                                    <h6 class="font-weight-semi-bold font-size-13 text-white mb-0 text-lh-1dot2">Books & Files</h6>
                                </div>
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="../shop/product-categories-7-column-full-width.html" class="d-block text-center  width-122 mx-auto">
                                <div class="text-white">
                                    <i class="ec ec-ctv font-size-30"></i>
                                </div>
                                <div class="px-2 pt-2">
                                    <h6 class="font-weight-semi-bold font-size-13 text-white mb-0 text-lh-1dot2">Creativity</h6>
                                </div>
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="../shop/product-categories-7-column-full-width.html" class="d-block text-center  width-122 mx-auto">
                                <div class="text-white">
                                    <i class="ec ec-ofc font-size-30"></i>
                                </div>
                                <div class="px-2 pt-2">
                                    <h6 class="font-weight-semi-bold font-size-13 text-white mb-0 text-lh-1dot2">Office</h6>
                                </div>
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="../shop/product-categories-7-column-full-width.html" class="d-block text-center  width-122 mx-auto">
                                <div class="text-white">
                                    <i class="ec ec-prt font-size-30"></i>
                                </div>
                                <div class="px-2 pt-2">
                                    <h6 class="font-weight-semi-bold font-size-13 text-white mb-0 text-lh-1dot2">Party</h6>
                                </div>
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="../shop/product-categories-7-column-full-width.html" class="d-block text-center  width-122 mx-auto">
                                <div class="text-white">
                                    <i class="ec ec-pen font-size-30"></i>
                                </div>
                                <div class="px-2 pt-2">
                                    <h6 class="font-weight-semi-bold font-size-13 text-white mb-0 text-lh-1dot2">Pen</h6>
                                </div>
                            </a>
                        </div>
                   
                    </div>
                </div>
            </div>
            <!-- End Categories Carousel -->