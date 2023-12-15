<x-layout>
    <form action="/users/{{$user->user_id}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="user_fname" id="user_fname" placeholder="First name" value="{{$user->user_fname}}">
        <input type="text" name="user_lname" id="user_lname" placeholder="Last name" value="{{$user->user_lname}}">
        <input type="text" name="user_uname" id="user_uname" placeholder="Username" value="{{$user->user_uname}}">
        <input type="password" name="user_password" id="user_password" placeholder="Password" value="{{$user->user_password}}">
        <select name="type_id" id="type_id">
            <option value="{{$user->type_id}}">{{$user->userType->type_name}}</option>
            @foreach(\App\Models\UserType::all()->where('type_id', '<>', $user->type_id) as $userType)
                <option value="{{$userType->type_id}}">{{$userType->type_name}}</option>
            @endforeach
        </select>

        <button type="submit">Update</button>
    </form>

</x-layout>
