<?php
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
layout_page_header( lang_get( 'plugin_Purger_name' ) );
layout_page_begin( 'config_page.php' );
print_manage_menu();
?>

<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" > 
<div class="widget-box widget-color-blue2">

<div class="widget-header widget-header-small">
	<h4 class="widget-title lighter">
		<i class="ace-icon fa fa-text-width"></i>
		<?php echo  lang_get( 'plugin_query_name' ).': ' . plugin_lang_get( 'config' )?>
	</h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 
<table class="table table-bordered table-condensed table-striped"> 
<form action="<?php echo plugin_page( 'config_edit' ) ?>" method="post">

<tr >
<td class="category">
<?php echo lang_get( 'plugin_Purger_threshold' ) ?>
</td>
<td class="category">
<select name="manage_threshold">
<?php print_enum_string_option_list( 'access_levels', plugin_config_get( 'manage_threshold'  ) ) ?>;
</select> 
</td>
</tr>

<tr>
<td class="category">
<?php echo lang_get( 'plugin_Purger_status' ); ?>
</td>
<td class="category">
<select name="status">
<?php print_enum_string_option_list( 'status', plugin_config_get( 'status'  ) ) ?>;
</select> 
</td>
</tr>

<tr>
<td class="center" colspan="3">
<input type="submit" class="button" value="<?php echo lang_get( 'change_configuration' ) ?>" />
</td>
</tr>
</table>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
layout_page_end(  );