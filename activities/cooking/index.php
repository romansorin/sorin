<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '/srv/http/inc/includes.php';
require '/srv/http/inc/connection/connection.php';
require '/srv/http/inc/connection/configs.php';
require '/srv/http/activities/Activity.php';?>
    <link rel="stylesheet" href="/css/activities.css">
    <title>Cooking Club | Mentor High School</title>
    <meta name="description" content="#">
</head>

<body>

    <?php

/** @var Connection [Create a connection object] */
$conn = new Connection();

/** @var Activity [Create a new activity object] */
$activity = new Activity();

/** @var [Object] [Create a PDO object and connect to the database] */
$pdo = $conn->connectToDb($db_sections, $user_sections, $pass_sections);

?>

    <?php include '/srv/http/inc/header.php';?>
    <div class="container-fluid no-padding">
        <div class="row no-padding">
            <div class="col-12 no-padding">
                <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="10000">
                    <!-- To change speed of slideshow, changing 'data-interval' value (parameter taken as milliseconds) -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel" data-slide-to="1"></li>
                        <li data-target="#carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php
$results_image = $activity->fetchHeaderImageCarousel($pdo, 'cooking', 1);
foreach ($results_image as $header_img): ?>
                                <img class="d-block w-100" src="<?=$header_img->headerimg;?>" alt="First slide">
                            <?php endforeach;?>
                        </div>
                        <div class="carousel-item">
                            <?php
$results_image = $activity->fetchHeaderImageCarousel($pdo, 'cooking', 2);
foreach ($results_image as $header_img): ?>
                                <img class="d-block w-100" src="<?=$header_img->headerimg;?>" alt="Second slide">
                            <?php endforeach;?>
                        </div>
                        <div class="carousel-item">
                            <?php
$results_image = $activity->fetchHeaderImageCarousel($pdo, 'cooking', 3);
foreach ($results_image as $header_img): ?>
                                <img class="d-block w-100" src="<?=$header_img->headerimg;?>" alt="Third slide">
                            <?php endforeach;?>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="img-text-overlay">
                    <a href="/activities"><h6>Activities</h6></a>
                    <h1>Cooking Club</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="activities-default"> <!-- This is the standard view of the page. -->
        <div class="container no-padding" id="local-nav-menu">
            <div id="local-nav-menu-wrapper">
                <div class="row"><h4 id="local-nav-menu-header">More Information</h4></div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="local-nav-menu-list">
                            <div class="dropdown">
                                <li class="local-nav-menu-item hvr-underline-from-center">Example</li>
                                <div class="dropdown-content">
                                    <a href="https://example.com">Example</a>
                                    <a href="https://example.com">Example</a>
                                    <a href="https://example.com">Example</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <li class="local-nav-menu-item hvr-underline-from-center">Example</li>
                                <div class="dropdown-content">
                                    <a href="https://example.com">Example</a>
                                    <a href="https://example.com">Example</a>
                                </div>
                            </div>
                            <a href="#"><li class="local-nav-menu-item hvr-underline-from-center">Example</li></a>
                            <a href="https://example.com"><li class="local-nav-menu-item hvr-underline-from-center">Example</li></a>
                            <a href="https://example.com"><li class="local-nav-menu-item hvr-underline-from-center">Example</li></a>
                            <script>
                                jQuery('div.dropdown').hover(function() {
                                    jQuery(this).find('.local-nav-menu-item').addClass('active');
                                    jQuery(this).find('.dropdown-content').stop(true, true).delay(200).fadeIn(500);
                                }, function() {
                                    jQuery(this).find('.local-nav-menu-item').removeClass('active');
                                    jQuery(this).find('.dropdown-content').stop(true, true).delay(200).fadeOut(500);
                                });
                            </script>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container no-padding">
            <div class="row no-padding" id="activity-content">
                <div class="col-md-12 no-padding" id="main-activity-content">
                    <h2>Information</h2>
                    <?php
$results_info = $activity->fetchActivityInformation($pdo, 'cooking');
foreach ($results_info as $information): ?>
                        <p>
                            <?=$information->information;?>
                        </p>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="article-container">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-md-6 no-padding">
                        <figure class="article-img" style="margin-left: 0px;">
                            <?php
/* This can be an <iframe> or an <img>. The PHP statement is only required in the src field. */
$results_image = $activity->fetchArticleImage($pdo, 'cooking', 1);
foreach ($results_image as $article_image): ?>
                                <iframe class="img-fit" width="640" height="480" src="<?=$article_image->articleimg;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            <?php endforeach;?>
                        </figure>
                    </div>
                    <div class="col-md-6 no-padding">
                        <div class="content mr-left">
                            <?php
$results_title = $activity->fetchArticleTitle($pdo, 'cooking', 1);
foreach ($results_title as $title): ?>
                                <h3 class="article-title">
                                    <?=$title->title;?>
                                </h3>
                            <?php endforeach;?>

                            <?php
$results_content = $activity->fetchArticleContent($pdo, 'cooking', 1);
foreach ($results_content as $content): ?>
                                <p class="article-desc">
                                    <?=$content->content;?>
                                </p>
                            <?php endforeach;?>

                            <?php
$results_link = $activity->fetchArticleLink($pdo, 'cooking', 1);
foreach ($results_link as $link): ?>
                                <p class="article-link">
                                    <a href="<?=$link->link;?>">Article link</a>
                                </p>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 no-padding">
                        <div class="content">
                            <?php
$results_title = $activity->fetchArticleTitle($pdo, 'cooking', 2);
foreach ($results_title as $title): ?>
                                <h3 class="article-title">
                                    <?=$title->title;?>
                                </h3>
                            <?php endforeach;?>

                            <?php
