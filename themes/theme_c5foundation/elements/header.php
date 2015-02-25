<?php  defined('C5_EXECUTE') or die("Access Denied.");
global $c;
global $cp;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- CSS Styles -->
<link rel="stylesheet" media="screen" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/normalize/2.1.3/normalize.min.css">
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo $this->getThemePath() ?>/css/style.css">

<!--[if lt IE 9]>
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo $this->getThemePath() ?>/ie9.css">
<![endif]-->


<?php
    $html = Loader::helper('html');
    if (!$c->isEditMode()) {
        $this->addHeaderItem($html->javascript('http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js'));
        $this->addHeaderItem($html->javascript('/bower_components/foundation/js/vendor/fastclick.js', 'c5foundation'));
        $this->addHeaderItem($html->javascript('/bower_components/foundation/js/foundation.min.js', 'c5foundation'));                
        $this->addHeaderItem($html->javascript('slick.min.js', 'c5foundation'));           
        $this->addHeaderItem($html->javascript('plugins.js', 'c5foundation'));
        $this->addHeaderItem($html->javascript('main.js', 'c5foundation'));
    }
?>

<?php Loader::element('header_required'); ?>

</head>
<body class="<?php if ($cp->canWrite()) echo 'logged-in' ?> <?php if ($c->isEditMode()) echo 'edit-mode' ?>">

<div id="page" class="shell slug-<?php echo $c->getCollectionHandle() ?> page-type-<?php echo $c->getCollectionTypeHandle() ?>">

    <header id="masthead">
        <div class="container">
            <h1 id="banner"><a href="/"><?php echo SITE ?></a></h1>
            <?php
                // Hard-coded auto nav from: http://c5blog.jordanlev.com/blog/2012/04/hard-coded-autonav-options/
                $nav = BlockType::getByHandle('autonav');
                $nav->controller->orderBy = 'display_asc';
                $nav->controller->displayPages = 'top';
                $nav->controller->displaySubPages = 'all';
                $nav->controller->displaySubPageLevels = 'custom';
                $nav->controller->displaySubPageLevelsNum = 1;
                $nav->render('templates/nav_menu');
            ?>
            
            <?php
                $a = new Area('Header');
                $a->display($c);
            ?>
        </div>
    </header>