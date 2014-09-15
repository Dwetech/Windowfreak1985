/* 
 Created on : Sep 15, 2014, 2:59:39 PM
 Author        : me@rafi.pro
 Name         : Mohammad Faozul Azim Rafi
 */
$(document).ready(function () {

    window.setTimeout(function () {
        $(".alert-danger").fadeTo(1500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 5000);

});