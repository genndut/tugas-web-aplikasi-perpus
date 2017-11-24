<div id="utama">
<center>
<div class="log">

<h3>Form Login</h3>
<form action="act/proses_login.php" method="post">
	<input type="text" name="username" required placeholder="username" class="username"><br>
	<input type="password" name="password" required placeholder="password" class="ps"><br>
	<label ><input name="login_type" align="left" type="radio" value="admin" checked="checked">Admin</label>
	<label><input type="radio" name="login_type" value="peminjam" >Peminjam</label>
	<input type="submit" value="Login">
</form>
</div>
</center>
</div>