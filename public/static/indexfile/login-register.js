/*
 *
 * login-register modal
 * Autor: Creative Tim
 * Web-autor: creative.tim
 * Web script: #
 * 
 */
function showRegisterForm() {
    jQuery('.loginBox').fadeOut('fast', function() {
        jQuery('.registerBox').fadeIn('fast');
        jQuery('.login-footer').fadeOut('fast', function() {
            jQuery('.register-footer').fadeIn('fast');
        });
        jQuery('.modal-title').html('Register with');
    });
    jQuery('.error').removeClass('alert alert-danger').html('');

}

function showLoginForm() {
    jQuery('#loginModal .registerBox').fadeOut('fast', function() {
        jQuery('.loginBox').fadeIn('fast');
        jQuery('.register-footer').fadeOut('fast', function() {
            jQuery('.login-footer').fadeIn('fast');
        });

        jQuery('.modal-title').html('Login with');
    });
    jQuery('.error').removeClass('alert alert-danger').html('');
}

function showReviseForm() {
    jQuery('.loginBox').fadeOut('fast', function() {
        jQuery('.reviseBox').fadeIn('fast');
        jQuery('.login-footer').fadeOut('fast', function() {
            jQuery('.revise-footer').fadeIn('fast');
        });
        jQuery('.modal-title').html('修改密码');
    });
    jQuery('.error').removeClass('alert alert-danger').html('');

}

function openLoginModal() {
    showLoginForm();
    setTimeout(function() {
        jQuery('#loginModal').modal('show');
    }, 230);

}

function openRegisterModal() {
    showRegisterForm();
    setTimeout(function() {
        jQuery('#loginModal').modal('show');
    }, 230);

}

function openReviseModal() {
    showReviseForm();
    setTimeout(function() {
        jQuery('#loginModal').modal('show');
    }, 230);
}

function loginAjax() {
    /*   Remove this comments when moving to server
    jQuery.post( "/login", function( data ) {
            if(data == 1){
                window.location.replace("/home");            
            } else {
                 shakeModal(); 
            }
        });
    */

    /*   Simulate error message from the server   */
    shakeModal();
}

function shakeModal() {
    jQuery('#loginModal .modal-dialog').addClass('shake');
    jQuery('.error').addClass('alert alert-danger').html("Invalid email/password combination");
    jQuery('input[type="password"]').val('');
    setTimeout(function() {
        jQuery('#loginModal .modal-dialog').removeClass('shake');
    }, 1000);
}