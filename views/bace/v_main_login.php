
<button type="button" class="btn btn-outline-primary dropdown-toggle " data-toggle="dropdown"
        style = "width : 170px" aria-haspopup="true" aria-expanded="false">
	<?=$name?>
</button>
<div class="dropdown-menu">
	<a class="dropdown-item" href="user/person.php?loginId=<?=$loginId?>">Моя страница</a>
	<div class="dropdown-divider"></div>
	<a class="dropdown-item" href="user/state.php?loginId=<?=$loginId?>&key=new">Добавить статью</a>
	<a class="dropdown-item" href="user/listMyStates.php?loginId=<?=$loginId?>">Список статей</a>
	<div class="dropdown-divider"></div>
	<form method="post"><input class="dropdown-item" type="submit" name="exit" value="Выйти"></form>
</div>