<?php
                
function ct_add_multipart() {
	echo 'enctype="multipart/form-data"';
}                                        
add_action( 'user_edit_form_tag', 'ct_add_multipart' );

add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );
 
function extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Extra profile information", "blank"); ?></h3>
     
    <table class="form-table">
        <tr>
            <th><label for="ct_profile_img"><?php _e('Profile Image', 'contempo'); ?></label></th>
            <td>
                <input type="hidden" name="MAX_FILE_SIZE" value="1024000" />
                <img style="border: 1px solid #dfdfdf; margin: 0 0 5px 0; padding: 5px; background: #fff;" src="<?php echo get_template_directory_uri(); ?>/img_resize/timthumb.php?src=<?php echo esc_attr( get_the_author_meta( 'ct_profile_url', $user->ID ) ); ?>&h=129&w=95&zc=1" /><br />
                <input name="ct_profile_img" id="ct_profile_img" type="file" /><br />
                <span class="description"><?php _e('Please upload a profile picture here.', 'contempo'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="twitter"><?php _e('Twitter', 'contempo'); ?></label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Please enter your Twitter ID (without the @ symbol)', 'contempo'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="facebook"><?php _e('Facebook', 'contempo'); ?></label></th>
            <td>
                <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Please enter your Facebook URL', 'contempo'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="google"><?php _e('Google+', 'contempo'); ?></label></th>
            <td>
                <input type="text" name="google" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'google', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Please enter your Google+ URL', 'contempo'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="linkedin"><?php _e('LinkedIn', 'contempo'); ?></label></th>
            <td>
                <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Please enter your LinkedIn profile URL', 'contempo'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="mobile"><?php _e('Mobile #', 'contempo'); ?></label></th>
            <td>
                <input type="text" name="mobile" id="mobile" value="<?php echo esc_attr( get_the_author_meta( 'mobile', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Please enter your mobile number here.', 'contempo'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="fax"><?php _e('Fax #', 'contempo'); ?></label></th>
            <td>
                <input type="text" name="fax" id="fax" value="<?php echo esc_attr( get_the_author_meta( 'fax', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Please enter your fax number here.', 'contempo'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="title"><?php _e('Title', 'contempo'); ?></label></th>
            <td>
                <input type="text" name="title" id="title" value="<?php echo esc_attr( get_the_author_meta( 'title', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Please enter your position/title.', 'contempo'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="tagline"><?php _e('Tagline', 'contempo'); ?></label></th>
            <td>
                <input type="text" name="tagline" id="tagline" value="<?php echo esc_attr( get_the_author_meta( 'tagline', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Please enter your tagline here.', 'contempo'); ?></span>
            </td>
        </tr>
        </table>
        
        <h3><?php _e('Office Information', 'contempo'); ?></h3>
        
        <table class="form-table">
        <tr>
            <th><label for="office"><?php _e('Office #', 'contempo'); ?></label></th>
            <td>
                <input type="text" name="office" id="office" value="<?php echo esc_attr( get_the_author_meta( 'office', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Please enter your office number here.', 'contempo'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="address"><?php _e('Address', 'contempo'); ?></label></th>
            <td>
                <input type="text" name="address" id="address" value="<?php echo esc_attr( get_the_author_meta( 'address', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Please enter your address.', 'contempo'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="city"><?php _e('City', 'contempo'); ?></label></th>
            <td>
                <input type="text" name="city" id="city" value="<?php echo esc_attr( get_the_author_meta( 'city', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Please enter your city.', 'contempo'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="state"><?php _e('State or Province', 'contempo'); ?></label></th>
            <td>
                <input type="text" name="state" id="state" value="<?php echo esc_attr( get_the_author_meta( 'state', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Please enter your state or province.', 'contempo'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="postalcode"><?php _e('Postal Code', 'contempo'); ?></label></th>
            <td>
                <input type="text" name="postalcode" id="postalcode" value="<?php echo esc_attr( get_the_author_meta( 'postalcode', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Please enter your postal code.', 'contempo'); ?></span>
            </td>
        </tr>
    </table>
<?php }
 
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );
 
function save_extra_user_profile_fields( $user_id ) {
 
	if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
	
	// Upload Custom Logo    
	if ( !empty($_FILES['ct_profile_img']['name']) ) {
		$filename = $_FILES['ct_profile_img'];				
		$override['test_form'] = false;
		$override['action'] = 'wp_handle_upload';
		$uploaded = wp_handle_upload($filename,$override);
		update_user_meta( $user_id, "ct_profile_url" , $uploaded['url'] );
		
		if( !empty($uploaded['error']) ) {
				die( 'Could not upload image: ' . $uploaded['error'] ); 
		}        
	}
	
	update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
	update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
	update_user_meta( $user_id, 'google', $_POST['google'] );
	update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
	update_user_meta( $user_id, 'mobile', $_POST['mobile'] );
	update_user_meta( $user_id, 'office', $_POST['office'] );
	update_user_meta( $user_id, 'fax', $_POST['fax'] );
	update_user_meta( $user_id, 'title', $_POST['title'] );
	update_user_meta( $user_id, 'tagline', $_POST['tagline'] ); 
	update_user_meta( $user_id, 'address', $_POST['address'] );
	update_user_meta( $user_id, 'city', $_POST['city'] );
	update_user_meta( $user_id, 'state', $_POST['state'] );
	update_user_meta( $user_id, 'postalcode', $_POST['postalcode'] );
}

?>