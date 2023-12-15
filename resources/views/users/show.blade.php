<x-layout>
    <p>User ID: {{$user->user_id}}</p>
    <p>First Name: {{$user->user_fname}}</p>
    <p>Last Name: {{$user->user_lname}}</p>
    <p>Username: {{$user->user_uname}}</p>
    <p>Password: {{$user->user_password}}</p>
    <p>User Type: {{$user->userType->type_name}}</p>
</x-layout>
