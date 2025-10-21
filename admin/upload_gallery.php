<?php include 'db.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "uploads/" . $img);
    $conn->query("INSERT INTO gallery (image) VALUES ('$img')");
    header("Location: gallery.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Upload to Gallery</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Select Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button class="btn btn-success">Upload</button>
    </form>
</div>
</body>
</html>
