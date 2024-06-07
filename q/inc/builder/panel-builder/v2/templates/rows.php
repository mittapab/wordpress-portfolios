<script type="text/html" id="tmpl-qiupid--cb-panel-v2">
	<div class="cp-rows-v2 qiupid--cp-rows">

		<# if ( ! _.isUndefined( data.rows.top ) ) { #>
		<div class="qiupid--row-top qiupid--cb-row" data-row-id="top" data-id="{{ data.id }}_top">
			<a class="qiupid--cb-row-settings" title="{{ data.rows.top }}" data-id="top" href="#"></a>
			<div class="qiupid--row-inner">

				<div class="col-items-wrapper"><div data-id="left" class="col-items col-left"></div></div>
				<div class="col-items-wrapper"><div data-id="center" class="col-items col-center"></div></div>
				<div class="col-items-wrapper"><div data-id="right" class="col-items col-right"></div></div>

			</div>
		</div>
		<# } #>

		<# if ( ! _.isUndefined( data.rows.main ) ) { #>
		<div class="qiupid--row-main qiupid--cb-row" data-row-id="main" data-id="{{ data.id }}_main">
			<a class="qiupid--cb-row-settings" title="{{ data.rows.main }}" data-id="main" href="#"></a>

			<div class="qiupid--row-inner">
				
				<div class="col-items-wrapper"><div data-id="left" class="col-items col-left"></div></div>
				<div class="col-items-wrapper"><div data-id="center" class="col-items col-center"></div></div>
				<div class="col-items-wrapper"><div data-id="right" class="col-items col-right"></div></div>
				
			</div>
		</div>
		<# } #>

		<# if ( ! _.isUndefined( data.rows.bottom ) ) { #>
		<div class="qiupid--row-bottom qiupid--cb-row" data-row-id="bottom" data-id="{{ data.id }}_bottom">
			<a class="qiupid--cb-row-settings" title="{{ data.rows.bottom }}" data-id="bottom" href="#"></a>
			<div class="qiupid--row-inner">

				<div class="col-items-wrapper"><div data-id="left" class="col-items col-left"></div></div>
				<div class="col-items-wrapper"><div data-id="center" class="col-items col-center"></div></div>
				<div class="col-items-wrapper"><div data-id="right" class="col-items col-right"></div></div>

			</div>
		</div>
		<# } #>
	</div>


	<# if ( data.device != 'desktop' ) { #>
		<# if ( ! _.isUndefined( data.rows.sidebar ) ) { #>
		<div class="qiupid--cp-sidebar">
			<div class="qiupid--row-sidebar qiupid--cb-row" data-row-id="sidebar" data-id="{{ data.id }}_sidebar">
				<a class="qiupid--cb-row-settings" title="{{ data.rows.sidebar }}" data-id="sidebar" href="#"></a>
				<div class="qiupid--row-inner">

					<div class="col-items-wrapper"><div data-id="sidebar" class="col-items col-sidebar"></div></div>

				</div>
			</div>
			<div>
		<# } #>
	<# } #>

</script>