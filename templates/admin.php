<div class="wrap">
    <?php settings_errors(); ?>

    <form method="POST" action="options.php" enctype="multipart/form-data" id="cssuxForm">
    <?php
		        settings_fields('cssux_css_group');

        do_settings_sections('cssux_plugin');
		?><button type="submit" id="cssuxButtonSave">SAVE</button><?php
    ?>

    </form>
</div>

<script language="javascript">
	jQuery( document ).ready( function() {
		var editor = CodeMirror.fromTextArea( document.getElementById( 'cssux_css' ), {
			lineNumbers: true,
			lineWrapping: true,
			mode: 'text/css',
			indentUnit: 4,
			tabSize: 4,
			lint: true,
			hint:true,
			theme:'pastel-on-dark',
			gutters: [ 'CodeMirror-lint-markers' ]
		} );

		jQuery("#cssuxForm").submit(function(e) {
			var form = jQuery(this);
			var url = form.attr('action');

			var $this = jQuery('#cssuxButtonSave');
			if($this.hasClass('active') || $this.hasClass('success')) {
				return false;
			}
			$this.addClass('active');
			setTimeout(function() {
				$this.addClass('loader');
			}, 125);


			jQuery.ajax({
				type: "POST",
				url: url,
				data: form.serialize(), // serializes the form's elements.
				success: function(data){
					setTimeout(function() {
				$this.removeClass('loader active');
				$this.text('SUCCESS');
				$this.addClass('success animated pulse');
				}, 1600);
				setTimeout(function() {
					$this.text('SAVE');
					$this.removeClass('success animated pulse');
					$this.blur();
				}, 2900);
				},
					error: function(data){
						setTimeout(function() {
				$this.removeClass('loader active');
				$this.text('ERROR');
				$this.addClass('error animated pulse');
			}, 1600);
			setTimeout(function() {
				$this.text('SAVE');
				$this.removeClass('error animated pulse');
				$this.blur();
			}, 2900);
					}
			});
			e.preventDefault(); // avoid to execute the actual submit of the form.
		});
	} );
</script>