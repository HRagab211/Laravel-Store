<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <style>
        body {
            background-color: #F4F4F4;
        }

        .admin-login {
            width: 300px;
            margin: 100px auto;
            color: #888;
        }

        .admin-login input {
            margin-bottom: 10px;
        }

        .admin-login .form-control {
            background-color: #EAEAEA;
        }

        .admin-login .btn {
            background-color: #008dde;
        }
    </style>
</head>

<body>
    <form method="POST" action="{{ route('admin.verify') }}" class="admin-login">
        
        @csrf
        <h4 class="text-center">Admin Login Area</h4>
        <input class="form-control" type="text" name="name" placeholder="Username" />
        <input class="form-control" id="admin-pass" type="password" name="password" placeholder="Password"
            autocomplete="new-password">
        <input class="btn btn-primary btn-block" type="submit" value="Log in" />
    </form>


    <script>
        // Hiding Placeholder On Form Focus
        function hidePlaceholderOnFocus() {
            $('[placeholder]').focus(function() {
                $(this).attr("placeholder-text", $(this).attr("placeholder"));
                $(this).attr("placeholder", "");
            }).blur(function() {
                $(this).attr("placeholder", $(this).attr("placeholder-text"));
            });
        }
        // Hiding/Showing Password
        function hideShowPass() {
            $("#admin-check").click(function() {
                if (this.checked) {
                    $("#admin-pass").attr("type", "text");
                } else {
                    $("#admin-pass").attr("type", "password");
                }
            });
        }

        hidePlaceholderOnFocus();
        hideShowPass();
    </script>
</body>

</html>
