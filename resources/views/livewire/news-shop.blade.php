<div>
    <div class="container">
        <div class="head-products">
        <h2>
            SẢN PHẨM MỚI
        </h2>
        </div>
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