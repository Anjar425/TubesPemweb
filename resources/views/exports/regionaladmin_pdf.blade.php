<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Regional Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #c9e2b3; 
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid black;
        }
        th {
            background-color: #006100;
            color: white;
        }
        h2 {
            text-align: center;
            color: #006100;
        }
    </style>
</head>
<body>
    <h2>Data Regional Admin</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Region</th>
            </tr>
        </thead>
        <tbody>
            @foreach($regionalAdmins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->visible_password }}</td>
                <td>{{ $admin->region_id }} : {{ $admin->region->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
