<form action="/register" method="post">
    @csrf

    <input type="text" name="user_name" id="user_name" placeholder="Name" value="{{old('user_name')}}">
    <input type="text" name="user_uname" id="user_uname" placeholder="Username" value="{{old('user_uname')}}">
    <input type="password" name="user_password" id="user_password" placeholder="Password" value="{{old('user_password')}}">
    <select name="user_type" id="user_type">
            <option value="admin">Admin</option>
            <option value="seller">Seller</option>
    </select>

    <button>Register</button>
</form>
