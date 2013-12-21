<div class="page-header">
    <h1><?=APP_NAME?><br><small>Login</small></h1>
<form class="form-horizontal" method='POST' action='/users/p_login'>
    <div class="control-group">
    <label class="control-label" for "inputEmail">Email</label>
        <div class="controls">
            <input type="text" id="inputEmail" placeholder="Email" name="email">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
            <input type="password" id="inputPassword" placeholder="Password" name="password">
            </div>
    </div>

    <!-- If there are any errors, display them here -->
    <?php if(isset($error)): ?>
    <div class='error'>
        Login failed.  Please double check your email and password.
    </div>
    <br>
    <?php endif; ?>

    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Sign in</button>
        </div>
    </div>
</form>