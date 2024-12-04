<!DOCTYPE html>
<html>
<head>
    <title>Cart Email</title>
</head>
<body>
    <h1>Hello, {{ $name }}</h1>
    <p>Here are the items in your cart:</p>
    <ul>
        @foreach ($cart as $item)
            <li>
                ProductId: {{$item->product_id}} - quantity: {{$item->quantity}} - title: {{$products[0]->title}}
            </li>
        @endforeach
    </ul>
</body>
</html>
