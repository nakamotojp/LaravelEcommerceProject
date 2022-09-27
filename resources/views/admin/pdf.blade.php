<html lang="ja">
    <head>
        <title>pdf output test</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            @font-face{
                font-family: migmix;
                font-style: normal;
                font-weight: normal;
                src: url("{{ storage_path('fonts/migmix-2p-regular.ttf')}}") format('truetype');
            }
            @font-face{
                font-family: migmix;
                font-style: bold;
                font-weight: bold;
                src: url("{{ storage_path('fonts/migmix-2p-bold.ttf')}}") format('truetype');
            }
        </style>
    </head>
<body>
    <h2>Order Details PDF</h2>
    <h3>{{$order->name}}</h3>
    <h3>{{$order->email}}</h3>
    <h3>{{$order->phone}}</h3>
    <h3>{{$order->address}}</h3>
    <h3>{{$order->user_id}}</h3>
    <h3>{{$order->product_title}}</h3>
    <h3>{{$order->price}}</h3>
    <h3>{{$order->quantity}}</h3>
    <h3>{{$order->payment_status}}</h3>
    <h3>{{$order->delivery_status}}</h3>
    <h3>{{$order->procuct_id}}</h3>
    <img src="product/{{$order->image}}" width="200">


</body>
</html>