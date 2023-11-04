<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nero's Frame Work</title>
    <script src="/public/dist/scripts.js"></script>
    <link rel="shortcut icon" href="#">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav w-100">
                <li class="nav-item">
                    <p class="nav-link active" href="#">Nero's Framework</p>
                </li>
                <li class="nav-item float-end d-flex align-items-center position-absolute" style="right: 25px;">
                    <a class="nav-link" href="/login">Login</a>
                    <i class="fa-solid fa-right-to-bracket" style="color: #b9b9b9;"></i>
                </li>
            </ul>
        </div>
    </nav>
    <div class="col-12 d-flex justify-content-center">
        <?php 
            if(isset($errors)) {
                foreach($errors as $error) {
                    echo "<p> $error[0] </p>";
                }
            }
        ?>

        <?php
        include($page);
        ?>
    </div>
</body>

</html>