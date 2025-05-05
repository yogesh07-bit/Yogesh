                <!-- Full banner -->
                <div class="mb-6 js-slick-carousel u-slick" data-infinit="true" data-autoplay="true">
                     @foreach ($data['offer_slider'] as $item)
                      <a href="{{$item->banner_link}}" class="js-slide d-block text-gray-90">
                        <div class="" style="background-image: url({{ $item->banner_image}}); height: 400px; background-size:cover ;">
                            
                        </div>
                    </a>
                     @endforeach

                    
                </div>
                <!-- End Full banner -->