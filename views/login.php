<?php
if (isset($_SESSION['loggedin']) || isset($_SESSION['loggedin']) === true) {
    header('Location: /HealthHub/');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/login.css?v<?php echo time(); ?>" />
    <title>Login</title>
</head>

<body>
    <div class="main">
        <form class="form" method="POST">
            <a href="/HealthHub/" class="back-btn">
                <svg width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #231f20;
                            }
                        </style>
                    </defs>
                    <g data-name="arrow left" id="arrow_left">
                        <path class="cls-1" d="M22,29.73a1,1,0,0,1-.71-.29L9.93,18.12a3,3,0,0,1,0-4.24L21.24,2.56A1,1,0,1,1,22.66,4L11.34,15.29a1,1,0,0,0,0,1.42L22.66,28a1,1,0,0,1,0,1.42A1,1,0,0,1,22,29.73Z" />
                    </g>
                </svg>
            </a>

            <h1>Hello Admin!</h1>
            <p class="form-title">Login to your account</p>

            <!-- Error message -->
            <?php if (!empty($error)): ?>
                <div class="error" style="color: red;">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <div class="input-container">
                <input placeholder="Enter email" type="email" name="email">
                <span>
                    <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                    </svg>
                </span>
            </div>

            <div class="input-container">
                <input placeholder="Enter password" type="password" name="password">
                <span>
                    <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                    </svg>
                </span>
            </div>
            <button class="submit" type="submit">
                Login
            </button>

            <p class="signup-link">
                Forgot Password?
                <a href="/HealthHub/register">Reset now</a>
            </p>
        </form>
    </div>

</body>

</html>