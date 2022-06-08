<div style="font-size:16px">
    <div >
        <div>
            <h1 style="font-style:italic; text-align:center">ABOUT US</h1>
            <div>

                <div>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <div class="right-info">
                        <b>Email</b>
                        <p>{{$setting->email}}</p>
                    </div>
                    
                </div>
                <br>
                <div>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <div class="right-info">
                        <b>Phone</b>
                        <p>{{$setting->phone}}</p>
                    </div>
                </div>
                <br>
                <b>Social Network</b>
                <div style="font-size: 25px">
                    <a href="{{$setting->facebook}}" class="link-to-item" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="{{$setting->youtube}}" class="link-to-item" title="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                    <a href="{{$setting->instagram}}" class="link-to-item" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="{{$setting->twitter}}" class="link-to-item" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </div>
                <br>
                <div>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <div class="right-info">
                        <b>Địa chỉ</b>
                        <p>{{$setting->address}}</p>
                    </div>
                </div>

                <br>
                <div>
                    <div class="mercado-google-maps">
                        <iframe src="{{$setting->map}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
