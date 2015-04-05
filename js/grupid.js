
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

        var content = $("#content-col-grupid").html();
        history.pushState(content, 'New URL: '+href, href);

    });

    // back and forward buttons
    window.onpopstate = function(event) {
        console.log("pathname: " + location.href);
        $("#content-col-grupid").html(event.state);

    };

    // kui otse link
    if (location.href.substr(-11) != "/grupid.php") {
        loadContent(location.href);
    }


});