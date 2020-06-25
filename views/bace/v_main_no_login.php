
<div class="btn-group mt-3">
	<button type="button"  class="btn btn-outline-primary dropdown-toggle " data-toggle="dropdown"
	        style = "width : 250px" aria-haspopup="true" aria-expanded="false">
		Войти
	</button>
	<form class="dropdown-menu p-4" method="post">
		<label for="exampleDropdownFormEmail2"><?=$mail?></label>
		<div class="form-group ">
			<label for="exampleDropdownFormEmail2">Логин или email</label>
			<input type="text" class="form-control" id="exampleDropdownFormEmail2" name="login" required>
		</div>
		<div class="form-group ">
			<label for="exampleDropdownFormPassword2">Пароль</label>
			<input type="password" class="form-control" id="exampleDropdownFormPassword2" name="password" required>
		</div>
		<input type="submit" class="btn btn-outline-success mt-1 " style="width: 200px" name="submit" value="Войти">

		<li class="nav-item">
			<a class="nav-link" href="registration.php">Зарегистрироваться</a>
		</li>

	</form>
</div>
