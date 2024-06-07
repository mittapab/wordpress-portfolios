<script type="text/html" id="tmpl-qiupid--cb-panel">
	<div class="qiupid--cp-rows">

		<# if ( ! _.isUndefined( data.rows.top ) ) { #>
		<div class="qiupid--row-top qiupid--cb-row" data-id="{{ data.id }}_top">
			<a class="qiupid--cb-row-settings" title="{{ data.rows.top }}" data-id="top" href="#"></a>
			<div class="qiupid--row-inner">
				<div class="row--grid">
					<?php
					for ( $i = 1; $i <= 12; $i ++ ) {
						echo '<div></div>';
					}
					?>
				</div>
				<div class="qiupid--cb-items grid-stack gridster" data-id="top"></div>
			</div>
		</div>
		<# } #>

		<# if ( ! _.isUndefined( data.rows.main ) ) { #>
		<div class="qiupid--row-main qiupid--cb-row" data-id="{{ data.id }}_main">
			<a class="qiupid--cb-row-settings" title="{{ data.rows.main }}" data-id="main" href="#"></a>

			<div class="qiupid--row-inner">
				<div class="row--grid">
					<?php
					for ( $i = 1; $i <= 12; $i ++ ) {
						echo '<div></div>';
					}
					?>
				</div>
				<div class="qiupid--cb-items grid-stack gridster" data-id="main"></div>
			</div>
		</div>
		<# } #>


		<# if ( ! _.isUndefined( data.rows.bottom ) ) { #>
		<div class="qiupid--row-bottom qiupid--cb-row" data-id="{{ data.id }}_bottom">
			<a class="qiupid--cb-row-settings" title="{{ data.rows.bottom }}" data-id="bottom" href="#"></a>
			<div class="qiupid--row-inner">
				<div class="row--grid">
					<?php
					for ( $i = 1; $i <= 12; $i ++ ) {
						echo '<div></div>';
					}
					?>
				</div>
				<div class="qiupid--cb-items grid-stack gridster" data-id="bottom"></div>
			</div>
		</div>
		<# } #>
	</div>


	<# if ( data.device != 'desktop' ) { #>
		<# if ( ! _.isUndefined( data.rows.sidebar ) ) { #>
		<div class="qiupid--cp-sidebar">
			<div class="qiupid--row-bottom qiupid--cb-row" data-id="{{ data.id }}_sidebar">
				<a class="qiupid--cb-row-settings" title="{{ data.rows.sidebar }}" data-id="sidebar" href="#"></a>
				<div class="qiupid--row-inner">
					<div class="qiupid--cb-items qiupid--sidebar-items" data-id="sidebar"></div>
				</div>
			</div>
			<div>
		<# } #>
	<# } #>

</script>
