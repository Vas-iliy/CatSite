
<div class="d-flex flex-column mt-5 align-items-center">
		<div class="card">
			<h5 class="card-header"><?=$state['state_title']?></h5>
			<div class="card-body">
				
				<h5 class="card-content"><?=$state['state_content']?></h5>
				<hr>
                <a href="<?=BASE_URL?>person/<?=$state['id_login']?>"><p class="card-text">Autor:<?=$state['login']?></p></a>
				<hr>
			</div>
            <div class="card-footer">
	            <?if($user !== null):?>
                    <form method="post">
                        <textarea name="comment" id="" cols="30" rows="10" placeholder="comment"></textarea><br>
                        <input type="submit"><br>
                    </form>
                    <hr>
	            <?endif;?>
                <div class="comments">
                    <h3 class="title-comments">Комментарии</h3>
                    <ul class="media-list">
	                    <?foreach ($comments as $comment):?>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-rounded" src="avatar1.jpg" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <div class="author"><?=$comment['login']?></div>
                                    <div class="metadata">
                                        <span class="date"><?=$comment['comment_time']?></span>
                                    </div>
                                </div>
                                <div class="media-text text-justify">
                                    <?=$comment['comment']?>
                                </div>
                            </div>
                        </li>
                        <?endforeach;?>
                    </ul>
            </div>
		</div>
</div>