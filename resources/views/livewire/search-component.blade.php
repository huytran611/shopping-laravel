<div>
    <div class="container">
        <div class="head-products">
        <h2>
            SẢN PHẨM MỚI
        </h2>
        </div>
        <div class="wrap-shop-control">
						<div>
							<label for="menu-toggle">Thể loại</label>
                            <input type="checkbox" id="menu-toggle"/>
                            <ul id="menu">
                                @foreach ($categories as $category)
                                <li><a href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                            
						</div>
            <h1 class="shop-title">Sắp xếp</h1>
            <h1 class="shop-title" style="margin-left:1030px">Hiển thị</h1>

            <div class="wrap-right">

                <div class="sort-item orderby ">
                    <select name="orderby" class="use-chosen" wire:model="sorting">
                        <option value="default" selected="selected">Sắp xếp mặc định</option>
                        <option value="date">Sắp xếp theo đồ mới nhất</option>
                        <option value="price">Sắp xếp theo giá: từ thấp -> cao</option>
                        <option value="price-desc">Sắp xếp theo giá: từ cao -> thấp</option>
                    </select>
                </div>

                <div class="sort-item product-per-page">
                    <select name="post-per-page" class="use-chosen" wire:model="pagesize">
                        <option value="12" selected="selected">12 sản phẩm</option>
                        <option value="16">16 sản phẩm</option>
                        <option value="18">18 sản phẩm</option>
                        <option value="21">21 sản phẩm</option>
                        <option value="24">24 sản phẩm</option>
                        <option value="30">30 sản phẩm</option>
                        <option value="32">32 sản phẩm</option>
                    </select>
                </div>
            </div>
        </div><!--end wrap shop control-->
        @if($products->count() > 0)
        <div class="row">
            @foreach ($products as $product)
            <div class="">
                <div class="product-card">
                    <div class="product-image">
                        {{--<span class="discount-tag"></span>--}}
                        <a href="{{route('product.details',['slug'=>$product->slug])}}">
                            <img src="{{asset('assets/images')}}/{{$product->image}}" style="height: 400px;" alt="{{$product->name}}">
                        </a>
                        <div>
                            <button class="card-btn" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Thêm vào giỏ</button> 
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="{{route('product.details',['slug'=>$product->slug])}}">
                            <h5 class="product-brand">{{$product->name}}</h5>
                        </a>
                        <p class="product-short-description">{{$product->short_description}}</p>
                        <div class="price">
                            <h5>
                                {{$product->regular_price}}</span><span class="actual-price">{{$product->sale_price}}</span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else 
            <p>Không tồn tại sản phẩm</p>
        @endif
        <div class="pagination">
            {{$products->links('vendor.pagination.bootstrap-5')}}
        </div>
    </div>
</div>