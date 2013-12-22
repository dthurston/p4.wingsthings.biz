/**
 * Created by derekthurston on 12/22/13.
 */
function printCard(postcard_id) {
    $.getScript("/js/printThis.js", function(){
        $("#" + postcard_id + ".back").printThis({
            debug: true,
            importCSS: true,
            printContainer: true,
            loadCSS: "/css/postcard-print.css",
            pageTitle: "Your Postcard",
            removeInline: false,
            printDelay: 333,
            header: null});

            $("#" + postcard_id + ".front").printThis({
            debug: true,
            importCSS: true,
            printContainer: true,
            loadCSS: "/css/postcard-print.css",
            pageTitle: "Your Postcard",
            removeInline: false,
            printDelay: 333,
            header: null});
    });
}