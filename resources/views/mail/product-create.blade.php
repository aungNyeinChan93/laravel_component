<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Create Mail</title>
</head>
<body>
    <a href="{{route('products.show',$product->id)}}">Product Created ({{$product->title}})</a>
</body>
</html>
