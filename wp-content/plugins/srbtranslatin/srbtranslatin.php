<?php
/*
 *
 * Copyright (c) 2008-2017 Predrag Supurović
 *
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, without
 * modification, are permitted provided that the following conditions
 * are met:
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer
 *    in the documentation and/or other materials provided with the
 *    distribution.
 * 3. The name of the author may not be used to endorse or promote
 *    products derived from this software without specific prior
 *    written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED.  IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 * GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER
 * IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN
 * IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 */

/*
Plugin Name: SrbTransLatin
Plugin URI: http://pedja.supurovic.net/srbtranslatin/
Description: Allows users to choose if they want to see site in Serbian Cyrillic or Serbian Latin script. After installation, check <a href="options-general.php?page=srbtranslatoptions">Settings</a>
Author: Predrag Supurović
Version: 1.65
Author URI: http://pedja.supurovic.net
Text Domain: srbtranslatin
Domain Path: /lang
*/

/***********************************************************/
/***********************************************************/
/***********************************************************/





DEFINE ('STL_DELIMITER_START', '\[');
DEFINE ('STL_DELIMITER_END', '\]');

//test for WMPL language
//DEFINE ('ICL_LANGUAGE_CODE', 'sr');

$stl_buffer_start_priority =  -9999;
$stl_buffer_end_priority =  9999;
$stl_priority =  99;

$m_config_file = dirname( plugin_dir_path( __FILE__ ) ) . '/' . dirname( plugin_basename( __FILE__ )) . '/config.php';


if (file_exists ($m_config_file)) {
	include ($m_config_file);
  if (isset ($stl_config['priority'])) {
    $stl_priority = $stl_config['priority'];
  }
  if (isset ($stl_config['xdebug_max_nesting_level'])) {
    $stl_xdebug_max_nesting_level = $stl_config['xdebug_max_nesting_level'];
    ini_set('xdebug.max_nesting_level', $stl_xdebug_max_nesting_level);
  }
}

load_plugin_textdomain( 'srbtranslatin', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );


$m_lang_cookie_name = 'stl_default_script';
$stl_use_cookie_name = 'stl_use_cookie';
$stl_use_cookie_data_field_name = 'stl_use_cookie';
$stl_use_cookie = get_option ($stl_use_cookie_name);

//echo "stl_use_cookie=$stl_use_cookie<br>";

$stl_lang_identificator_opt_name = 'stl_lang_identificator';
$stl_lang_identificator_data_field_name = 'strl_lang_identificator';
$stl_lang_identificator = get_option ($stl_lang_identificator_opt_name);

if (empty ($stl_lang_identificator)) {
  $stl_lang_identificator = get_option ('lang_identificator');
}

if (empty ($stl_lang_identificator)) {
		$m_lang_identificator = 'script';
/*    
	if ( $stl_wpml_plugin_active ) {
		$m_lang_identificator = 'script';
	} else {
    $m_lang_identificator = 'script';
		//$m_lang_identificator = 'lang';
	}
*/  
} else {
	$m_lang_identificator = $stl_lang_identificator;
}

$stl_lang_cir_id_opt_name = 'stl_cir_id';
$stl_lang_cir_id_data_field_name = 'stl_cir_id';
$stl_lang_cir_id = get_option ($stl_lang_cir_id_opt_name);

if (empty ($stl_lang_cir_id)) {
  $stl_lang_cir_id = get_option ('cir_id');
}


$stl_lang_lat_id_opt_name = 'stl_lat_id';
$stl_lang_lat_id_data_field_name = 'stl_lat_id';
$stl_lang_lat_id = get_option ($stl_lang_lat_id_opt_name);

if (empty ($stl_lang_lat_id)) {
  $stl_lang_lat_id = get_option ('lat_id');
}


$stl_use_russian_opt_name = 'stl_use_russian';
$stl_use_russian_data_field_name = 'stl_use_russian';
$stl_use_russian = get_option ($stl_use_russian_opt_name);
//echo "stl_use_russian:$stl_use_russian<br>";

DEFINE ('OUTPUT_BUFFER', 0);
DEFINE ('INTERCEPT_EVENTS', 2);
$stl_transliteration_type = OUTPUT_BUFFER;




$m_wpml_plugin_file = dirname( plugin_dir_path( __FILE__ ) ) . '/' .'sitepress-multilingual-cms/sitepress.php';
//echo "m_wpml_plugin_file=$m_wpml_plugin_file!";

//$stl_wpml_plugin_active = is_plugin_active('wpml/wpml.php');
$stl_wpml_plugin_active = file_exists($m_wpml_plugin_file);
//echo "stl_wpml_plugin_active=$stl_wpml_plugin_active";

$stl_sanitize_file_names_opt_name = 'stl_sanitize_file_names';
$stl_sanitize_file_names_data_field_name = 'stl_sanitize_file_names';
$stl_sanitize_file_names = get_option ($stl_sanitize_file_names_opt_name);
if (empty ($stl_sanitize_file_names)) {
  $stl_sanitize_file_names = get_option ('sanitize_file_names');
}

$stl_skip_files_opt_name = 'stl_skip_files';
$stl_skip_files_data_field_name = 'stl_skip_files';
$stl_skip_files = get_option ($stl_skip_files_opt_name, true);

$stl_lang_cir_id = 'cir';
$stl_lang_lat_id = 'lat';

$stl_file_lang_delimiter_opt_name = 'file_lang_delimiter';
$stl_file_lang_delimiter_data_field_name = 'file_lang_delimiter';
$stl_file_lang_delimiter = get_option ($stl_file_lang_delimiter_opt_name);

if (empty ($stl_file_lang_delimiter)) {
  $stl_file_lang_delimiter = "-";
}

$m_lang_lat_id = $stl_lang_lat_id;


$stl_default_language_opt_name = 'stl_default_language';
$stl_default_language_data_field_name = 'stl_default_language';

$m_default_language = get_option( $stl_default_language_opt_name );
if ($m_default_language != $stl_lang_cir_id) {
  $m_default_language = $stl_lang_lat_id;
}
//echo "m_default_language=$m_default_language<br>";
//echo "stl_lang_cir_id=$stl_lang_cir_id<br>";
//echo "stl_lang_lat_id=$stl_lang_lat_id<br>";

if ( ($m_default_language != $stl_lang_cir_id) and ($m_default_language != $stl_lang_lat_id) ) {
	$m_default_language = $stl_lang_cir_id;
}

$stl_default_language = $m_default_language;

$stl_default_language = $m_default_language;

//echo "m_default_language=$m_default_language<br>";

$stl_transliterate_title_opt_name = 'stl_transliterate_title';
$stl_transliterate_title_data_field_name = 'stl_transliterate_title';
$stl_transliterate_title = get_option( $stl_transliterate_title_opt_name ) == '1';

