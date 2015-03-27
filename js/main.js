function getNewNews(last_news_time) {
    var query_string = {'timestamp' : last_news_time};

    $.post( "mysql-tasklist/news/reverseAjaxNews.php",
            query_string,
            function (data) {
                var obj = $.parseJSON(data);

                $("#content-col-1").prepend(obj.sisu);
                addEditButtonListener();
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

function addEditButtonListener() {
    $(".edit_news_button").click(function(){
        $("#content-col-1").addClass("not");
        $("#content-col-2").removeClass("not");

        // kysime news_id v22rtuse ning muudame form'i action atribuudi sobivaks
        var news_id = ($(this).parent().parent().attr("id")).substr(5);
        var edit_news_form_target = "mysql-tasklist/news/updateNewsInDB.php?id=" + news_id;
        $("#edit-news-form-id").attr("action", edit_news_form_target);

        // kysime pealkirja ja sisu v22rtused ning t2idame need
        var title = $(this).parent().prevUntil(".news-title").last().prev().text();
        var content = $(this).parent().prev().text();
        $("#edit-news-title-id").val(title);
        $("#edit-news-content-id").val(content);

    });
}

function render() {

    // Additional params including the callback, the rest of the params will
    // come from the page-level configuration.
    var additionalParams = {
        'callback': signinCallback
    };

    // Attach a click listener to a button to trigger the flow.
    var signinButton = document.getElementById('signinButton');
    signinButton.addEventListener('click', function() {
        gapi.auth.signIn(additionalParams); // Will use page level configuration
    });
}

function signinCallback(authResult) {
    if (authResult['status']['signed_in']) {
        // Update the app to reflect a signed in user
        // Hide the sign-in button now that the user is authorized:
        document.getElementById('signinButton').setAttribute('style', 'display: none');
        document.getElementById('signoutButton').setAttribute('style', 'display: inline');

        $("#show-news-input").removeClass("not");
        $("#show-profile").removeClass("not");
        $.post("accessToken.php",authResult.access_token);
    } else {
    // Update the app to reflect a signed out user
    // Possible error values:
    //   "user_signed_out" - User is signed-out
    //   "access_denied" - User denied access to your app
    //   "immediate_failed" - Could not automatically log in the user
        console.log('Sign-in state: ' + authResult['error']);
    }
}


$(document).ready(function(){
    /*kuva ja peidab sisu elemente vastavalt valitud lingile*/
    $("#show-news").click(function(){
        $("#content-col-1").removeClass("not");
        $("#content-col-2").addClass("not");
        $("#content-col-3").addClass("not");
        $("#content-col-profile").addClass("not");
    });
    $("#show-news-input").click(function(){
        $("#content-col-1").addClass("not");
        $("#content-col-2").removeClass("not");
        $("#content-col-3").addClass("not");
        $("#content-col-profile").addClass("not");
        var input_news_form_target = "mysql-tasklist/news/addNewsToDB.php";
        $("#edit-news-form-id").attr("action", input_news_form_target);
        $("#edit-news-form-id")[0].reset();
    });
    $("#show-news-statistics").click(function(){
        $("#content-col-1").addClass("not");
        $("#content-col-2").addClass("not");
        $("#content-col-3").removeClass("not");
        $("#content-col-profile").addClass("not");
    });
    $("#show-profile").click(function(){
        $("#content-col-1").addClass("not");
        $("#content-col-2").addClass("not");
        $("#content-col-3").addClass("not");
        $("#content-col-profile").removeClass("not");
    });

    addEditButtonListener();


    //getNewNews('2015-03-20 18:06:54');

    var current_page = 1;
    // var total_nbr_of_pages = document.getElementById("nbr_of_total_news_pages").textContent;
    var total_nbr_of_pages = $("#nbr_of_total_news_pages").text();
    var old_scroll = 0;

    $(window).scroll(function() {
        if( $(window).scrollTop() > old_scroll ){ //if we are scrolling down
            if( ($(window).scrollTop() + $(window).height() >= $(document).height()  ) && (current_page < total_nbr_of_pages) ) {
                $.post("mysql-tasklist/news/getMoreNewsFromDB.php", {"current_page_nbr": current_page}, function (data) {
                    $("#content-col-1").append(data);
                    addEditButtonListener();
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
            $("#content-col-1").append(data);
            addEditButtonListener();
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