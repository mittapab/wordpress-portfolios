<?php
class Qiupid_Customizer_Control_Icon extends Qiupid_Customizer_Control_Base {
	static function field_template() {
		echo '<script type="text/html" id="tmpl-field-qiupid-icon">';
		self::before_field();
		?>
		<#
		if ( ! _.isObject( field.value ) ) {
			field.value = { };
		}
		#>
		<?php echo self::field_header(); ?>
		<div class="qiupid-field-settings-inner">
			<div class="qiupid--icon-picker">
				<div class="qiupid--icon-preview">
					<input type="hidden" class="qiupid-input qiupid--input-icon-type" data-name="{{ field.name }}-type" value="{{ field.value.type }}">
					<div class="qiupid--icon-preview-icon qiupid--pick-icon">
						<# if ( field.value.icon ) {  #>
							<i class="{{ field.value.icon }}"></i>
						<# }  #>
					</div>
				</div>
				<input type="text" readonly class="qiupid-input qiupid--pick-icon qiupid--input-icon-name" placeholder="<?php esc_attr_e( 'Pick an icon', 'qiupid' ); ?>" data-name="{{ field.name }}" value="{{ field.value.icon }}">
				<span class="qiupid--icon-remove" title="<?php esc_attr_e( 'Remove', 'qiupid' ); ?>">
					<span class="dashicons dashicons-no-alt"></span>
					<span class="screen-reader-text">
					<?php _e( 'Remove', 'qiupid' ); ?></span>
				</span>
			</div>
		</div>
		<?php
		self::after_field();
		echo '</script>';
		?>
		<div id="qiupid--sidebar-icons">
			<div class="qiupid--sidebar-header">
				<a class="customize-controls-icon-close" href="#">
					<span class="screen-reader-text"><?php _e( 'Cancel', 'qiupid' ); ?></span>
				</a>
				<div class="qiupid--icon-type-inner">
					<select id="qiupid--sidebar-icon-type">
						<option value="all"><?php _e( 'All Icon Types', 'qiupid' ); ?></option>
					</select>
				</div>
			</div>
			<div class="qiupid--sidebar-search">
				<input type="text" id="qiupid--icon-search" placeholder="<?php esc_attr_e( 'Type icon name', 'qiupid' ); ?>">
			</div>
			<div id="qiupid--icon-browser"></div>
		</div>
		<?php
	}
}
