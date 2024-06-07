<?php
class Qiupid_Customizer_Control_Color extends Qiupid_Customizer_Control_Base {
	static function field_template() {
		?>
		<script type="text/html" id="tmpl-field-qiupid-color">
		<?php
		self::before_field();
		?>
		<?php echo self::field_header(); ?>
		<div class="qiupid-field-settings-inner">
			<div class="qiupid-input-color" data-default="{{ field.default }}">
				<input type="hidden" class="qiupid-input qiupid-input--color" data-name="{{ field.name }}" value="{{ field.value }}">
				<input type="text" class="qiupid--color-panel" placeholder="{{ field.placeholder }}" data-alpha="true" value="{{ field.value }}">
			</div>
		</div>
		<?php
		self::after_field();
		?>
		</script>
		<?php
	}
}
