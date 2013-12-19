<!-- The postcard_index view is for listing out your created postcards and link to the postcard add page -->
<h1>This page is for viewing your postcards!</h1>
<div class="container">
<?php foreach($postcards as $card): ?>

<div class="row">
    <div class="col-md-3"><img src="/uploads/photos/<?=$card['image_name']?>"
    class="img-thumbnail" width="240" height="200">
        <table border="1">
            <tr><td>NAME</td></tr>
            <tr><td>ADDRESS</td></tr>
            <tr><td>CITY, STATE</td></tr>
            <tr><td>ZIP</td></tr>
            <tr><td><?=$card['message']?></td></tr>
        </table>
    </div>
</div>
<?php endforeach; ?>
</div> <!-- close container -->

<!-- Standard button -->
<a href="/">Home</a>