$stl_widget_title_opt_name = 'stl_widget_title';
$stl_widget_title_data_field_name = 'stl_widget_title';
$stl_widget_title = get_option( $stl_widget_title_opt_name );
if (empty ($stl_widget_title)) $stl_widget_title  = __("Script selection", 'srbtranslatin');

$stl_show_widget_title_opt_name = 'stl_show_widget_title';
$stl_show_widget_title_data_field_name = 'stl_show_widget_title';
$stl_show_widget_title = get_option ($stl_show_widget_title_opt_name) == 'on';

$stl_widget_type_opt_name = 'stl_widget_type';
$stl_widget_type_data_field_name = 'stl_widget_type';
$stl_widget_type = get_option ($stl_widget_type_opt_name);
if ( ($stl_widget_type != 'links') and ($stl_widget_type != 'list') ) {
	$stl_widget_type = 'links';
}

$m_cookie_language = '';
if ($stl_use_cookie) {
	if (isset($_COOKIE[$m_lang_cookie_name])) {
    $m_cookie_language = $_COOKIE[$m_lang_cookie_name];
	}
}

$m_request_language = '';

if ( isset($_REQUEST[$m_lang_identificator]) ) {
  $m_request_language = $_REQUEST[$m_lang_identificator];
	$stl_current_language = $m_request_language;
} else {
	$stl_current_language = $m_cookie_language;
}


if ( ($stl_current_language  != $stl_lang_cir_id) and ($stl_current_language != $stl_lang_lat_id) ) {
	$stl_current_language = $stl_default_language;
}

//echo "stl_current_language: $stl_current_language<br>";

if ($stl_use_cookie) {
	setcookie($m_lang_cookie_name, $stl_current_language, strtotime("+1 year"), "/");
} else {
	setcookie($m_lang_cookie_name, $stl_current_language, time()-100, "/");
}

$stl_global['init'] = true;


// Hook for adding admin menus
add_action('admin_menu', 'stl_add_page');

// Hook for adding widget
//add_action( 'widgets_init', create_function( '', 'register_widget( "srbtranslatin_widget" );' ) );
add_action( 'widgets_init', function() {register_widget( "srbtranslatin_widget" );} );

//add_action('wp_footer', 'show_in_footer', 100);

include ('srbtranslatin_widget.php');
include ('urlt.php');

class SrbTransLatin {
  var $replace = array(
    "А" => "A",
		"Б" => "B",
		"В" => "V",
		"Г" => "G",
		"Д" => "D",
		"Ђ" => "Đ",
		"Е" => "E",
		"Ж" => "Ž",
		"З" => "Z",
		"И" => "I",
		"Ј" => "J",
		"К" => "K",
		"Л" => "L",
		"Љ" => "LJ",
		"М" => "M",
		"Н" => "N",
		"Њ" => "NJ",
		"О" => "O",
		"П" => "P",
		"Р" => "R",
		"С" => "S",
		"Ш" => "Š",
		"Т" => "T",
		"Ћ" => "Ć",
		"У" => "U",
		"Ф" => "F",
		"Х" => "H",
		"Ц" => "C",
		"Ч" => "Č",
		"Џ" => "DŽ",
		"Ш" => "Š",
    "а" => "a",
		"б" => "b",
		"в" => "v",
		"г" => "g",
		"д" => "d",
		"ђ" => "đ",
		"е" => "e",
		"ж" => "ž",
		"з" => "z",
		"и" => "i",
		"ј" => "j",
		"к" => "k",
		"л" => "l",
		"љ" => "lj",
		"м" => "m",
		"н" => "n",
		"њ" => "nj",
		"о" => "o",
		"п" => "p",
		"р" => "r",
		"с" => "s",
		"ш" => "š",
		"т" => "t",
		"ћ" => "ć",
		"у" => "u",
		"ф" => "f",
		"х" => "h",
		"ц" => "c",
		"ч" => "č",
		"џ" => "dž",
		"ш" => "š",
    //"Ђ" => "Dj",
    //"ђ" => "dj",    
		"Ња" => "Nja",
		"Ње" => "Nje",
		"Њи" => "Nji",
		"Њо" => "Njo",
		"Њу" => "Nju",
		"Ља" => "Lja",
		"Ље" => "Lje",
		"Љи" => "Lji",
		"Љо" => "Ljo",
		"Љу" => "Lju",
		"Џа" => "Dža",
		"Џе" => "Dže",
		"Џи" => "Dži",
		"Џо" => "Džo",
		"Џу" => "Džu",
    ".срб" => ".срб",
    "иѕ.срб" => "иѕ.срб",
    "њњњ.из.срб" => "њњњ.из.срб",
    ".СРБ" => ".СРБ",
    "ИЗ.СРБ" => "ИЗ.СРБ",
    "ЊЊЊ.ИЗ.СРБ" => "ЊЊЊ.ИЗ.СРБ",
   );

  var $replace_sanitize = array(
    "А" => "A",
		"Б" => "B",
		"В" => "V",
		"Г" => "G",
		"Д" => "D",
		"Ђ" => "DJ",
		"Е" => "E",
		"Ж" => "Z",
		"З" => "Z",
		"И" => "I",
		"Ј" => "J",
		"К" => "K",
		"Л" => "L",
		"Љ" => "LJ",
		"М" => "M",
		"Н" => "N",
		"Њ" => "NJ",
		"О" => "O",
		"П" => "P",
		"Р" => "R",
		"С" => "S",
		"Ш" => "S",
		"Т" => "T",
		"Ћ" => "C",
		"У" => "U",
		"Ф" => "F",
		"Х" => "H",
		"Ц" => "C",
		"Ч" => "C",
		"Џ" => "DZ",
		"Ш" => "S",
    "а" => "a",
		"б" => "b",
		"в" => "v",
		"г" => "g",
		"д" => "d",
		"ђ" => "dj",
		"е" => "e",
		"ж" => "z",
		"з" => "z",
		"и" => "i",
		"ј" => "j",
		"к" => "k",
		"л" => "l",
		"љ" => "lj",
		"м" => "m",
		"н" => "n",
		"њ" => "nj",
		"о" => "o",
		"п" => "p",
		"р" => "r",
		"с" => "s",
		"ш" => "s",
		"т" => "t",
		"ћ" => "c",
		"у" => "u",
		"ф" => "f",
		"х" => "h",
		"ц" => "c",
		"ч" => "c",
		"џ" => "dz",
		"ш" => "s",
		"Ња" => "Nja",
		"Ње" => "Nje",
		"Њи" => "Nji",
		"Њо" => "Njo",
		"Њу" => "Nju",
		"Ља" => "Lja",
		"Ље" => "Lje",
		"Љи" => "Lji",
		"Љо" => "Ljo",
		"Љу" => "Lju",
		"Џа" => "Dza",
		"Џе" => "Dze",
		"Џи" => "Dzi",
		"Џо" => "Dzo",
		"Џу" => "Dzu"
   );


