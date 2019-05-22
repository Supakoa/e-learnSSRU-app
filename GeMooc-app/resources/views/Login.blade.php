<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Log-in</title>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('node_modules/CEFstyle/appLogin.css')}}">

</head>

<body>

    <div id="mainButton">
        <div class="btn-text" onclick="openForm()">Sign In</div>
        <div class="modal">
            <div class="close-button" onclick="closeForm()">x</div>
            <div class="form-title">Sign In</div>
            <div class="input-group">
                <input type="text" id="name" onblur="checkInput(this)" />
                <label for="name">Username</label>
            </div>
            <div class="input-group">
                <input type="password" id="password" onblur="checkInput(this)" />
                <label for="password">Password</label>
            </div>
        <a href="/home" class="form-button"> Go</a>
            <div class="codepen-by">CodePen by Cole Waldrip</div>
        </div>
    </div>
    <div class="codepen-by">CodePen by Cole Waldrip</div>



    <script>
        var button = document.getElementById('mainButton');

        var openForm = function () {
            button.className = 'active';
        };

        var checkInput = function (input) {
            if (input.value.length > 0) {
                input.className = 'active';
            } else {
                input.className = '';
            }
        };

        var closeForm = function () {
            button.className = '';
        };

        document.addEventListener("keyup", function (e) {
            if (e.keyCode == 27 || e.keyCode == 13) {
                closeForm();
            }
        });

    </script>
</body>

</html>
