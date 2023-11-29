<!doctype html>
<html lang="en">

<head>
    <?php include __DIR__ .'/commonHeader.php'; ?>
</head>

<body>
    <!-- Login script -->
    <?php include __DIR__ .'../controllers/login.php'; ?>

    <!-- Login form -->
    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">

                <form action="" method="post" name="loginForm">
                    <h3>Login</h3>

                    <?php echo $accountNotExistErr; ?>
                    <?php echo $emailPwdErr; ?>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email_signin" id="email_signin" />
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password_signin"
                            id="password_signin" />
                    </div>

                    <button type="submit" name="login" id="sign_in" class="btn btn-outline-primary btn-lg btn-block">Sign
                        in</button>

                    <p>Don't have an account? <a href="signup.php">Sign Up</a>.</p>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            // Form Validation
            $("form[name='loginForm']").validate({
                // Define validation rules
                rules: {
                    email_signin: "required",
                    password_signin: "required",
                    email_signin: {
                        required: true,
                        email: true
                    },
                    password_signin: {
                        required: true
                    }
                },
                // Specify validation error messages
                messages: {
                    email_signin: {
                        required: "Please enter your email",
                        minlength: "Please enter a valid email address"
                    },
                    password_signin: "Please enter your Password"
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        }); 
    </script>

</body>

</html>