  var $replace_rus = array(
    // russian characters
    "Ё" => "Ë",
    "Й" => "J",
    "Х" => "KH",
    "Щ" => "ŠČ",
    "Ъ" => 'ʺ',
    "Ы" => "Y",
    "Ь" => "'",
    "Э" => "È",
    "Ю" => "JU",
    "Я" => "JA",
    
    "ё" => "ë",
    "й" => "j",
    "х" => "kh",
    "щ" => "šč",
    "ъ" => 'ʺ',
    "ы" => "y",
    "ь" => "'",
    "э" => "è",
    "ю" => "ju",
    "я" => "ja"
  );      
   
  var $replace_sanitize_rus = array(
    // russian characters
    "Ё" => "E",
    "Й" => "J",
    "Х" => "KH",
    "Щ" => "SC",
    "Ъ" => 'ʺ',
    "Ы" => "Y",
    "Ь" => "'",
    "Э" => "E",
    "Ю" => "JU",
    "Я" => "JA",
    
    "ё" => "e",
    "й" => "j",
    "х" => "kh",
    "щ" => "sc",
    "ъ" => 'ie',
    "ы" => "y",
    "ь" => "-",
    "э" => "e",
    "ю" => "ju",
    "я" => "ja"
  );   
  

  
   
    private $plugin_path;
    private $plugin_url;

    public $processJavaScript = false;
    
    function __construct() {
      global $stl_default_language;
      global $stl_current_language;
      global $stl_transliterate_title;
      global $stl_priority;
      global $stl_buffer_start_priority;
      global $stl_buffer_end_priority;
      global $stl_sanitize_file_names;
      global $stl_skip_files;
      global $stl_use_russian;
      global $stl_transliteration_type;
      
      $this->plugin_path = realpath(plugin_dir_path(__FILE__ ));   
      $this->plugin_url = plugin_dir_url(__FILE__ );
      
     if ($stl_use_russian) {
        $this->replace = array_merge ($this->replace, $this->replace_rus);
        $this->replace_sanitize = array_merge ($this->replace_sanitize, $this->replace_sanitize_rus);
      }
      
      if ($stl_sanitize_file_names) {
        add_filter('sanitize_file_name', array(&$this,'sanitize_filenames'), $stl_priority);
      }
      
      add_action('activated_plugin', 'collect_error' );      

			add_action("plugins_loaded",array(&$this,"init_lang"));
      
        if ($stl_transliterate_title) {
          add_action('sanitize_title', array(&$this, 'change_permalink'), 0);
          //add_action('sanitize_title', array(&$this, 'convert_title'), $stl_priority);
          //add_filter('the_title', array(&$this,'convert_title'), $stl_priority);
        }      
      
      register_uninstall_hook( __FILE__, 'stl_uninstall');
      
      if (! is_admin()) {
	
        $m_plugin = plugin_basename(__FILE__);
        add_filter("plugin_action_links_$m_plugin", array(&$this, 'plugin_settings_link') );

        
        add_filter("get_search_form", array(&$this, 'search_form'));
        //add_action('pre_get_posts', array(&$this, 'pre_get_posts'));
        add_action('template_redirect', array(&$this,  'template_redirect'));
        add_filter('posts_search', array(&$this, 'posts_search'), 20, 2);
        
        
        switch ($stl_transliteration_type) {
        // da li se preslovljavanje radi odjednom za ceo HTML ili na pojeidnacne delove
         
            
          case INTERCEPT_EVENTS:
                  
            add_filter('wp_title', array(&$this,'convert_title'), $stl_priority);      

            //add_filter('the_content', array(&$this,'convert_content'), $stl_priority);            
            //add_filter('the_content_feed', array(&$this,'convert_content'), $stl_priority);
            //add_filter('the_excerpt', array(&$this,'convert_content'), $stl_priority);
            //add_filter('the_excerpt_rss', array(&$this,'convert_content'), $stl_priority);
           

            add_action('wp_head', array(&$this,'buffer_start'), $stl_buffer_start_priority);
            add_action('wp_footer', array(&$this,'buffer_end'), $stl_buffer_end_priority);
            
            add_action('rss_head', array(&$this,'buffer_start'), $stl_buffer_start_priority);		
            add_action('rss_footer', array(&$this,'buffer_end'), $stl_buffer_end_priority);		
        
            add_action('atom_head', array(&$this,'buffer_start'), $stl_buffer_start_priority);		
            add_action('atom_footer', array(&$this,'buffer_end'), $stl_buffer_end_priority);		
            
            add_action('rdf_head', array(&$this,'buffer_start'), $stl_buffer_start_priority);		
            add_action('rdf_footer', array(&$this,'buffer_end'), $stl_buffer_end_priority);		
            
            add_action('rss2_head', array(&$this,'buffer_start'), $stl_buffer_start_priority);		
            add_action('rss2_footer', array(&$this,'buffer_end'), $stl_buffer_end_priority);		
            
            add_filter('option_blogname', array(&$this,'callback'), $stl_priority);
            add_filter('option_blogdescription', array(&$this,'callback'), $stl_priority);
            
            break;
            
       
          case OUTPUT_BUFFER: 
          default:
            add_action("wp_loaded",array(&$this,"process_html"));
            break;            
            

        } // switch ($stl_transliteration_type)
        
        
        //add_filter('gettext', array(&$this, 'convert_script'), $stl_priority);
        //add_filter('gettext_with_context', array(&$this, 'convert_script'), $stl_priority);
        //add_filter('ngettext', array(&$this, 'convert_script'), $stl_priority);
        //add_filter('ngettext_with_context', array(&$this, 'convert_script'), $stl_priority);
        
      } // if ! is_admin()
      
      
      add_shortcode( 'stl_get_current_script', array(&$this,'stl_get_current_script_tag_func') );
      add_shortcode( 'stl_get_script_identificator', array(&$this,'stl_get_script_identificator_tag_func') );
      add_shortcode( 'stl_get_cyrillic_id', array(&$this,'stl_get_cyrillic_id_tag_func') );
      add_shortcode( 'stl_get_latin_id', array(&$this,'stl_get_latin_id_tag_func') );
      add_shortcode( 'stl_is_cyrillic', array(&$this,'stl_is_cyrillic_tag_func') );
      add_shortcode( 'stl_is_latin', array(&$this,'stl_is_latin_tag_func') );
      
		} // function 
	
  
  function process_html () {

    if ($this->processJavaScript) {

      global $wp_scripts;    

      foreach ($wp_scripts->registered as $mKey=>$mScript) {
        $mSrc = $mScript->src;
        if (! empty ($mSrc)) {
          if (strpos ($mSrc, 'http') === false) {
            $wp_scripts->registered[$mKey]->src = $this->plugin_url . '/js.php?js=' . $mSrc;
            //$mScript->src = 'js.php?js=' . $mSrc;
          }
        }
      }
    }

//print_r ($wp_scripts->registered);
//die();
    
    //ob_start(array(&$this,"convert_script"));    
    $this->buffer_start();
  }
  
	
	function init_lang() {
/*
		register_sidebar_widget("Serbian Scripts", array (&$this,"stl_scripts_widget"));
		register_sidebar_widget("Serbian Transliteration (links)", array (&$this,"stl_links_widget"));
		register_sidebar_widget("Serbian Transliteration (list)",  array (&$this,"stl_list_widget"));
*/
	}
  
  

