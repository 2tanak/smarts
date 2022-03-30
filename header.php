<!doctype html>
	<html <?php language_attributes(); ?>>
		<head>
			<link rel="dns-prefetch" href="//fonts.googleapis.com">
			<link rel="dns-prefetch" href="//google-analytics.com">

			<meta charset="<?php bloginfo('charset'); ?>">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="apple-mobile-web-app-capable" content="yes"/>
			
			<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
			
			<meta name="author" content="<?php bloginfo('url'); ?> - <?php bloginfo('name'); ?>" />
			<meta name="copyright" content="Copyright <?php bloginfo('name'); ?> <?php echo date("Y"); ?>, All Rights Reserved." />
			<meta name="application-name" content="<?php bloginfo('name'); ?>"/>
			
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/favicon.ico">
			<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-touch-icon.png">
			<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-touch-icon.png">
			<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-touch-icon.png">
			<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-touch-icon.png">
			
			<script type="text/javascript">
   				var siteBaseURL = '<?= get_site_url(); ?>';
   			</script>
			
			<?php wp_head(); ?>

		</head>
		
		<body <?php body_class(); ?>>

			<?php 
				global $current_user;
				global $user_id;
				get_currentuserinfo();
				$user_id = $current_user->ID;

				if ( is_user_logged_in() ) {
					echo '<span class="personal-review-url" style="display: none;">http://viewee.stagingsite.uk/leave-a-review/?employee_id=' . $user_id . '&company_id=' . get_viewee_company_id($user_id) .'</span>';
				}
			?>
			