<div id="mspc_data" class="panel woocommerce_options_panel wc-metaboxes-wrapper">
	<div class="options_group">
		<p class="form-field">
			<label for="mspc-module"><?php _e( 'Module', 'radykal' ); ?></label>
			<select name="mspc_module" id="mspc-module">
				<?php
					foreach($options['module'] as $key  => $value) {
						echo '<option value="'.$key.'" '.selected($stored_options['module'], $key, false).'>'.$value.'</option>';
					}
				?>
			</select>
		</p>
		<p class="form-field">
			<label for="mspc-grid-item-layout"><?php _e( 'Grid Item Layout', 'radykal' ); ?></label>
			<select name="mspc_grid_item_layout" id="mspc-grid-item-layout">
				<?php
					foreach($options['grid_item_layout'] as $key  => $value) {
						echo '<option value="'.$key.'" '.selected($stored_options['grid_item_layout'], $key, false).'>'.$value.'</option>';
					}
				?>
			</select>
		</p>
		<p class="form-field">
			<label for="mspc-columns"><?php _e( 'Columns', 'radykal' ); ?></label>
			<select name="mspc_columns" id="mspc-columns">
				<?php
					foreach($options['columns'] as $key  => $value) {
						echo '<option value="'.$key.'" '.selected($stored_options['columns'], $key, false).'>'.$value.'</option>';
					}
				?>
			</select>
		</p>
		<p class="form-field">
			<label for="mspc-auto-next"><?php _e( 'Auto-Next', 'radykal' ); ?></label>
			<input type="checkbox" class="checkbox" id="mspc-auto-next" name="mspc_auto_next" value="yes" <?php checked($stored_options['auto_next'], 'yes'); ?> />
			<img class="help_tip" data-tip="<?php esc_attr_e( 'When the user selects an attribute from a block, it opens the next block automatically.', 'radykal' ); ?>" src="<?php echo esc_url( WC()->plugin_url() ); ?>/assets/images/help.png" height="16" width="16" />
		</p>
		<p class="form-field">
			<label for="mspc-step-by-step"><?php _e( 'Step by step', 'radykal' ); ?></label>
			<input type="checkbox" class="checkbox" id="mspc-step-by-step" name="mspc_step_by_step" value="yes" <?php checked($stored_options['step_by_step'], 'yes'); ?> />
			<img class="help_tip" data-tip="<?php esc_attr_e( 'The user needs to select an attribute of the current showing block first to select an attribute of the next block.', 'radykal' ); ?>" src="<?php echo esc_url( WC()->plugin_url() ); ?>/assets/images/help.png" height="16" width="16" />
		</p>
	</div>
	<div class="options_group">
		<p class="form-field">
			<label for="mspc-template-layout"><?php _e( 'Template Layout', 'radykal' ); ?></label>
			<select name="mspc_template_layout" id="mspc-template-layout">
				<?php
					foreach($options['template_layout'] as $key  => $value) {
						echo '<option value="'.$key.'" '.selected($stored_options['template_layout'], $key, false).'>'.$value.'</option>';
					}
				?>
			</select>
		</p>
		<p class="form-field">
			<label for="mspc-product-image"><?php _e( 'Product Image', 'radykal' ); ?></label>
			<select name="mspc_product_image" id="mspc-product-image">
				<?php
					foreach($options['product_image'] as $key  => $value) {
						echo '<option value="'.$key.'" '.selected($stored_options['product_image'], $key, false).'>'.$value.'</option>';
					}
				?>
			</select>
		</p>
	</div>
</div>