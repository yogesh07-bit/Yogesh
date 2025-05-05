                @if(!empty($item->products))
                    @foreach ($item->products as $product)
                       
                        <li class="col-6 col-wd-3 col-md-4 product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-xl-4 p-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2">
                                            <a href="#" class="font-size-12 text-gray-5">
                                                {{ $product->category->category_name ?? 'No Category' }}
                                            </a>
                                        </div>
                                        <h5 class="mb-1 product-item__title">
                                            <a href="#" class="text-violet1 font-weight-bold">
                                                {{ $product->product_title }}
                                            </a>
                                        </h5>
                                        <div class="mb-2">
                                            <a href="#" class="d-block text-center">
                                                <img class="img-fluid" src="{{asset( $product->images->highlighted)}}" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">₹{{ number_format($product->mrp, 2) }}</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="#" class="btn-add-cart btn-primary transition-3d-hover">
                                                    <i class="ec ec-add-to-cart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item__footer">
                                        <div class="border-top pt-2 flex-center-between flex-wrap">                                           
                                            <a href="#" class="text-gray-6 font-size-13">
                                                <i class="ec ec-favorites mr-1 font-size-15"></i> Add to Wishlist
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <li class="col-12">
                        <p>No products available for this section.</p>
                    </li>
                @endif
       

