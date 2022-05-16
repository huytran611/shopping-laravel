<div class="wrap-search-form center-section">
    <div class="wrap-search-form">
        <form action="{{route('product.search')}}" id="form-search-top" name="form-search-top">
            <input type="text"  name="search" value="{{$search}}" placeholder="Search here...">
            <img src="{{asset('assets/images/search-icon.png')}}" width="30px" height="30px" style="margin-top:8px;" alt="">
        </form>
    </div>
</div>