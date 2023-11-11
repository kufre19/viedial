<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lions Club Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .my-table-bg {
            background-color: #f8f9fa; /* Light grey background */
            border-radius: 5px;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="my-table-bg">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Whatsapp Phone</th>
                    <th scope="col">Club Branch</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->wa_phone }}</td>
                        <td>Abuja Emerald</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }} <!-- Pagination Links -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
