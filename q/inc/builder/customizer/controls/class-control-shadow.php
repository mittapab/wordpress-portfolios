<?php
class Qiupid_Customizer_Control_Shadow extends Qiupid_Customizer_Control_Base {
	static function field_template() {
		echo '<script type="text/html" id="tmpl-field-qiupid-shadow">';
		self::before_field();
		?>
		<#
			if ( ! _.isObject( field.value ) ) {
			field.value = { };
			}

			var uniqueID = field.name + ( new Date().getTime() );
		#>
			<?php echo self::field_header(); ?>
			<div class="qiupid-field-settings-inner">

				<div class="qiupid-input-color" data-default="{{ field.default }}">
					<input type="hidden" class="qiupid-input qiupid-input--color" data-name="{{ field.name }}-color" value="{{ field.value.color }}">
					<input type="text" class="qiupid--color-panel" data-alpha="true" value="{{ field.value.color }}">
				</div>

				<div class="qiupid--gr-inputs">
					<span>
						<input type="number" class="qiupid-input qiupid-input-css change-by-js"  data-name="{{ field.name }}-x" value="{{ field.value.x }}">
						<span class="qiupid--small-label"><?php _e( 'X', 'qiupid' ); ?></span>
					</span>
					<span>
						<input type="number" class="qiupid-input qiupid-input-css change-by-js"  data-name="{{ field.name }}-y" value="{{ field.value.y }}">
						<span class="qiupid--small-label"><?php _e( 'Y', 'qiupid' ); ?></span>
					</span>
					<span>
						<input type="number" class="qiupid-input qiupid-input-css change-by-js" data-name="{{ field.name }}-blur" value="{{ field.value.blur }}">
						<span class="qiupid--small-label"><?php _e( 'Blur', 'qiupid' ); ?></span>
					</span>
					<span>
						<input type="number" class="qiupid-input qiupid-input-css change-by-js" data-name="{{ field.name }}-spread" value="{{ field.value.spread }}">
						<span class="qiupid--small-label"><?php _e( 'Spread', 'qiupid' ); ?></span>
					</span>
					<span>
						<span class="input">
							<input type="checkbox" class="qiupid-input qiupid-input-css change-by-js" <# if ( field.value.inset == 1 ){ #> checked="checked" <# } #> data-name="{{ field.name }}-inset" value="{{ field.value.inset }}">
						</span>
						<span class="qiupid--small-label"><?php _e( 'inset', 'qiupid' ); ?></span>
					</span>
				</div>
			</div>
			<?php
			self::after_field();
			echo '</script>';
	}
}
