<?php
class Qiupid_Customizer_Control_Font extends Qiupid_Customizer_Control_Base {
	static function field_template() {
		?>
		<script type="text/html" id="tmpl-field-qiupid-css-ruler">
		<?php
		self::before_field();
		?>
		<?php echo self::field_header(); ?>
		<div class="qiupid-field-settings-inner">
			<input type="hidden" class="qiupid--font-type" data-name="{{ field.name }}-type" >
			<div class="qiupid--font-families-wrapper">
				<select class="qiupid--font-families" data-value="{{ JSON.stringify( field.value ) }}" data-name="{{ field.name }}-font"></select>
			</div>
			<div class="qiupid--font-variants-wrapper">
				<label><?php _e( 'Variants', 'qiupid' ); ?></label>
				<select class="qiupid--font-variants" data-name="{{ field.name }}-variant"></select>
			</div>
			<div class="qiupid--font-subsets-wrapper">
				<label><?php _e( 'Languages', 'qiupid' ); ?></label>
				<div data-name="{{ field.name }}-subsets" class="list-subsets">
				</div>
			</div>
		</div>
		<?php
		self::after_field();
		?>
		</script>
		<?php
	}
}
