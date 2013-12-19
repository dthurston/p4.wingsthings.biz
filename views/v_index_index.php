<div class="hero-unit">
    <h1><?php if($user) { echo $user->first_name . '\'s Little Birdie'; } else { echo APP_NAME; } ?></h1>
    <p>Welcome!  When your not watching, a little birdie is watching your kids... In School, Practice, with friends....
    Let them know they have been Naughty or Nice by sending them a postcard with a photo of them doing a good deed!
    Or getting in trouble!! They will know that you can't always be there, and when your not, A Little Birdie is
    watching!</p>
    <p>
        <!-- If the user is logged in, give them a View Posts button -->
        <? if($user):
            echo '<a href="/postcard/index">My Sent Postcards</a><br>';
            echo '<a href="/posts/index">Create A Postcard</a><br>';
            echo '<a href="/posts/index">Upload A Photo</a><br>';
            echo '<a href="/posts/index">My Current Photos</a><br>';
            echo '<a href="/users/profile">Edit Profile</a><br>';
            ?>
        <!-- If the user is not logged in, give them a Join button -->
        <? else: echo '<a href="/users/signup" class="btn btn-primary btn-large">Join '. APP_NAME . '</a>'; ?>
        <? endif; ?>
    </p>
    <!-- Mention the +1 features -->
    <p>Create a postcard from the little birdie right now!</p>
</div>