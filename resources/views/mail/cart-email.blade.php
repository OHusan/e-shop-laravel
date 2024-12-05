<!DOCTYPE html>
<html>

<head>
    <title>Cart Email</title>

    <style>
        body {
            padding: 20px 36px;
        }
        table {
            width: 100%;
            font-size: 14px;
            text-align: left;
            color: black
        }

        table thead {
            font-size: 12px;
            color: black;
            text-transform: uppercase;
            background-color: gray;
        }

        table thead tr th {
            padding: 12px 24px;
            color: black;
        }

        table tbody tr {
            border-bottom: 1px solid black;
        }

        table tbody tr td {
            padding: 16px 24px;
            font-weight: 600;
            color: black;
        }

        .shipping p {
            font-size: 14px;
            padding: 4px;
        }
    </style>
</head>

@php
    $productIds = array_column($cart, 'product_id');
@endphp

<body>
    <h1>Hello, {{ $name }}</h1>
    <p>Here are the items in your cart:</p>

    <table>
        <thead>
            <tr>
                <th scope="col">
                    Product
                </th>
                <th scope="col">
                    Qty
                </th>
                <th scope="col">
                    Price
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    @php
                        if (in_array($item->id, $productIds)) {
                            $cartItem = current(array_filter($cart, fn($it) => $it->product_id == $item->id));
                        }
                    @endphp
                    <td>{{ $cartItem->quantity }}</td>
                    <td>${{ $item->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Price summarized: ${{ $total }}</p>

    <hr>
    <div class="shipping">
        <p>User name: {{$name}}</p>
        <p>State: {{$address->state}}</p>
        <p>City: {{$address->city}}</p>
        <p>Shipping address: {{ $address->address1}}</p>
        <p>Zip code: {{$address->zipcode}}</p>
    </div>
    <hr>
</body>

</html>
