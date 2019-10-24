<!doctype html>
<html lang="en">
<head>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }
        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 500px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }
    </style>
    <!------ Include the above in your HEAD tag ---------->

</head>
<body>
<div id="login">
    <h3 class="text-center text-white pt-5">Simple Blog Application By Saif</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">

                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
