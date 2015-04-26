function loadContent(url){
    $.get("/content.php", {cid: url}, function(data) {
        $("#content-col-uudised").html(data);
    });
}

function getNewNews(last_news_time) {
    var query_string = {'timestamp' : last_news_time};
    $.post( "mysql-tasklist/news/reverseAjaxNews.php", query_string, function (data) {
            var obj = $.parseJSON(data);
            $("#content-col-seenews").prepend(obj.sisu);
            getNewNews(obj.timestamp);
        });
}

function getCurrentTime() {
    var d = new Date();
    var year = d.getFullYear();
    var month = d.getMonth() + 1;
    var day = d.getDate();
    var hours = d.getHours();
    var minutes = d.getMinutes();
    var seconds = d.getSeconds();

    if (month < 10) {month = '0' + month}
    if (day < 10) {day = '0' + day}
    if (hours < 10) {hours = '0' + hours}
    if (minutes < 10) {minutes = '0' + minutes}
    if (seconds < 10) {seconds = '0' + seconds}

    return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
}


function hashChangeHandler() {
    console.log(window.location.hash);
    switch (window.location.hash) {
        case "":
        case "#uudised":
            $(".content-col").addClass("not");
            $("#content-col-seenews").removeClass("not");
            break;
        case "#sisestauudis":
            $(".content-col").addClass("not");
            $("#content-col-insert").removeClass("not");

            $.get("/templates/news_edit_template.php", function(data) {
                $("#content-col-insert").html(data);
                if ($("#edit-news-form-id").length > 0) {
                    var input_news_form_target = "mysql-tasklist/news/addNewsToDB.php";
                    $("#edit-news-form-id").attr("action", input_news_form_target);
                    $("#edit-news-form-id")[0].reset();
                }
            });
            break;
        case "#statistika":
            $(".content-col").addClass("not");
            $("#content-col-statistics").removeClass("not");
            break;
        case "#profiil":
            $(".content-col").addClass("not");
            $("#content-col-profile").removeClass("not");
            break;
    }
    if (window.location.hash.substr(0, 5) == "#edit") {
        var news_id = window.location.hash.substr(6);
        $(".content-col").addClass("not");
        $("#content-col-insert").removeClass("not");

        $.get("/templates/news_edit_template.php", function(data) {
            $("#content-col-insert").html(data);
            if ($("#edit-news-form-id").length > 0) {
                // kysime news_id v22rtuse ning muudame form'i action atribuudi sobivaks
                var edit_news_form_target = "mysql-tasklist/news/updateNewsInDB.php?id=" + news_id;
                $("#edit-news-form-id").attr("action", edit_news_form_target);

                var title = $("#news_" + news_id + " .news-title").first().text();
                var content = $("#news_" + news_id + " .news-content").first().text();
                // kysime pealkirja ja sisu v22rtused ning t2idame need
                //var title = $(this).parent().prevUntil(".news-title").last().prev().text();
                //var content = $(this).parent().prev().text();
                $("#edit-news-title-id").val(title);
                $("#edit-news-content-id").val(content);
            }
        });
    }
}

$(document).ready(function(){
    // esmalt kontrollime otselinki
    hashChangeHandler();
    // see on ikka p2ris lahe, et nii saab...
    window.onhashchange = hashChangeHandler;
    var current_page = 1;
    // var total_nbr_of_pages = document.getElementById("nbr_of_total_news_pages").textContent;
    var total_nbr_of_pages = $("#nbr_of_total_news_pages").text();
    var old_scroll = 0;

    $(window).scroll(function() {
        if( $(window).scrollTop() > old_scroll ){ //if we are scrolling down
            if( ($(window).scrollTop() + $(window).height() >= $(document).height()  ) && (current_page < total_nbr_of_pages) ) {
                $.post("mysql-tasklist/news/getMoreNewsFromDB.php", {"current_page_nbr": current_page}, function (data) {
                    $("#content-col-seenews").append(data);
                    current_page++;
                    // liigutame nupu content-col-1 l6ppu, kui uudiseid enam tulemas ei ole, peidame
                    if (current_page < total_nbr_of_pages) {
                        $("#load_more_news_button").appendTo("#content-col-1");
                    } else {
                        $("#load_more_news_button").hide();
                    }
                });
            }
        }
    });

    $("#load_more_news_button").click(function() {
        $.post("mysql-tasklist/news/getMoreNewsFromDB.php", {"current_page_nbr": current_page}, function (data) {
            $("#content-col-seenews").append(data);
            current_page++;
            // liigutame nupu content-col-1 l6ppu, kui uudiseid enam tulemas ei ole, peidame
            if (current_page < total_nbr_of_pages) {
                $("#load_more_news_button").appendTo("#content-col-1");
            } else {
                $("#load_more_news_button").hide();
            }
        });
    });

    getNewNews(getCurrentTime());
});