<?php
    // Database connection
    include __DIR__.'../../config/db.php';

    global $accountNotExistErr, $emailPwdErr;

    if(isset($_POST['login'])) {
        $email_signin        = $_POST['email_signin'];
        $password_signin     = $_POST['password_signin'];

        // clean data 
        $user_email = filter_var($email_signin, FILTER_SANITIZE_EMAIL);

        // Query if email exists in db
        $sql = "SELECT * From users WHERE email = '{$email_signin}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);

        // If query fails, show the reason 
        if(!$query){
           die("SQL query failed: " . mysqli_error($connection));
        }

        if(!empty($email_signin) && !empty($password_signin)){
            // Check if email exist
            if($rowCount <= 0) {
                $accountNotExistErr = '<div class="alert alert-danger">
                        User account does not exist.
                    </div>';
            } else {
                // Fetch user data and store in php session
                while($row = mysqli_fetch_array($query)) {
                    $id            = $row['id'];
                    $firstname     = $row['firstname'];
                    $lastname      = $row['lastname'];
                    $email         = $row['email'];
                    $mobilenumber  = $row['mobilenumber'];
                    $pass_word     = $row['password'];
                    $token         = $row['token'];
                    $is_active     = $row['is_active'];
                }

                // Verify password
                $password = password_verify($password_signin, $pass_word);

                // Allow only details are correct
                if($email_signin == $email && $password_signin == $password) {
                    header("Location: ./dashboard.php");
                    
                    $_SESSION['id'] = $id;
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['lastname'] = $lastname;
                    $_SESSION['email'] = $email;
                    $_SESSION['mobilenumber'] = $mobilenumber;
                    $_SESSION['token'] = $token;

                } else {
                    $emailPwdErr = '<div class="alert alert-danger">
                        Either email or password is incorrect.
                    </div>';
                }
            }
        }
    }
?>