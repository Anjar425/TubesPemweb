<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Regional Admins</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Regional Admins</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Administrator ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Area</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($regions as $region)
                @foreach($region->coordinates as $coordinate)
                    <tr>
                        <td>{{ $region->id }}</td>
                        <td>{{ $region->administrator_id }}</td>
                        <td>{{ $region->name }}</td>
                        <td>{{ $region->location }}</td>
                        <td>{{ $region->area }}</td>
                        <td>{{ $coordinate->latitude }}</td>
                        <td>{{ $coordinate->longitude }}</td>
                        <td>{{ $region->status }}</td>
                        <td>{{ $region->created_at }}</td>
                        <td>{{ $region->updated_at }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>
