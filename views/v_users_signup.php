<div class="page-header">
    <h1><?=APP_NAME?><br><small>Signup Page</small></h1>

<form role="form" method='POST' action='/users/p_signup'>

    <div class="form-group">
    <label for="fname">First Name</label>
    <input type='text' id='fname' name='first_name' required>
    <label for="lname">Last Name</label>
    <input type='text' id='lname' name='last_name' required>
    <label for="email">E-mail</label>
    <input type='text' id='email' name='email' required>
    <label for="pass">Password</label>
    <input type='password' id='pass' name='password' required>



    <input type='submit' value='Sign up'>
    </div> <!-- End form-group -->
</form>

    <!-- Error handling -->
    <?php if(isset($error) && $error=='error'): ?>

        <div class='alert alert-danger'>
            <strong>The specified email already exists. Please <a href="/users/login">log in</a> or try again.</strong>
        </div>
        <br>

        <?php
        $login = new Form();
        $login->open('loginform', "/users/login", NULL, 'POST');
        ?>
        <button class="btn" type="submit">Log in</button><br>

    <?php endif; ?>

    <?php if(isset($error) && $error=='failmail'): ?>
    <div class='alert alert-danger'>
        <strong>Please enter a valid email address!</strong>
    </div>
    <br>
<?php endif; ?>
