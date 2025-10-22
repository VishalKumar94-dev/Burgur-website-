<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Gallery</title>
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
        .gallery-img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            margin: 10px;
            border: 2px solid #ddd;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-light">

<!-- Sidebar -->
<div class="sidebar">
    <h4>Admin Panel</h4>
    <a href="index.php">📦 Product List</a>
    <a href="add.php">➕ Add Product</a>
    <a href="galary.php">🖼️ Gallery</a>
</div>

<!-- Main Content -->
<div class="content">
    <h2 class="mb-4">Gallery</h2>
    <div class="row">
        <?php
   $result = $conn->query("SELECT * FROM galary ORDER BY id DESC");

        while ($row = $result->fetch_assoc()):
        ?>
        <div class="col-md-3">
            <img src="uploads/<?= $row['photo']; ?>" class="gallery-img">
        </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>
