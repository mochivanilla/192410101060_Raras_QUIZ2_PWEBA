<?php
require "config.php";
require "tampilan.php";
if (isset($_POST["simpan"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $statement = $con->prepare("INSERT INTO user (username,password) VALUES (:username,:password)");
    if (!empty($username) && !empty($password)) {
        $statement->bindValue(":username", $username);
        $statement->bindValue(":password", $password);
        $statement->execute();
        $success = "Succesfully !";
    } else {
        $failed = "Data tidak boleh kosong !";
    }
}
if (isset($_POST["login_page"])){
    header('Location: index.php');}
?>

<div class="container">
    <div class="card">
        <div class="judul">
        <center>
            <h2>Register</h2><br>
</center>
        </div>

        <div class="card-body">
            <form method="post">
                <div class="form-input">
                    <center>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" >
                    </center><br>
                </div>
                <div class="form-input">
                <center>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
</center>
                </div>
                <?php if (!empty($success)): ?>
                    <div class="alert alert-success">
                        <?= $success; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($failed)): ?>
                    <div class="alert alert-danger">
                        <?= $failed; ?>
                    </div>
                <?php endif; ?>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button><br>
                <button type="submit" name="login_page" class="btn btn-warning">Login</button>
            </form>
        </div>
    </div>
</div>