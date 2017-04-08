<?php
class WPPostMetaTags
{
	public static function wp_post_meta_tags_hooks()
	{
		add_action( 'add_meta_boxes', 'WPPostMetaTags::post_add_custom_form_fields' );
		add_action( 'save_post', 'WPPostMetaTags::wp_post_meta_tags_save' );
		add_action ('wp_head','WPPostMetaTags::wp_post_meta_tags_output');
		add_filter( 'wp_title', 'WPPostMetaTags::do_wp_post_meta_tags_title', 10, 2);
		add_action('the_content', 'WPPostMetaTags::my_metaTags');
	}
	
	public static function post_add_custom_form_fields()
	{
		global $post;
		add_meta_box('post_meta_tags', __('SEO Meta Tags','meta-tags'), 'WPPostMetaTags::wp_post_meta_tags_fields', 'post', 'normal', 'default');
		
		add_meta_box('post_meta_tags', __('SEO Meta Tags','meta-tags'), 'WPPostMetaTags::wp_post_meta_tags_fields', 'page', 'normal', 'default');
		
		$args = array(
			'public'   => true,
			'_builtin' => false
		);
		$custom_post_types = get_post_types($args);
		foreach($custom_post_types as $custom_post_type)
		{
			add_meta_box('post_meta_tags', __('SEO Meta Tags','meta-tags'), 'WPPostMetaTags::wp_post_meta_tags_fields', $custom_post_type, 'normal', 'default');
		}
	}
	
	public static function wp_post_meta_tags_fields()
	{		
		global $post;
		$tags = get_post_meta($post->ID, 'wp_post_meta_tags', true);
		if(!$tags)
		{
			$tags =array();
		}
		
		?>
		<script>
			var homePageUrl = "<?php echo get_home_url(); ?>";
		</script>
		<div class="form-field">
			<label for="wp_post_meta_tags[seo_meta_tag_title]"><?php _e('SEO Meta tag title', 'meta-tags'); ?></label>
			<input type="text" id="wp_post_meta_tags[seo_meta_tag_title]" name="wp_post_meta_tags[seo_meta_tag_title]" size="40" value="<?php echo esc_attr($tags['wp_post_meta_tag_title']==""||$tags['wp_post_meta_tag_title']==null?get_the_title($post):$tags['wp_post_meta_tag_title']);?>" />
			<p class="description">Title meta of the post.</p>
		</div>        
        <div class="form-field">    
			<label for="wp_post_meta_tags[seo_meta_tag_description]"><?php _e('SEO Meta tag description', 'meta-tags'); ?></label>
			<textarea cols="40" rows="5" id="wp_post_meta_tags[seo_meta_tag_description]" name="wp_post_meta_tags[seo_meta_tag_description]"><?php echo esc_attr($tags['wp_post_meta_tag_description']==""||$tags['wp_post_meta_tag_description']==null?get_the_excerpt($post):$tags['wp_post_meta_tag_description']);?></textarea>
			<p class="description">Description meta of the post.</p>
		</div>        
        <div class="form-field">    
			<label for="wp_post_meta_tags[seo_meta_tag_keywords]"><?php _e('SEO Meta tag keywords', 'meta-tags'); ?></label>
			<input type="text" id="wp_post_meta_tags[seo_meta_tag_keywords]" name="wp_post_meta_tags[seo_meta_tag_keywords]" size="40" value="<?php echo esc_attr($tags['wp_post_meta_tag_keywords']==""||$tags['wp_post_meta_tag_keywords']==null?"arvi, blog arvi blog, askarvi blog":$tags['wp_post_meta_tag_keywords']);?>" />
			<p class="description">These are the keywords of the taxonomy, seperated by comma's.</p>
		</div>        
        <div class="form-field">    
			<label for="wp_post_meta_tags[seo_meta_tag_robots]"><?php _e('SEO Meta tag robots', 'meta-tags'); ?></label>
			<select id="wp_post_meta_tags[seo_meta_tag_robots]" name="wp_post_meta_tags[seo_meta_tag_robots]">
            	<?php
				if(esc_attr($tags['wp_post_meta_tag_robots']) == 'index, follow')
				{
					?><option selected="selected" value="index, follow">Index, follow</option><?php
				}
				else
				{
					?><option value="index, follow">Index, follow</option><?php
				}
				?>
				<?php
				if(esc_attr($tags['wp_post_meta_tag_robots']) == 'index, nofollow')
				{
					?><option selected="selected" value="index, nofollow">Index, no-follow</option><?php
				}
				else
				{
					?><option value="index, nofollow">Index, no-follow</option><?php
				}
				?>
				<?php
				if(esc_attr($tags['wp_post_meta_tag_robots']) == 'noindex, follow')
				{
					?><option selected="selected" value="noindex, follow">No-index, follow</option><?php
				}
				else
				{
					?><option value="noindex, follow">No-index, follow</option><?php
				}
				?>
				<?php
				if(esc_attr($tags['wp_post_meta_tag_robots']) == 'noindex, nofollow')
				{
					?><option selected="selected" value="noindex, nofollow">No-index, no-follow</option><?php
				}
				else
				{
					?><option value="noindex, nofollow">No-index, no-follow</option><?php
				}
				?>
			</select>
		</div>
        <?php
		wp_nonce_field('update_wp_post_meta_tags','wp_post_meta_tags_nonce');		
	}
	
