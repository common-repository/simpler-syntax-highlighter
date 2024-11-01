<?php
/*
Plugin Name:  Simpler Syntax Highlighter
Plugin URI:   https://www.petrichorpost.com/wordpress-plugins/simpler-syntax-highlighter/
Description:  Lightweight code snippet syntax highlighter. Supports Bash, C++, C#, CSS, Delphi, Groovy, Java, JavaScript, PHP, Python, Ruby, Scala, SQL, VB, XML, and HTML. Please read the <a href="https://www.petrichorpost.com/wordpress-plugins/simpler-syntax-highlighter/" target="_blank">usage instructions here</a>.
Version:      1.0.2
Author:       Petrichorpost.com
Author URI:   https://www.petrichorpost.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wpssh
Domain Path:  /languages
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function simpler_sxhl_load_scripts() {

	wp_enqueue_style( 'simpler-sxhl-style', plugins_url( 'css/SyntaxHighlighter.css' , __FILE__ ) );
	
	wp_enqueue_script( 'simpler_sxhl_core', plugins_url( 'js/shCore.js' , __FILE__ ), '', '1.5.2', true );
	wp_enqueue_script( 'simpler_sxhl_brush_bash', plugins_url( 'js/shBrushBash.js' , __FILE__ ), '', '', true );
	wp_enqueue_script( 'simpler_sxhl_brush_cpp', plugins_url( 'js/shBrushCpp.js' , __FILE__ ), '', '', true );
	wp_enqueue_script( 'simpler_sxhl_brush_csharp', plugins_url( 'js/shBrushCSharp.js' , __FILE__ ), '', '', true );
	wp_enqueue_script( 'simpler_sxhl_brush_css', plugins_url( 'js/shBrushCss.js' , __FILE__ ), '', '', true );
	wp_enqueue_script( 'simpler_sxhl_brush_delphi', plugins_url( 'js/shBrushDelphi.js' , __FILE__ ), '', '', true );
	wp_enqueue_script( 'simpler_sxhl_brush_groovy', plugins_url( 'js/shBrushGroovy.js' , __FILE__ ), '', '', true );
	wp_enqueue_script( 'simpler_sxhl_brush_java', plugins_url( 'js/shBrushJava.js' , __FILE__ ), '', '', true );
	wp_enqueue_script( 'simpler_sxhl_brush_jscript', plugins_url( 'js/shBrushJScript.js' , __FILE__ ), '', '', true );
	wp_enqueue_script( 'simpler_sxhl_brush_php', plugins_url( 'js/shBrushPhp.js' , __FILE__ ), '', '', true );
	wp_enqueue_script( 'simpler_sxhl_brush_python', plugins_url( 'js/shBrushPython.js' , __FILE__ ), '', '', true );
	wp_enqueue_script( 'simpler_sxhl_brush_ruby', plugins_url( 'js/shBrushRuby.js' , __FILE__ ), '', '', true );
	wp_enqueue_script( 'simpler_sxhl_brush_scala.', plugins_url( 'js/shBrushScala.js' , __FILE__ ), '', '', true );
	wp_enqueue_script( 'simpler_sxhl_brush_sql', plugins_url( 'js/shBrushSql.js' , __FILE__ ), '', '', true );
	wp_enqueue_script( 'simpler_sxhl_brush_vb', plugins_url( 'js/shBrushVb.js' , __FILE__ ), '', '', true );
	wp_enqueue_script( 'simpler_sxhl_brush_xml', plugins_url( 'js/shBrushXml.js' , __FILE__ ), '', '', true );
	
	wp_add_inline_script( 'simpler_sxhl_brush_xml', 'dp.SyntaxHighlighter.ClipboardSwf = \'<?php echo plugins_url( "js/clipboard.swf" , __FILE__ ); ?>\'; dp.SyntaxHighlighter.HighlightAll("code");' );
 
}
add_action( 'wp_enqueue_scripts', 'simpler_sxhl_load_scripts' );


// Stop WordPress modifying pre tags and attributes.
function simpler_sxhl_tinymce_pre_fix( $init )
{
    $init['extended_valid_elements'] = 'pre[*]';
    return $init;
}
add_filter('tiny_mce_before_init', 'simpler_sxhl_tinymce_pre_fix');
?>