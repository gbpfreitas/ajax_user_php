<?php

    class Page {

        private static $allUsers;

        public static function pageHeader(){
            $pageHeader = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>User Search Engine</title>'.
                self::importCss()  
            .'</head>
            <body>
            ';
            echo $pageHeader;
        }

        private static function leftMenu(){
            $leftMenu = '
            <nav class="gf-nav" id="gf-nav">            
                    <ul>
                        <li class="gf-nav-item active"><a href="index.html" class="gf-nav-link">
                            <i class="fas fa-home"></i>
                            Blog Home
                        </a></li>
                        <li class="gf-nav-item"><a href="#" class="gf-nav-link">
                            <i class="fas fa-pen"></i>
                            Single Post
                        </a></li>
                        <li class="gf-nav-item"><a href="#" class="gf-nav-link">
                            <i class="fas fa-users"></i>
                            About Xtra
                        </a></li>
                        <li class="gf-nav-item"><a href="#" class="gf-nav-link">
                            <i class="far fa-comments"></i>
                            Contact Us
                        </a></li>
                    </ul>
                </nav>
                <div class="gf-mb-65">
                    <a rel="nofollow" href="#" class="gf-social-link">
                        <i class="fab fa-facebook gf-social-icon"></i>
                    </a>
                    <a href="#" class="gf-social-link">
                        <i class="fab fa-twitter gf-social-icon"></i>
                    </a>
                    <a href="#" class="gf-social-link">
                        <i class="fab fa-instagram gf-social-icon"></i>
                    </a>
                    <a href="#" class="gf-social-link">
                        <i class="fab fa-linkedin gf-social-icon"></i>
                    </a>
                    <a href="#" class="gf-social-link">
                        <i class="fab fa-github gf-social-icon"></i>
                    </a>
                </div>
                <p class="gf-mb-80 pr-5 text-white">
                    Xtra Blog is a multi-purpose HTML template from TemplateMo website. Left side is a sticky menu bar. Right side content will scroll up and down.
                </p>
            ';
            return $leftMenu;
        }

        private static function pageLeftLogo(){
            $pageLeftLogo = '
            <!-- logoLeftSide -->
            <div class="gf-site-header">
                <div class="mb-3 mx-auto gf-site-logo"><i class="fas fa-times fa-2x"></i></div>            
                <h1 class="text-center">Xtra Blog</h1>
            </div>
            ';

            return $pageLeftLogo;
        }

        private static function headerSection(){
            $leftMenu = self::leftMenu();
            $leftLogo = self::pageLeftLogo();
            $headerSection = '
            <header class="gf-header" id="gf-header">
                <div class="gf-header-wrapper">
                    <!-- responsive menu button -->
                    <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>'.
                    $leftLogo.
                    $leftMenu
                .'</div>
            </header>
            ';
            return $headerSection;
        }

        private static function importCss(){
            $css = '
            <link href="components/fontawesome/css/all.min.css" rel="stylesheet" > <!-- https://fontawesome.com/ -->
            <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
            <link href="components/css/bootstrap.min.css" rel="stylesheet">
            <link href="components/css/style.css" rel="stylesheet">
            <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
            ';
            return $css;
        }

        private static function importScript(){
            return '';
        }

        private static function searchSection(){
            $searchSection = '
            <div class="row gf-row">
            <div class="col-12 col-xl" style="padding: 0px;">
                <form method="GET" class="form-inline gf-mb-80 gf-search-form" action="">                
                    <input class="form-control gf-search-input" id="query" name="query" type="text" placeholder="Search..." aria-label="Search">
                    <button class="gf-search-button" type="submit">
                        <i class="fas fa-search gf-search-icon" aria-hidden="true"></i>
                    </button>                                
                </form>
                </div>                
            </div>
            ';

            return $searchSection;
        }

        
        private static function singleResult(){
            require_once("inc/Utilities/Converters/UserConvert.class.php");

            $singleResult_test = '
            <article class="col-12 col-md-6 gf-post">
                <hr class="gf-hr-primary">
                <a href="#" class="effect-lily gf-post-link gf-pt-60">
                    <div class="gf-post-link-inner">
                        <img src="components/img/img-01.jpg" alt="Image" class="img-fluid">                            
                    </div>
                    <span class="position-absolute gf-new-badge">New</span>
                    <h2 class="gf-pt-30 gf-color-primary gf-post-title">Simple and useful HTML layout</h2>
                </a>                    
                <p class="gf-pt-30">
                    There is a clickable image with beautiful hover effect and active title link for each post item. 
                    Left side is a sticky menu bar. Right side is a blog content that will scroll up and down.
                </p>
                <div class="d-flex justify-content-between gf-pt-45">
                    <span class="gf-color-primary">Travel . Events</span>
                    <span class="gf-color-primary">June 24, 2020</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <span>36 comments</span>
                    <span>by Admin Nat</span>
                </div>
            </article>
            ';
            
            self::$allUsers = UserConvert::convertIntoUser(
                json_decode(file_get_contents("inc/data/users.json"))
            );
            $singleResult = '';

            foreach(self::$allUsers as $user){
                $singleResult .= '
                <div class="card col-md-3 gf-post">
                    <img src="'.$user->getPic().'" alt="'.$user->getFirstName().'" style="width:100%">
                    <h3>'.
                        $user->getFirstName(). " ".
                        $user->getLastName()
                    .'</h3>
                    <p class="title">'.$user->getJobTitle().'</p>
                    <p>'.$user->getEmail().'</p>
                    <ul>
                        <li class="gf-a"> <a href="#"><i class="fa fa-dribbble"></i></a>
                        <li class="gf-a"> <a href="#"><i class="fa fa-twitter"></i></a>
                        <li class="gf-a"> <a href="#"><i class="fa fa-linkedin"></i></a>
                        <li class="gf-a"> <a href="#"><i class="fa fa-facebook"></i></a>
                    </ul>
                    <!--<p><button class="gf-button">Contact</button></p>-->
                </div>
            ';
            }
            if(isset($_POST["search"])){
                echo "Hello";
            }
            return '<div class="row gf-row" id="user">'.$singleResult."</div>";
        }

        private static function footerSection(){
            $footerSection = '
            <footer class="row gf-row">
                <hr class="col-12">
                <div class="col-md-6 col-12 gf-color-gray">
                    Design: <a rel="nofollow" target="_parent" href="https://templatemo.com" class="gf-external-link">TemplateMo</a>
                </div>
                <div class="col-md-6 col-12 gf-color-gray gf-copyright">
                    Copyright 2020 Xtra Blog Company Co. Ltd.
                </div>
            </footer>
            ';

            return $footerSection;
        }

        private static function mainContentSection(){
            $searchSection = self::searchSection();
            $singleResult = self::singleResult();
            $pageContent = '
            <div class="container-fluid">
                <main class="gf-main">'.
                $searchSection.
                $singleResult
                .'</main>
            </div>
            ';
            return $pageContent;
        }

        public static function pageContent(){
            $pageContent = self::headerSection();
            $pageContent .= self::mainContentSection();
            //$pageContent .= self::footerSection();
            
            echo $pageContent;
        }

        public static function pageFooter(){
            $pageFooter = '
                <script src="components/js/jquery.min.js" defer></script>
                <script src="components/js/script.js" defer></script>
            </body>
            </html>
            ';
            echo $pageFooter;
        }

        
    }