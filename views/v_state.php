
<div class="d-flex flex-column mt-5 align-items-center">
		<div class="card" style="width: 30rem;">
			<h5 class="card-header"><?=$state['state_title']?></h5>
			<div class="card-body">
				
				<h5 class="card-content"><?=$state['state_content']?></h5>
				<hr>
				<p class="card-text">Autor: <?=$state['login']?></p>
				<hr>
				<?if($user !== null):?>
				<form action="post">
					<input type="text" name="login" required placeholder="login"><br>
					<textarea name="comment" id="" cols="30" rows="10" placeholder="comment"></textarea><br>
					<input type="submit"><br>
				</form>
				<?endif;?>
			</div>
		</div>
</div>