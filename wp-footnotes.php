<?php
/**
 *
 * @wordpress-plugin
 * Plugin Name: Simple Footnotes
 * Description: Simple Inline Footnotes
 * Author: Paul Cox
 * Version: 1.0
 * Author URI: http://pauljosephcox.com/
 */

// ------------------------------------
// Namespace
// ------------------------------------

namespace CoxyFootnotes; 

// ------------------------------------
// Requirements
// ------------------------------------


class CoxyFootnotes {



	function __construct(){

		// Setup Plugin Defaults
		$this->path    = plugin_dir_path(__FILE__);
		$this->folder  = basename($this->path);
		$this->dir     = plugin_dir_url(__FILE__);
		$this->version = self::version(); ;
		$this->debug = false;
		$this->name = 'Coxy Footnotes';

        // New Shortcode
        add_shortcode('footnote', array($this, 'shortcode_footnote'));
        
        // Includes
		add_action('wp_enqueue_scripts', array($this, 'scripts'));

	}

	// Set Version in a way that we can access it everywhere.
	public static function version(){ return '0.0.1'; }



    public function scripts(){

        // Javascript
        wp_enqueue_script('footnotes.javascript', $this->dir.'assets/wp-footnotes.js',array('jquery'),$this->version,true);

        // CSS
        wp_enqueue_style('footnotes.styles',$this->dir.'assets/wp-footnotes.css',false,$this->version);
        
    }
    
    public function shortcode_footnote($attr, $content = ''){

        ob_start();
		include('templates/footnote.php');
		return ob_get_clean();

	}
	


}

// ------------------------------------
// Ready. Set. Go.
// ------------------------------------

$coxyfootnotes = new \CoxyFootnotes\CoxyFootnotes();

?>
