$(document).ready(function () {
    
    // when clicked on button, delete login cookie ==> automatical redirect to login-page
        $('#logout').click(function(){
            document.cookie = "__uslo_=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        })
    
})