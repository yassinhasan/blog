
    <form class="login-form users-form" method="post" action="<?= fullurl("blog/login/submit") ?>" id="loginform"
    data-target="<?= fullurl("/")?>">
        <div class="box">
         <h3 class="h2"> log in</h3>
         <div class="results"></div>
        <div class="box">
            <div class="form-group">
                <label for="email"> email </label>
                <input class="form-control form-control-lg" type="text" name="email" placeholder="enter your name" autocomplete="on" id="email" >
            </div>
            <div class="form-group">
                <label for="password"> password</label>
                <input class="form-control form-control-lg" type="password" name="password" placeholder="type your password"  id="password" autocomplete="on">
            </div>
            <div class="form-check">
                <input type="checkbox" name="remember"  id="remember" class="form-check-input">
                <label for="remember" class="form-check-label"> remember me</label>

            </div>
            <button class="btn submit" name="login" type="button"> Log In </button>
        </div>
        </div>
    </form>