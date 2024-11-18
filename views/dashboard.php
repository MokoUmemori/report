<?php
require '../classes/User.php';
$user =  new User;
$all_users = $user->displayUsers();

session_start();


?>


<!doctype html>
<html lang="en">
    <head>
        <title>dashboard</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        /> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    </head>

    <body>
        <?php include 'navbar.php'?>
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <table class="table align-middle">
                    <thead>
                        <td></td>
                        <td>ID</td>
                        <td>First name</td>
                        <td>Last name</td>
                        <td>Username</td>
                        <td></td>
                    </thead>
                    <tbody>
                        <?php foreach ($all_users as $user): ?>
                            <tr>
                                <td>
                                    <i class="fa-solid fa-user fa-3x"></i>
                                </td>
                                <td><?= $user ['id']?></td>
                                <td><?= $uer['first_name']?></td>
                                <td><?= $uer['last_name']?></td>
                                <td><?= $uer['username']?></td>
                                <td>
                                    <?php if($_SESSION['user_id'] == $user['id'] ):?>
                                        <a href="edit.php" class="btn btn-outline-warning">
                                            <i class="fa-solid fa-"></i>
                                        </a>
                                </td>
                            </tr>
                    </tbody>

                </table>
            </div>
        </div>
        <header>
            <!-- place navbar here -->
        </header>
        <main></main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>