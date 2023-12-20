<!doctype html>
<html lang="en">

<head>
    <title>SIKKN</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon"
        href="https://lppm.ukdw.ac.id/wp-content/uploads/2023/02/logo-removebg-preview-300x300.png">
    
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/styles/login.css">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container">
            <div class="card">
                <h2 class="mb-0">Login LPPM</h2>
                <p>Silahkan Masukan Username dan Password</p>
                <form method="post" action="ceklogin.php">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukan Username">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukan Password" name="password" class="mb-3">
                    <?php
                    if (isset($_GET['login'])) { ?>
                        <div class="loginFailed" style="color: red;">*username atau password salah</div>
                    <?php
                    }
                    ?>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>