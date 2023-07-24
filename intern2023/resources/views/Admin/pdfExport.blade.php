<!DOCTYPE html>
<html>
<head>
    <title>Guest List</title>
    
</head>
<body>
    <h1>Guest List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>