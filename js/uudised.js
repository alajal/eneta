function loadContent(url){
    $.get("/content.php", {cid: url}, function(data) {
        $("#content-col-uudised").html(data);
    });
}

