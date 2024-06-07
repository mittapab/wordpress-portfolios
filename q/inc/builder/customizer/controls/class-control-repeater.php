<?php

class Qiupid_Customizer_Control_Repeater extends Qiupid_Customizer_Control_Base {
	static function field_template() {
		?>
		<script type="text/html" id="tmpl-field-qiupid-repeater">
			<?php
			self::before_field();
			?>
			<?php echo self::field_header(); ?>
			<div class="qiupid-field-settings-inner">
			</div>
			<?php
			self::after_field();
			?>
		</script>
		<script type="text/html" id="tmpl-customize-control-repeater-item">
			<div class="qiupid--repeater-item">
				<div class="qiupid--repeater-item-heading">
					<label class="qiupid--repeater-visible" title="<?php esc_attr_e( 'Toggle item visible', 'qiupid' ); ?>">
						<input type="checkbox" class="r-visible-input">
						<span class="r-visible-icon"></span>
						<span class="screen-reader-text"><?php _e( 'Show', 'qiupid' ); ?></label>
					<span class="qiupid--repeater-live-title"></span>
					<div class="qiupid-nav-reorder">
						<span class="qiupid--down" tabindex="-1">
							<span class="screen-reader-text"><?php _e( 'Move Down', 'qiupid' ); ?></span></span>
						<span class="qiupid--up" tabindex="0">
							<span class="screen-reader-text"><?php _e( 'Move Up', 'qiupid' ); ?></span>
						</span>
					</div>
					<a href="#" class="qiupid--repeater-item-toggle">
						<span class="screen-reader-text"><?php _e( 'Close', 'qiupid' ); ?></span></a>
				</div>
				<div class="qiupid--repeater-item-settings">
					<div class="qiupid--repeater-item-inside">
						<div class="qiupid--repeater-item-inner"></div>
						<# if ( data.addable ){ #>
						<a href="#" class="qiupid--remove"><?php _e( 'Remove', 'qiupid' ); ?></a>
						<# } #>
					</div>
				</div>
			</div>
		</script>
		<script type="text/html" id="tmpl-customize-control-repeater-inner">
			<div class="qiupid--repeater-inner">
				<div class="qiupid--settings-fields qiupid--repeater-items"></div>
				<div class="qiupid--repeater-actions">
				<a href="#" class="qiupid--repeater-reorder"
				data-text="<?php esc_attr_e( 'Reorder', 'qiupid' ); ?>"
				data-done="<?php _e( 'Done', 'qiupid' ); ?>"><?php _e( 'Reorder', 'qiupid' ); ?></a>
					<# if ( data.addable ){ #>
					<button type="button"
							class="button qiupid--repeater-add-new"><?php _e( 'Add an item', 'qiupid' ); ?></button>
					<# } #>
				</div>
			</div>
		</script>
		<?php
	}
}
