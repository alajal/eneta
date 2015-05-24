

function hashChangeHandler() {
    console.log(window.location.hash);
    //saadame ajaxi oige blogi kohta ning asendame content-coli sisu
    var url = window.location.hash.substring(1);

    $.get("/content.php", {cid: url}, function(data) {
        $("#content-col-grupid").html(data);
    });
}



$(document).ready(function(){

    // esmalt kontrollime otselinki
    hashChangeHandler();
    window.onhashchange = hashChangeHandler;

});