$results_content = $activity->fetchArticleContent($pdo, 'cooking', 2);
foreach ($results_content as $content): ?>
                                <p class="article-desc">
                                    <?=$content->content;?>
                                </p>
                            <?php endforeach;?>

                            <?php
$results_link = $activity->fetchArticleLink($pdo, 'cooking', 2);
foreach ($results_link as $link): ?>
                                <p class="article-link">
                                    <a href="<?=$link->link;?>">Article link</a>
                                </p>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="col-md-6 no-padding">
                        <figure class="article-img mr-left">
                            <?php
$results_link = $activity->fetchArticleLink($pdo, 'cooking', 2);
foreach ($results_link as $link): ?>
                                <a href="<?=$link->link;?>">
                                <?php endforeach;?>
                                <?php
$results_image = $activity->fetchArticleImage($pdo, 'cooking', 2);
foreach ($results_image as $article_image): ?>
                                    <img class="img-fit" src="<?=$article_image->articleimg;?>" alt="Image for second article">
                                </a>
                            <?php endforeach;?>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="activities-mobile"> <!-- This is the mobile view of the page. -->
        <div class="container" id="local-nav-menu-mobile">
            <div id="local-nav-menu-wrapper">
                <div class="row content"><h4 id="local-nav-menu-header-mobile">More Information</h4></div>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="mobileDropdownMenu" data-toggle="dropdown" aria-haspop="true" aria-expanded="false">
                        Select...
                    </button>
                    <div class="dropdown-menu dropright" aria-labelledby="mobileDropdownMenu">
                        <button class="btn dropdown-item-btn dropdown-toggle" type="button" id="mobileDropdownSubmenu" data-toggle="dropdown" aria-haspop="true" aria-expanded="false">Example</button>
                        <div class="dropdown-menu" aria-labelledby="mobileDropdownSubmenu">
                            <a class="dropdown-item" href="https://example.com">Item one</a>
                        </div>
                        <button class="btn dropdown-item-btn dropdown-toggle" type="button" id="mobileDropdownSubmenu" data-toggle="dropdown" aria-haspop="true" aria-expanded="false">Example</button>
                        <div class="dropdown-menu" aria-labelledby="mobileDropdownSubmenu">
                            <a class="dropdown-item" href="https://example.com">Item two</a>
                        </div>
                        <a class="dropdown-item" href="https://example.com">Example</a>
                        <a class="dropdown-item" href="https://example.com">Example</a>
                        <a class="dropdown-item" href="https://example.com">Example</a>
                        <!-- <div class="dropdown-divider"></div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container content-padding">
            <div class="row" id="activity-content">
                <div class="col-md-12 no-padding" id="main-activity-content">
                    <h2>Information</h2>
                    <?php
$results_info = $activity->fetchActivityInformation($pdo, 'cooking');
foreach ($results_info as $information): ?>
                        <p>
                            <?=$information->information;?>
                        </p>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <div class="container content-padding" id="article-container">
            <div class="container no-padding">
                <div class="row">
                    <?php
$results_title = $activity->fetchArticleTitle($pdo, 'cooking', 1);
foreach ($results_title as $title): ?>
                        <h3 class="article-title">
                            <?=$title->title;?>
                        </h3>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <figure class="article-img">
                            <?php
$results_image = $activity->fetchArticleImage($pdo, 'cooking', 1);
foreach ($results_image as $article_image): ?>
                                <iframe class="img-fit" width="640" height="480" src="<?=$article_image->articleimg;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            <?php endforeach;?>
                        </figure>
                    </div>
                </div>
                <div class="col-md-12 no-padding">
                    <div class="content">
                        <?php
$results_content = $activity->fetchArticleContent($pdo, 'cooking', 1);
foreach ($results_content as $content): ?>
                            <p class="article-desc">
                                <?=$content->content;?>
                            </p>
                        <?php endforeach;?>

                        <?php
$results_link = $activity->fetchArticleLink($pdo, 'cooking', 1);
foreach ($results_link as $link): ?>
                            <p class="article-link">
                                <a href="<?=$link->link;?>">Article link</a>
                            </p>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="row">
                    <?php
$results_title = $activity->fetchArticleTitle($pdo, 'cooking', 2);
foreach ($results_title as $title): ?>
                        <h3 class="article-title">
                            <?=$title->title;?>
                        </h3>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <figure class="article-img">
                            <?php
$results_link = $activity->fetchArticleLink($pdo, 'cooking', 2);
foreach ($results_link as $link): ?>
                                <a href="<?=$link->link;?>">
                                <?php endforeach;?>

                                <?php
$results_image = $activity->fetchArticleImage($pdo, 'cooking', 2);
foreach ($results_image as $article_image): ?>
                                    <img class="img-fit" src="<?=$article_image->articleimg;?>" alt="Image for second article">
                                </a>
                            <?php endforeach;?>
                        </figure>
                    </div>
                </div>
                <div class="col-md-12 no-padding">
                    <div class="content">
                        <?php
$results_content = $activity->fetchArticleContent($pdo, 'cooking', 2);
foreach ($results_content as $content): ?>
                            <p class="article-desc">
                                <?=$content->content;?>
                            </p>
                        <?php endforeach;?>

                        <?php
$results_link = $activity->fetchArticleLink($pdo, 'cooking', 2);
foreach ($results_link as $link): ?>
                            <p class="article-link">
                                <a href="<?=$link->link;?>">Article link</a>
                            </p>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '/srv/http/inc/footer.php';?>
</body>

</html>