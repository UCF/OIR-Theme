<!DOCTYPE html>
<html lang="en-US">
	<head>
		<?="\n".header_()."\n"?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--[if IE]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php if(GA_ACCOUNT or CB_UID):?>
		
		<script type="text/javascript">
			var _sf_startpt = (new Date()).getTime();
			<?php if(GA_ACCOUNT):?>
			
			var GA_ACCOUNT  = '<?=GA_ACCOUNT?>';
			var _gaq        = _gaq || [];
			_gaq.push(['_setAccount', GA_ACCOUNT]);
			_gaq.push(['_setDomainName', 'none']);
			_gaq.push(['_setAllowLinker', true]);
			_gaq.push(['_trackPageview']);
			<?php endif;?>
			<?php if(CB_UID):?>
			
			var CB_UID      = '<?=CB_UID?>';
			var CB_DOMAIN   = '<?=CB_DOMAIN?>';
			<?php endif?>
			
		</script>
		<?php endif;?>
		
		<?  $post_type = get_post_type($post->ID);
			if(($stylesheet_id = get_post_meta($post->ID, $post_type.'_stylesheet', True)) !== False
				&& ($stylesheet_url = wp_get_attachment_url($stylesheet_id)) !== False) { ?>
				<link rel='stylesheet' href="<?=$stylesheet_url?>" type='text/css' media='all' />
		<? } ?>

		<script type="text/javascript">
			var PostTypeSearchDataManager = {
				'searches' : [],
				'register' : function(search) {
					this.searches.push(search);
				}
			}
			var PostTypeSearchData = function(column_count, column_width, data) {
				this.column_count = column_count;
				this.column_width = column_width;
				this.data         = data;
			}
		</script>
		
	</head>
	<body class="<?=body_classes()?>">
		<div class="container">
			<div class="row">
				<div id="header" class="row-border-bottom-top">
					<h1 class="span9"><a href="<?=bloginfo('url')?>"><?=bloginfo('name')?></a></h1>
					<?php $options = get_option(THEME_OPTIONS_NAME);?>
					<?php if($options['facebook_url'] or $options['twitter_url']):?>
					<ul class="social menu horizontal span3">
						<?php if($options['facebook_url']):?>
						<li><a class="ignore-external facebook" href="<?=$options['facebook_url']?>">Facebook</a></li>
						<?php endif;?>
						<?php if($options['twitter_url']):?>
						<li><a class="ignore-external twitter" href="<?=$options['twitter_url']?>">Twitter</a></li>
						<?php endif;?>
					</ul>
					<?php else:?>
					<div class="social span3">&nbsp;</div>
					<?php endif;?>
				</div>
			</div>
			<?=wp_nav_menu(array(
				'theme_location' => 'header-menu', 
				'container' => 'false', 
				'menu_class' => 'menu '.get_header_styles(), 
				'menu_id' => 'header-menu', 
				'walker' => new Bootstrap_Walker_Nav_Menu()
				));
			?>