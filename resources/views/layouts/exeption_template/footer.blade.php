

<!-- Footer start -->
<footer id="footWrapper">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- main menu footer cell start -->
                <div class="cell-3">
                    <h3 class="block-head">Main Menu</h3>
                    <ul class="footer-menu">
                        <li><a href="{{ url('/') }}">Home Page</a></li>
                        <li><a href="{{ url('/aboutus') }}">About Us</a></li>
                        <li><a href="{{ url('/oursolution') }}">Our Solution</a></li>
                        <li><a href="#"> E-Health</a></li>
                    </ul>
                </div>
                <!-- main menu footer cell start -->

                <!-- Our Friends footer cell start -->
                <div class="cell-3">
                    <h3 class="block-head">Our Friends</h3>
                    <ul class="footer-menu">
                        <li><a href="{{ url('/partners') }}">Partners</a></li>
                        <li><a href="#">Others</a></li>
                        <li><a href="#">Magazine</a></li>
                        <li><a href="http://www.medaicon.net" target="_blank" >MedaiCon</a></li>
                    </ul>
                </div>
                <!-- Our Friends footer cell start -->

                <!-- Useful Links footer cell start -->
                <div class="cell-3">
                    <h3 class="block-head">Useful Links</h3>
                    <ul class="footer-menu">
                        <li><a href="{{ url('/privacy') }}">Privacy policy</a></li>
                        <li><a href="{{ url('/terms') }}">Terms of use</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    </ul>
                </div>

                <!-- contact us footer cell start -->
                <div class="cell-3">
                    <h3 class="block-head">Keep in Touch</h3>
                    <ul>
                        <li class="footer-contact"><i class="fa fa-home"></i><span>BP82, Chez Chok Mrezka 8058 Hammamet, Tunisia.</span></li>
                        <li class="footer-contact"><i class="fa fa-globe"></i><span><a href="#">contact@doctorsina.net</a></span></li>
                        <li class="footer-contact"><i class="fa fa-phone"></i><span>+216 58 87 46 41</span></li>
                        <li class="footer-contact"><i class="fa fa-map-marker"></i><span><a href="{{ url('/map') }}">View our map</a></span></li>

                    </ul>
                </div>
                <!-- contact us footer cell end -->

                <!-- Tags Cloud footer cell start -->

                <div class="clearfix"></div>
                {{--<hr class="hr-style5">--}}
                <div class="clearfix"></div>
                <!-- Tags Cloud footer cell end -->

            </div>
        </div>
    </div>

    <!-- footer bottom bar start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <!-- footer copyrights left cell -->
                <div class="copyrights cell-5">&copy; Copyrights <b>MedicusClinic</b> 2020. All rights reserved. <span><a href="{{ url('/privacy') }}">Privacy policy</a> | <a href="{{ url('/terms') }}">Terms of use</a></span></div>

                <!-- footer social links right cell start -->
                <div class="cell-7">
                    <ul class="social-list right">
                        <li class="skew-25"><a href="https://www.facebook.com/doctorsina.official" target="_blank" data-title="facebook" data-tooltip="true"><span class="fa fa-facebook skew25"></span></a></li>
                        <li class="skew-25"><a href="https://www.linkedin.com/in/laroussi-ben-younes-4560b1149/" target="_blank" data-title="linkedin" data-tooltip="true"><span class="fa fa-linkedin skew25"></span></a></li>
                        <li class="skew-25"><a href="#" data-title="skype" data-tooltip="true"><span class="fa fa-skype skew25"></span></a></li>
                        <li class="skew-25"><a href="https://www.instagram.com/doctorsinapp" target="_blank" data-title="instagram" data-tooltip="true"><span class="fa fa-instagram skew25"></span></a></li>
                        <li class="skew-25"><a href="https://twitter.com/doctorsinapp" target="_blank" data-title="twitter" data-tooltip="true"><span class="fa fa-twitter skew25"></span></a></li>
                        <li class="skew-25"><a href="https://www.youtube.com/channel/UCnwV7bKoFaF95Sm2syKZ7aQ?view_as=subscriber" target="_blank" data-title="YouTube" data-tooltip="true"><span class="fa fa-youtube skew25"></span></a></li>
                    </ul>
                </div>
                <!-- footer social links right cell end -->

            </div>
        </div>
    </div>
    <!-- footer bottom bar end -->

</footer>
<!-- Footer end -->

<!-- Back to top Link -->
<div id="to-top" class="main-bg round100"><span class="fa fa-chevron-up"></span></div>

</div>


<!-- Load JS siles -->
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- Waypoints script -->
<script type="text/javascript" src="js/waypoints.min.js"></script>

<!-- SLIDER REVOLUTION SCRIPTS  -->
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!-- Animate numbers increment -->
<script type="text/javascript" src="js/jquery.animateNumber.min.js"></script>

<!-- slick slider carousel -->
<script type="text/javascript" src="js/slick.min.js"></script>

<!-- Animate numbers increment -->
<script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>

<!-- PrettyPhoto script -->
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>

<!-- Share post plugin script -->
<script type="text/javascript" src="js/jquery.sharrre.min.js"></script>

<!-- Product images zoom plugin -->
<script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>

<!-- Input placeholder plugin -->
<script type="text/javascript" src="js/jquery.placeholder.js"></script>

<!-- Tweeter API plugin 
<script type="text/javascript" src="js/twitterfeed.js"></script>-->

<!-- Flickr API plugin -->
<script type="text/javascript" src="js/jflickrfeed.min.js"></script>

<!-- MailChimp plugin -->
<script type="text/javascript" src="js/mailChimp.js"></script>

<!-- NiceScroll plugin -->
<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>

<!-- general script file -->
<script type="text/javascript" src="js/script.js"></script>


<script type="text/javascript">

$(".btn-refresh").click(function(){

  $.ajax({

     type:'GET',

     url:'/refresh_captcha',

     success:function(data){

        $(".captcha span").html(data.captcha);

     }

  });

});

</script>
<!-- Google  Librarie for Captcha -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(function(){
        $('#form').submit(function(envent){
            var verified=grecaptcha.getResponse();
            var x = document.getElementById("alertcaptcha");

            if (verified.length===0) {
                x.style.display = "block";
                event.preventDefault();
            }
        });
    });
</script>

<script type = "text/javascript">
function change_button(checkbx,button_id) {
    var btn = document.getElementById(button_id);
    if (checkbx.checked == true) {
        btn.disabled = "";
    } else {
        btn.disabled = "disabled";
    }
}
</script>
<!-- Validation PassWord -->
<script>
    $('#password, #confirm_password').on('keyup', function () {
    if ($('#password').val() == $('#confirm_password').val()) {
        $('#messagePassword').html('Matching').css('color', 'green');
    } else 
        $('#messagePassword').html('Not Matching').css('color', 'red');
    });
</script>
<!-- Validation Email -->
<script>
    $('#email, #confirm_email').on('keyup', function () {
    if ($('#email').val() == $('#confirm_email').val()) {
        $('#messageEmail').html('Matching').css('color', 'green');
    } else 
        $('#messageEmail').html('Not Matching').css('color', 'red');
    });
</script>


</body>
</html>