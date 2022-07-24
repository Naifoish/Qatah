{*<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
Newsletter
</button>*}
<style>
    .footer-bot-text{
        justify-content: center;
    }
</style>
<div class="subscribe-news-letter">
    <div class="modal fade login-reg-top" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="{$HTTP_PATH}images/close-modal.svg" class="img-fluid" alt="close modal" />
                    </button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="news-letter-img">
                        <img src="{$HTTP_PATH}images/news-letter-img.png" class="img-fluid" alt="News letter" />
                    </div>
                    <div class="news-letter-text">
                        <h3>
                            {gettext var="Newsletter"}

                        </h3>
                        <p>
                            {gettext var="Sign up to receive our monthly marketing newsletter"}

                        </p>
                    </div>
                    <div class="news-letter-form">
                        <form action="##" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div class="form-group row">
                                <div class="col-sm-7">
                                    <input type="text" name="EMAIL"  class="form-control" id="staticEmail" placeholder="{gettext var="Enter your email here"}">
                                </div>
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-default">

                                        {gettext var="Subscribe"}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="footer-layer-top"></div>
    <div class="footer-curve">
        <div class="container-fluid"></div>
    </div>
    <div class="footer-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-menu-links">
                        <ul>
                            {foreach from=$footer item=men}  
                                <li>
                                    <a href="{$men.link}">
                                        {$men.name}
                                    </a>
                                </li>
                            {/foreach}
                   
                            <li><a href="#"  data-toggle="modal" data-target="#myModal">
                                    {gettext var="Subscribe newsletter"}
                                </a></li>
                        </ul>
                    </div>
                    <div class="footer-social-media">
                        <div class="footer-social-media-title">
                            <h3>{gettext var="Follow 3abkari on social media"}</h3>
                        </div>
                        <div class="social-media-icons">
                            <div class="social-media-circle"><a href="{$twitter}" target="_blank"><img src="{$HTTP_PATH}images/twitter.png" alt="" class="img-fluid"> </a></div>
                            <div class="social-media-circle"><a href="{$whatsapp}" target="_blank"><img src="{$HTTP_PATH}images/whatsapp.png" alt="" class="img-fluid"> </a></div>
                            <div class="social-media-circle"><a href="{$facebook}" target="_blank"><img src="{$HTTP_PATH}images/facebook.png" alt="" class="img-fluid"> </a></div>
                            <div class="social-media-circle"><a href="{$instagram}" target="_blank"><img src="{$HTTP_PATH}images/instagram.png" alt="" class="img-fluid"> </a></div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bot">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-bot-text">
                        {* <p>{gettext var="Designed and developed by"} <a href="https://www.istanbulit.com/" target="_blank">{gettext var="Istanbul IT"}</a>
                        </p>*}
                        {*  <p>© 2020 {gettext var="3abkari.All Rights Reserved"}</p>*}
                        <p>© {gettext var="COPYRIGHTS 2020"}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<input type="hidden" id="lang_save" value="{$lang}">

<script src="{$HTTP_PATH}js/jquery-3.2.1.min.js"></script>
<script src="{$HTTP_PATH}js/jquery.easing.min.js"></script>
<script src="{$HTTP_PATH}js/bootstrap.min.js"></script>
<script src="{$HTTP_PATH}js/flickity.pkgd.min.js"></script>
<script src="{$HTTP_PATH}js/script.js?{$smarty.now}"></script>
<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>

{if $Page=="profile"}
    <script src="{$HTTP_PATH}js/chosen.jquery.min.js"></script>

    {literal}
        <script type="text/javascript">
            $(function () {
                $('.chosen-select').chosen();
                $('.chosen-select-deselect').chosen({
                    rtl: true,
                    allow_single_deselect: true
                });
            });
        </script>
    {/literal}
{/if}



<script>
    const HTTP_PATH_CRM = "{$CRM_URL}";
    const userLogin ={if empty($userLogin)}0{else}1{/if}
</script>

{if $errorlogin==1 }
    <script>   $(document).ready(function () {
            $('#loginModal').modal('show');
            $('#errorLogin').html('{gettext var="Sorry, incorrect email or password"}');
        });</script>
    {/if}

{if $loginT==1 }
    <script>   $(document).ready(function () {
            $('#loginModal').modal('show');
        });</script>
    {/if}
{if $addTeacher==1 }
    <script>   $(document).ready(function () {
            $('#addTeacherDone').modal('show');
        });</script>
    {/if}
    {if $successful == 1 }
    <script>    $(document).ready(function () {
            $('#successfulAddCourse').modal('show');
        });</script>
    {/if}
    {if $alreadyenrolled == 1 }
    <script>    $(document).ready(function () {
            $('#alreadyenrolled').modal('show');
        });</script>
    {/if}
    {if $complete==1}
    <script>       $(document).ready(function () {
            $('#complete-prof-modal').modal('show');
        });</script> 
    {/if}
    {if $accountActivated == 1 }
    <script>    $(document).ready(function () {
            $('#accountActivated').modal('show');
        });</script>
    {/if}
    {if $courseisfull == 1 }
    <script>    $(document).ready(function () {
            $('#courseisfullmodal').modal('show');
        });</script>
    {/if}



{if $checkYourEmailNow == 1 }
    <script>    $(document).ready(function () {
            $('#checkYourEmail').modal('show');
        });</script>
    {/if}
    {if $courseIsStart == 1 }
    <script>    $(document).ready(function () {
            $('#courseIsStart').modal('show');
        });</script>
    {/if}

<script>
    $(document).ready(function () {

//console.log($(document).height());
    {*setTimeout(function () {*}
        var heightDoc = $(document).height();
        $(window).scroll(function () {
            console.log(heightDoc);
            console.log($(window).scrollTop());
            console.log($(window).height());
            if (($(window).scrollTop() + 700) > heightDoc - 500) {
                //console.log("bottom here s");
                $('.my-course-right-box').addClass('scroll-course-box');
            } else {
                $('.my-course-right-box').removeClass('scroll-course-box');
            }
        });
    {*}, 10000);*}
    });
</script>    

</body>

</html>

