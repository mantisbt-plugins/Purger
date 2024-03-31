<?php
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
layout_page_header( lang_get( 'plugin_format_title' ) );
layout_page_begin();
print_manage_menu();
$t_date_format = config_get( 'normal_date_format' );
$project_id		= helper_get_current_project();
$project_name	= project_get_name( $project_id );
$t_status		= plugin_config_get( 'status'  )
?>
<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" > 

<div class="widget-box widget-color-blue2">
<div class="widget-header widget-header-small">
	<h4 class="widget-title lighter">
		<i class="ace-icon fa fa-text-width"></i>
		<?php echo  lang_get( 'plugin_Purger_name' ).': ' . lang_get( 'plugin_Purger_manage' ).': ' . lang_get( 'project' ) .': '.  $project_name?>
	</h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 
<table class="table table-bordered table-condensed table-striped"> 

<form action="<?php echo plugin_page( 'start_purging' ) ?>" method="post">

<tr>
<td class="category">
<?php echo lang_get( 'plugin_Purger_age' ); ?>
</td>
<td>
<?PHP
$t_date_to_display = date($t_date_format); 
echo '<input ' . helper_get_tab_index() . ' type="text" id="purge_date" name="purge_date" class="datetimepicker input-sm" ' .
	'data-picker-locale="' . lang_get_current_datetime_locale() .
	'" data-picker-format="' . config_get( 'datetime_picker_format' ) . '" ' .
	'size="20" maxlength="16" value="' . $t_date_to_display . '" />' ?>
<i class="fa fa-calendar fa-xlg datetimepicker"></i> 
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
<td class="center" colspan="2">
<?php
echo lang_get( 'plugin_Purger_backup' ) ;
?>
</td>
</tr>

<tr>
<td class="center" colspan="2">
<input type="submit" class="button" value="<?php echo lang_get( 'plugin_Purger_go' ) ?>" />
</td>
</tr>
<tr>
<td class="category"2" >
<?php
echo lang_get( 'plugin_Purger_export' ) ;
?>
</td>
<td>
<?php 
$link = "https://github.com/mantisbt-plugins/ZipExport";
print_link_button( $link, lang_get( 'plugin_Purger_getit' ),'',true );
?>
</td
</tr>
</form>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
layout_page_end();