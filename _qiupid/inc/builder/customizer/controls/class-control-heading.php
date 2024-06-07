<?php
class Qiupid_Customizer_Control_Heading extends Qiupid_Customizer_Control_Base {
	static function field_template() {
		?>
		<script type="text/html" id="tmpl-field-qiupid-heading">
		<?php
		self::before_field();
		?>
		<h3 class="qiupid-field--heading">{{ field.label }}</h3>
		<?php
		self::after_field();
		?>
		</script>
		<?php
	}
}
