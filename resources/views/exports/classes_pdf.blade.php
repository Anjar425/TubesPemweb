<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes PDF</title>
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
    <h1>Plant Classes</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Regional Admin ID</th>
                <th>Class Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
                <tr>
                    <td>{{ $class->id }}</td>
                    <td>{{ $class->regional_admins_id }}</td>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->created_at }}</td>
                    <td>{{ $class->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
