<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
* Class to add additional fields to the attributes admin page
*
*/

if( !class_exists('MSPC_Admin_Attributes') ) {

	class MSPC_Admin_Attributes {


		public function __construct() {

			$attributes = wc_get_attribute_taxonomy_names();

			foreach( $attributes as $attribute ) {

				add_action( $attribute.'_add_form_fields', array( $this, 'add_image_uploader_to_add_form'), 10, 2 );
				add_action( $attribute.'_edit_form_fields', array( $this, 'add_image_uploader_to_edit_form'), 10, 1);
				add_action( 'edited_'.$attribute, array( $this, 'save_taxonomy_custom_meta'), 10, 2 );
				add_action( 'create_'.$attribute, array( $this, 'save_taxonomy_custom_meta'), 10, 2 );
				add_action( 'delete_'.$attribute, array( $this, 'delete_taxonomy_custom_meta'), 10, 2 );

			}

		}

		//add image uploader to add-attribute form
		public function add_image_uploader_to_add_form( $term ) {

			?>
			<div class="form-field">
				<label for="mspc_image_url"><?php _e('Image URL') ?></label>
				<div class="mspc-upload-field">
					<input name="mspc_image_url" id="mspc-image-url" type="text" value="" />
					<a href="#" class="button" id="mspc-add-image"><?php _e('Add from media library'); ?></a>
				</div>
				<p class="description"><?php printf( __('This image will be used as attribute thumbnail for the Multistep Product Configurator. The <a href="%s">"Single Product Image"</a> size will be used as size for this thumbnail.', 'radykal'), esc_url( admin_url('admin.php?page=wc-settings&tab=products#shop_single_image_size-width') ) ); ?></p>
			</div>
			<?php


		}

		//add image uploader to edit-attribute form
		public function add_image_uploader_to_edit_form( $term ) {

			$term_id = $term->term_id;
			$term_meta = get_option( 'mspc_variation_image_'.$term_id );

			?>
			<tr class="form-field">
				<th scope="row" valign="top">
					<label for="mspc_image_url"><?php _e('Image URL'); ?></label>
				</th>
				<td>
					<div class="mspc-upload-field">
						<input name="mspc_image_url" id="mspc-image-url" type="text" value="<?php echo $term_meta; ?>" />
						<a href="#" class="button" id="mspc-add-image"><?php _e('Add from media library'); ?></a>
					</div>
					<p class="description"><?php printf( __('This image will be used as attribute thumbnail for the Multistep Product Configurator. The <a href="%s">"Single Product Image"</a> size will be used as size for this thumbnail.', 'radykal'), esc_url( admin_url('admin.php?page=wc-settings&tab=products#shop_single_image_size-width') ) ); ?></p>
				</td>
			</tr>
			<?php

		}


		public function save_taxonomy_custom_meta( $term_id ) {

			if ( isset( $_POST['mspc_image_url'] ) ) {

				update_option( 'mspc_variation_image_'.$term_id, $_POST['mspc_image_url'] );

			}

		}

		public function delete_taxonomy_custom_meta( $term_id ) {

			delete_option( 'mspc_variation_image_'.$term_id );

		}

	}
}

new MSPC_Admin_Attributes();
?>