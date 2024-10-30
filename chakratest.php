<?php
/*
 * Plugin Name:       Chakra test
 * Plugin URI:        /
 * Description:       Welcome to chakra test create your question logics and give the user a chakra test.
 * Version:           1.0
 * Requires at least: 5.6
 * Author:            Vikas Ratudi
 * Author URI:        https://www.instagram.com/ratudi_vikas/?r=nametag
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       chakratest
 * Tags:              chakra, vform, vikasratudi, chakra test
*/

defined('ABSPATH') || die("You Can't Access this File Directly");

define('VFCHAKRATEST_PLUGIN_PATH',plugin_dir_path(__FILE__));
define('VFCHAKRATEST_PLUGIN_URL',plugin_dir_url(__FILE__));
define('VFCHAKRATEST_PLUGIN_FILE', __FILE__);
include VFCHAKRATEST_PLUGIN_PATH."inc/db.php";


add_action('wp_enqueue_scripts','vfchakratest_wp_scripts');



	function vfchakratest_wp_scripts(){
		wp_enqueue_script('jquery');
		wp_localize_script('vfchakratest_dev_script','ajax_object',admin_url("admin-ajax.php"));
	}

add_action('admin_enqueue_scripts','vfchakratest_admin_enqueue_scripts');

	function vfchakratest_admin_enqueue_scripts(){
			wp_enqueue_script('jquery');

		wp_enqueue_style('vfchakratest_dev_style', VFCHAKRATEST_PLUGIN_URL."assets/css/style.css");
			wp_enqueue_script('vfchakratest_dev_script', VFCHAKRATEST_PLUGIN_URL."assets/js/custom.js",
				array(),'1.0.0',false);

			wp_localize_script('vfchakratest_dev_script','ajax_object',admin_url("admin-ajax.php"));
	}

	//ADMIN MENU
	add_action('admin_menu','vfchakratest_plugin_menu');
	function vfchakratest_plugin_menu(){

		add_menu_page('chakratest','Chakra Test','manage_options','chakratest','chakratest_options_func','dashicons-clock',$position=null);
		add_submenu_page('chakratest','More','More','manage_options','chakratest-more','chakratest_comingsoon_func');

	}

	function chakratest_options_func(){
			include VFCHAKRATEST_PLUGIN_PATH."inc/chakrastructure.php";
	}
	function chakratest_comingsoon_func(){
		include VFCHAKRATEST_PLUGIN_PATH."inc/chakracomingsoon.php";
	}

	// save

	add_action('wp_ajax_chkgroupadd','chkgroupadd');

	function chkgroupadd(){
		
		if(!isset($_REQUEST['chk-nonce']) || !wp_verify_nonce($_REQUEST['chk-nonce'],'mycustomchakrasave') ){
			wp_send_json_error([
				'status'=>'0'
			]);
		}

		if($_REQUEST['param']=='save_vfchakratest'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'chakratest_group';
			$data = array(
			"chakra_group"=>sanitize_text_field($_REQUEST['firstinput']),
			"position"=>sanitize_text_field($_REQUEST['secondinput']),
			"template"=>1,
			);
			$wpdb->insert($table, $data);

			echo json_encode(array("status"=>1,"message"=>"Data inserted successful"));
		}else if($_REQUEST['param']=='save_vfchakratestquestion'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'chakratest_questions';
			$data = array(
			"chk_question_name"=>sanitize_text_field($_REQUEST['firstinput']),
			"position"=>sanitize_text_field($_REQUEST['secondinput']),
			"chk_group"=>sanitize_text_field($_REQUEST['chakraoption']),
			"template"=>1,
			);
			$wpdb->insert($table, $data);

			echo json_encode(array("status"=>1,"message"=>"Data inserted successful"));
		}else if($_REQUEST['param']=='save_vfchakratestquestionmain'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'chakratest_options';
			$data = array(
			"chakra_option"=>sanitize_text_field($_REQUEST['firstinput']),
			"chakra_position"=>sanitize_text_field($_REQUEST['secondinput']),

			"chakra_group_position"=>sanitize_text_field($_REQUEST['chakraoption']),
			"chk_question_position"=>sanitize_text_field($_REQUEST['chakraoptionmain']),

			"chakra_value"=>sanitize_text_field($_REQUEST['chakra_value']),
			"template"=>1,
			);
			$wpdb->insert($table, $data);

			echo json_encode(array("status"=>1,"message"=>"Data inserted successful"));
		}
		wp_die();

	}

	

	// save

	// update

	add_action('wp_ajax_chkgroupedit','chkgroupedit');

	function chkgroupedit(){

		if($_REQUEST['param']=='editgroup_vfchakratest'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'chakratest_group';
			
			$pos = sanitize_text_field($_REQUEST['position']);
			$pos2 = sanitize_text_field($_REQUEST['update']);

			if($pos!='' && $pos!=null && $pos2!='' && $pos2!=null){
				$data = array(
				"position"=>sanitize_text_field($_REQUEST['position']),
				"chakra_group"=>sanitize_text_field($_REQUEST['update'])
				);
			}else if($pos!='' && $pos!=null){
				$data = array(
				"position"=>sanitize_text_field($_REQUEST['position'])
				);
			}else if($pos2!='' && $pos2!=null){
				$data = array(
				"chakra_group"=>sanitize_text_field($_REQUEST['update'])
				);
			}else{
				$data = '';
			}

			if($data!=''){
				$where = array( 'id' => sanitize_text_field($_REQUEST['id']) );
				$wpdb->update($table, $data,$where);
			}

			echo json_encode(array("status"=>1,"message"=>"Data inserted successful"));
		}else if($_REQUEST['param']=='editquestion_vfchakratest'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'chakratest_questions';
			
			$pos = sanitize_text_field($_REQUEST['position']);
			$pos2 = sanitize_text_field($_REQUEST['update']);

			if($pos!='' && $pos!=null && $pos2!='' && $pos2!=null){
				$data = array(
				"position"=>sanitize_text_field($_REQUEST['position']),
				"chk_question_name"=>sanitize_text_field($_REQUEST['update'])
				);
			}else if($pos!='' && $pos!=null){
				$data = array(
				"position"=>sanitize_text_field($_REQUEST['position'])
				);
			}else if($pos2!='' && $pos2!=null){
				$data = array(
				"chk_question_name"=>sanitize_text_field($_REQUEST['update'])
				);
			}else{
				$data = '';
			}

			if($data!=''){
				$where = array( 'id' => sanitize_text_field($_REQUEST['id']) );
				$wpdb->update($table, $data,$where);
			}

			echo json_encode(array("status"=>1,"message"=>"Data inserted successful"));
		}else if($_REQUEST['param']=='editoption_vfchakratest'){

			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'chakratest_options';
			
			$pos = sanitize_text_field($_REQUEST['position']);
			$pos2 = sanitize_text_field($_REQUEST['update']);

			if($pos!='' && $pos!=null && $pos2!='' && $pos2!=null){
				$data = array(
				"chakra_position"=>sanitize_text_field($_REQUEST['position']),
				"chakra_option"=>sanitize_text_field($_REQUEST['update'])
				);
			}else if($pos!='' && $pos!=null){
				$data = array(
				"chakra_position"=>sanitize_text_field($_REQUEST['position'])
				);
			}else if($pos2!='' && $pos2!=null){
				$data = array(
				"chakra_option"=>sanitize_text_field($_REQUEST['update'])
				);
			}else{
				$data = '';
			}

			if($data!=''){
				$where = array( 'id' => sanitize_text_field($_REQUEST['id']) );
				$wpdb->update($table, $data,$where);
			}

			echo json_encode(array("status"=>1,"message"=>"Data inserted successful"));
		}
		wp_die();

	}

	// update

	//for delete
	add_action('wp_ajax_chkgroupdelete','chkgroupdelete');


	function chkgroupdelete(){
		if($_REQUEST['param']=='deletegroup_vfchakratest'){
			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'chakratest_group';
			$where = array( 'id' => sanitize_text_field($_REQUEST['id']) );
			$wpdb->delete($table, $where);
			echo json_encode(array("status"=>1,"message"=>"Data Delete successful"));
		}else if($_REQUEST['param']=='deletequestion_vfchakratest'){
			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'chakratest_questions';
			$where = array( 'id' => sanitize_text_field($_REQUEST['id']) );
			$wpdb->delete($table, $where);
			echo json_encode(array("status"=>1,"message"=>"Data Delete successful"));
		}else if($_REQUEST['param']=='deletequestioninp_vfchakratest'){
			global $wpdb;
			$prefix = $wpdb->prefix;
			$table = $prefix.'chakratest_options';
			$where = array( 'id' => sanitize_text_field($_REQUEST['id']) );
			$wpdb->delete($table, $where);
			echo json_encode(array("status"=>1,"message"=>"Data Delete successful"));
		}
		wp_die();

	}

	//for delete



	// shortcode

	add_action('init', 'chakra_init');

	function chakra_init(){
		add_shortcode('chakra','chakra_my_shortcode');
	}
	function chakra_my_shortcode($atts){

		$atts = shortcode_atts(array(
			'id' => '',
		), $atts, 'chakra');

		ob_start();
		include VFCHAKRATEST_PLUGIN_PATH."inc/vfchakrateststructure.php";
		return ob_get_clean();
	}

	// shortcode