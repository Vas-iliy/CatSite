
<div>
    <form  class="card w-25 mx-auto p-2" method="post">
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" name="login" class="form-control" id="login">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input id='email' class="form-control" type="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id='password' class="form-control" type="password" name="password">
        </div>
        <hr>
        <input class="btn btn-primary" type="submit">
        <?if($mail !== null):?>
            <hr>
            <div class="alert <?=$alert?>">
                <?=$mail?>
            </div>
        <?endif;?>
    </form>
</div>

