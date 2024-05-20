<?php include('include/Connection.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>   
    <body>
    <nav class="navbar navbar-expand bg-body-secondary p-1">
        <div class=" m-2">
            <div class="shine">ITshoeStore</div>
        </div>
        <div class="d-flex">
            <div class="product collapse navbar-collapse mb-4 " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto ">
                    <li  class="nav-item dropdown ">
                        <div id="profileNameDisplay" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </div>
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Profile</a></li>
                            <li><a class="dropdown-item" href="./Register_User.php">Register_User</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown align-item-center">
                        <div id="Management" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Product Management
                        </div>
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="Manage_product.php" >Manage Product</a></li>
                            <li><a class="dropdown-item" href="Manage_Category.php">Manage Category</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="btn-category">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Small button
                    </button>
                    <ul class="dropdown-menu">
                        ...
                    </ul>
                </div>
                <form class="search_bar d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    
    <?php include('main.php')?>



    <!--Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="./users/create_user.php"> 
                        <div class="mb-3">
                            <label for="FirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="First_Name" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="LastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="LastName" name="Last_Name" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="MobileNumber" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="MobileNumber" name="Contact_Number" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="Address" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" id="btnProfile" name="Submit_Profile" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../Information Management/script.js"></script>
</html>
