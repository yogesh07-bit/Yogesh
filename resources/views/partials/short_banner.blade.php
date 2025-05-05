                <!-- Banner -->
                <div class="mb-5">
                    <div class="row">

                        @foreach ( $data['deals'] as $item )                        

                           <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
                            <a href="{{ $item->deal_url =='' ? 'product/'  . $item->slug .'/'. $item->product_id : $item->deal_url }}" class="d-black text-gray-90">
                                <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                                    <div class="col-6 col-xl-5 col-wd-6 pr-0">
                                        <img class="img-fluid" width="190" height="150" src="{!! asset($item->highlighted) !!}">
                                    </div>
                                    <div class="col-6 col-xl-7 col-wd-6">
                                        <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                           {!! $item->deal_content !!}
                                        </div>
                                        <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                            {!!$item->button !!}
                                            
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        @endforeach
                        
                    </div>
                </div>
                <!-- End Banner -->