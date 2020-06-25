
<div class="d-flex flex-column mt-5 align-items-center">
<?foreach ($states as $state):?>
	<div class="card" style="width: 30rem;">
		<h5 class="card-header"><?=$state['state_title']?></h5>
		<div class="card-body">
			<h5 class="card-content"><?=$state['state_content']?></h5>
			<!--<p class="card-text"><?/*=$state['login']*/?></p>
			<div class="card-footer text-right">
				<a  href="article.php?stateId=<?/*=$st['id_state']*/?>" class="btn btn-primary">Узнать больше</a>
			</div>-->

		</div>
	</div>
<?endforeach;?>
</div>


