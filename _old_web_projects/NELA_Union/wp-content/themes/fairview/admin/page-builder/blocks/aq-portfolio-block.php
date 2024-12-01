<?php
/* Portfolio Block */
if(!class_exists('AQ_Portfolio_Block')) {
	class AQ_Portfolio_Block extends AQ_Block {
		
		function __construct() {
			$block_options = array(
				'name' => 'Portfolio',
				'size' => 'span12',
			);
			
			//create the widget
			parent::__construct('AQ_Portfolio_Block', $block_options);
		}
		
		function form($instance) {
			$defaults = array(
				'img' => '',
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title<br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>
            <p class="description half">
				<label for="<?php echo $this->get_field_id('number') ?>">
					Number<br/>
					<?php echo aq_field_input('number', $block_id, $title) ?>
				</label>
			</p>
			<?php
		}
		
		function block($instance) {
			extract($instance); ?>
                    
            <div class="col">
        
				<?php ct_tags_nav(); ?>
                
                <div id="isotope-container">
                    <?php get_template_part('loop','portfolio'); ?>
                </div>
                
            </div>
			
		<?php }
		
		
	}
}