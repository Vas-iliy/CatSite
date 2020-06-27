
<div class="d-flex flex-column mt-5 align-items-center">
		<div class="card">
			<h5 class="card-header"><?=$state['state_title']?></h5>
			<div class="card-body">
				
				<h5 class="card-content"><?=$state['state_content']?></h5>
				<hr>
				<p class="card-text">Autor: <?=$state['login']?></p>
				<hr>
				<?if($user !== null):?>
                    <form method="post">
                        <input type="text" name="login" required placeholder="login"><br>
                        <textarea name="comment" id="" cols="30" rows="10" placeholder="comment"></textarea><br>
                        <input type="submit"><br>
                    </form>
                    <hr>
				<?endif;?>
			</div>
            <div class="card-footer">
                <div class="comments">
                    <h3 class="title-comments">Комментарии</h3>
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-rounded" src="avatar1.jpg" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <div class="author">Дима</div>
                                    <div class="metadata">
                                        <span class="date">16 ноября 2015, 13:43</span>
                                    </div>
                                </div>
                                <div class="media-text text-justify">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Asperiores dicta doloremque et explicabo, facere minus nisi
                                    nostrum numquam ratione tempora! Aspernatur atque dignissimos
                                    exercitationem expedita fugiat fugit hic laborum maxime molestiae
                                    odit optio placeat provident, quod sunt, tempora totam voluptatum.
                                    Consequatur culpa fuga nostrum quaerat quidem quod rerum, tempore vero.
                                </div>
                            </div>
                        </li>
                    </ul>
            </div>
		</div>
</div>