	public static function wp_post_meta_tags_save()
	{
		global $post;
		update_post_meta($post->ID, 'wp_post_meta_tags', array(
			'wp_post_meta_tag_title' => esc_attr( $_POST['wp_post_meta_tags']['seo_meta_tag_title']),
			'wp_post_meta_tag_keywords' => esc_attr( $_POST['wp_post_meta_tags']['seo_meta_tag_keywords']),
			'wp_post_meta_tag_description' => esc_attr( $_POST['wp_post_meta_tags']['seo_meta_tag_description']),
			'wp_post_meta_tag_robots' => esc_attr( $_POST['wp_post_meta_tags']['seo_meta_tag_robots'])
		));
		
		if(wp_is_post_autosave($post->ID) || wp_is_post_revision($post->ID))
		{
            return $post->ID;
        }
        if(isset($_REQUEST['wp_post_meta_tags_nonce']) && wp_verify_nonce($_REQUEST['wp_post_meta_tags_nonce'], 'update_wp_post_meta_tags'))
		{
            $title = $_REQUEST['wp_post_meta_tags']['seo_meta_tag_title'];
			$keywords = $_REQUEST['wp_post_meta_tags']['seo_meta_tag_keywords'];
			$description = $_REQUEST['wp_post_meta_tags']['seo_meta_tag_description'];
			$robots = $_REQUEST['wp_post_meta_tags']['seo_meta_tag_robots'];
            
			update_post_meta($post->ID, 'wp_post_meta_tags', array(
				'wp_post_meta_tag_title' => $title,
				'wp_post_meta_tag_keywords' => $keywords,
				'wp_post_meta_tag_description' => $description,
				'wp_post_meta_tag_robots' => $robots
			));            
        }
	}
	
