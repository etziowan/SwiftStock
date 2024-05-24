<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Sub Categories</title>
</head>
<body>
    <h1>Stock Sub Categories</h1>
    <ul>
        @foreach($subCategories as $subCategory)
            <li>{{ $subCategory->name }}</li>
        @endforeach
    </ul>
</body>
</html>
