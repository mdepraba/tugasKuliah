<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="src/navbar.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        .register-form {
            display: none;
        }
    </style>
</head>
<body>

<!-- login -->
<div class="container mt-5">
    <div class="card row justify-content-center col-md-6">
        <div class="card-body">
        <!-- button -->
            <div class="d-flex justify-content-between mb-3">
                <button type="button" class="btn btn-link" id="show-login">Login</button>
                <button type="button" class="btn btn-link" id="show-register">Register</button>
            </div>
        <!-- login -->
            <div id="login-form">
                <h4 class="card-title">Login</h4>
                <form action="src/proses_login.php" method="post">
                    <div class="mb-3">
                        <label for="login-username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="login-username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="login-password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="login-password" name="pass" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" id="submit-button" name="sublogin">Submit</button>
                </form>
            </div>
            <!-- register -->
            <div id="register-form" class="register-form" >
                <h4 class="card-title">Register</h4>
                <form action="src/proses_login.php" method="POST">
                    <div class="mb-3">
                        <label for="register-username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="register-username" name="rUsername" placeholder="input username baru" required>
                    </div>
                    <div class="mb-3">
                        <label for="register-password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="register-password" name="rPass" placeholder="input username baru"required>
                    </div>
                </form>
                <button type="submit" class="btn btn-primary mt-3" id="submit-button" name="subregis">Daftar</button>
            </div>
        </div>
    </div>
</div>

<script>
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const showLoginButton = document.getElementById('show-login');
    const showRegisterButton = document.getElementById('show-register');

    showLoginButton.addEventListener('click', () => {
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
    });

    showRegisterButton.addEventListener('click', () => {
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
    });
</script>

</body>
</html>

<style>
    .card{
        background-color: #1976D200;
    }
    .card-body{
        padding: 20px 200px 20px 200px;
        border: solid 2px;
    }
</style>