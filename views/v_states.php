
<div class="d-flex flex-column mt-5 align-items-center">
<?foreach ($states as $state):?>
	<div class="card">
		<h5 class="card-header"><?=$state['state_title']?></h5>
		<div class="card-body">
			<h5 class="card-content"><?=mb_strimwidth($state['state_content'], 0, 350, '...')?></h5>
			<p class="card-text">Autor: <?=$state['login']?></p>
			<div class="card-footer text-right">
				<a  href="<?=BASE_URL?>state/<?=$state['id_state']?>" class="btn btn-primary">Узнать больше</a>
			</div>

		</div>
	</div>
<?endforeach;?>
</div>


