console.log('Javascript on ka olemas.');

/*kuva ja peidab sisu elemente vastavalt valitud lingile*/
$(document).ready(function(){
    $("#show-news").click(function(){
        $("#content-col-1").removeClass("not");
        $("#content-col-2").addClass("not");
        $("#content-col-3").addClass("not");
    });
    $("#show-news-input").click(function(){
        $("#content-col-1").addClass("not");
        $("#content-col-2").removeClass("not");
        $("#content-col-3").addClass("not");
    });
    $("#show-news-statistics").click(function(){
        $("#content-col-1").addClass("not");
        $("#content-col-2").addClass("not");
        $("#content-col-3").removeClass("not");
    });

    var current_page = 1;
    var total_nbr_of_pages = document.getElementById("nbr_of_total_news_pages").textContent;

    $("#load_more_news_button").click(function() {
        $.post("mysql-tasklist/news/getMoreNewsFromDB.php", {"current_page_nbr": current_page}, function (data) {
            $("#content-col-1").append(data);
            current_page++;
            // liigutame nupu content-col-1 l6ppu, kui uudiseid enam tulemas ei ole, peidame
            if (current_page < total_nbr_of_pages) {
                $("#load_more_news_button").appendTo("#content-col-1");
            } else {
                $("#load_more_news_button").hide();
            }
        });
    });

});