	public function plugin_settings_link($p_links) {
		$m_settings_link = '<a href="options-general.php?page=srbtranslatoptions">' . __('Settings', 'srbtranslatin') . '</a>';
		array_unshift($p_links, $m_settings_link);
		return $p_links;
	}	

  public function search_form ($pFormHTML) {
    global $stl_current_language;
    global $stl_default_language;
    global $m_lang_identificator;
    global $stl_use_cookie;
    
    if (! $stl_use_cookie) {

      if ($stl_current_language != $stl_default_language) {    
      
        $m_pos = strpos ($pFormHTML, '</form');
        $mResult = substr ($pFormHTML, 0, $m_pos);
        $mResult .= '<input type="hidden" name="' . $m_lang_identificator . '" value="' . $stl_current_language . '">';
        $mResult .= substr ($pFormHTML, $m_pos);
        
        $mResult = '[lang id="skip"]' . $mResult . '[/lang]';
      } else {
        $mResult = $pFormHTML;
      }
    } else {
       $mResult = $pFormHTML;
    }
    
    return $mResult;
  }
  
  public function pre_get_posts ($pQuery) {
    if ( $pQuery->is_search) { // isset( $_REQUEST['search'] ) &&
    
//echo "<pre>";
//print_r ($pQuery);
//echo "</pre>";
      //$mOriginalSearch = $pQuery->query['s'];
      //$mNewSearch = $this->lattocyr ($mOriginalSearch);  
      //$pQuery->set('s', $mOriginalSearch . " " . $mNewSearch);
      //$pQuery->set('s', $mNewSearch);
      //$pQuery->query['s'] = $mNewSearch;
      
//echo "<pre>";
//print_r ($pQuery);
//echo "</pre>";
      
      
    }
  }
  
  
  public function posts_search ($search, $pQuery) {

    global $wpdb;

    if(empty($search))
        return $search;
      
      
      
    $mOriginalSearch = $pQuery->query['s'];
    $mSearchList = explode (" ", $mOriginalSearch);
    
    $mNewSearch = $this->lattocyr ($mOriginalSearch); 
    $mSearchList = array_merge ($mSearchList, explode (" ", $mNewSearch));
    
    $mNewSearch = $this->cyrtolat ($mOriginalSearch); 
    $mSearchList = array_unique(array_merge ($mSearchList, explode (" ", $mNewSearch)));
    

    $q = $pQuery->query_vars;
    $n = !empty($q['exact']) ? '' : '%';
    
    $search = '';
    
    foreach ($mSearchList as $mSearchItem) {
      $term = esc_sql($wpdb->esc_like($mSearchItem));
      if(!empty($search)) {
        $search .= " OR ";
      }
      $search .= "($wpdb->posts.post_title LIKE '{$n}{$term}{$n}') OR ($wpdb->posts.post_excerpt LIKE '{$n}{$term}{$n}') OR ($wpdb->posts.post_content LIKE '{$n}{$term}{$n}')";
    }
    
/*    
    $term_orig = esc_sql($wpdb->esc_like($mOriginalSearch));
    $search .= "($wpdb->posts.post_title LIKE '{$n}{$term_orig}{$n}') OR ($wpdb->posts.post_excerpt LIKE '{$n}{$term_orig}{$n}') OR ($wpdb->posts.post_content LIKE '{$n}{$term_orig}{$n}')";
    
    if ($mNewSearch != $mOriginalSearch) {
      $term_new = esc_sql($wpdb->esc_like($mNewSearch));
    } else {
      $mNewSearch = $this->cyrtolat ($mOriginalSearch); 
      $term_new = esc_sql($wpdb->esc_like($mNewSearch));
    }
    $search .= " OR ($wpdb->posts.post_title LIKE '{$n}{$term_new}{$n}') OR ($wpdb->posts.post_excerpt LIKE '{$n}{$term_new}{$n}') OR ($wpdb->posts.post_content LIKE '{$n}{$term_new}{$n}')";
*/    
    if(!empty($search)) :
        $search = " AND ({$search}) ";
        if(!is_user_logged_in())
            $search .= " AND ($wpdb->posts.post_password = '') ";
    endif;
    
//print_r ($mSearchList);
//echo "<br>$search";
//die();    
    

/*    
echo "<pre>";
echo "@@@";
print_r ($search);
echo "###";
echo "</pre>";    
//exit();    
*/
    return $search;    
    
  }

  // set script identificator to URL
  public function template_redirect  () {
    global $stl_current_language;
    global $m_default_language;
    global $m_lang_identificator; 
    global $m_request_language;
    global $wp;
    global $stl_use_cookie;

    if (! $stl_use_cookie) {    
      // add language identificator in search url
      if (is_search()) {
        if ($stl_current_language != $m_default_language) {
          if (! empty( $_GET['s']) && empty( $_GET[$m_lang_identificator]) ) {
            $mParams = "$m_lang_identificator=$stl_current_language"; 
            foreach ($_GET as $mGetKey=>$mGetItem) {
              $mParams .= "&$mGetKey=$mGetItem";
            }
            $mUrl = url_add_param (home_url("/"), $mParams);
            
            wp_redirect($mUrl);
            exit();
          }	// if (! empty( $_GET['s']) && empty( $_GET[$m_lang_identificator]) )
        } // if ($stl_current_language != $stl_default_language)
      } // if (is_search())

        
      // if curent language is set by cookie then forse url that contains language identificator
   
      if (($m_request_language == "") && ($stl_current_language != $m_default_language)) {
            $mParams = "$m_lang_identificator=$stl_current_language"; 
            foreach ($_GET as $mGetKey=>$mGetItem) {
              $mParams .= "&$mGetKey=$mGetItem";
            }
            $mUrl = esc_url( url_add_param (home_url( $wp->request ), $mParams));

//wptest.loc/primer-strane/          
//echo $mUrl;
//exit();          
            wp_redirect($mUrl);
            exit();      
      }
      
    } // if (! $stl_use_cookie)
    
  }


  
  


