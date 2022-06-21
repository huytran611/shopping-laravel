<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update Profile
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif  
                    <form wire:submit.prevent="updateProfile">
                        <div class="col-md-4">
                            @if ($newimage)
                                <img src="{{$newimage->temporaryUrl()}}" width="100px">
                            @elseif($image)
                                <img src="{{asset('assets/images/profile')}}/{{$image}}" width="100px">
                            @else
                                <img src="{{asset('assets/images/profile/avatar.png')}}" width="100%">
                            @endif
                            <input type="file" class="form-control" wire:model="newimage">
                        </div>
                        <div class="col-md-8">
                            <p><b>Tên: </b><input type="text" class="form-control" wire:model="name"></p>
                            <p><b>Email: </b>{{$email}}</p>
                            <p><b>Số điện thoại: </b><input type="text" class="form-control" wire:model="mobile"></p>
                            <hr>
                            <p><b>Địa chỉ: </b><input type="text" class="form-control" wire:model="line1"></p>
                            <p><b>Địa chỉ 2: </b><input type="text" class="form-control" wire:model="line2"></p>
                            <p><b>Thành phố: </b><input type="text" class="form-control" wire:model="city"></p>
                            <p><b>Quốc gia: </b><input type="text" class="form-control" wire:model = "country"></p>
                            <p><b>Zipcode: </b><input type="text" class="form-control" wire:model = "zipcode"></p>
                            <button type="submit" class="btn btn-info pull-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
