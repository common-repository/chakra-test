<?php
defined('ABSPATH') || die("Nice try");


register_activation_hook(VFCHAKRATEST_PLUGIN_FILE, function(){
	global $wpdb;

	$table_name = $wpdb->prefix . 'chakratest_group';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id int(11) NOT NULL AUTO_INCREMENT,
		chakra_group mediumtext NULL NULL,
		position int(11) NULL NULL,
		template int(11) NULL NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	$table_name2 = $wpdb->prefix . 'chakratest_options';
	$charset_collate2 = $wpdb->get_charset_collate();

	$sql2 = "CREATE TABLE $table_name2 (
		id int(11) NOT NULL AUTO_INCREMENT,
		chakra_option varchar(200) NULL NULL,
		chakra_group_position int(11) NULL NULL,
		chk_question_position int(11) NULL NULL,
		chakra_value int(11) NULL NULL,
		template int(11) NULL NULL,
		chakra_position int(11) NULL NULL,
		PRIMARY KEY  (id)
	) $charset_collate2;";

	$table_name3 = $wpdb->prefix . 'chakratest_questions';
	$charset_collate3 = $wpdb->get_charset_collate();

	$sql3 = "CREATE TABLE $table_name3 (
		id int(11) NOT NULL AUTO_INCREMENT,
		chk_question_name mediumtext NULL NULL,
		position int(11) NULL NULL,
		template int(11) NULL NULL,
		chk_group int(11) NULL NULL,
		PRIMARY KEY  (id)
	) $charset_collate3;";


	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );
  dbDelta( $sql2 );
  dbDelta( $sql3 );



});
register_deactivation_hook(VFCHAKRATEST_PLUGIN_FILE,function(){
	// global $wpdb;
	// $prefix = $wpdb->prefix;
	// $table = $prefix.'likesdislikes';
	// $sql = "TRUNCATE TABLE $table;";
	// $wpdb->query($sql);


});
