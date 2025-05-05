            <!-- Slider Section -->
            <div class="bg-primary slider-bg">
                <div class="containers min-height-420 overflow-hidden">
                    <div class="js-slick-carousel u-slick"
                        data-pagi-classes="text-center d-xl-none right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--dark u-slick__pagination--long justify-content-start mt-4 mb-4 mt-md-5 mb-md-4 offset-xl-3 pl-2 pb-1 ml-2" data-autoplay="true">                         

                        @foreach ($data['main_slider'] as $item)
                          
                                @if ($item->banner_template!=='')
                                    
             @include('partials.banner.'.$item->banner_template, ['item' => $item])                                     
                                
                                @else 

                                 <div class="js-slide bg-img-hero-center">  

                                    <a href="">
                                        <img src="{{ $item->banner_image }}">
                                    </a> 
                                </div>
                                
                                @endif                           
                            
                        @endforeach                                   
                    </div>
                </div>
            </div>
            <!-- End Slider Section -->

