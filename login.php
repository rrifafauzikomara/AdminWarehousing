<?php
@session_start();
include "koneksi.php";

if (@$_SESSION['admin']) {
	header("location: home.php");
} else {
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Auto2000</title>
    	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    	<link rel="stylesheet" href="assets/css/sweetalert.css">
    	<link rel="stylesheet" href="assets/css/tampilan.css">
    	<link rel="stylesheet" href="assets/css/st.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
	<body>
		<div class="konten">
			<div class="konten">
        <div class="row">
            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                <div class="panel panel-dark login-box">
                    <div 
                        class="panel-heading">
                            <h1 class="text-center">Auto 2000</h1></div>
                        </div>
			<div class="loginForm">
				<img id="profile" class="profile" src="images/profile.png" alt="Profile Picture">
				<form method="post" action="">
					<input id="username" class="username" type="text" name="username" value="Username" autocomplete="off"><br>
					<input id="password" class="password" type="password" name="password" value="Password" autocomplete="off"><br>
					
					<!-- <input id="remember" class="remember" type="checkbox" name="Vehicle" value="remember">
					<label for="remember">Remember Me</label> -->
					<input id="submit" class="submit" type="submit" name="login" value="Login">
				</form>
				<!-- <a class="recovery" href="#">Forgot Password&#63;</a> -->
			</div>
		</div>
		<script type="text/javascript" src="app/app.js"></script>

		<?php
				$username = mysqli_real_escape_string($con, @$_POST['username']);
				$password = mysqli_real_escape_string($con, @$_POST['password']);
				// $username = @$_POST['username'];
				// $password = @$_POST['password'];
				$login = @$_POST['login'];

				if ($login) {
					if($username == "" || $password == "") {
						?> <script type="text/javascript">alert("Username atau Password tidak boleh kosong !!");</script> <?php
					} else {
						$sql = "select * from tb_admin where username = '$username' and password = '$password' " or die (mysqli_error());
						$login = mysqli_query($con, $sql);
						$data = mysqli_fetch_array($login);
						$cek = mysqli_num_rows($login);
						if ($cek >= 1) {
							if ($data['level'] == "admin") {
								@$_SESSION['admin'] = $data['id_admin'];
								header("location: home.php");
							} 
					} else {
						?> <script type="text/javascript">alert("Login Gagal!!");</script> <?php
						

					}
				}
			}
				?>

	</body>
</html>

<?php
}
?>