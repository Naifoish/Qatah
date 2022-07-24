<head>
    <title>قطتنا </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="icon" type="image/png" href="{$HTTP_PATH}images/favicon.png">
    <meta name="author" content="">
    <!-- fav icon -->

   
    {*    <link rel="manifest" href="/manifest.json">*}
    {*<meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">*}
    <link rel="stylesheet" href="{$HTTP_PATH}css/bootstrap.min.css">
    <link rel="stylesheet" href="{$HTTP_PATH}css/flickity.css">
    <link rel="stylesheet" href="{$HTTP_PATH}css/font-awesome.min.css">
    <link rel="stylesheet" href="{$HTTP_PATH}css/main.css?{$smarty.now}" media="screen">
    <link href="{$HTTP_PATH}css/gijgo.min.css" rel="stylesheet" type="text/css" />





    {if $lang==1}
        <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{$HTTP_PATH}css/bootstrap-rtl.min.css" media="screen">
        <link href="{$HTTP_PATH}css/main_ar.css?{$smarty.now}" rel="stylesheet" type="text/css" />
    {/if}

    {if $Page=="profile"}
        <link href="{$HTTP_PATH}css/chosen.min.css?asd" rel="stylesheet">
    {/if}
</head>

<body>

    <header class="index-header d-lg-block  d-none {if $userLogin==1 }big-header-top-data-login{/if}">
        <nav class="navbar site-header navbar-expand-sm">
            <div class="container-fluid d-flex flex-md-row">
                <a class="navbar-brand" href="{$HTTP_PATH}">
                    <img src="{$HTTP_PATH}images/qLogo.png" class="img-fluid" alt="">
                </a>

                <div class="header-search-input flex-grow-1">


                </div>
                <div class="header-website-teachers">
                  
                </div>

                <div class="header-new-settings-tool">
                </div>
                
                 <div class="header-links">
                   {if $userLogin==1 }
             
                        <div class="header-courses-list">
                                                 </div>


                        <div class="header-account-settings">
                            <div class="header-account-img">
                                <div class="header-account-img-pos">
                                    <img src="{$imageStudent}" alt="" class="img-fluid header-top-user-img">

                                </div>
                                <img src="{$HTTP_PATH}images/profile-green-circle.png" alt="" class="img-fluid green-cirlce">
                            </div>
                            <div class="header-account-dropdown d-none">
                                <div class="header-account-dropdown-top">
                                    <div class="header-account-img-pos">
                                        <img src="{$imageStudent}" alt="" class="img-fluid">
                                    </div>
                                    <div class="header-account-dropdown-name-email">
                                        <div class="header-account-dropdown-name">
                                            <p>{gettext var="Welcome"} {$FullName}</p>
                                        </div>
                                        <div class="header-account-dropdown-email">
                                            <p>{$emailUser}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-account-dropdown-links">
                                    <ul>
                                     
                                            <li><a href="{$HTTP_PATH}#">{gettext var="My Account"}</a></li>
                                         
                                           <li><a href="{$HTTP_PATH}#.php">{gettext var="Quth"} </a></li>
                                       
                                    </ul>
                                </div>
                                <div class="header-account-dropdown-botLinks">
                                    <ul>
                                        <li><a href="{$HTTP_PATH}#"> {gettext var="Help"}</a></li>
                                        <li><a href="{$HTTP_PATH}logout.php" {if $userTypeLogin==1}onclick="signOutGoogle();"{/if}>{gettext var="Log out"}</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>


                    {else}
                        <div class="login-btn header-btn">
                            <button class="btn" data-toggle="modal" data-target="#loginModal">{gettext var="Login"}</button>
                        </div>

                        <div class="signup-btn header-btn dropdown">
                            <button class="btn" id="dropdownMenuButton" data-toggle="modal" data-target="#loginModal2">{gettext var="Sign up"}</button>
                            
                        </div>
                    {/if}
                </div>


             
            </div>
        </nav>

    </header>
    <header class="mobile-header d-lg-none  d-block">
        <nav class="navbar site-header navbar-expand-sm">
            <div class="container-fluid d-flex flex-md-row">
                <div class="mobile-header-categories-search">
                    <div class="header-categories">
                        {*mobile*}
                        <div id="menu_area" class="menu-area">
                            <nav class="navbar navbar-light navbar-expand-lg mainmenu">

                                <ul class="navbar-nav mr-auto">
                                    <li class="dropdown">
                                        <div class="header-categories">
                                           
                                        </div>
                                        <!--<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>-->
                                        
                                    </li>

                                </ul>
                            </nav>

                        </div>

                    </div>
                    <div class="header-new-settings-tool">
                      
                    </div>
                    <div class="mobile-search-icon">
                     
                    </div>
   

                </div>

                <a class="navbar-brand" href="{$HTTP_PATH}">
                    <img src="{$HTTP_PATH}images/qLogo.png" class="img-fluid" alt="">
                </a>
                {if empty($userLogin)}
                    <div class="login-btn header-btn">
                        <button class="btn" data-toggle="modal" data-target="#loginModal">{gettext var="Login"}</button>
                    </div>
                {/if}
                {if $userLogin==1 }
                    <div class="header-account-settings">
                        <div class="header-account-img">
                            <div class="header-account-img-pos">
                                <img src="{$imageStudent}" alt="" class="img-fluid header-top-user-img">


                            </div>
                            <img src="{$HTTP_PATH}images/profile-green-circle.png" alt="" class="img-fluid green-cirlce">
                        </div>
                        <div class="header-account-dropdown d-none">
                            <div class="header-account-dropdown-top">

                                <div class="header-account-img-pos">
                                    <img src="{$imageStudent}" alt="" class="img-fluid">
                                </div>
                                <div class="header-account-dropdown-name-email">
                                    <div class="header-account-dropdown-name">
                                        <p>{gettext var="Welcome"} {$FullName}</p>
                                    </div>
                                    <div class="header-account-dropdown-email">
                                        <p>{$emailUser}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="header-account-dropdown-links">
                             
                                </div>
                                <div class="header-account-dropdown-botLinks">
                                    <ul>
                                        <li><a href="{$HTTP_PATH}frequentQuestions.php">{gettext var="Help"} </a></li>
                                        <li><a href="{$HTTP_PATH}logout.php" {if $userTypeLogin==1}onclick="signOutGoogle();"{/if}>{gettext var="Log out"}</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    {/if}
                    <div class="mobile-search d-none">
                        <div class="mobile-search-content">
                            <div class="mobile-search-close">
                                <a><i class="fa fa-times" aria-hidden="true"></i>
                                </a></div>
                                {if $page=="search-results"}
                                <form class="mobile-search-form" >
                                    <input type="search" name="searchhedar" id="searchhedarMobile" class="mobile-search-input form-control" placeholder="{gettext var="Search"}" >
                                </form>
                                <div class="mobile-search-submit"><a href="javascript:void(0)" id="searchButtonMobileresalt" ><img src="{$HTTP_PATH}images/search-icon.png" alt="" class="img-fluid"></a></div>

                            {else}

                                <form   class="mobile-search-form"  action="{$HTTP_PATH}search-results.php" method="POST" id="searchFilterMobile" >
                                    <input type="hidden"  name="submitdata" value="1" >
                                    <input type="hidden" id="searchwordInFilterMobile" name="searchword" value="" >     
                                    <input type="search" name="searchhedar" id="searchhedarMobile" class="mobile-search-input form-control" placeholder="{gettext var="Search"}" >
                                </form>
                                <div class="mobile-search-submit"><a href="javascript:void(0)" id="searchButtonMobile" ><img src="{$HTTP_PATH}images/search-icon.png" alt="" class="img-fluid"></a></div>

                            {/if}


                            {*<form class="mobile-search-form">
                            <input type="search" class="mobile-search-input form-control" placeholder="Search">
                            </form>
                            <div class="mobile-search-submit"><a href="#"><img src="images/banner-search.svg" alt="" class="img-fluid"></a></div>*}
                        </div>
                    </div>
                </div>
            </nav>

        </header>
        {include file="boxes/SignUp.tpl"}      

        {include file="boxes/login.tpl"}

