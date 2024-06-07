<?php
class Qiupid_Customizer_Control_Hidden extends Qiupid_Customizer_Control_Base {
	static function field_template() {
		?>
		<script type="text/html" id="tmpl-field-qiupid-hidden">
		<?php
		self::before_field();
		?>
		<input type="hidden" class="qiupid-input qiupid-only" data-name="{{ field.name }}" value="{{ field.value }}">
		<?php
		self::after_field();
		?>
		</script>
		<?php
	}
}
