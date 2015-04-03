
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

    // back and forward buttons
    window.onpopstate = function(event) {
        console.log("pathname: " + location.href);
        if (location.href.substr(-11) != "/grupid.php") {
            loadContent(location.href);
        } else {
            location.href = "/grupid.php";
        }

    };

    // kui otse link
    if (location.href.substr(-11) != "/grupid.php") {
        loadContent(location.href);
    }


});