	function convert_script($text) {
    
    global $stl_lang_cir_id;
		global $stl_default_language;
		global $stl_current_language ;
		global $stl_global;
    
    global $stl_skip_files;
    
		$m_text = $text;
    
    
//echo "$m_text<br>";    
    
    // functionality suggested by Vanja Djuric
    // do not transliterate file names and URL-s
    if ($stl_skip_files) {

      //auto skip images
      $regeximg = '#<img([^>]*) src="([^"/]*/?[^".]*\.[^"]*)"([^>]*)>#';
      $replaceimg = '<img$1 src="[lang id="skip"]$2[/lang]"$3>';
      $text = preg_replace($regeximg, $replaceimg, $text);

      $regeximg = '#<img([^>]*) srcset="([^"/]*/?[^".]*\.[^"]*)"([^>]*)>#';
      $replaceimg = '<img$1 srcset="[lang id="skip"]$2[/lang]"$3>';
      $text = preg_replace($regeximg, $replaceimg, $text);

      //auto skip ahref tags
      $regexlink = '#<a([^>]*) href="([^"/]*/?[^".]*\.[^"]*)"([^>]*)>#';
      $replacelink = '<a$1 href="[lang id="skip"]$2[/lang]"$3>';
      $text = preg_replace($regexlink, $replacelink, $text);

    }
    
 
		$m_chunks = $this->parse_lang ($text, '');

		$m_text = $this->join_lang($m_chunks);

    
      if ( $stl_current_language != $stl_default_language ) {    
  			$m_text = alter_url_batch ($m_text);		
		  }  
    
  
	    
		return $m_text;
	}
	
	
	function convert_title ($title) {
	    $title = $this->convert_script($title);
	    return $title;
	}
  
	function convert_content ($content) {
	    $content = $this->convert_script($content);
	    return $content;
	}  

	function callback($buffer) {

//echo "#####$buffer!!!!!";  
    
//error_log ('callback in:' . $buffer);  
		$m_buffer = $this->convert_script($buffer);
//error_log ('callback out:' . $m_buffer);      
		return $m_buffer;
	}
	
	function buffer_start() { 
		ob_start(array(&$this,"callback")); 
	}
	 
	function buffer_end() {
		global $stl_global;	 
		ob_end_flush(); 
		
//print_r ($stl_global);
		
	}

	function change_permalink($title) {
		global $wpdb;
		if ($term = $wpdb->get_var("SELECT slug FROM $wpdb->terms WHERE name='$title'")) 
			return $term; 
		else 
			return strtr($title,$this->replace_sanitize);

	}


  function sanitize_filenames($filename) {
    return strtr($filename,$this->replace_sanitize);
  }
	
  //
  // parse_lang ($p_input, $p_def_lang)
  //
  // Parse input string int chunks delimited by [lang][/lang] tabs. That allows us to process them with 
  // different languages (each chunk may be set to other language provided in [lang id="nn"] tag where 
  //	nn is language id). If tag nn is "skip" then language transformation will not occur for that chunk.
  // You may set default language which is used if chunk does not heave it's own 
  // language set. If chunks are nested, language of containeer will be used for contained chunk, except
  // if contained chunk does not have its own language set.
	function parse_lang ($p_input, $p_def_lang) {

    global $stl_skip_files;
    
		$regex = '#\[lang.*?\]((?:[^[]|\](?!/?lang.*?\])|(?R))+)\[/lang\]#';
		
		if (preg_match ($regex, $p_input)) {
			$split = preg_split ($regex, $p_input,2);
      
	
			//tekuci nivo, prefiks
			unset ($m_out);
			$m_out['lang'] = $p_def_lang;
			$m_out['value'] = $split[0];
			$out[0] = $m_out;
	
			// sledeci nivo po dubini
			$m_input = $p_input;
			
			if (strlen ($split[0]) > 0) $m_input = substr ($m_input, strlen ($split[0]));
			if (strlen ($split[1]) > 0) $m_input = substr ($m_input, 0, - strlen ($split[1]));
			
			preg_match ('/\[lang(( +[^\]]*)?id=(")?(([a-z]-?)*)"?)?\]/', $p_input, $m_matches);
			
			if (! empty ($m_matches[4])) {
				$m_cur_lang = $m_matches[4]; 
			} else {
				$m_cur_lang = $p_def_lang; 
			}
			
			$m_input = preg_replace ($regex, '$1', $m_input);		
	
			unset ($m_out);
			$m_out[0] = $this->parse_lang ($m_input, $m_cur_lang);
			$out[1] = $m_out;
			
			// tekuci nivo, sufiks
			unset ($m_out);
			$m_out['lang'] = $p_def_lang;
			$m_out = $this->parse_lang ($split[1], $m_out['lang']);
			$out[2] = $m_out;
				
			$m_result = $out;
		} else {
			$m_result[0]['lang'] = $p_def_lang;
			$m_result[0]['value'] = $p_input;
		}
		return ($m_result);
	}
	
	
    //
    // function joinLang ($p_input)
    //
    // Parse input string int chunks delimited by <lang></lang> tabs. That allows us to process them with 
	// different languages (each chunk may be set to other language provided in <lang id="nn"> tag where 
	//	nn is language id)
	function join_lang ($p_input) {
		global $stl_global;
		global $stl_current_language;
		
		$m_result = '';
		foreach ($p_input as $m_item) {
			if (isset ($m_item['value'])) {
				if (! empty ($m_item['value'])) {
					if ($m_item['lang'] === 'skip') {
						$m_result .= $m_item['value'];
					} else {
						if ( $stl_current_language == "lat" ) {
            //if ( $stl_current_language == $m_lang_lat_id ) {
              
							$m_result .= strtr($m_item['value'], $this->replace);
						} else {
							$m_result .= $m_item['value'];
						}
					}
				}
			} else {
				$m_result .= $this->join_lang ($m_item);
			}
		}
		return ($m_result);
	}	

  public function cyrtolat ($pText) {
    $m_result = strtr($pText, $this->replace);
    return $m_result;
  }

	
  public function lattocyr ($pText) {
 
    $mReplace = array_flip (array_reverse($this->replace,true));
    $m_result = strtr($pText, $mReplace);
    return $m_result;
  }
	
	function test ($m_string) {
		return "###$m_string###";
	}


  function ContainsCyrillic ($pString) {
    return false;
/*      
    $mCounter = 0;
    $mFound = false;
    $mLength = count ($this->replace);

    do {
      $mChar = $this->replace[$mCounter];
      $mFound = strpos ($mChar, $pString) !== false;
      $mCounter++;
    } while (! $mFound || $mCounter < $mLength); 
    return $mFound;
*/
  }	
  
  
  
  function stl_get_current_script_tag_func($pParams) {
      return stl_get_current_script();
  }
  
  function stl_get_script_identificator_tag_func($pParams) {
      return stl_get_script_identificator();
  }
  
  function stl_get_cyrillic_id_tag_func($pParams) {
      return stl_get_cyrillic_id();
  }
  
  function stl_get_latin_id_tag_func($pParams) {
      return stl_get_latin_id();
  }
  

