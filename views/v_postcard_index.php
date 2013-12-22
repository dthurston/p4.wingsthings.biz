<!-- The postcard_index view is for listing out your created postcards and link to the postcard add page -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="https://code.jquery.com/jquery.js"></script> -->
<script src="/js/jquery-2.0.2.min.js"></script>
<!--<script src="/js/printThis.js"></script>-->
<script src="/js/printCard.js"></script>
<!-- load the postcard.js javascript that will flip the card -->
<script src="/js/postcard.js"></script>
<h1>This page is for viewing your postcards!</h1>
<p>Click on any card to flip them over!</p>
<div class="container">
    <!--If there are no cards yet, echo out the $nocards message from the postcard controller -->
    <?php echo $nocards; ?>
    <?php foreach($postcards as $card): ?>

<div class="front" id="<?php echo $card['postcard_id']?>" style="width:600px;display:none;"
     onclick="flipCard('<?php echo $card['postcard_id']?>')">

        <img src="/uploads/photos/<?=$card['image_name']?>" height="350" width="650"><br>

</div>

<div class="back" id="<?php echo $card['postcard_id']?>" style="width:600px" onclick="flipCard('<?php echo $card['postcard_id']?>')">
    <div id="header" style="background-color:#F2F2F2;height:30px;width:600px;">
    </div>
            <div id="left-side" style="background-color:#F2F2F2;height:300px;width:350px;float:left;">
                <div id="left-side-top" style="background-color:#F2F2F2;height:100px;width:350px;float:left;">
                    <div id="message" style="background-color:#F2F2F2;height:100px;width:350px;float:right;">
                        <?=$card['message']?>
                    </div>
                </div>
            </div>

        <div id="right-side" style="background-color:#F2F2F2;height:300px;width:250px;float:left;">
            <div id="address-top" style="background-color:#F2F2F2;height:150px;width:250px;float:left;">
                <div id="address-top-quarter" style="background-color:#F2F2F2;height:75px;width:250px;float:left;">
                    <div id="stamp" style="background-color:#F2F2F2;height:75px;width:90px;float:right;">
                        <img src="/images/US_stamp_1895_1c_Franklin.jpg">
                    </div>
                </div>
            </div>
            <div id="address-bottom" style="background-color:#F2F2F2;height:150px;width:250px;float:right;">
                <?=$card['recipient']?><br>
                <?=$card['address']?><br>
                <?=$card['city']?>,<?=$card['state']?><br>
                <?=$card['zip']?>
            </div>
        </div>

        <div id="footer" style="background-color:#F2F2F2;clear:both;text-align:center;" onclick="printCard('<?php echo $card['postcard_id']?>')">
            Created at http://p4.wingsthings.biz.
        </div>

    </div>
</div>
<br><br>

<?php endforeach; ?>
