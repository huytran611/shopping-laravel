<div>
    <div class="container">
        <div class="head-products">
        <h2>
            SẢN PHẨM MỚI
        </h2>
        </div>
        <div class="wrap-shop-control">
            <h2 class="widget-title">All Categories</h2>
						<div class="widget-content">
							<ul class="list-category">
								<li class="category-item has-child-cate">
									<a href="#" class="cate-link">Fashion & Accessories</a>
									<span class="toggle-control">+</span>
									<ul class="sub-cate">
										<li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>
									</ul>
								</li>
								<li class="category-item has-child-cate">
									<a href="#" class="cate-link">Furnitures & Home Decors</a>
									<span class="toggle-control">+</span>
									<ul class="sub-cate">
										<li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>
									</ul>
								</li>
								<li class="category-item has-child-cate">
									<a href="#" class="cate-link">Digital & Electronics</a>
									<span class="toggle-control">+</span>
									<ul class="sub-cate">
										<li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>
									</ul>
								</li>
								<li class="category-item">
									<a href="#" class="cate-link">Tools & Equipments</a>
								</li>
								<li class="category-item">
									<a href="#" class="cate-link">Kid’s Toys</a>
								</li>
								<li class="category-item">
									<a href="#" class="cate-link">Organics & Spa</a>
								</li>
							</ul>
						</div>
            <h1 class="shop-title">Filter</h1>

            <div class="wrap-right">

                <div class="sort-item orderby ">
                    <select name="orderby" class="use-chosen" wire:model="sorting">
                        <option value="default" selected="selected">Default sorting</option>
                        <option value="date">Sort by newness</option>
                        <option value="price">Sort by price: low to high</option>
                        <option value="price-desc">Sort by price: high to low</option>
                    </select>
                </div>

                <div class="sort-item product-per-page">
                    <select name="post-per-page" class="use-chosen" wire:model="pagesize">
                        <option value="12" selected="selected">12 per page</option>
                        <option value="16">16 per page</option>
                        <option value="18">18 per page</option>
                        <option value="21">21 per page</option>
                        <option value="24">24 per page</option>
                        <option value="30">30 per page</option>
                        <option value="32">32 per page</option>
                    </select>
                </div>
            </div>

        </div><!--end wrap shop control-->
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
           
        <div class="pagination">
            {{$products->links('vendor.pagination.bootstrap-5')}}
        </div>
    </div>
</div>