<?php
class Qiupid_Customizer_Control_Typography extends Qiupid_Customizer_Control_Base {
	static function field_template() {
		echo '<script type="text/html" id="tmpl-field-qiupid-typography">';
		self::before_field();
		?>
		<?php echo self::field_header(); ?>
		<div class="qiupid-actions">
			<a href="#" class="action--reset" data-control="{{ field.name }}" title="<?php esc_attr_e( 'Reset to default', 'qiupid' ); ?>"><span class="dashicons dashicons-image-rotate"></span></a>
			<a href="#" class="action--edit" data-control="{{ field.name }}" title="<?php esc_attr_e( 'Toggle edit panel', 'qiupid' ); ?>"><span class="dashicons dashicons-editor-textcolor"></span></a>
		</div>
		<div class="qiupid-field-settings-inner">
			<input type="hidden" class="qiupid-typography-input qiupid-only" data-name="{{ field.name }}" value="{{ JSON.stringify( field.value ) }}" data-default="{{ JSON.stringify( field.default ) }}">
		</div>
		<?php
		self::after_field();
		echo '</script>';
		?>
		<div id="qiupid-typography-panel" class="qiupid-typography-panel">
			<div class="qiupid-typography-panel--inner">
				<input type="hidden" id="qiupid--font-type">
				<div id="qiupid-typography-panel--fields"></div>
			</div>
		</div>
		<?php
	}
}
