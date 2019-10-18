<?php
require 'header.php';
?>


    <body>
        
        <div id="body-console">
            <div id="body-console-header">
                <div id="body-console-exit"></div>
                <div id="body-console-min"></div>
                <div id="body-console-max"></div>
                <div style="margin:0 auto 0 auto;color: white;">me@johngmarshall.com</div>
            </div>
            <div id="body-console-content">
                > Hello and welcome to my site!
                <br/> > I am just beginning to learn web development!
                <br/> > I will update this site as I learn more and with all the
                projects I end up creating!
                <br/> > I also enjoy developing in many other languages so we will see where
                that leads...
            </div>

            <?php 
                    if(isset($_SESSION['userId'])) {
                        echo "<p>< <span style='color: #00ff00;'>Logged in</span> /> <a style='text-decoration: none; color:red' href='login/scripts/logout.script.php'>Logout</a> <span id='blinking-cursor'>|</span></p>";
                    } else {
                        echo "<p>< <a href='login' style='text-decoration: none; color:#ff5252'>Dev</a> /> <span id='blinking-cursor'>&nbsp&nbsp</span></p>";
                    }
                ?>


        </div>

        <div id="body-projects">
            <span id="body-projects-start-comment">< !--</span>
            <div id="body-projects-content">
                    <h1>Projects</h1>
                <div id="body-projects-content-box-parent">
                    <div class="body-projects-content-box">
                        <div class="body-projects-content-box-content" >
                            <!--<div id="coupon-img"></div>-->
                                <img class="content-img" src="images/coupon.gif" />
                                <span class="body-projects-content-box-title">Coupon Mapper</span>
                                <p>This web app uses Google Maps API to allow you to search for businesses, put markers at their locations and record what coupon you used and when. Supports multiple events at one location using JS, mySQL, and PHP.</p>
                        </div>
                        
                    </div>
                    <div class="body-projects-content-box">
                        <div class="body-projects-content-box-content" >
                            <!--<div id="coupon-img"></div>-->
                                <img class="content-img" src="images/construction.gif" />
                                <span class="body-projects-content-box-title">Under Construction</span>
                                <p>This app is currently under development.</p>
                        </div>
                        
                    </div>
                    <div class="body-projects-content-box">
                        <div class="body-projects-content-box-content" >
                            <!--<div id="coupon-img"></div>-->
                                <img class="content-img" src="images/construction.gif" />
                                <span class="body-projects-content-box-title">Under Construction</span>
                                <p>This app is currently under development.</p>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <span id="body-projects-end-comment">-- ></span>
        </div>

        <div id="body-contact">
            <h1>Contact Me</h1>
            <p>Send me an email at <a href="mailto:me@johngmarshall.com">me@johngmarshall.com</a></p>


        <div id="enlarged-box">
            <img id="enlarged-img" />
        </div>
        <div id="enlarged-background">
        </div>



    <footer id="footer-content">
        Thank you for taking the time to check out my website. Have a great day!
    </footer>
    <script src="index.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    </body>


</html>