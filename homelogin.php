<?php require "tampilan.php"?>
<?php
session_start();

if (isset($_POST['logout'])){
    session_destroy();
    header('Location: index.php');
}
?>
<div class="container">
    <div class="card">
        <div class="judul">
        <center>
            <h1>SELAMAT DATANG</h1>
            <br>
</center>
        </div>
        <div class="nama">
            <center>
            <div>
                <?= $_SESSION['username'];?>
</center>
            </div>
            <br><br><br><br><br><br>
            <form method="post">
            <button type="submit" name="logout" class="btn btn-primary">Log Out</button>
            </form>
        </div>
    </div>
</div>

