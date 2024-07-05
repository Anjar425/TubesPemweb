<!DOCTYPE html>
<html>
<head>
    <title>Plant Regions PDF</title>
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
    <h2>Plant Regions List</h2>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Region</th>
                <th>Plant</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plantRegions as $plantRegion)
                <tr>
                    <td>{{ $plantRegion->id }}</td>
                    <td>{{ $plantRegion->region->name }}</td>
                    <td>{{ $plantRegion->plant->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
