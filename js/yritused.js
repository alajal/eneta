function hashChangeHandler() {
    console.log(window.location.hash);
    switch (window.location.hash) {
        case "":
        case "#yritused":
            $(".content-col").addClass("not");
            $("#content-col-yritused").removeClass("not");
            break;
        case "#sisestayritus":
            $(".content-col").addClass("not");
            $("#sisesta-yritusi").removeClass("not");

/*            $.get("/templates/events_edit_template.php", function (data) {
                $("#sisesta-yritusi").html(data);
                if ($("#edit-events-form-id").length > 0) {
                    var input_events_form_target = "mysql-tasklist/events/addEventsToDB.php";
                    $("#edit-events-form-id").attr("action", input_events_form_target);
                    $("#edit-events-form-id")[0].reset();
                }
            });*/
            $("#edit-events-form-id")[0].reset();
            break;

        case "#registreeriyritusele":
            $(".content-col").addClass("not");
            $("#registreeri-yritusele").removeClass("not");
            break;
    }

    if (window.location.hash.substr(0, 5) == "#edit") {
        var events_id = window.location.hash.substr(6);
        $(".content-col").addClass("not");
        $("#sisesta-yritusi").removeClass("not");

        $.get("/templates/events_edit_template.php", function(data) {
            $("#sisesta-yritusi").html(data);
            if ($("#edit-events-form-id").length > 0) {
                // kysime news_id v22rtuse ning muudame form'i action atribuudi sobivaks
                var edit_events_form_target = "mysql-tasklist/events/updateEventsInDB.php?id=" + events_id;
                $("#edit-events-form-id").attr("action", edit_events_form_target);
                var title = $("#events_" + events_id + " .events-title").first().text();
                var content = $("#events_" + events_id + " .events-content").first().text();
                //var location = $("events_" + events_id + " .events-location").first().text();
                var eventTime = $("#events_" + events_id + " .events-eventTime").first().text();
                // kysime pealkirja ja sisu v22rtused ning t2idame need
                $("#edit-events-title-id").val(title);
                $("#edit-events-content-id").val(content);
                //$("#edit-events-location-id").val(location);
                $("#edit-events-eventTime-id").val(eventTime);

                var arr = eventTime.split("-");
                var year = arr[0];
                var month = arr[1];
                arr = arr[2].split(" ");
                var day = arr[0];

                $('#edit-events-eventTime-id').datetimepicker({
                    format:'Y-m-d H:i',
                    dayOfWeekStart : 1,
                    lang:"et",
                    startDate: (year + "/" + month + "/" + day)
                });
            }
        });
    }

    if (window.location.hash.substr(0, 11) == "#registered") {
        var events_title = window.location.hash.substr(12);
        $(".content-col").addClass("not");
        $("#content-col-yritused-display-registered").removeClass("not");
        $.get("/templates/events_display_registered.php", {event: events_title}, function(data) {
            $("#content-col-yritused-display-registered").html(data);
        });
    }
}

$(document).ready(function(){


    // kontrollime otselinki
    hashChangeHandler();
    window.onhashchange = hashChangeHandler;

    //var obj = $("#blaaaaaaaaaaaaaa");
    //obj.datepicker();
    var d = new Date();
    var year = d.getFullYear();
    var month = d.getMonth() + 1;
    var day = d.getDate();
    $('#edit-events-eventTime-id').datetimepicker({
        format:'Y-m-d H:i',
        dayOfWeekStart : 1,
        lang:"et",
        startDate:	(year + "/" + month + "/" + day)
    });
});

