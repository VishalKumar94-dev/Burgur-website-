<?php include 'db.php';

$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['pname'];
    $desc = $_POST['Description'];
    $price = $_POST['price'];

    if (!empty($_FILES['image']['name'])) {
        $img = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$img");
        $conn->query("UPDATE products SET name='$name', Description='$desc', price='$price', image='$img' WHERE id=$id");
    } else {
        $conn->query("UPDATE products SET name='$name', Description='$desc', price='$price' WHERE id=$id");
    }
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Edit Product</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="pname" class="form-control" value="<?= $product['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="Description" class="form-control" required><?= $product['Description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Price (INR)</label>
            <input type="number" step="0.01" name="price" class="form-control" value="<?= $product['price'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Current Image:</label><br>
            <img src="uploads/<?= $product['image'] ?>" width="100"><br><br>
            <label>Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button class="btn btn-primary">Update Product</button>
    </form>
</div>
</body>
</html>

