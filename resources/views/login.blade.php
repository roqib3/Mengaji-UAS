<!DOCTYPE html>
<html>
<head>
	<title>Sipkharan</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="login">
		<h1 style="font-size: 25px;">Sistem program khatam al-qur'an<br /></h1>
		<h2 style="font-size: 15px;">Silahkan login untuk masuk kedalam sistem<br /></h2>
	</div>

	<div class="kotak_login">
		<p class="tulisan_login">Login form</p>
		@if ($errors->any())
		@foreach ($errors->all() as $error)
		<p style="color:red;">{{ $error }}</p>
		@endforeach
		@endif

		<form method="post" action="{{ route('login.submit') }}">
			@csrf
			<!-- cek apakah terdapat pesan kesalahan, jika ada cetak -->
			<?php if (!empty($eror)) { ?>
				<p class="notifm"><?= $eror ?></p>
			<?php } ?>

			<input type="text" name="username" class="form_login" placeholder="nim">
			<input type="password" name="password" class="form_login" placeholder="Password">

			<button type="submit" class="tombol_login" name="login" value="login">LOGIN</button>
			<br />
			<br />
			<center>
				<span style="font-size: 13px;">Belum punya akun?</span>
				<a class="link" href="{{ route('registrasi') }}">Sign Up</a>
			</center>
		</form>
	</div>
</body>
</html>