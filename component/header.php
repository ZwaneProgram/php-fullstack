<?php
    // Assuming you have established a database connection
    $connection = mysqli_connect("localhost", "root", "", "cart_system");

    // Assuming $user_id is defined somewhere in your code
    $user_id = 1; // Placeholder value, replace it with your logic to get the user ID

    // Fetch username from the database based on user ID
    $query = "SELECT name FROM user_info WHERE id = $user_id";
    $result = mysqli_query($connection, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['name']; // Fetching the value of the 'name' column
    } else {
        // Handle error if query fails or no user found
        $username = "Guest"; // Default value if username is not found
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Sahil Kumar">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shopping Cart System</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php"><i class="fa-solid fa-couch"></i>&nbsp;&nbsp;Furniture Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fa-solid fa-couch mr-2"></i>Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="checkout.php"><i class="fas fa-money-check-alt mr-2"></i>Checkout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                </li>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><?php echo $username; ?></span> <!-- Display username -->
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if ($username === "Guest"): ?>
                            <a href="auth/login.php" class="dropdown-item">Login</a>
                            <a href="auth/register.php" class="dropdown-item">Register</a>
                        <?php else: ?>
                            <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Are you sure you want to logout?');" class="dropdown-item delete-btn">Logout</a>
                        <?php endif; ?>
                    </div>
                </div>
            </ul>
        </div>
    </nav>

    <!-- Navbar end -->
</body>

</html>
