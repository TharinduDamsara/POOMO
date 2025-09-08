<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | POOMO</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css" />
    <link class="icon" rel="icon" href="images/logo/logo5.png" />
</head>

<body>
    <!-- Sidebar -->
    <div class="admin_sidebar">
        <div class="admin_logo">Admin Panel</div>
        <nav class="nav flex-column">
            <a class="admin_nav-link text-decoration-none admin_active" href="adminPanel.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a class="admin_nav-link text-decoration-none" href="addproduct.php"><i class="fas fa-tshirt"></i> Products</a>
            <a class="admin_nav-link text-decoration-none" href="#"><i class="fas fa-box"></i> Orders</a>
            <a class="admin_nav-link text-decoration-none" href="#"><i class="fas fa-users"></i> Customers</a>
            <a class="admin_nav-link text-decoration-none" href="#"><i class="fas fa-chart-bar"></i> Reports</a>
            <a class="admin_nav-link text-decoration-none" href="#"><i class="fas fa-cog"></i> Settings</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="admin_main-content">
        <!-- Navbar -->
        <nav class="admin_navbar">
            <a href="index.php" class="admin_navbar-brand text-decoration-none">
                <img src="images\logo\logo5.png" style="width: 40px; height: auto;" alt=""> POOMO</a>
            <a href="index.php" class="home_page"><i class="bi bi-house-door-fill"></i></a>
            <button class="admin_btn admin_btn-logout" onclick="signout();">Sign Out <i class="fas fa-sign-out-alt"></i></button>
        </nav>

        <!-- Card Section -->
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="admin_card">
                    <i class="fas fa-tshirt"></i>
                    <h5>Products</h5>
                    <p>150</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="admin_card">
                    <i class="fas fa-box"></i>
                    <h5>Orders</h5>
                    <p>120</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="admin_card">
                    <i class="fas fa-dollar-sign"></i>
                    <h5>Revenue</h5>
                    <p>$12,500</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="admin_card">
                    <i class="fas fa-users"></i>
                    <h5>Customers</h5>
                    <p>230</p>
                </div>
            </div>
        </div>

        <!-- Product Table -->
        <div class="row mt-5">
            <div class="col-md-12">
                <h4 class="mb-4 fs-2 fw-bold">Products List</h4>
                <table class="admin_table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Red T-shirt</td>
                            <td>T-Shirts</td>
                            <td>$25</td>
                            <td>50</td>
                            <td>
                                <a href="updateproduct.php" class="admin_btn admin_btn-action admin_btn-info"><i class="fas fa-edit"></i></a>
                                <button class="admin_btn admin_btn-action admin_btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Blue Jeans</td>
                            <td>Jeans</td>
                            <td>$40</td>
                            <td>30</td>
                            <td>
                                <a href="updateproduct.php" class="admin_btn admin_btn-action admin_btn-info"><i class="fas fa-edit"></i></a>
                                <button class="admin_btn admin_btn-action admin_btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>