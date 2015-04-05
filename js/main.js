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
        $.post("accessToken.php",authResult.access_token).always(function(){
            location.reload();  //lehe refreshimiseks
        });
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

    $("#signoutButton").click(function(){
        $.post("logout.php").always(function(){
            location.reload();
        });
    });

});