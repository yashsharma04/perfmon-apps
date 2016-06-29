<?php
    include 'connection1.php';
        session_start();

    // include 'function.php';
    if (isset($_SESSION['email'])) {
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="If you are looking for website monitoring tool then Perfmon.io is one stop place free website monitoring services, so check your website’s health now.
Perfmon.io offers a complete set of website real-time monitoring and it sends instant email alerts when your website is unavailable to user.">
    <meta name="keyword" content="website monitoring tool, website performance monitoring tool">
    <meta name="google-site-verification" content="fBmthWzznHAiQAsFeIaxmJ3zJjGt8ir8aIud9CuOr8k"/>
    <title>PERFMON.io | Login</title>
    <link rel='shortcut icon' href='https://www.perfmon.io/index/img/2.png' type='image/x-icon'/>
    <link rel="stylesheet" href="https://www.perfmon.io/assets/css/style_login.css">
    <link href="https://www.perfmon.io/assets/css/bootstrap.css" rel="stylesheet">
    <link href="https://www.perfmon.io/assets/css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://www.perfmon.io/sweet_alert/sweetalert.css">
    <script src="https://www.perfmon.io/sweet_alert/sweetalert.min.js"></script>
    <script>
        function loginfb() {
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '949732471752416',
                    cookie: true,
                    xfbml: true,
                    version: 'v2.2'
                });
                getLoginStatus();
            };
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            function getLoginStatus() {
                FB.getLoginStatus(function (status_response) {
                    if (status_response.status === 'connected') {
                        var uid = status_response.authResponse.userID;
                        FB.api('/me', {fields: 'email,first_name,last_name'}, function (response) {
                            var uid = response.id;
                            var first_name = response.first_name;
                            var last_name = response.last_name;
                            var name = first_name + " " + last_name;
                            var email = response.email;
                            if (uid != undefined && first_name != undefined && last_name != undefined && email != undefined) {
                                swal("Logging You In Via Facebook, Please Wait..");
                                $.ajax({
                                    type: "POST",
                                    url: 'https://www.perfmon.io/fb_handler',
                                    data: {"email": email, "name": name, "uid": uid},
                                    success: function (data) {
                                        var dataa = JSON.parse(data);
                                        var dataa = JSON.parse(data);
                                        if (dataa.first.status == "ok" && dataa.second.status == "ok" && dataa.session == "started") {
                                            window.location.assign("Location:index.php");
                                        }
                                    },
                                    error: function (jqXHR, exception) {
                                        if (jqXHR.status === 0) {
                                            swal("Not connection", "Not connection ,Verify Network.", "error");
                                        } else if (jqXHR.status == 404) {
                                            swal("Not Found", "Requested page not found. [404]", "error");
                                        } else if (jqXHR.status == 500) {
                                            swal("Internal Server Error", "Internal Server Error [500].", "error");
                                        } else if (exception === 'parsererror') {
                                            swal("parse error", "Requested JSON parse failed.", "error");
                                        } else if (exception === 'timeout') {
                                            swal("Request Timeout", "Time out error.", "error");
                                        } else if (exception === 'abort') {
                                            swal("Request Aborted", "Ajax request aborted.", "error");
                                        } else {
                                            swal("Error!", "Uncaught Error.n" + jqXHR.responseText, "error");
                                        }
                                    }

                                });
                            }
                        });

                    } else if (status_response.status === 'not_authorized') {
                        console.log("the user is logged in to Facebook but has not authenticated my app");
                        FB_SIGNIN();
                    } else {
                        console.log("the user doesn't logged in to Facebook.");
                        FB_SIGNIN();
                    }
                });
            }
        }
        function FB_SIGNIN() {
            FB.login(function (login_response) {
                if (login_response.status === 'connected') {
                    FB.api('/me', {fields: 'email,first_name,last_name'}, function (response) {
                        var email = response.email;
                        var uid = response.id;
                        var first_name = response.first_name;
                        var last_name = response.last_name;
                        var name = first_name + " " + last_name;
                        if (email != undefined && first_name != undefined && last_name != undefined && id != undefined) {
                            swal("Logging You In Via Facebook, Please Wait..");
                            $.ajax({
                                type: "POST",
                                url: 'https://www.perfmon.io/fb_handler',
                                data: {"email": email, "name": name, "uid": uid},
                                success: function (data) {
                                    console.log(data);
                                    var dataa = JSON.parse(data);
                                    if (dataa.first.status == "ok" && dataa.second.status == "ok" && dataa.session == "started") {
                                        window.location.assign("index.php");
                                    }
                                },
                                error: function (jqXHR, exception) {
                                    if (jqXHR.status === 0) {
                                        swal("Not connection", "Not connection ,Verify Network.", "error");
                                    } else if (jqXHR.status == 404) {
                                        swal("Not Found", "Requested page not found. [404]", "error");
                                    } else if (jqXHR.status == 500) {
                                        swal("Internal Server Error", "Internal Server Error [500].", "error");
                                    } else if (exception === 'parsererror') {
                                        swal("parse error", "Requested JSON parse failed.", "error");
                                    } else if (exception === 'timeout') {
                                        swal("Request Timeout", "Time out error.", "error");
                                    } else if (exception === 'abort') {
                                        swal("Request Aborted", "Ajax request aborted.", "error");
                                    } else {
                                        swal("Error!", "Uncaught Error.n" + jqXHR.responseText, "error");
                                    }
                                }

                            });
                        }
                    });
                } else if (response.status === 'not_authorized') {
                } else {
                }

            }, {scope: 'public_profile,email'});
        }
    </script>
    <!-- Google Analytics Scripts -->
    <script>

        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-74448601-1', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','//connect.facebook.net/en_US/fbevents.js');

    fbq('init', '483166825227713');
    fbq('track', "PageView");</script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=483166825227713&ev=PageView&noscript=1"
    /></noscript>
