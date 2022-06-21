<div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Profile
                </div>
                <div class="panel-body">
                    <div class="col-md-4">
                        @if ($user->profile->image)
                            <img src="{{asset('assets/images/profile')}}/{{$user->profile->image}}" width="100px">
                        @else
                            <img src="{{asset('assets/images/profile/avatar.png')}}" width="100%">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <p><b>Tên: </b>{{$user->name}}</p>
                        <p><b>Email: </b>{{$user->email}}</p>
                        <p><b>Số điện thoại: </b>{{$user->profile->mobile}}</p>
                        <hr>
                        <p><b>Địa chỉ: </b>{{$user->profile->line1}}</p>
                        <p><b>Địa chỉ 2: </b>{{$user->profile->line2}}</p>
                        <p><b>Thành phố: </b>{{$user->profile->city}}</p>
                        <p><b>Quốc tịch: </b>{{$user->profile->country}}</p>
                        <p><b>Zipcode: </b>{{$user->profile->zipcode}}</p>
                        <a href="{{route('user.editprofile')}}" class="btn btn-info pull-right">Update Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
