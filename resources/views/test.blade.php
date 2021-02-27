<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/debug" method="POST"> 
        @csrf
        <input type="text" name="array[]">
        <input type="text" name="array[specific]">
        <input type="text" name="array[]">
        <button type="submit">Submit</button>
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Item Code</th>
            <th>Item Name</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['product_name'] }}</td>
                <td>{{ json_encode($product['materials']) }}</td>
            </tr>
        @endforeach
    </table>
    @if (isset($materials))
        {{ var_dump($materials) }}
    @endif
</body>
</html>