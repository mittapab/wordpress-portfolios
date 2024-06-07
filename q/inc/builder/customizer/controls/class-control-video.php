<?php
class Qiupid_Customizer_Control_Video extends Qiupid_Customizer_Control_Media {
	static function field_template() {
		echo '<script type="text/html" id="tmpl-field-qiupid-video">';
		self::before_field();
		?>
		<#
		if ( ! _.isObject(field.value) ) {
			field.value = {};
		}
		var url = field.value.url;
		#>
		<?php echo self::field_header(); ?>
		<div class="qiupid-field-settings-inner qiupid-media-type-{{ field.type }}">
			<div class="qiupid--media">
				<input type="hidden" class="attachment-id" value="{{ field.value.id }}" data-name="{{ field.name }}">
				<input type="hidden" class="attachment-url"  value="{{ field.value.url }}" data-name="{{ field.name }}-url">
				<input type="hidden" class="attachment-mime"  value="{{ field.value.mime }}" data-name="{{ field.name }}-mime">
				<div class="qiupid-image-preview <# if ( url ) { #> qiupid--has-file <# } #>" data-no-file-text="<?php esc_attr_e( 'No file selected', 'qiupid' ); ?>">
					<#

					if ( url ) {
						if ( url.indexOf('http://') > -1 || url.indexOf('https://') ){

						} else {
							url = Qiupid_Control_Args.home_url + url;
						}

						if ( ! field.value.mime || field.value.mime.indexOf('image/') > -1 ) {
							#>
							<img src="{{ url }}" alt="image">
						<# } else if ( field.value.mime.indexOf('video/' ) > -1 ) { #>
							<video width="100%" height="" controls><source src="{{ url }}" type="{{ field.value.mime }}">Your browser does not support the video tag.</video>
						<# } else {
						var basename = url.replace(/^.*[\\\/]/, '');
						#>
							<a href="{{ url }}" class="attachment-file" target="_blank">{{ basename }}</a>
						<# }
					}
					#>
				</div>
				<button type="button" class="button qiupid--add <# if ( url ) { #> qiupid--hide <# } #>"><?php _e( 'Add', 'qiupid' ); ?></button>
				<button type="button" class="button qiupid--change <# if ( ! url ) { #> qiupid--hide <# } #>"><?php _e( 'Change', 'qiupid' ); ?></button>
				<button type="button" class="button qiupid--remove <# if ( ! url ) { #> qiupid--hide <# } #>"><?php _e( 'Remove', 'qiupid' ); ?></button>
			</div>
		</div>

		<?php
		self::after_field();
		echo '</script>';
	}
}
