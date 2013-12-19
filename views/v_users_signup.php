<div class="page-header">
    <h1><?=APP_NAME?><br><small>Signup Page</small></h1>

<form role="form" method='POST' action='/users/p_signup'>

    <div class="form-group">
    <label for="fname">First Name</label>
    <input type='text' id='fname' name='first_name'>
    <label for="lname">Last Name</label>
    <input type='text' id='lname' name='last_name'>
    <label for="email">E-mail</label>
    <input type='text' id='email' name='email'>
    <label for="pass">Password</label>
    <input type='password' id='pass' name='password'>
    <input type='submit' value='Sign up'>
    </div> <!-- End form-group -->
</form>