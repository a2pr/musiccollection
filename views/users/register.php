<div>
    <h3> Register new user</h3>
</div>
<div>
    <form method='post' action="<?php $_SERVER['PHP_SELF'];?>">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name='username' class="form-control" placeholder="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name='password' class="form-control" placeholder="password">
        </div>
        <input class='btn btn-primary' name='submit' value='Submit' type="submit">
    </form>
</div>