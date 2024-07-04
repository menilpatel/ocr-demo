<!DOCTYPE html>
<html>
<head>
    <title>Upload PDF for OCR</title>
</head>
<body>
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