    function stl_is_cyrillic_tag_func($pParams, $pContent = null ) {
    if (stl_is_current_cyrillic()) {
      return $pContent;
    } else {
      return '';
    }
  }

  
  function stl_is_latin_tag_func($pParams, $pContent = null ) {
    if (stl_is_current_latin()) {
      return $pContent;
    } else {
      return '';
    }
  }

  

} // end class





	function alter_url_batch ($p_url) {
    
//echo "$p_url<br>";   
  global $stl_use_cookie; 

  //if (! $stl_use_cookie) {  
    $m_result1 = preg_replace_callback("/(src=\"|srcset=\"|href=\"|background=\"|action=\"|\<link\>)(.*?)(\"|\<\/link\>)/is", 'alter_url', $p_url);
    
    $m_result = preg_replace_callback("/(src=\'|srcset=\'|href=\'|background=\'|action=\"|\<link\>)(.*?)(\'|\<\/link\>)/is", 'alter_url', $m_result1); 
  //} else {
  //  $m_result = $p_url;
  //}
    
    return $m_result;
	}

	function alter_url($p_urls){
    global $stl_lang_cir_id;
		global $stl_current_language;
		global $stl_default_language;
		global $g_buffer;
		global $m_lang_identificator; 
    global $stl_file_lang_delimiter;
    global $stl_use_cookie;
    
    
		//$m_site_url = get_option('home');
    $m_site_url = get_option('home');
    $m_site_url = preg_replace("(^https?://)", "", $m_site_url);
    
    $m_tmp_urls = $p_urls[0];
    
    $m_urls_1_split = explode ("=",$p_urls[1]);
    $m_url_type = $m_urls_1_split[0];
    
    $m_link_url = substr (preg_replace("(^https?://)", "", $p_urls[2]), 0, strlen ($m_site_url));

//error_log ('m_link_url:' . $m_link_url);         
//error_log ('m_site_url:' . $m_site_url);      
//error_log ('p_urls:' . print_r ($p_urls,true));
//error_log ('');

//echo "$m_site_url<br>";
//echo "$m_link_url<br>";
//print_r ($p_urls);
//echo "<br>";
//if (! $stl_use_cookie) {  
		if ( ($m_site_url == $m_link_url) && ! $stl_use_cookie) {
//echo "!!!";      
      if (($stl_current_language <> $stl_default_language) && ($m_url_type == 'href')) {
      //if (($stl_current_language <> $stl_lang_cir_id) && ($m_url_type == 'href')) {
      //if ($stl_current_language <> $stl_default_language) {    
        //$m_result = $p_urls[1] . url_add_param ($p_urls[2], $m_lang_identificator . '=' .  $stl_current_language, false) . $p_urls[3];      
        $p_urls[2] = url_add_param ($p_urls[2], $m_lang_identificator . '=' .  $stl_current_language, false);
        
      } else {
          //$m_result = $p_urls[1] . $p_urls[2] . $p_urls[3];    
      }
      

		} else {
//echo "@@@";
      //$m_result = $p_urls[1] . $p_urls[2] . $p_urls[3];

		}
    
    $m_result = '';
    
    $m_result .= $p_urls[1];
    
    $mDoSkip = false;
   
    if ($mDoSkip) {
      $m_result .= '[lang id="skip"]';
    }
    
    $m_result .= $p_urls[2];
    
    if ($mDoSkip) {
      $m_result .= '[/lang]';
    }
    
    $m_result .= $p_urls[3];
    
    if ($m_site_url == $m_link_url) {
      if ($stl_current_language != $stl_lang_cir_id) {
        $m_searchstr = preg_quote("$stl_file_lang_delimiter$stl_lang_cir_id$stl_file_lang_delimiter");
				$m_result = preg_replace("/$m_searchstr/", "$stl_file_lang_delimiter$stl_current_language$stl_file_lang_delimiter", $m_result); 
      }
		}

    return $m_result;
	}
	
	



    
function stl_add_page() {

    // Add a new submenu under Options:
    add_options_page('SrbTransLat', 'SrbTransLat', 'update_core', 'srbtranslatoptions', 'stl_options_page');
	
}	

