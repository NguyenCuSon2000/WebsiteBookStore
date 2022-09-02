<div class="search-box-overlay">
        <a><i class="fas fa-times cross-sign" id="close-window"></i></a>
        
        <div class="container">
            <div class="row">
                <div class="col-12 search-col">
                    <form action="/search" method="get">
                    @csrf
                        <div class="input-group search-box-form">
                            <input type="text" name="txtSearch" class="form-control" placeholder="Search Here" aria-label="Search Here">
                            <div class="input-group-prepend">
                                <button class="input-group-text" type="submit" id="basic-addon1"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="search-listing row">
                    <div class="col-12 mb-4">
                        <h4 class="">Các sản phẩm đã chọn</h4>
                    </div>
                    <div class="col-12">
                        <div class="listing-search-scroll">
                            @foreach($search_product as $product)
                                <div class="media row">
                                    <div class="img-holder ml-1 mr-2 col-4">
                                        <a href="javascript:void(0)"><img src="{{asset('/storage/img'.'/'.$product->Picture)}}" class="align-self-center" alt="cartitem"></a>
                                    </div>
                                    <div class="media-body mt-auto mb-auto col-8">
                                        <h5 class="name"><a href="javascript:void(0)">{{ $product->ProductName }}</a></h5>
                                        <p class="category"> {{ $product->category->CategoryName }}</p>
                                        <a class="btn black-sm-btn" href="{{ route('addcart', ['id' => $product->id]) }}"><i class="fas fa-shopping-bag"></i></a>
                                        <a class="btn black-sm-btn" href="{{ route('product_detail').'/'.$product->id }}"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <hr>
                </div>
                
                <div class="col-12">
                    <h4 class="outlet-title text-center"> - Tác giả - </h4>
                </div>
                
                <div class="col-12">
                    <div class="search-box-meida-items owl-carousel owl-theme">
                        
                        <!-- <div class="item">
                            <div class="brand-search-box ml-auto mr-auto">
                                <div class="media">
                                    <div class="brand-box-holder">
                                        <a href="javascript:void(0)"> <img class="mr-3" src="{{ asset('img/author5.jpg') }}" alt="Generic placeholder image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mt-0"><a href="javascript:void(0)"> Nguyễn Nhật Ánh</a></h5>
                                        <p> Cras sit amet nibh libero.</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="item">
                            <div class="brand-search-box ml-auto mr-auto">
                                <div class="media">
                                    <div class="brand-box-holder">
                                        <a href="javascript:void(0)"> <img class="mr-3" src="{{ asset('img/author6.jpg') }}" alt="Generic placeholder image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mt-0"><a href="javascript:void(0)">Trần Đăng Khoa</a></h5>
                                        <p> Cras sit amet nibh libero.</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="item">
                            <div class="brand-search-box ml-auto mr-auto">
                                <div class="media">
                                    <div class="brand-box-holder">
                                        <a href="javascript:void(0)"> <img class="mr-3" src="{{ asset('img/author7.jpg') }}" alt="Generic placeholder image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mt-0"><a href="javascript:void(0)">Nhà thơ Nguyễn Khoa Điềm</a></h5>
                                        <p> Cras sit amet nibh libero.</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="item">
                            <div class="brand-search-box ml-auto mr-auto">
                                <div class="media">
                                    <div class="brand-box-holder">
                                        <a href="javascript:void(0)"><img class="mr-3" src="{{ asset('img/author8.jpg') }}" alt="Generic placeholder image"></a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mt-0"><a href="javascript:void(0)">Nhà thơ Tô Hoài</a></h5>
                                        <p> Cras sit amet nibh libero.</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div> -->
                        
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>