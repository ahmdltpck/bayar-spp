<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="js.js"></script>
    <link rel="stylesheet" href="login.css">
    <title>Pembayaran Spp</title>
</head> 
<body> 
    <div id="login">
    <br>
        <h3 class="text-center text-white pt-5">Login Pembayaran SPP</h3>
        <br>
        <div class="container">
            <div id="login-row" class="d-flex justify-content-center h-100">
                <div id="login" class="card">
                    <div id="login" class="card-header">
                        
                        <form id="login-form" class="form" action="" method="post">
                                <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="user" required class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" required name="pass" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn float-left login_btn" value="Login">
                            </div>
                        </form>

                        <!-- proses -->
                            <?php 
                                if($_SERVER['REQUEST_METHOD']=='POST'){
                                include 'koneksi.php'; 

                                // admin
                                    $username = $_POST['user']; //ambil dari input user ubah jadi var username
                                    $password = md5($_POST['pass']); //ambil dari input pass ubah jadi var password

                                    $login = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'  AND level = 'admin'");
                                    $cek = mysqli_num_rows($login);
                                    
                                    // petugas
                                    $user = $_POST['user']; //ambil dari input user ubah jadi var user
                                    $pass = $_POST['pass']; //ambil dari input pass ubah jadi var pass

                                    $masuk = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username = '$user' AND password = '$pass'  AND level = 'petugas'");
                                    $cuk = mysqli_num_rows($masuk);

                                    
                                // admin
                                if ($cek>0) {
                                    session_start();
                                        $_SESSION['username'] = $username;
                                        $_SESSION['password'] = $password;
                                        $_SESSION['level'] = "admin";
                                        $_SESSION['status'] = "login";
                                        header("location: admin/"); //masuk ke halaman admin
                                    } 
                                    

                                // petugas
                                else if($cuk>0) {
                                    session_start();
                                        $_SESSION['username'] = $user;
                                        $_SESSION['password'] = $pass;
                                        $_SESSION['level'] = "petugas";
                                        $_SESSION['status'] = "masuk";
                                        header("location: petugas/"); //masuk ke hal petugas
                                    } 

                                else{
                                    echo "<p class='text-white'>Username/Password Mungkin Salah!!</p>";
                                }}
                                    ?>

                        <!-- proses -->

                    </div>
                </div>
            </div>
        </div>
</body>
</html>