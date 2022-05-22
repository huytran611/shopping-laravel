<div>
    <div class="search-form">
        <form action="{{route('product.search')}}" id="form-search-top" name="form-search-top">
            <img src="{{asset('assets/images/search-icon.png')}}" width="30px" height="30px" style="margin-top:8px;" alt="" onclick="myFunction()" class="dropbtn">
            <div id="myDropdown" class="dropdown-content">
                <input type="text"  name="search" value="{{$search}}" placeholder="Search here...">
                <button type="submit">Tìm kiếm</button>
            </div>
            
        </form>
    </div>
    
</div>