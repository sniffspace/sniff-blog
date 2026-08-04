<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.2
 */
?>
</main>
<?php
	$path = URI::getLiveTemplatePath();
	$data = loadBlock('mod_front', 'block_footer', 'BlockFooter'); ?>
<?php
	wp_footer(); 
?>
<script type="text/javascript">var recaptchaPrivateKey = '<?php echo CFG::$reCapPrivateKey ?>';</script>
<script src="<?php echo $path ?>/js/jquery.validate.js" type="text/javascript"></script>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo CFG::$reCapPrivateKey ?>"></script>
<script src="<?php echo $path ?>/js/lightgallery.js" type="text/javascript"></script>
<script src="<?php echo $path ?>/js/custom.js" type="text/javascript"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</div>
</body>
</html>
