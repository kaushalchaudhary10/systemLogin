<?php include __DIR__.'../controllers/register.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <?php include __DIR__ .'/commonHeader.php'; ?>
    <title>Signup</title>
</head>

<body>
    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="" method="post" name='signupForm'>
                    <h3>Register</h3>

                    <?php echo $msg; ?>
                    <?php echo $email_exist; ?>

                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" class="form-control" name="firstname" id="firstName" />
                        <?php echo $f_NameErr; ?>
                    </div>

                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control" name="lastname" id="lastName" />
                        <?php echo $l_NameErr; ?>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" />
                        <?php echo $_emailErr; ?>
                    </div>

                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" />
                        <?php echo $_mobileErr; ?>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password" />
                        <?php echo $_passwordErr; ?>
                    </div>

                    <button type="submit" name="submit" id="submit" class="btn btn-outline-primary btn-lg btn-block">Sign up
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            // Form Validation
            $("form[name='signupForm']").validate({
                // Define validation rules
                rules: {
                    firstname: "required",
                    lastname: "required",
                    email: "required",
                    mobilenumber: "required",
                    password: "required",
                    firstname: {
                        required: true,
                        email: true
                    },
                    lastname: {
                        required: true,
                        email: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    mobilenumber: {
                        required: true
                    },
                    password: {
                        required: true,
                        email: true
                    },
                },
                // Specify validation error messages
                messages: {
                    firstname: "Please enter your first name",
                    lastname: "Please enter your last name",
                    email: {
                        required: "Please enter your email",
                        minlength: "Please enter a valid email address"
                    },
                    mobilenumber: "Please enter your mobile number",
                    password: "Please enter your password"
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        }); 
    </script>

</body>

</html>