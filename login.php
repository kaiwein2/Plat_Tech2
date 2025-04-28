<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/login.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">

</head>


<body>

    <div class="bg-image">
        <div class="overlay"></div> 

        <div class="login-container">
            <div class="logo-container">
                <img src="assets/img/Shoe-A-rizz.png" alt="Logo" class="top-left-logo">
            </div>
            
            <h2>Welcome!</h2>

            <!-- Login Form -->
<form action="process_login.php" method="POST">
<div class="mb-3">
<input type="text" class="form-control" name="username" placeholder="Username" required>
</div>
<div class="mb-3">
<input type="password" class="form-control" name="password" placeholder="Password" required>
</div>
<button type="submit" class="btn login-btn">Login</button>
</form>


<button type="secondary" class="btn btn-secondary mt-3" data-bs-toggle="modal" data-bs-target="#signupModal">
                Signup
            </button>
        </div>
    </div>


     <!-- Signup Modal -->
     <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="process_signup.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="signupModalLabel">Signup</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="signupUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="signupUsername" required>
                        </div>
                        <div class="mb-3">
                            <label for="signupPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="signupPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="signupRole" class="form-label">Role</label>
                            <select class="form-select" name="role" id="signupRole" required>
                                <option value="buyer">Buyer</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/login.js"></script>
</body>

</html>