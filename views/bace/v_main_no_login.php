
<div class="d-flex">
<div class="btn-group mt-3">
	<button type="button"  class="btn btn-outline-primary dropdown-toggle " data-toggle="dropdown"
	        style = "width : 250px" aria-haspopup="true" aria-expanded="false">
		Войти
	</button>
	<form class="dropdown-menu p-4" method="post">
		<div class="form-group ">
			<label for="exampleDropdownFormEmail2">Login or email</label>
			<input type="text" class="form-control" id="exampleDropdownFormEmail2" name="login" required>
		</div>
		<div class="form-group ">
			<label for="exampleDropdownFormPassword2">Password</label>
			<input type="password" class="form-control" id="exampleDropdownFormPassword2" name="password" required>
		</div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="login-remember" name="remember">
            <label class="form-check-label" for="login-remember">
                To remember me
            </label>
        </div>
        <hr>
		<input type="submit" class="btn btn-outline-success mt-1 " style="width: 200px" name="submit" value="Войти">
		<?if ($authArr):?>
            <div class="alert alert-danger">
                Шо за поц?
            </div>
		<?endif;?>

		<li class="nav-item">
			<a class="nav-link" href="<?=BASE_URL?>registrations">Зарегистрироваться</a>
		</li>

	</form>
</div>
</div>

<div class="content">
	<?=$content?>
</div>
