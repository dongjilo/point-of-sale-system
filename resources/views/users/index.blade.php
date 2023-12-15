<x-layout>
    <table>
        <thead>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>User Type</th>
            <th>Action</th>
        </thead>

            @foreach ($users as $user)
                <tr>
                    <td>{{$user->user_id}}</td>
                    <td>{{$user->user_fname}}</td>
                    <td>{{$user->user_lname}}</td>
                    <td>{{$user->user_uname}}</td>
                    <td>{{$user->user_password}}</td>
                    <td>{{$user->userType->type_name}}</td>
                    <td><a href="/users/{{$user->user_id}}"><button>View</button></a></td>
                    <td><a href="/users/edit/{{$user->user_id}}"><button>Edit</button></a></td>
                    <td>
                        <form action="/users/{{$user->user_id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
    </table>
</x-layout>
