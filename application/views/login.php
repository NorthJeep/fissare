<!DOCTYPE html>
<html>

<head>
    <title>Login | Fissare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link rel="stylesheet" type="text/css" href="resources/css/pages/login.css" />
    <!-- end of page level css -->
</head>

<body style="background-image: url('<?php echo base_url('resources/fissare-bg.jpg');?>'); background-repeat: no-repeat; background-attachment: fixed;
    background-position: center; ">
    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div id="container_demo">
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <a class="hiddenanchor" id="toforgot"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form accept-charset="UTF-8" action="#" id="loginform" name="loginform" data-source="<?php echo base_url('C_login/validate_user')?>" novalidate>
                                <h3 >
                                    <img src="resources/logo-fissare.png" style="width: 302px; height: ">
                                    <br></h3>
                                <p>
                                    <label style="margin-bottom:0px;" for="username" class="uname"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                        Username
                                    </label>
                                    <input id="username" name="username" required type="text" placeholder="eg. username" />
                                </p>
                                <p>
                                    <label style="margin-bottom:0px;" for="password" class="youpasswd"> <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                        Password
                                    </label>
                                    <input id="password1" name="password1" required type="password" placeholder="eg. X8df!90EO" />
                                </p>
                                <!-- <p class="keeplogin">
                                    <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
                                    <label for="loginkeeping">Keep me logged in</label>
                                </p> -->
                                <p class="login button">
                                    <input id="act" name="act" required type="hidden" value="login" />
                                    <input type="submit" value="Login" class="btn btn-info" />
                                </p>
                                <p class="change_link">
                                    <!-- <a href="#toforgot">
                                        <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Forgot password</button>
                                    </a> -->
                                    <!-- <a href="#toregister">
                                        <button type="button" class="btn btn-responsive botton-alignment btn-success btn-sm" style="float:right;">Sign up</button>
                                    </a> -->
                                </p>
                            </form>
                                <p>
                                    <a href="<?php echo base_url('C_guest')?>">
                                    <button type="button" class="btn btn-responsive botton-alignment btn-default btn-sm"><span class="glyphicon glyphicon-home"></span> Back to Home</button>
                                    </a>
                                </p>
                        </div>
                        <div id="register" class="animate form">
                            <form action="index.html" autocomplete="on" method="post">
                                <h3 class="black_bg">
                                    <img src="img/logo.png" alt="josh logo">
                                    <br>Sign Up</h3>
                                <div class="form-group">
                                        <label style="margin-bottom:0px;" for="first_name" class="youmail">
                                            <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            First Name
                                        </label>
                                        <input id="first_name" name="first_name" required type="text" placeholder="John" />
                                    </div>

                                    <div class="form-group">
                                        <label style="margin-bottom:0px;" for="last_name" class="youmail">
                                            <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            Last Name
                                        </label>
                                        <input id="last_name" name="last_name" required type="text" placeholder="Doe" />
                                    </div>

                                    <div class="form-group">
                                        <label style="margin-bottom:0px;" for="email" class="youmail">
                                            <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            E-mail
                                        </label>
                                        <input id="email" name="email" required type="email" placeholder="mysupermail@mail.com" />
                                    </div>

                                    <div class="form-group">
                                        <label style="margin-bottom:0px;" for="email" class="youmail">
                                            <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            Confirm E-mail
                                        </label>
                                        <input id="email_confirm" name="email_confirm" required type="email" placeholder="mysupermail@mail.com" />
                                    </div>

                                    <div class="form-group">
                                        <label style="margin-bottom:0px;" for="password" class="youpasswd">
                                            <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            Password
                                        </label>
                                        <input id="password" name="password" required type="password" placeholder="eg. X8df!90EO" />
                                    </div>

                                    <div class="form-group">
                                        <label style="margin-bottom:0px;" for="passwor_confirm" class="youpasswd">
                                            <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                            Confirm Password
                                        </label>
                                        <input id="password_confirm" name="password_confirm" required type="password" placeholder="eg. X8df!90EO" />
                                    </div>
                                
                                <p class="signin button">
                                    <input type="submit" class="btn btn-success" value="Sign up" />
                                </p>
                                <p class="change_link">
                                    <a href="#tologin" class="to_register">
                                        <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Back</button>
                                    </a>
                                </p>
                            </form>
                        </div>
                        <div id="forgot" class="animate form">
                            <form action="index.html" autocomplete="on" method="post">
                                <h3 class="black_bg">
                                    <img src="img/logo.png" alt="josh logo">Password</h3>
                                <p>
                                    Enter your email address below and we'll send a special reset password link to your inbox.
                                </p>
                                <p>
                                    <label style="margin-bottom:0px;" for="emailsignup1" class="youmai">
                                        <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i>
                                        Your email
                                    </label>
                                    <input id="emailsignup1" name="emailsignup" required type="email" placeholder="your@mail.com" />
                                </p>
                                <p class="login button">
                                    <input type="submit" value="Login" class="btn btn-success" />
                                </p>
                                <p class="change_link">
                                    <a href="#tologin" class="to_register">
                                        <button type="button" class="btn btn-responsive botton-alignment btn-warning btn-sm">Back</button>
                                    </a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="resources/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="resources/js/bootstrap.min.js" type="text/javascript"></script>
    <!--livicons-->
    <script src="resources/vendors/livicons/minified/raphael-min.js" type="text/javascript"></script>
    <script src="resources/vendors/livicons/minified/livicons-1.4.min.js" type="text/javascript"></script>
   <script src="resources/js/josh.js" type="text/javascript"></script>
    <script src="resources/js/metisMenu.js" type="text/javascript"> </script>
    <script src="resources/vendors/holder-master/holder.js" type="text/javascript"></script>
    <!-- end of global js -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#loginform').on('submit', (function(e) {
                e.preventDefault();
                $.ajax({
                    async: true,
                    url: $('#loginform').data('source'),
                    type: "POST",
                    data: $('#loginform').serialize(),
                    dataType: 'json',
                    cache: false,
                    success: function(data)
                    {
                        if(data['IsError'] == 0) {
                            window.location.replace(data['url']);
                        }
                    },
                    error: function(data)
                    {

                    }
                })
            }))
        })
    </script>
</body>
</html>
