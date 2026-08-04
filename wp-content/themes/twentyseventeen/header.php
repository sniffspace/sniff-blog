<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<?php
    APP::$appType = 'front';
    $path = URI::getLiveTemplatePath();
    wp_head();
    ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo $path ?>/images/favicon.ico" type="image/x-icon"> 
	<title><?php echo CFG::$siteConfig['site_name'] ?></title>
	<meta content="<?php echo CFG::$siteConfig['site_name'] ?>" name="description">
	<meta content="<?php echo CFG::$siteConfig['site_name'] ?>" name="keywords">

	<link rel="stylesheet" href="<?php echo $path ?>/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="<?php echo $path ?>/css/style.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $path ?>/css/style01.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $path ?>/css/style02.css" type="text/css">
	<script src="<?php echo $path ?>/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo $path ?>/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo $path ?>/js/bootstrap.bundle.min.js" type="text/javascript"></script>

	<meta name="google-signin-scope" content="profile email">
	<meta name="google-signin-client_id" content="<?php echo CFG::$GoogleClientId ?>">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="<?php echo $path ?>/js/facebook.js"></script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">
	<?php
        $data = loadBlock('mod_front', 'block_header', 'BlockHeader');

        function loadBlock($module, $block, $class) {
            include(CFG::$absPath . '/modules/' . $module . '/block/' . $block . '/' . $block . '.php');

                //BlockFooter::process();
            $newclass = new $class();
            $data = $newclass->process();
                //eval($class::process($newclass));
            include(CFG::$absPath . '/modules/' . $module . '/block/' . $block . '/view/' . $block . '.php');
            return $data;
        }
        ?>
        <div class="headerPadd"></div>
		<main class="main-content">
