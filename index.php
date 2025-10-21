<?php
include "db.php";

if (isset($_POST['submit'])) {
  $name = $_POST['fname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $message = $_POST['msg'];

  $sql = "INSERT INTO `food_order` (`name`, `email`, `number`, `date`, `time`, `message`) 
          VALUES ('$name', '$email', '$phone', '$date', '$time', '$message')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data inserted successfully!');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Butazzo Pizza</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Topbar -->
  <div class="topbar">
    <div class="top-left">
      📍 1010 MARKET STREET, San Francisco, California, 91107
    </div>
    <div class="top-right">
      | 📞 415 456 7800 | ⏰ 11:00 am - 10:00 pm daily
    </div>
    <div class="search-box">
      <input type="text" placeholder="Search anything">
      <button>🔍</button>
    </div>
  </div>

  <!-- Navbar -->
  <nav>
    <div class="logo">
      <h2>🍕 Butazzo Pizza</h2>
    </div>
    <ul class="nav-logo">
      <a href="#">Home</a>
      <a href="about.html">About</a>
      <a href="#">Menus</a>
      <a href="#">Gallery</a>
      <a href="#">Contact</a>
    </ul>
  </nav>

  <!-- Carousel -->
  <div id="carouselExample" class="carousel slide" style="width: 1100px; margin: 20px auto;">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="slider1.jpg" class="d-block w-100" alt="Slide 1" style="height: 300px;">
      </div>
      <div class="carousel-item">
        <img src="slider2.jpg" class="d-block w-100" alt="Slide 2" style="height: 300px;">
      </div>
      <div class="carousel-item">
        <img src="slider3.jpg" class="d-block w-100" alt="Slide 3" style="height: 300px;">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- About -->
  <div class="about">
    <div class="left-box">
      <h1>ABOUT US</h1>
      <p>
        Butazzo's serves gourmet, hearth-baked pizza and fresh, artisan
        salads along with craft beer and value-priced wine. Butazzo's features
        live acoustic music on weekends with sound powered by Bose Professional Audio.
      </p>
    </div>
    <div class="right-img">
      <img src="about-us.jpg" alt="About Us">
    </div>
  </div>

  <!-- Menu -->
  <section class="menu-section">
    <h2>OUR MENUS</h2>
    <div class="menu-buttons">
      <button class="active">Pizzas</button>
      <button>Burgers</button>
      <button>Tacos</button>
      <button>Salads</button>
      <button>Drinks</button>
    </div>

    <!-- Dynamic Menu from DB -->
    <div class="menu-items">
      <?php
      $result = $conn->query("SELECT * FROM products");
      while ($row = $result->fetch_assoc()):
        $imagePath = 'admin/uploads/' . $row['image'];
      ?>
        <div class="menu-item">
          <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
          <h3><?php echo htmlspecialchars($row['name']); ?></h3>
          <p><?php echo htmlspecialchars($row['Description']); ?></p>
          <span class="price">$<?php echo htmlspecialchars($row['price']); ?></span>
        </div>
      <?php endwhile; ?>
    </div>

    <h1>Pizza Section</h1>
    <div class="menu-items">
      <?php
      $result = $conn->query("SELECT * FROM pizza");
      while ($row = $result->fetch_assoc()):
        $imagePath = 'admin/uploads/' . $row['image'];
      ?>
        <div class="menu-item">
          <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
          <h3><?php echo htmlspecialchars($row['name']); ?></h3>
          <p><?php echo htmlspecialchars($row['Description']); ?></p>
          <span class="price">$<?php echo htmlspecialchars($row['price']); ?></span>
        </div>
      <?php endwhile; ?>
    </div>
  </section>

  <!-- Reservation -->
  <div class="background-image">
    <div class="reservation-box">
      <div class="reserve-title">RESERVATIONS</div>
      <div class="reserve-desc">Enter your information below to make your reservation.</div>

      <form action="" method="post">
        <div class="row">
          <input type="text" name="fname" placeholder="Your name" required>
          <input type="email" name="email" placeholder="Your email" required>
        </div>

        <div class="row">
          <input type="number" name="phone" placeholder="Phone" required>
          <input type="date" name="date" required>
          <input type="time" name="time" required>
        </div>

        <div class="row">
          <input type="text" name="msg" placeholder="Message" class="message-input">
        </div>
        <button type="submit" name="submit">BOOK NOW</button>
      </form>
    </div>
  </div>

  <!-- Gallery -->
  <h1 class="images">Gallery</h1>
  <div class="gallery-wrap">
    <div class="gallery">
      <img src="gallery-3.jpg" alt="">
      <img src="gallery-2.jpg" alt="">
      <img src="gallery-3.jpg" alt="">
      <img src="gallery-4.jpg" alt="">
      <img src="gallery-5.jpg" alt="">
      <img src="gallery-6.jpg" alt="">
      <img src="gallery-7.jpg" alt="">
      <img src="gallery-8.jpg" alt="">
    </div>
  </div>

  <!-- Map -->
  <div class="MAP">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3534.3855028587777!2d86.22968247513364!3d22.800251279330162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f5e3fd216be9cb%3A0x4b86ec20c710987c!2sTechcoder%20Software%20Service%20OPC%20Private%20Limited!5e1!3m2!1sen!2sin!4v1758529419433!5m2!1sen!2sin"
    width="600" height="450" style="border:0;width:100%;" allowfullscreen="" loading="lazy"></iframe>
  </div>

  <!-- Footer -->
  <div class="footer">
    <div class="footer-content">
      <div class="footer-left">
        <h3>About Us</h3>
        <p>
          Butazzo's serves gourmet, hearth-baked pizza and fresh,
          artisan salads along with craft beer and value-priced wine.
          Live acoustic music on weekends with sound powered by Bose Professional Audio.
        </p>
      </div>
      <div class="footer-mid">
        <h3>WORKING HOURS</h3>
        <div class="working-time">
          <span>Monday - Sunday: 11am - 10pm</span>
        </div>
      </div>
      <div class="footer-right">
        <h3>CONTACT US</h3>
        <span>📍 1010 MARKET STREET, San Francisco, CA, 91107</span>
        <span>📞 415 456 7800</span>
        <span>✉️ buttazopizza.net</span>
      </div>
    </div>
    <div class="footer-buttom">
      <p>Copyright © 2019 Butazzo Pizza | All Rights Reserved</p>
      <div class="footer-rightbuttom">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-whatsapp"></i>
      </div>
    </div>
  </div>
</body>
</html>
