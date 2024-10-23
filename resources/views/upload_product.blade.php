<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Products</title>
</head>

<body>
    <h1>Upload Products CSV</h1>

    @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form action="{{ route('product.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Upload CSV file:</label>
        <input type="file" name="file" id="file" required>
        <br><br>
        <button type="submit">Upload Products</button>
    </form>
</body>

</html>
