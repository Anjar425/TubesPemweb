<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Regions Report</title>
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
    <h2>Regions Report</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Area</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($regions as $region)
            <tr>
                <td>{{ $region->id }}</td>
                <td>{{ $region->name }}</td>
                <td>{{ $region->location }}</td>
                <td>{{ $region->area }}</td>
                <td>{{ $region->latitude }}</td>
                <td>{{ $region->longitude }}</td>
                <td>{{ $region->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
