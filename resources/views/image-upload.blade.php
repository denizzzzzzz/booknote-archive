<!DOCTYPE html>
<html>
<head>
    <title>Upload Image for Text Recognition</title>
</head>
<body>

@if (session('recognizedText'))
    <textarea rows="10" cols="50">{{ session('recognizedText') }}</textarea>
@endif

<form action="{{ route('upload-image') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="image">Choose an image</label>
    <input type="file" name="image" id="image" required>
    <button type="submit">Upload & Recognize Text</button>
</form>

</body>
</html>
