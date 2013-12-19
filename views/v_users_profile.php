<h1>It's your profile <?=$user->first_name?>!</h1>
<p>You've been a proud member since <?= date('F j, Y', $user->created) ?></p>


<form class="form-horizontal" role="form" method='POST' enctype="multipart/form-data" action='/users/profile_update'>
    <div class="control-group">
        <div class="controls">
            <?php if ($user->image  == ''):
                echo '<script src="/js/holder.js"></script>';
                echo '<p>Why not keep your profile looking snazzy with a nice picture of your fine self?</p>';
                echo '<img data-src="holder.js/200x200/text:Add Your Picture">';
            else:
                echo '<img src="/uploads/avatars/' . $user->image . '" alt="' . $user->first_name . ' ' . $user->last_name . '" class="img-polaroid">';
            endif; ?>


        </div>
        <div class="controls">
        <input type="file" id="avatar" name="avatar">
        </div>
    </div>
    <button type="submit" class="btn">Update Your Profile Image</button>
</form>

<?php if(isset($error)): ?>
    <div class="error">
        <h4>The upload has failed.</h4>
        <p>Image file must be a jpg, gif, or png.</p>
    </div>
<?php endif; ?>