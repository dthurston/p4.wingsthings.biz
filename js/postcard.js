$( ".back" ).on( "click", function() {
    $(".back").fadeOut("fast", function() {
        // fade back in
    });

    $(".front").fadeIn("fast", function() {
        // fade back in
    });
});
$( ".front" ).on( "click", function() {
    $(".front").fadeOut("fast", function() {
        // fade back in
    });

    $(".back").fadeIn("fast", function() {
        // fade back in
    });
});
