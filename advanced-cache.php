<?php 




$config['config_path'] = '/Applications/MAMP/htdocs/morgan-birge-new/wp-content/breeze-config/breeze-config.php';
if ( empty( $config ) || ! isset( $config['config_path'] ) || ! @file_exists( $config['config_path'] ) ) { return; }
$breeze_temp_config = include $config['config_path'];
if ( isset( $config['blog_id'] ) ) { $breeze_temp_config['blog_id'] = $config['blog_id']; }
$GLOBALS['breeze_config'] = $breeze_temp_config; unset( $breeze_temp_config );
if ( empty( $GLOBALS['breeze_config'] ) || empty( $GLOBALS['breeze_config']['cache_options']['breeze-active'] ) ) { return; }
if ( @file_exists( '/Applications/MAMP/htdocs/morgan-birge-new/wp-content/plugins/breeze/inc/cache/execute-cache.php' ) ) {
	include_once '/Applications/MAMP/htdocs/morgan-birge-new/wp-content/plugins/breeze/inc/cache/execute-cache.php';
}