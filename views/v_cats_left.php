<ul class="list-group">
	<?foreach ($cats as $cat):?>
		<a href="<?=BASE_URL?>cat/<?=$cat['id_cat']?>"> <li class="list-group-item"><?=$cat['cat_title']?></li></a>
	<?endforeach;?>
</ul>