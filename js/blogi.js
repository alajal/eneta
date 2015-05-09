
function hashChangeHandler() {
    console.log(window.location.hash);
    //saadame ajaxi oige blogi kohta ning asendame content-coli sisu
    var blogname = window.location.hash.substring(1);

    $.get("/templates/blog_show_template.php", {blogname: blogname}, function(data) {
        $("#content-col-blogi").html(data);
    });
}


$(document).ready(function(){
    // esmalt kontrollime otselinki
    hashChangeHandler();
    // see on ikka p2ris lahe, et nii saab...
    window.onhashchange = hashChangeHandler;
});