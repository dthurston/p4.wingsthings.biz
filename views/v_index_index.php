<div class="hero-unit">
    <h1 class="hero-h1"><?php if($user) { echo $user->first_name . '\'s Little Birdie'; } else { echo APP_NAME; } ?></h1>
    <br><p class="hero-p">My Dad convinced me when I a youngster that a little birdie sat on the windowsill of my classroom
        or on a tree above the playground and saw me do things-both good or bad.  Now that I am an adult,
        I know that he must have had a conversation with an adult in the building or a coach or teacher
        but imagine if there had been a postcard that could have come in the mail from the little birdie
        who told him?

        It is always nice to “catch” your kids or loved ones doing the right thing without anyone watching.
        Here is a site that lets you reward that great decision or nice act.  Let them know they have been
        Naughty or Nice by sending them a postcard with a photo of them doing a good deed! Or getting in
        trouble ;).</p>
    <p>
        <!-- If the user is logged in, give them a View Posts button -->
        <? if($user):
            echo '<a class="hero-a" href="/postcard/index">My Sent Postcards</a><br>';
            echo '<a class="hero-a"  href="/postcard/create">Create A Postcard</a><br>';
            echo '<a class="hero-a"  href="/users/profile">Edit Profile</a><br>';
            ?>

        <!-- If the user is not logged in, give them a Join button -->
        <?php else: {
            echo '<p class="hero-p">Create a postcard from the little birdie right now!</p>';
            echo '<a href="/users/signup" class="btn btn-primary btn-large">Join '. APP_NAME . '</a>';
        } ?>
        <? endif; ?>
    </p>
</div>