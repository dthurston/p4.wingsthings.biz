<!-- The postcard_index view is for listing out your created postcards and link to the postcard add page -->
<h1>This page is for viewing your postcards!</h1>
<div class="container">
<?php echo $nocards; ?>
<?php foreach($postcards as $card): ?>

<div class="row">
    <div class="col-md-6"><img src="/uploads/photos/<?=$card['image_name']?>"
    class="img-thumbnail" width="240" height="200">
        <table border="1">
            <tr><td><?=$card['recipient']?></td></tr>
            <tr><td><?=$card['address']?></td></tr>
            <tr><td><?=$card['city']?>,<?=$card['state']?></td></tr>
            <tr><td><?=$card['zip']?></td></tr>
            <tr><td>MESSAGE: <?=$card['message']?></td></tr>
        </table>
    </div>
</div><br><br>
<?php endforeach; ?>
</div> <!-- close container -->

<a href="/">Home</a>
