"use strict"
$(document).ready(function(){
    $('#form1').submit(function() {
        
        // block user actions while waiting for a response from the server
        document.querySelector('#name').disabled    = true;
        document.querySelector('#tel').disabled     = true;
        document.querySelector('#email').disabled   = true;
        document.querySelector('#number').disabled  = true;
        document.querySelector('button').hidden     = true;
        document.querySelector('.waiting').hidden   = false;

        let nameValue    = $('#name').val(),
            telValue     = $('#tel').val(),
            emailValue   = $('#email').val(),
            numberValue  = $('#number').val();

        $.ajax({
            method: "POST",
            url: "calculating.php",
            data: { name    : nameValue, 
                    tel     : telValue, 
                    email   : emailValue, 
                    number  : numberValue }
        })
        .done(function( msg ) {
            $('output').html( msg );
            // unblock user actions when a response is received from the server
            document.querySelector('#name').disabled    = false;
            document.querySelector('#tel').disabled     = false;
            document.querySelector('#email').disabled   = false;
            document.querySelector('#number').disabled  = false;
            document.querySelector('button').hidden     = false;
            document.querySelector('.waiting').hidden   = true;
            // alert( msg ); // just for testing and debugging
        });

    })
});