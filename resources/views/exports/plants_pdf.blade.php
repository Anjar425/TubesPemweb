<!DOCTYPE html>
<html>
<head>
    <title>Plants PDF</title>
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
    <h2>Plants List</h2>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Leaf Width</th>
                <th>Image</th>
                <th>Class</th>
                <th>Type</th>
                <th>Height</th>
                <th>Diameter</th>
                <th>Leaf Color</th>
                <th>Watering Frequency</th>
                <th>Light Intensity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plants as $plant)
                <tr>
                    <td>{{ $plant->id }}</td>
                    <td>{{ $plant->name }}</td>
                    <td>{{ $plant->leaf_width }}</td>
                    <td><img src="{{ public_path($plant->image) }}" width="50"></td>
                    <td>{{ $plant->plantClass->name }}</td>
                    <td>{{ $plant->type }}</td>
                    <td>{{ $plant->height }}</td>
                    <td>{{ $plant->diameter }}</td>
                    <td>{{ $plant->leaf_color }}</td>
                    <td>{{ $plant->watering_frequency }}</td>
                    <td>{{ $plant->light_intensity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
