<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .invoice {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="invoice">
        <h3>Customer name: {{ $data->name }}</h3>
        <h3>Phone: {{ $data->phone }}</h3>
        <h3>Product title: {{ $data->product->title }}</h3>
        <h2>Price: {{ $data->product->price }}</h2>
        <img height="250" width="300" src="products/{{ $data->product->image }}">
    </div>
</body>

</html>
