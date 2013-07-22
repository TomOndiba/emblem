define(['jquery'], function($) {

    var $form,
        $usernameInput,
        $passwordInput,
        $loginBtn;

    $(function() {
        
        $form = $('#login-form');
        $usernameInput = $('#username');
        $passwordInput = $('#password');
        $loginBtn = $('#login_btn');

        $form.submit(function(e) {
            e.preventDefault();
        });
        
        $loginBtn.click(function(e) {
            e.preventDefault();
            login();
        });

        $usernameInput.focus();

    });

    function showError(msg) {
        var container = $('.alert-message');
        container.find('p').html(msg).stop().fadeIn(200);
    }

    function login() {
        
        var username = $usernameInput.val(),
            password = $passwordInput.val(),
            url = 'login/login_ajax';
        
        $loginBtn.addClass('disabled');
        
        $.post(
            url,
            {username: username, password: password},
            function(data) {
                (data) ? 
                    (data.success) ?
                        window.location.href = 'homepage/'
                        : showError(data.error)
                    : console.error('No response.');

                $loginBtn.removeClass('disabled');
            }, 'json'
        );
    };

});