<!DOCTYPE html>
<html>
<head>
    <title>OCR Demo</title>
</head>
<body>
    <h1>OCR Demo</h1>
    <p>Upload image to get text from image</p>
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
