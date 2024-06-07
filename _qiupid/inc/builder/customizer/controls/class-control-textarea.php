<?php
class Qiupid_Customizer_Control_Textarea extends Qiupid_Customizer_Control_Base {
	static function field_template() {
		echo '<script type="text/html" id="tmpl-field-qiupid-textarea">';
		self::before_field();
		?>
		<?php echo self::field_header(); ?>
		<div class="qiupid-field-settings-inner">
			<textarea rows="10" class="qiupid-input" data-name="{{ field.name }}">{{ field.value }}</textarea>
		</div>
		<?php
		self::after_field();
		echo '</script>';
	}
}
