<h1>It's your profile <?=$user->first_name?>!</h1>
<p>You've been a proud member since <?= date('F j, Y', $user->created) ?></p>

    <script data-src="js/holder.js"></script>
    <!-- If the user has no image, use placeholder.jpg as a temp holding name -->
    <?php if ($user->image == 'placeholder.jpg'): ?>
    <p> Please upload a picture of yourself! </p>
    <?php endif; ?>
<!-- $$$ Need to add a holder.js image here if no image -->

<form class="form-horizontal" role="form" method='POST' enctype="multipart/form-data" action='/users/profile_update'>
    <div class="control-group">
        <div class="controls">
        <img src="/uploads/avatars/<?= $user->image ?>" alt="<?=$user->first_name . ' ' . $user->last_name ?>" class="img-polaroid">
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