	public static function wp_post_meta_tags_output()
	{
		global $post;	

		if(is_single() || is_page())
		{
			echo '<meta itemprop="name" content="'. get_the_title($post) .'">'."\r\n";
			echo '<meta name="twitter:title" content="'.get_the_title($post).'" />'."\r\n";			
			echo '<meta property="og:title" content="'.get_the_title($post).'" />'."\r\n";
			echo '<meta property="og:url" content="';
			the_permalink();
			echo '" />'."\r\n";
			echo '<meta property="og:site_name" content="';
			bloginfo('name');
			echo '" />'."\r\n";
			echo '<meta property="og:type" content="article" />';
			

			echo '<meta name="twitter:card" content="summary" />';
			

			
			if(has_post_thumbnail()) {
				$url = wp_get_attachment_url(get_post_thumbnail_id());
				echo '<meta itemprop="image" content="'. $url .'">'."\r\n";
				echo '<meta property="og:image" content="'. $url .'"/>'."\r\n";
				$pathInfo = pathinfo($url);
				switch ($pathInfo["extension"]) {
					case "jpeg":
						echo '<meta property="og:image:type" content="image/jpeg" />';
						break;
					case "png":
						echo '<meta property="og:image:type" content="image/png" />';
						break;
					case "jpg":
						echo '<meta property="og:image:type" content="image/jpeg" />';
						break;
					default:
						break;
				}
				echo '<meta name="twitter:image" content="'. $url .'" /> '."\r\n";
			}

			
			$tags = get_post_meta($post->ID, 'wp_post_meta_tags', true);
      if (isset($tags) && is_array($tags)) {
        if (isset($tags['wp_post_meta_tag_description']) && (esc_attr($tags['wp_post_meta_tag_description']) != ''))
        {
			echo '<meta name="description" content="'.esc_attr($tags['wp_post_meta_tag_description']).'" />'."\r\n";
			echo '<meta itemprop="description" content="'.esc_attr($tags['wp_post_meta_tag_description']).'">'."\r\n";
			echo '<meta property="og:description" content="'.esc_attr($tags['wp_post_meta_tag_description']).'" />'."\r\n";
			echo '<meta name="twitter:description" content="'.esc_attr($tags['wp_post_meta_tag_description']).'" />'."\r\n";

        }
        if (isset($tags['wp_post_meta_tag_keywords']) && (esc_attr($tags['wp_post_meta_tag_keywords']) != ''))
        {
          echo '<meta name="keywords" content="'.esc_attr($tags['wp_post_meta_tag_keywords']).'" />'."\r\n";
        }
        if  (isset($tags['wp_post_meta_tag_robots']) && (esc_attr($tags['wp_post_meta_tag_robots']) != ''))
        {
          echo '<meta name="robots" content="'.esc_attr($tags['wp_post_meta_tag_robots']).'" />'."\r\n";
        }
      }
		}
	}
	
	public static function do_wp_post_meta_tags_title($title, $sep)
	{
		global $post;
		if(!$sep)
		{
			$sep = '|';
		}
	
		if(is_single() || is_page())
		{
			$tags = get_post_meta($post->ID, 'wp_post_meta_tags', true);
      if (isset($tags) && is_array($tags)) {
        if (isset($tags['wp_post_meta_tag_title']) && (esc_attr($tags['wp_post_meta_tag_title']) != ''))
        {
          $title = esc_attr($tags['wp_post_meta_tag_title']).' '.$sep.' ';
        }
      }
		}
		return $title;
	}
	function my_metaTags($content){
		
		global $post;
		// echo '<pre>';print_r($post);echo '</pre>';
		if(is_single() AND get_post_type() == 'post') {
			return $post->post_content.'<div class="social-meta-tags-container">
				<div class="social-meta-tags-social social-meta-tags-facebook">
					<a target="_blank" href="https://www.facebook.com/sharer.php?u='.urlencode(post_permalink($post->ID)).'"></a>
					<span></span></div>
				<div class="social-meta-tags-social social-meta-tags-twitter">
					<a target="_blank" href="https://twitter.com/intent/tweet?text='.urlencode($post->post_title).'&url='.urlencode(post_permalink($post->ID)).'"></a>
					<span></span>
				</div>
				<div class="social-meta-tags-social social-meta-tags-linkedin">						
					<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&title='.urlencode($post->post_title).'&url='.urlencode(post_permalink($post->ID)).'&summary='.urlencode($post->post_excerpt).'"></a>	
					<span></span></div>
			</div>';
		}
	}
}
