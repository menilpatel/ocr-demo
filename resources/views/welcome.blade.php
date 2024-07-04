<!DOCTYPE html>
<html>
<head>
    <title>OCR Demo</title>
</head>
<body>
    <h1>OCR Demo</h1>
    <h5>Upload image to get text from image</h5>
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>

    <!-- <form action="/extract-text" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="pdf" accept="application/pdf">
        <button type="submit">Extract Text</button>
    </form> -->
</body>
</html>
