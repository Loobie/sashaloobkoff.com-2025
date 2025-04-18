<?php
/** 
 * Posts Block
 * List posts by category/tags/post_format
 * Orderby latest
 * @todo - allow featured images, layout options, post formats(currently post tags offer similar functionality)
*/
if(!class_exists('AQ_Posts_Block')) {
	class AQ_Posts_Block extends AQ_Block {
		
		function __construct() {
			$block_options = array(
				'name' => 'Blog Posts',
				'size' => 'span6',
				'categories' => array(),
				'tags' => array(),
				'postnum' => 5,
				'excerpt' => 1,
				'thumb' => array(),
				'page' => false,
			);
			
			parent::__construct('aq_posts_block', $block_options);
			add_filter('excerpt_more', array(&$this, 'excerpt_more'));
		}
		
		function form($instance) {
		
			extract($instance);
			
			$post_categories = ($temp = get_terms('category')) ? $temp : array();
			$categories_options = array();
			foreach($post_categories as $cat) {
				$categories_options[$cat->term_id] = $cat->name;
			}
			
			$post_tags = ($temp = get_terms('post_tag')) ? $temp : array();
			$tags_options = array();
			foreach($post_tags as $tag) {
				$tags_options[$tag->term_id] = $tag->name;
			}
			
			$yes_no = array('Yes', 'No');
			
			$page_options = array(0 => "Select a page:");
			$pages_obj = get_pages('sort_column=post_parent,menu_order');    
			foreach ($pages_obj as $page_obj) {
				$page_options[$page_obj->ID] = $page_obj->post_title; 
			}
			
			?>
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title (optional)<br/>
					<input id="<?php echo $this->get_field_id('title') ?>" class="input-full" type="text" value="<?php echo $title ?>" name="<?php echo $this->get_field_name('title') ?>">
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('categories') ?>">
				Posts Categories (leave empty to display all)<br/>
				<?php echo aq_field_multiselect('categories', $block_id, $categories_options, $categories); ?>
				</label>
			</p>
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('types') ?>">
				Posts Tags (leave empty to display all)<br/>
				<?php echo aq_field_multiselect('tags', $block_id, $tags_options, $tags); ?>
				</label>
			</p>
            <p class="description half last">
				<label for="<?php echo $this->get_field_id('thumb') ?>">
				Thumbnail<br/>
				<?php echo aq_field_select('thumb', $block_id, $yes_no, $thumb); ?>
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('postnum') ?>">
				Maximum number of posts to display<br/>
				<?php echo aq_field_input('postnum', $block_id, $postnum, 'min', 'number') ?> &nbsp; posts
				</label>
			</p>
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('page') ?>">
				Blog page (optional)
				<?php echo aq_field_select('page', $block_id, $page_options, $page) ?>
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('excerpt') ?>">
				<?php echo aq_field_checkbox('excerpt', $block_id, $excerpt); ?> &nbsp; Show excerpt
				</label>
			</p>
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			if($title) echo '<h4 class="aq-block-title">'.strip_tags($title).'</h4>';
			
			$args = array();
			if($postnum) $args['posts_per_page'] = $postnum;
			if($categories) $args['category__in'] = $categories;
			if($tags) $args['tag__in'] = $tags;
			
			query_posts($args);
			
			echo '<div class="aq-posts-block">';
				echo '<ul>';
				if (have_posts()) : while (have_posts()) : the_post();
					global $post;
					
					echo '<li class="'.implode(', ', get_post_class()).' cf">';
						echo '<div class="onethirdcol left">';
								ct_first_image_tn();
						echo '</div>';
						echo '<div class="twothirdcol right last">';
						echo '<h5 class="the-title"><a href="'.get_permalink().'">'. get_the_title() .'</a></h5>';
						if($excerpt) echo '<p class="the_excerpt marB0">'. the_excerpt() .'</p>';
						echo '</div>';
					echo '</li>';
					 
				endwhile; endif; wp_reset_query();
				
				echo '</ul>';
			
			if($page) {
				$blog_page = get_page($page);
				if($blog_page) echo '<p><a href="'.get_permalink($page).'">'.__('View all posts &rarr;', 'framework').'</a></p>';
			}
			echo '</div>';
		}
		
		function update($new_instance, $old_instance) {
			$new_instance = aq_recursive_sanitize($new_instance);
			return $new_instance;
		}
		
		function excerpt_more($more) {
			global $post;
			return ' <a href="'. get_permalink($post->ID) . '">Continue Reading &rarr;</a>';
		}
	}
}