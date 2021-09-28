<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>List users</h2>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Password</td>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->password }}</td>
                <td>
                    <a href="/update-account/{{ $user->id }}">Update</a> <br> 
                    <a href="/delete-account/{{ $user->id }}">Delete</a>
                    
                <td>
            </tr>
        @endforeach
    </table>
</body>
</html>