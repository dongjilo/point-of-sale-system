<form action="/users" method="post">
    @csrf

    <input type="text" name="user_name" id="user_name" placeholder="Name" value="{{old('user_name')}}">
    <input type="text" name="user_uname" id="user_uname" placeholder="Username" value="{{old('user_uname')}}">
    <input type="password" name="user_password" id="user_password" placeholder="Password" value="{{old('user_password')}}">
    <select name="user_type" id="user_type">
            <option value="0">Admin</option>
            <option value="1">User</option>
    </select>

    <button>Register</button>
</form>
