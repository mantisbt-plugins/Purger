<?php
// authenticate
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
// Read results
$f_manage_threshold		= gpc_get_int( 'manage_threshold', [ADMINISTRATOR] );
// update results
plugin_config_set( 'manage_threshold', $f_manage_threshold );
// redirect 
print_header_redirect( plugin_page( 'config',TRUE ) );