<?php
class Qiupid_Customizer_Control_Styling extends Qiupid_Customizer_Control_Modal {
	static function field_template() {
		echo '<script type="text/html" id="tmpl-field-qiupid-styling">';
		self::before_field();
		?>
		<?php echo self::field_header(); ?>
		<div class="qiupid-actions">
			<a href="#" title="<?php esc_attr_e( 'Reset to default', 'qiupid' ); ?>" class="action--reset" data-control="{{ field.name }}"><span class="dashicons dashicons-image-rotate"></span></a>
			<a href="#" title="<?php esc_attr_e( 'Toggle edit panel', 'qiupid' ); ?>" class="action--edit" data-control="{{ field.name }}"><span class="dashicons dashicons-admin-customizer"></span></a>
		</div>
		<div class="qiupid-field-settings-inner">
			<input type="hidden" class="qiupid-hidden-modal-input qiupid-only" data-name="{{ field.name }}" value="{{ JSON.stringify( field.value ) }}" data-default="{{ JSON.stringify( field.default ) }}">
		</div>
		<?php
		self::after_field();
		echo '</script>';
		?>
		<script type="text/html" id="tmpl-qiupid-modal-settings">
			<div class="qiupid-modal-settings">
				<div class="qiupid-modal-settings--inner">
					<div class="qiupid-modal-settings--fields"></div>
				</div>
			</div>
		</script>
		<?php
	}
}
