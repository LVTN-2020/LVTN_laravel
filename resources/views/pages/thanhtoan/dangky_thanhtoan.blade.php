<div class="col-sm-4">
    <div class="signup-form"><!--sign up form-->
        <h2>Đăng ký mới</h2>
        <form action="{{URL::to('/get-dangky')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Họ và tên" value="{{old('name')}}"/>
            <input type="text" name="email" placeholder="Email" value="{{old('email')}}"/>
            <input type="text" name="address" placeholder="Địa chỉ thường trú " value="{{old('address')}}"/>
            <input type="password" name="password" placeholder="Mật khẩu" value="{{old('password')}}"/>
            <input type="text" name="phone" placeholder="Số điện thoại" value="{{old('phone')}}"/>
            <input type="hidden" name="level" value="1"/>
            <button type="submit" class="btn btn-default">Đăng ký</button>
        </form>
    </div><!--/sign up form-->
</div>