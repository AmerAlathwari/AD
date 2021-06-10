<?php
include("config.php");
include("usersession.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>

    <title>The Coders Online Grocery System</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="images/logo.png"/>

    <link rel="stylesheet" href="css/style.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all"/>
    <link rel="stylesheet" href="css/about.css" type="text/css" media="all"/>


    <script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
    <script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/functions.js" type="text/javascript" charset="utf-8"></script>

</head>

<body id="about-bg">
<?php
include("./header.php")
?>
<div>
    <div id="main" class="shell">
        <div id="content">

        </div>
        <div class="cl">&nbsp;</div>

        <div id="about-us">
            <h2 class="about-page-title">ABOUT US</h2>

            <div class="section group">
                <div>
                    <h1 class="text-center about-page-text-top-shadow">Online Grocery</h1>
                    <br><br>
                    <div class="row">
                        <div class="col-12" >
                            <img  src="images/about%20us,%20front%20page.jpg" alt="no image" style="width: 100%; height: auto"/>
                        </div>
                    </div>

                </div>
                <div>

                </div>
            </div>

            <h3 class="about-page-text-custom5">HOW IT WORKS</h3>
            <div class="row">
                <div class="col-4">
                    <img src="images/order1.PNG" alt="no image">
                    <h3 class="about-page-text-custom6">ORDER</h3>
                </div>
                <div class="col-4">
                    <img src="images/pick%20up.PNG" alt="no image"/>
                    <h3 class="about-page-text-custom6">PICK UP</h3>
                </div>
                <div class="col-4">
                    <img src="images/enjoy.jpg" alt="no image"/>
                    <h3 class="about-page-text-custom6">ENJOY</h3>
                </div>
            </div>

            <div class="cl">&nbsp;</div>
        </div>
    </div>
</div>
<?php
include("./footer.php")
?>

</body>
</html>