// mt_options_page() displays the page content for the Test Options submenu
function stl_options_page() {

	global $stl_lang_identificator_opt_name;
	global $stl_lang_identificator_data_field_name;
	global $stl_lang_identificator;
	
	global $stl_lang_cir_id;
	global $stl_lang_lat_id;
	
	global $stl_lang_cir_id_opt_name;
	global $stl_lang_lat_id_opt_name;	
	
	global $stl_lang_cir_id_data_field_name;
	global $stl_lang_lat_id_data_field_name;

	global $stl_default_language_opt_name;
	global $stl_default_language_data_field_name;
	global $stl_widget_title_opt_name;
	global $stl_widget_title_data_field_name;
	global $stl_transliterate_title_opt_name;
	global $stl_transliterate_title_data_field_name;
	global $stl_show_widget_title_opt_name;
	global $stl_show_widget_title_data_field_name;
	global $stl_widget_type_opt_name;
	global $stl_widget_type_data_field_name;
  
	global $stl_use_cookie_name;
	global $stl_use_cookie_data_field_name;
	global $stl_wpml_plugin_active;
  
  global $stl_file_lang_delimiter_opt_name;
  global $stl_file_lang_delimiter_data_field_name;
  global $stl_file_lang_delimiter;
  
  
  global $stl_sanitize_file_names_opt_name;
  global $stl_sanitize_file_names_data_field_name;
  global $stl_sanitize_file_names;

  global $stl_skip_files_opt_name;
  global $stl_skip_files_data_field_name;
  global $stl_skip_files;


  global $stl_use_russian_opt_name;
  global $stl_use_russian_data_field_name;
  global $stl_use_russian;

	
  if( ! empty ($_POST['Reset']) ) {
    ResetSettings();
  }
  
   // Read in existing option value from database

  $stl_sanitize_file_names_opt_val = get_option( $stl_sanitize_file_names_opt_name );
	if (empty ($stl_sanitize_file_names_opt_val)) $stl_sanitize_file_names_opt_val = true;

  $stl_skip_files_opt_val = get_option( $stl_skip_files_opt_name );
	if (empty ($stl_skip_files_opt_val)) $stl_skip_files_opt_val = false;
  
  $stl_lang_identificator_opt_val = get_option( $stl_lang_identificator_opt_name );
	if (empty ($stl_lang_identificator_opt_val)) $stl_lang_identificator_opt_val = 'script';

  $stl_lang_cir_id_opt_val = get_option( $stl_lang_cir_id_opt_name );
	if (empty ($stl_lang_cir_id_opt_val)) $stl_lang_cir_id_opt_val = $stl_lang_cir_id;

  $stl_lang_lat_id_opt_val = get_option( $stl_lang_lat_id_opt_name );
	if (empty ($stl_lang_lat_id_opt_val)) $stl_lang_lat_id_opt_val = $stl_lang_lat_id;

  $stl_default_language_opt_val = get_option( $stl_default_language_opt_name );
	if (empty ($stl_default_language_opt_val)) $stl_default_language_opt_val = $stl_lang_cir_id;
	
	$stl_widget_title_opt_val = get_option($stl_widget_title_opt_name);
	if (empty ($stl_widget_title_opt_val)) $stl_widget_title_opt_val = "Избор писма";


	$stl_transliterate_title_opt_val = get_option($stl_transliterate_title_opt_name);
	if (empty ($stl_transliterate_title_opt_val)) $stl_transliterate_title_opt_val = 'off';

	$stl_show_widget_title_opt_val = get_option($stl_show_widget_title_opt_name);	
	if (empty ($stl_show_widget_title_opt_val)) $stl_show_widget_title_opt_val = 'off';	

	$stl_widget_type_opt_val = get_option($stl_widget_type_opt_name);	

	if ( ($stl_widget_type_opt_val != 'links') and ($stl_widget_type_opt_val != 'list') ) {
		$stl_widget_type_opt_val = 'links';
	}
	
	$stl_use_cookie_val = get_option($stl_use_cookie_name);	

  
	$stl_file_lang_delimiter_opt_val = get_option($stl_file_lang_delimiter_opt_name);	

	if ( empty($stl_file_lang_delimiter_opt_val)) {
		$stl_file_lang_delimiter_opt_val = '-';
	}
  
  $stl_use_russian_opt_val = get_option($stl_use_russian_opt_name);
	if (empty ($stl_use_russian_opt_val)) $stl_use_russian_opt_val = 0;  

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'

    if( ! empty ($_POST['Submit']) ) {
        // Read their posted value

				if (isset ($_POST[ $stl_lang_identificator_data_field_name ])) {
	        $stl_lang_identificator_opt_val = sanitize_text_field($_POST[ $stl_lang_identificator_data_field_name ]);
				} else {
					$stl_lang_identificator_opt_val = 'lang';
				}
        update_option( $stl_lang_identificator_opt_name, $stl_lang_identificator_opt_val );

        //$stl_lang_cir_id_opt_val = sanitize_text_field($_POST[ $stl_lang_cir_id_data_field_name ]);
        //update_option( $stl_lang_cir_id_opt_name, $stl_lang_cir_id_opt_val );

        //$stl_lang_lat_id_opt_val = sanitize_text_field($_POST[ $stl_lang_lat_id_data_field_name ]);
        //update_option( $stl_lang_lat_id_opt_name, $stl_lang_lat_id_opt_val );

        $stl_default_language_opt_val = sanitize_text_field($_POST[ $stl_default_language_data_field_name ]);
        update_option( $stl_default_language_opt_name, $stl_default_language_opt_val );
				
				$stl_transliterate_title_opt_val = isset ($_POST[$stl_transliterate_title_data_field_name]);
        update_option( $stl_transliterate_title_opt_name, $stl_transliterate_title_opt_val );

        $stl_file_lang_delimiter_opt_val = sanitize_text_field($_POST[ $stl_file_lang_delimiter_data_field_name ]);
        update_option( $stl_file_lang_delimiter_opt_name, $stl_file_lang_delimiter_opt_val );
        
        $stl_sanitize_file_names_opt_val = isset ($_POST[$stl_sanitize_file_names_data_field_name]);
        update_option($stl_sanitize_file_names_opt_name, $stl_sanitize_file_names_opt_val );        

        $stl_skip_files_opt_val = isset ($_POST[$stl_skip_files_data_field_name]);
        update_option($stl_skip_files_opt_name, $stl_skip_files_opt_val );        

				$stl_use_cookie_val = isset ($_POST[$stl_use_cookie_data_field_name]);
				update_option( $stl_use_cookie_name, $stl_use_cookie_val );
        
				$stl_use_russian_opt_val = isset ($_POST[$stl_use_russian_data_field_name]);
				update_option( $stl_use_russian_opt_name, $stl_use_russian_opt_val );        

        // Put an options updated message on the screen

    }
    
    if (empty ($stl_use_cookie_val)) $stl_use_cookie_val = 0;	
    
    if (empty ($stl_use_russian_val)) $stl_use_russian_val = 0;	
    
    $mTemplateParams['stl_wpml_plugin_active'] = $stl_wpml_plugin_active;
    
    $mTemplateParams['stl_default_language_data_field_name'] = $stl_default_language_data_field_name;
    $mTemplateParams['stl_default_language_opt_val'] = $stl_default_language_opt_val;
    
    $mTemplateParams['stl_lang_cir_id_opt_val'] = $stl_lang_cir_id_opt_val;
    $mTemplateParams['stl_lang_cir_id_data_field_name'] = $stl_lang_cir_id_data_field_name;
    
    $mTemplateParams['stl_lang_lat_id_opt_val'] = $stl_lang_lat_id_opt_val;
    $mTemplateParams['stl_lang_lat_id_data_field_name'] = $stl_lang_lat_id_data_field_name;
    
    $mTemplateParams['stl_file_lang_delimiter_opt_val'] = $stl_file_lang_delimiter_opt_val;
    $mTemplateParams['stl_file_lang_delimiter_data_field_name'] = $stl_file_lang_delimiter_data_field_name;
    
    $mTemplateParams['stl_lang_identificator_opt_val'] = $stl_lang_identificator_opt_val;
    $mTemplateParams['stl_lang_identificator_data_field_name'] = $stl_lang_identificator_data_field_name;
    
    $mTemplateParams['stl_use_cookie_val'] = $stl_use_cookie_val;
    $mTemplateParams['stl_use_cookie_data_field_name'] = $stl_use_cookie_data_field_name;
    
    $mTemplateParams['stl_use_russian_opt_val'] = $stl_use_russian_opt_val;
    $mTemplateParams['stl_use_russian_data_field_name'] = $stl_use_russian_data_field_name;
    
    
    $mTemplateParams['stl_transliterate_title_opt_val'] = $stl_transliterate_title_opt_val;
    $mTemplateParams['stl_transliterate_title_data_field_name'] = $stl_transliterate_title_data_field_name;
    
    $mTemplateParams['stl_sanitize_file_names_opt_val'] = $stl_sanitize_file_names_opt_val;
    $mTemplateParams['stl_sanitize_file_names_data_field_name'] = $stl_sanitize_file_names_data_field_name;
    
    $mTemplateParams['stl_skip_files_opt_val'] = $stl_skip_files_opt_val;
    $mTemplateParams['stl_skip_files_data_field_name'] = $stl_skip_files_data_field_name;

    stl_load_template('options.tpl.php', $mTemplateParams);    

}


