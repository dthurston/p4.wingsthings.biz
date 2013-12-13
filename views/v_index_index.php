<div class="hero-unit">
    <h1>Welcome to <?=APP_NAME?><?php if($user) echo ', '.$user->first_name; ?></h1>
    <p>Blab your life away....</p>
    <p>
        <!-- If the user is logged in, give them a View Posts button -->
        <? if($user): echo '<a href="/posts/index" class="btn btn-primary btn-large">View Posts</a>'; ?>
        <!-- If the user is not logged in, give them a Join button -->
        <? else: echo '<a href="/users/signup" class="btn btn-primary btn-large">Join '.APP_NAME.'</a>'; ?>
        <? endif; ?>
    </p>
    <!-- Mention the +1 features -->
    <p> +1 Feature: Upload a profile photo!</p>
    <p> +1 Feature: Edit your profile!</p>
</div>