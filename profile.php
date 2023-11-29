<?php include __DIR__.'/header.php'; ?>
<?php include __DIR__.'../config/db.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <?php include __DIR__ .'/commonHeader.php'; ?>
    <title>Profile</title>
</head>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 25rem">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">User Profile</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_SESSION['firstname']; ?>
                        <?php echo $_SESSION['lastname']; ?></h6>
                    <p class="card-text">Email address: <?php echo $_SESSION['email']; ?></p>
                    <p class="card-text">Mobile number: <?php echo $_SESSION['mobilenumber']; ?></p>
                    
                    <a class="btn btn-danger btn-block" href="logout.php">Log out</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>