// Reset plugin settinigs
function ResetSettings() {
  
  global $stl_lang_identificator_opt_name;
  global $stl_lang_cir_id_opt_name;
  global $stl_lang_lat_id_opt_name;	
  global $stl_default_language_opt_name;
  global $stl_widget_title_opt_name;
  global $stl_transliterate_title_opt_name;
  global $stl_show_widget_title_opt_name;
  global $stl_widget_type_opt_name;
  global $stl_file_lang_delimiter_opt_name;
  global $stl_sanitize_file_names_opt_name;
  global $stl_skip_files_opt_name;
  global $stl_use_russian_opt_name;
  
  delete_option($stl_lang_identificator_opt_name);
  delete_option($stl_lang_cir_id_opt_name);
  delete_option($stl_lang_lat_id_opt_name);	
  delete_option($stl_default_language_opt_name);
  delete_option($stl_widget_title_opt_name);
  delete_option($stl_transliterate_title_opt_name);
  delete_option($stl_show_widget_title_opt_name);
  delete_option($stl_widget_type_opt_name);
  delete_option($stl_file_lang_delimiter_opt_name);
  delete_option($stl_sanitize_file_names_opt_name);
  delete_option($stl_skip_files_opt_name);
  delete_option($stl_use_russian_opt_name);

}  


// globaly available function to display curent script. May be used in user templates.
function stl_get_current_script() {
  global $stl_current_language;
  return $stl_current_language;
}

// globaly available function to display if currently displayed script is Cyrillic. May be used in user templates.
function stl_is_current_cyrillic() {
  global $stl_current_language;
  global $stl_lang_cir_id;
  return $stl_lang_cir_id == $stl_current_language;
}

// globaly available function to display if currently displayed script is Latin. May be used in user templates.
function stl_is_current_latin() {
  global $stl_current_language;
  global $stl_lang_lat_id;
  return $stl_lang_lat_id == $stl_current_language;
}

// globaly available function to display Cyrillic script identificator. May be used in user templates.
function stl_get_cyrillic_id() {
  global $stl_lang_cir_id;
  return $stl_lang_cir_id;
}

// globaly available function to display Latin script identificator. May be used in user templates.
function stl_get_latin_id() {
  global $stl_lang_lat_id;
  return $stl_lang_lat_id;
}

// globaly available function to display script identificator in url. May be used in user templates.
function stl_get_script_identificator() {
  global $m_lang_identificator;
  return $m_lang_identificator;
}


function stl_load_template ($pTemplateFile, $pParameters = null) {
  
  if ($pParameters !== null) {
    extract ($pParameters);
  }
  
  $mTemplate = locate_template($pTemplateFile);

  if (empty ( $mTemplate)) {
    $mTemplate = realpath(plugin_dir_path(__FILE__ )) . '/templates/' . $pTemplateFile;
  }
  require ($mTemplate);
  
}



// globaly available function to display script selector. May be used in user templates.
function stl_show_selector($p_selection_type = 'oneline', $p_oneline_separator = ' | ', $p_cirilica_title = 'ћирилица', $p_latinica_title = 'латиница', 
													  $p_inactive_script_only = false, $p_show_only_on_wpml_languages = '') {
	global $m_lang_identificator;
	global $m_default_language;
	global $stl_lang_cir_id;
	global $stl_lang_lat_id;

    if (isset ($_REQUEST[$m_lang_identificator])) {
			$m_current_language = $_REQUEST[$m_lang_identificator];
		} else {
  		$m_current_language = $m_default_language;
		}
		
		$m_show_only_on_wpml_languages = trim ($p_show_only_on_wpml_languages);
		$m_wpml_languages = explode(',', $m_show_only_on_wpml_languages);
		
		if (defined('ICL_LANGUAGE_CODE')) {
		  $m_ICL_LANGUAGE_CODE = ICL_LANGUAGE_CODE;
		} else {
			$m_ICL_LANGUAGE_CODE = '';
		}
		
//echo "m_ICL_LANGUAGE_CODE	= $m_ICL_LANGUAGE_CODE";
//print_r ($m_wpml_languages);
//echo in_array ($m_ICL_LANGUAGE_CODE, $m_wpml_languages);
    $mTemplateParams['cirilica_title'] = $p_cirilica_title;
    $mTemplateParams['latinica_title'] = $p_latinica_title;
    
    $mTemplateParams['inactive_script_only'] = $p_inactive_script_only;
    $mTemplateParams['oneline_separator'] = $p_oneline_separator;    
    
    $mTemplateParams['lang_identificator'] = $m_lang_identificator;
    $mTemplateParams['current_language'] = $m_current_language;
    $mTemplateParams['stl_lang_cir_id'] = $stl_lang_cir_id;
    $mTemplateParams['stl_lang_lat_id'] = $stl_lang_lat_id;      

		if ( empty ($m_show_only_on_wpml_languages)  || in_array ($m_ICL_LANGUAGE_CODE, $m_wpml_languages) ) {
		
			$m_cir_url = url_current_add_param ($m_lang_identificator. '=' . $stl_lang_cir_id, true);
			$m_lat_url = url_current_add_param ($m_lang_identificator . '=' . $stl_lang_lat_id, true);
		
			$m_show_cir = !$p_inactive_script_only || ($m_current_language != $stl_lang_cir_id);
			$m_show_lat = !$p_inactive_script_only || ($m_current_language != $stl_lang_lat_id);		


      
      $mTemplateParams['cir_url'] = $m_cir_url;
      $mTemplateParams['lat_url'] = $m_lat_url;
      
      $mTemplateParams['show_cir'] = $m_show_cir;
      $mTemplateParams['show_lat'] = $m_show_lat;

			switch ($p_selection_type) {
				case 'list':
          stl_load_template('selection_select.tpl.php', $mTemplateParams);
          break;

        case 'oneline':
          stl_load_template('selection_oneline.tpl.php', $mTemplateParams);
          break;

        default:
          stl_load_template('selection_list.tpl.php', $mTemplateParams);
	
	  	} // switch
		} // if $m_show_only_on_wpml_languages


}


function show_in_footer() {
    echo '<div id="SrbTransLatinFooter" style="font-size: 0.8em; text-align:center;">' . __('Cyrilic to Latin transliteration provided by') . ' <a href="http://pedja.supurovic.net/projekti/srbtranslatin?lnkrel=plugin" target="_blank">' . __('SrbTransLatin') . '</a></div>';
}

  function stl_uninstall() {
    ResetSettings();
  }


function collect_error() {
    update_option( 'plugin_error',  ob_get_contents() );
    
    file_put_contents ('stl_error.txt', ob_get_contents());
    
}


$wppSrbTransLatin = new SrbTransLatin;

function stl_transliterate (string $pContent, string $pOutputScript = null) {
  global $wppSrbTransLatin;
  global $stl_current_language;
  
  if (! empty ($pOutputScript)) {
    $l_save = $stl_current_language;
    $stl_current_language = $pOutputScript;
  }
  
  $l_result = $wppSrbTransLatin->convert_script ($pContent);
  
  if (! empty ($pOutputScript)) {
    $stl_current_language = $l_save;
  }
  return $l_result;
}

