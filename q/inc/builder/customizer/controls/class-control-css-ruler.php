<?php
class Qiupid_Customizer_Control_Css_Ruler extends Qiupid_Customizer_Control_Base {
	static function field_template() {
		?>
		<script type="text/html" id="tmpl-field-qiupid-css_ruler">
		<?php
		self::before_field();
		?>
		<#
		if ( ! _.isObject( field.value ) ) {
			field.value = { link: 1 };
		}

		var fields_disabled;
		if ( ! _.isObject( field.fields_disabled ) ) {
			fields_disabled = {};
		} else {
			fields_disabled = _.clone( field.fields_disabled );
		}

		var defaultpl = <?php echo json_encode( __( 'Auto', 'qiupid' ) ); // phpcs:ignore ?>;

		_.each( [ 'top', 'right', 'bottom', 'left' ], function( key ){
			if ( ! _.isUndefined( fields_disabled[ key ] ) ) {
				if ( ! fields_disabled[ key ] ) {
					fields_disabled[ key ] = defaultpl;
				}
			} else {
				fields_disabled[ key ] = false;
			}
		} );

		var uniqueID = field.name + ( new Date().getTime() );
		#>
		<?php echo self::field_header(); ?>
		<div class="qiupid-field-settings-inner">
			<div class="qiupid--css-unit" title="<?php esc_attr_e( 'Chose an unit', 'qiupid' ); ?>">
				<label class="<# if ( field.value.unit == 'px' || ! field.value.unit ){ #> qiupid--label-active <# } #>">
					<?php _e( 'px', 'qiupid' ); ?>
					<input type="radio" class="qiupid-input qiupid--label-parent change-by-js" <# if ( field.value.unit == 'px' || ! field.value.unit ){ #> checked="checked" <# } #> data-name="{{ field.name }}-unit" name="r{{ uniqueID }}" value="px">
				</label>
				<label class="<# if ( field.value.unit == 'rem' ){ #> qiupid--label-active <# } #>">
					<?php _e( 'rem', 'qiupid' ); ?>
					<input type="radio" class="qiupid-input qiupid--label-parent change-by-js" <# if ( field.value.unit == 'rem' ){ #> checked="checked" <# } #> data-name="{{ field.name }}-unit" name="r{{ uniqueID }}" value="rem">
				</label>
				<label class="<# if ( field.value.unit == 'em' ){ #> qiupid--label-active <# } #>">
					<?php _e( 'em', 'qiupid' ); ?>
					<input type="radio" class="qiupid-input qiupid--label-parent change-by-js" <# if ( field.value.unit == 'em' ){ #> checked="checked" <# } #> data-name="{{ field.name }}-unit" name="r{{ uniqueID }}" value="em">
				</label>
				<label class="<# if ( field.value.unit == '%' ){ #> qiupid--label-active <# } #>">
					<?php _e( '%', 'qiupid' ); ?>
					<input type="radio" class="qiupid-input qiupid--label-parent change-by-js" <# if ( field.value.unit == '%' ){ #> checked="checked" <# } #> data-name="{{ field.name }}-unit" name="r{{ uniqueID }}" value="%">
				</label>
			</div>
			<div class="qiupid--css-ruler qiupid--gr-inputs">
				<span>
					<input type="number" class="qiupid-input qiupid-input-css change-by-js" <# if ( fields_disabled['top'] ) {  #> disabled="disabled" placeholder="{{ fields_disabled['top'] }}" <# } #> data-name="{{ field.name }}-top" value="{{ field.value.top }}">
					<span class="qiupid--small-label"><?php _e( 'Top', 'qiupid' ); ?></span>
				</span>
				<span>
					<input type="number" class="qiupid-input qiupid-input-css change-by-js" <# if ( fields_disabled['right'] ) {  #> disabled="disabled" placeholder="{{ fields_disabled['right'] }}" <# } #> data-name="{{ field.name }}-right" value="{{ field.value.right }}">
					<span class="qiupid--small-label"><?php _e( 'Right', 'qiupid' ); ?></span>
				</span>
				<span>
					<input type="number" class="qiupid-input qiupid-input-css change-by-js" <# if ( fields_disabled['bottom'] ) {  #> disabled="disabled" placeholder="{{ fields_disabled['bottom'] }}" <# } #> data-name="{{ field.name }}-bottom" value="{{ field.value.bottom }}">
					<span class="qiupid--small-label"><?php _e( 'Bottom', 'qiupid' ); ?></span>
				</span>
				<span>
					<input type="number" class="qiupid-input qiupid-input-css change-by-js" <# if ( fields_disabled['left'] ) {  #> disabled="disabled" placeholder="{{ fields_disabled['left'] }}" <# } #> data-name="{{ field.name }}-left" value="{{ field.value.left }}">
					<span class="qiupid--small-label"><?php _e( 'Left', 'qiupid' ); ?></span>
				</span>
				<label title="<?php esc_attr_e( 'Toggle values together', 'qiupid' ); ?>" class="qiupid--css-ruler-link <# if ( field.value.link == 1 ){ #> qiupid--label-active <# } #>">
					<input type="checkbox" class="qiupid-input qiupid--label-parent change-by-js" <# if ( field.value.link == 1 ){ #> checked="checked" <# } #> data-name="{{ field.name }}-link" value="1">
				</label>
			</div>
		</div>
		<?php
		self::after_field();
		?>
		</script>
		<?php
	}
}
