
function loadContent(url){
    $.get("/content.php", {cid: url}, function(data) {
        $("#content-col-grupid").html(data);
    });
}


$(document).ready(function(){

    $(".grupid-select").click(function(e) {
        e.preventDefault();
        var href = $(this).attr("href");

        loadContent(href);

        // HISTORY.PUSHSTATE
        history.pushState('', 'New URL: '+href, href);

    });

    // THIS EVENT MAKES SURE THAT THE BACK/FORWARD BUTTONS WORK AS WELL
    window.onpopstate = function(event) {
        console.log("pathname: "+location.pathname);
        loadContent(location.pathname);
    };


});