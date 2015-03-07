console.log('Javascript on ka olemas.');

/*kuva ja peidab sisu elemente vastavalt valitud lingile*/
$(document).ready(function(){
    $("#show-news").click(function(){
        $("#content-col-1").removeClass("not");
        $("#content-col-2").addClass("not");
    });
    $("#show-news-input").click(function(){
        $("#content-col-2").removeClass("not");
        $("#content-col-1").addClass("not");

    });
});