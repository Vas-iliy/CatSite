
<div class="d-flex flex-column mt-5 align-items-center">
	<div class="card">
		<div class="card-header">
            <?if($oldTitle == ''):?>
			    <h2>Добавление новой статьи</h2>
            <?else:?>
                <h2>Редактирование статьи</h2>
            <?endif;?>
		</div>
		<div class="card-body">
			<form method="post">
				<?foreach ($validate as $value):?>
                    <p><?=$value?></p>
				<?endforeach;?>
				<input type="text" name="state_title" required placeholder="title" value="<?=$oldTitle?>"><br>
                <input type="text" name="cat_title" required placeholder="category" value="<?=$oldCat?>"><br>
                <textarea name="state_content" id="" cols="30" rows="10" placeholder="content"><?=$oldContent?></textarea><br>
				<input type="submit" name="state">
			</form>
		</div>
		<div class="card-footer">

		</div>
		
	</div>
</div>