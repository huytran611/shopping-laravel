<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update Profile
                </div>
                <div class="panel-body">
                    <form>
                        <div class="col-md-4">
                            @if ($newimage)
                                <img src="{{$newimage->temporaryUrl()}}" width="100px">
                            @elseif($image)
                                <img src="{{asset('assets/images/profile')}}/{{$user->profile->image}}" width="100px">
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
