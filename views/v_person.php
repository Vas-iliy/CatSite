
<div class="d-flex flex-column mt-5 align-items-center">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<?foreach ($person as $p):?>
				<div class="col col-12 col-md-4">
					<img src="<?=$p['img']?>" width="200px" alt="">
					<?if($user !== ''):?>
                        <form method="post" enctype="multipart/form-data">
                            <input type="file">
                            <input type="submit" name="file">
                        </form>
					<?endif;?>
				</div>
				<div class="col col-12 col-md-8">
                    <h2><?=$p['login']?></h2>
                    <hr>
                    <?if($user !== ''):?>
                        <form method="post">
                            <textarea name="description" cols="30" rows="10">
                                <?=$person['description']?>
                            </textarea>
                            <input type="submit">
                        </form>
                    <?else:?>
                        <p><?=$p['description']?></p>
                    <?endif;?>
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
        <?if($user === ''):?>
            <div class="card-footer">
                <div class="reviews">
                    <h3 class="title-comments">Отзывы</h3>
                    <ul class="media-list">
                        <?foreach ($reviews as $review):?>
                            <li class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object img-rounded" src="avatar1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <div class="author"><?=$review['login']?></div>
                                        <div class="metadata">
                                            <span class="date"><?=$review['dt']?></span>
                                        </div>
                                    </div>
                                    <div class="media-text text-justify">
                                        <?=$comment['review']?>
                                    </div>
                                </div>
                            </li>
                        <?endforeach;?>
                    </ul>
                </div>
            </div>
        <?endif;?>
	</div>