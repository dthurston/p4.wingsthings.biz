<!-- The postcard_add view is reserved for the creation of a new postcard -->

<!-- Create a Postcard -->
<h3>Create a Postcard</h3>
<!-- If there are no postcards, skip this part and let user upload their photos -->
<?php if(!$photos == '0'):
    echo '
    <form role="form" method=\'POST\' action=\'/postcard/p_create\'>
        <div class="form-group">
            <label for="recipient">Who did the birdie see?</label>
            <input type="text" class="form-control" id="recipient" name="recipient" placeholder="Fred Flinstone" required><br>
            <label for="what-he-saw">What did the little birdie see?</label>
            <input type="text" class="form-control" id="message" name="message" placeholder="I caught you sharing today..." required>
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="555 Happy Way" required>
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Key West" required>
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state" placeholder="FL" required>
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" name="zip" placeholder="33040" required>
            <label for="photo">Select the image on the postcard</label>';

    foreach($photos as $photo):
        echo '<input type="radio" class="form-control" id="photo" name="photo" value="' .$photo['image_name'] .'" required>' .
            '<img src="/uploads/photos/' . $photo['image_name'] . '" class="img-thumbnail" width="240" height="200">';

    endforeach;
    echo '<br>' .
    '<input type=\'submit\' value=\'Create your postcard\'>' .
    '</div>' .
    '</form>';

else:

echo $user->first_name . ', you need to upload at least one image first!';

endif;?>

<!-- Option to upload a new photo here -->
<form role="form" method='POST' enctype="multipart/form-data" action='/postcard/p_upload'>
    <div class="control-group">
        <label class="control-label"><h3>Upload a new image</h3></label><br>
        <div class="controls">
            <input type="file" name="newphoto">
        </div>
    </div>
    <button type="submit" class="btn">Upload a new image</button>

</form>