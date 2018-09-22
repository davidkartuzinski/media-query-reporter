<?php
/** 
 * Media Query Reporter Plugin
 * 
 * @package     MediaQueryReporter
 * @author      David Kartuzinski
 * @link        https://github.com/davidkartuzinski/media-query-reporter
 * @license     GPLv3 or later
 * 
 * @wordpress-plugin
 * Plugin Name:     Media Query Reporter
 * Plugin URI:      https://github.com/davidkartuzinski/media-query-reporter
 * Description:     WordPress development plugin to show height and width of browser viewport. 
 * Version:         1.0.0
 * Author:          David Kartuzinski
 * Author URI:      https://kaidawei.me
 * Text Domain:     media-query-reporter
 * License:         GPLv3 or later
 * License URI:     https://www.gnu.org/licenses/gpl-3.0.en.html
 * 
 * Have fun with this! Make pixel perfect cross-browser themes.
*/


/**
 * Load javascript file to Head. WORKS AS INLINE - not load as file
 */

function media_query_reporter_head_js(){ ?>

    <script type="text/javascript">
            <!--
            var techInfo;
            techInfo = navigator.userAgent;
            var viewportwidth;var viewportheight;if(typeof window.innerWidth!='undefined')
            {viewportwidth=window.innerWidth,viewportheight=window.innerHeight}
            else if(typeof document.documentElement!='undefined'&&typeof document.documentElement.clientWidth!='undefined'&&document.documentElement.clientWidth!=0)
            {viewportwidth=document.documentElement.clientWidth,viewportheight=document.documentElement.clientHeight}
            else
            {viewportwidth=document.getElementsByTagName('body')[0].clientWidth,viewportheight=document.getElementsByTagName('body')[0].clientHeight}
            document.write('<p id="viewportInfo">Viewport width is '+viewportwidth+' x '+viewportheight+'<button class="techButton" onclick="infoClick()">I</button><span id="techInfo"><br>'+techInfo+'</span>'+'</p>');jQuery(window).resize(function(){var viewportwidth;var viewportheight;if(typeof window.innerWidth!='undefined')
            {viewportwidth=window.innerWidth,viewportheight=window.innerHeight}
            else if(typeof document.documentElement!='undefined'&&typeof document.documentElement.clientWidth!='undefined'&&document.documentElement.clientWidth!=0)
            {viewportwidth=document.documentElement.clientWidth,viewportheight=document.documentElement.clientHeight}
            else
            {viewportwidth=document.getElementsByTagName('body')[0].clientWidth,viewportheight=document.getElementsByTagName('body')[0].clientHeight}
            jQuery("#viewportInfo").html('Viewport: '+viewportwidth+' x '+viewportheight);});

            function infoClick() {
            var x = document.getElementById("techInfo");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
}

    </script>
    
    <?php } 
    
add_action('wp_head', 'media_query_reporter_head_js', 200 ); 


/**
 * Enqueue and load CSS 
 */
function media_query_reporter_styles() {
    wp_enqueue_style( 'mediaquery-reporter-css', plugins_url('assets/CSS/mediaquery-reporter.css', __FILE__));
}

add_action( 'wp_enqueue_scripts', 'media_query_reporter_styles' );