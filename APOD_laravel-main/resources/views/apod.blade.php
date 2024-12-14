<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASA APOD</title>
</head>

<body>
    <h1>{{ $apod['title'] }}</h1>
    <p>Date: {{ $apod['date'] }}</p>
    <img src="{{ $apod['url'] }}" alt="{{ $apod['title'] }}">
    <p>{{ $apod['explanation'] }}</p>
</body>

</html>
