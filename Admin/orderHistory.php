<?php
include("../session.php");
include("../config.php");
?>

<!doctype html>

<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Coders Online Grocery System</title>
    <link rel="shortcut icon" href="../images/logo.png" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/flexslider.css">
    <link rel="stylesheet" href="../css/jquery.fancybox.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/font-icon.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />

    <script src="./js/jquery-1.5.2.min.js" type="text/javascript"></script>
    <script src="./js/hideshow.js" type="text/javascript"></script>
    <script src="./js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="./js/jquery.equalHeight.js"></script>

    <script type="text/javascript">
        $(document).ready(function()
            {
                $(".tablesorter").tablesorter();
            }
        );
        $(document).ready(function() {


            $(".tab_content").hide(); 
            $("ul.tabs li:first").addClass("active").show(); 
            $(".tab_content:first").show(); 

            $("ul.tabs li").click(function() {

                $("ul.tabs li").removeClass("active"); 
                $(this).addClass("active"); 
                $(".tab_content").hide(); 

                var activeTab = $(this).find("a").attr("href"); 
                $(activeTab).fadeIn(); 
                return false;
            });

        });
    </script>

    <script type="text/javascript">
        $(function(){
            $('.column').equalHeight();
        });
    </script>

    <script type="text/javascript" src="./js/jquery-1.9.1.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            load_data = {'fetch':1};
            window.setInterval(function(){
                $.post('shout.php', load_data,  function(data) {
                    $('.message_box').html(data);
                    var scrolltoh = $('.message_box')[0].scrollHeight;
                    $('.message_box').scrollTop(scrolltoh);
                });
            }, 1000);


            $("#shout_message").keypress(function(evt) {
                if(evt.which == 13) {
                    var iusername = $('#shout_username').val();
                    var imessage = $('#shout_message').val();
                    post_data = {'username':iusername, 'message':imessage};

                    $.post('shout.php', post_data, function(data) {

                        $(data).hide().appendTo('.message_box').fadeIn();

                        var scrolltoh = $('.message_box')[0].scrollHeight;
                        $('.message_box').scrollTop(scrolltoh);

                        $('#shout_message').val('');

                    }).fail(function(err) {

                        alert(err.statusText);
                    });
                }
            });

            $(".close_btn").click(function (e) {

                var toggleState = $('.toggle_chat').css('display');

                $('.toggle_chat').slideToggle();

                if(toggleState == 'block')
                {
                    $(".header div").attr('class', 'open_btn');
                }else{
                    $(".header div").attr('class', 'close_btn');
                }


            });
        });

    </script>
</head>
<body>

<?php
    include ("./dashboard.php")
?>

<!--MAIN Content-->
<div class="order-detail-main">
    <section id="main" class="column">

        <h4 class="alert_info">Welcome To <strong>"The Coders System Management"</strong> Admin Panel As: <?php echo "  ". "<font color='#f90'><big><b>".$login_session."</b></big></font>" ;?>  </h4>

        <article class="module width_full" style="height: 800px; color:black">
            <?php
            $result = mysqli_query($mysqli,"SELECT * FROM orders");
            ?>
            <div id="tab2" class="tab_content">
                <table class="tablesorter" cellspacing="0">
                    <thead>
                    <thead><th colspan="7"> Order History</th></thead>
                    <thead>
                    </tr>
                    <th> ID</th>
                    <th> Name</th>
                    <th>Email</th>
                    <th>Total</th>
                    <th>Shipped</th>
                    <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while($row = mysqli_fetch_array($result))
                    {?>

                        <tr>
                            <td><?Php echo $row['Order_ID']; ?></td>
                            <td><?php echo $row['Customer_Name']; ?></td>
                            <td><?php echo $row['Email']; ?></td>
                            <td><?php echo $row['Total']; ?></td>
                            <td><?php echo $row['shipped']; ?></td>
                            <td> <a href="orderDelete.php?delete=<?php echo $row['Order_ID']; ?>" onClick="del(this);" title="Delete" ><input type="image" src="images/icn_trash.png" title="Trash">  </a></td>
                        </tr>

                    <?php }mysqli_close($mysqli);?>
                    </tbody>
                </table>

            </div>
        </article><!-- end of stats article -->

</div>
<!--End of Main Content-->


<!-- header content section -->
<section id="hero" class="section ">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-10 hero">
                <div class="hero-content">
                </div>
                <!-- hero -->
            </div>
        </div>
    </div>
</section>
<!-- footer section -->
<footer class="footer">
    <div class="container">
        <div class="col-md-6 left">
            <h4>Don't forget to shop now! For any enquiries :</h4>
            <p> Call: +603 5521 4421 OR Email : <a href="mailto:alyanasuha1@gmail.com"> grocery@thecoders.com </a></p>
        </div>
        <div class="col-md-6 right">
            <p>© 2021 All rights reserved. All Rights Reserved<br>
                Made with <i class="fa fa-heart pulse"></i> by The Coders Team</p>
        </div>
    </div>
</footer>
<!-- footer section -->
<!-- JS FILES -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.fancybox.pack.js"></script>
<script src="../js/retina.min.js"></script>
<script src="../js/modernizr.js"></script>
<script src="../js/main.js"></script>
</body>
</html>
