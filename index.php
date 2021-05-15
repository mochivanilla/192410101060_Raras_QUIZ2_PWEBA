<?php
require "config.php";
require "tampilan.php";?>
    <div class="container">
        <div class="card">
            <div class="judul">
                <center>
                <h2>Halaman Login</h2>
                <br>
                </center>
            </div>

            <div class="card-body">
                <form method="post">
                    <div class="form-input">
                        <center>
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php
                        if(isset($_COOKIE['username'])){echo $_COOKIE['username'];} ?>" id="username" placeholder="Username" required>
                        </center>
                    </div>
                    <br>
                    <div class="form-input">
                    <center>
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password_login" value="<?php
                        if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>" id="password" placeholder="Password" required >
                        </center>
                        <br>
                    </div>
                    <div class="remember">
                    <center>
                        <input type="checkbox" class="form-check-input" name="rm" id="rm">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                        </center>
                    </div>
                    <br>
                    <button type="submit" name="login" class="btn btn-primary">Login</button><br><br>
                    <button type="submit" name="register" class="btn btn-warning">Register</button>

                </form>
            </div>
        </div>
    </div>
<?php
if (isset($_POST["register"])){
    header('Location: register.php');}
if (isset($_POST["login"])){
    $username_log = $_POST["username"];
    $password_log = $_POST["password"];
    $data = "SELECT password FROM username where username=:username";
    $statement = $con->prepare($data);
    $statement->bindValue(":username",$username_log);
    $statement->execute();
    $result = $statement->fetch();
    if ($password_log === $result['password']){
        session_start();
        $_SESSION['username'] = $username_log;
        $_SESSION['password'] = $result['password'];
        if (isset($_POST['rm'])){
            setcookie('username', $username_log, time() + (60 * 60), '/');
            setcookie('password',$result['password'] , time() + (60 * 60), '/');
        }else{
            setcookie('username', "", time() + (0), '/');
            setcookie('password',"" , time() + (0), '/');
        }
        header('Location: homelogin.php');
    }
}


?>