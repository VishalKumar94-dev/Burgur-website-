


<?php include 'db.php'; ?>
<?php

if(isset($_POST["submit"])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    

    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "uploads/" . $img);

$alok ="INSERT INTO `pizza` ( `name`, `Description`, `price`, `image`) 
  VALUES ('$name', '$description', '$price', '$img')";

 if($conn -> query($alok) === TRUE){ 
    echo "data insert sucessfully"; 
} else { 
    echo "Error: " . $alok . "<br>" . $conn->error;
}
} 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; }
        .sidebar {
            width: 220px;
            height: 100vh;
            background-color: #343a40;
            color: white;
            padding: 20px 10px;
            position: fixed;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 15px 0;
            padding: 8px 15px;
            border-radius: 5px;
        }
        .sidebar a:hover { background-color: #495057; }
        .content {
            margin-left: 240px;
            padding: 30px;
            width: 100%;
        }
    </style>
</head>
<body class="bg-light">
<div class="sidebar">
    <h4>Admin Panel</h4>
  <a href="index.php">📦 Product List</a>
    <a href="add.php">➕ Add Product</a>
        <a href="addpizza.php">➕ Add Pizza  Product</a>
                <a href="pizza-index.php">  Pizza  Product</a>

    <a href="gallery.php">🖼️ Gallery</a>
</div>
<div class="content">
    <h2 class="mb-4">Add Product</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Price (INR)</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button  type="submit" name="submit" class="btn btn-success">Add Product</button>
    </form>
</div>
</body>
</html>