<!-- End Facebook Pixel Code -->
    
    <style>
        #login {
            border: 1px solid #505050;
            padding-bottom: 20px;
        }

        #legend {
            display: block;
            font-size: 21px;
            line-height: inherit;
            margin-bottom: 20px;
            padding: 0;
            width: 24%;
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            border-color: -moz-use-text-color -moz-use-text-color #e5e5e5;
            border-image: none;
            border-style: none none solid;
            border-width: 0;
            color: #A9A9A9;
            margin-top: 15px;
            margin-left: 20px;
        }
    </style>
</head>
<body id="body_identity" class="align">
<div class="col-lg-8 col-lg-offset-2">
    <fieldset id="login">
        <legend id="legend">Sign in Your Account</legend>
        <div class="col-xs-12 col-sm-5 col-md-4 col-md-offset-1">
            <div class="sns-signin ">
                <a href="#" onclick="loginfb()" class="btn btn-primary" style="margin-top: 52%;">
                    <i class="fa fa-facebook"></i>Continue With Facebook</a>
            </div>
        </div>
        <div class="col-xs-12 col-md-2 col-sm-1">
            <div class="horizontal-divider"></div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="normal-signup">
                <form name="login_form" id="login_form" action="signin.php" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8" style="margin-top:90px;float:right;">
                                <span>Create an Account? <a href="https://www.perfmon.io/signup"> Sign Up</a></span>
                            </div>
                        </div>
                        <input type="email" required="required" placeholder="Email" name="email" id="email"
                               class="form-control">
                        <input type="password" required placeholder="Password" id="password" name="password"
                               class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="https://www.perfmon.io/resetpassword" id="forgot_from_3">Forgot Password?</a>
                        </div>
                        <div class="col-md-5 col-md-offset-7">
                            <button class="btn btn-theme04" name="submit" id="submit" type="submit">Sign In</button>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['submit'])) {
                        if (isset($_POST['email']) && isset($_POST['password'])) {
                            $email = mysqli_real_escape_string($conn, trim($_POST['email']));
                            $password = mysqli_real_escape_string($conn, trim($_POST['password']));
                            $isVerified = false;
                            $query = "select verified from users where email='" . $email . "'";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) != 0) {
                                while ($data = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                    $verified = $data['verified'];
                                    if ($verified == "YES") {
                                        $isVerified = true;
                                    }
                                }
                                if ($isVerified) {
                                    $query = "select password from users where email='" . $email . "'";
                                    $result = mysqli_query($conn, $query);
                                    $database_password = "";
                                    if (mysqli_num_rows($result) != 0) {
                                        while ($data = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                            $database_password = $data['password'];
                                            if (password_verify($password, $database_password)) {
                                                $query1 = "select name,time_zone,profile_pic from user_details where email='" . $email . "'";
                                                $result1 = mysqli_query($conn, $query1);
                                                if (mysqli_num_rows($result1) != 0) {
                                                    while ($data1 = mysqli_fetch_array($result1, MYSQLI_BOTH)) {
                                                        $_SESSION['name'] = $data1['name'];
                                                        $_SESSION['timezone'] = $data1['time_zone'];
                                                        $_SESSION['email'] = $_POST['email'];
                                                        $_SESSION['profile_pic'] = 'https://www.perfmon.io/' . $data1['profile_pic'];
                                                    }
                                                } else {
                                                    echo "failed to initialize session";
                                                    die();
                                                }
                                                if (!headers_sent()) {
                                                    if (isset($_SESSION['current_page'])) {
                                                        header('Location:index.php' . $_SESSION['current_page']);
                                                    } else {
                                                        header('Location:index.php');
                                                    }
                                                    exit;
                                                } else {
                                                    echo '<script type="text/javascript">';
                                                    if (isset($_SESSION['current_page'])) {
                                                        echo 'window.location.href="' . 'index.php' . urldecode($_SESSION['current_page']) . '";';
                                                    } else {
                                                        echo 'window.location.href="' . 'index.php' . '";';
                                                    }
                                                    echo '</script>';
                                                    echo '<noscript>';
                                                    echo '<meta http-equiv="refresh" content="0;url=' . 'index.php' . '" />';
                                                    echo '</noscript>';
                                                    exit;
                                                }
                                            } else {
                                                echo '<p style="color: #D43037; font-size:15px; margin-top: 5px;" align="center"><i class="fa fa-exclamation-triangle"></i>
                                            Authentication Failed</p>';
                                            }
                                        }
                                    } else {
                                        echo '<p style="color: #D43037; font-size:15px; margin-top: 5px;" align="center"><i class="fa fa-exclamation-triangle"></i>
                                            Unknown User Credentials</p>';

                                    }
                                } else {
                                    echo '<p style="color: #D43037; font-size:15px; margin-top: 5px;" align="center"><i class="fa fa-exclamation-triangle"></i>
                                    Email verification required.<a href="https://www.perfmon.io/reverify/' . $email . '">Resend Verification Code.</a></p>';//fill all fields;

                                }
                            } else {
                                echo '<p style="color: #D43037; font-size:15px; margin-top: 5px;" align="center"><i class="fa fa-exclamation-triangle"></i>
                                    Account doesn\'t exist. </p>';
                            }
                        } else {
                            echo '<p style="color: #D43037; font-size:15px; margin-top: 5px;" align="center"><i class="fa fa-exclamation-triangle"></i>
                                    FIll all the required Fields </p>';

                        }
                    } else {
                    }
                    ?>
                </form>
            </div>
        </div>
    </fieldset>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 926104309;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt=""
             src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/926104309/?value=0&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>
</body>
</html>