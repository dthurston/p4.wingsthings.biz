<!-- The postcard_add view is reserved for the creation of a new postcard -->

<!-- Create a Postcard -->
<h3>Create a Postcard</h3>
<form role="form" method='POST' action='/postcard/p_create'>
<div class="form-group">
    <label for="salutation">Who did the birdie see?</label>
    <input type="text" class="form-control" id="salutation" name="salutation" placeholder="Dear Fred"><br>
    <label for="what-he-saw">What did the little birdie see?</label>
    <input type="text" class="form-control" id="what-he-saw" name="what-he-saw" placeholder="I caught you sharing today...">
    <label for="encouragement">Give them some praise!</label>
    <input type="text" class="form-control" id="encouragement" name="encouragement" placeholder="Keep up the good work!">
</div>
<!-- <div class="form-group"> -->
    <label for="photo">Select the image on the postcard</label>
    <?php foreach($photos as $photo): ?>
        <input type="radio" class="form-control" id="photo" name="photo">
        <img src="/uploads/photos/<?=$photo['image_name']?>" class="img-thumbnail" width="240" height="200">
    <?php endforeach; ?>
    <br>
    <input type='submit' value='Create your postcard'>
    </div>
</form>


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