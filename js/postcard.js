function flipCard(postcard_id) {

    $( "#" + postcard_id + ".back" ).on( "click", function() {
        $( "#" + postcard_id + ".back" ).fadeOut("fast", function() {
            // fade back in
        });

        $( "#" + postcard_id + ".front" ).fadeIn("fast", function() {
            // fade back in
        });
    });

    $( "#" + postcard_id + ".front" ).on( "click", function() {
        $( "#" + postcard_id + ".front" ).fadeOut("fast", function() {
            // fade back in
        });

        $( "#" + postcard_id + ".back" ).fadeIn("fast", function() {
            // fade back in
        });
    });
}