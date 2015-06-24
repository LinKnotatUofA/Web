
function login () {
        $("#login").on('click', function () {
            $.Dialog({
                shadow: true,
                overlay: false,
                draggable: true,
                icon: '<img src="Assets/default_user.png">',
                title: 'Draggable window',
                width: 'auto',
                padding: 10,
                content: 'This Window is draggable by caption.',
                onShow: function () {
                    var content = '<form id="login-form-1" action="account/login.php/" method ="POST">' +
                            '<p>Login</p>' +
                            '<div class="input-control text"><input type="text" name="login"><button class="btn-clear"></button></div>' +
                            '<p>Password</p>' +
                            '<div class="input-control password"><input type="password" name="password"><button class="btn-reveal"></button></div>' +
                            '<div class="input-control checkbox"><p>Remember Me <input type="checkbox" name="c1" checked/><span class="check"></span></p></div>' +
                            '<div class="form-actions">' +
                            '<button class="button primary">Login to...</button>&nbsp;' +
                            '<button class="button warning" type="button"><a href="account/registration.php">Register</a></button>&nbsp;' +
                            '<button class="button" type="button" onclick="$.Dialog.close()">Cancel</button> ' +
                            '</div>' +
                            '</form>';

                    $.Dialog.title("User login");
                    $.Dialog.content(content);
                }

            });
        });

                
    }