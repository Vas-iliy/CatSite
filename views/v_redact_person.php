
<div class="d-flex flex-column mt-5 align-items-center">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<?foreach ($person as $p):?>
					<div class="col col-12 col-md-4">
						<img src="<?=$p['img']?>" width="200px" alt="">
					</div>
					<div class="col col-12 col-md-8">
						<h2><?=$p['login']?></h2>
						<hr>
						<p><?=$p['description']?></p>
					</div>
				<?endforeach;?>
			</div>
		</div>
		<div class="card-body">
			<?foreach ($informations as $information):?>
				<table>
					<tr>
						<td><?=$information['states']?></td><td><?=$information['comments']?></td><td><?=$information['reviews']?></td>
					</tr>
					<tr>
						<td>Статьи</td><td>Комментарии</td><td>Отзывы</td>
					</tr>
				</table>
			<?endforeach;?>
		</div>
	</div>