// whatever happens, it iwll be processed in login.php //
    
<form action="register.php" method="post">
    <fieldset>
        // fieldset = it's all part of this form and they are all connected
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div>
            <input class="form-control" name = "confirmation" placeholder= "retype pw" type = "password" />
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Register
            </button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a>
</div>
