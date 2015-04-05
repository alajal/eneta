
function loadContent(url){
    $.get("/content.php", {cid: url}, function(data) {
        $("#content-col-grupid").html(data);
        history.pushState(data, 'New URL: '+url, url);
    });
}

$(document).ready(function(){

    $(".grupid-select").click(function(e) {
        e.preventDefault();
        var href = $(this).attr("href");

        loadContent(href);

    });

    // back and forward buttons
    window.onpopstate = function(event) {
        console.log("pathname: " + location.href);
        if (event.state) {
            $("#content-col-grupid").html(event.state);
        } else {
            location.href = "/grupid.php";
        }

    };

    // kui otse link
    if (location.href.substr(-11) != "/grupid.php") {
        loadContent(location.href);
    }


});