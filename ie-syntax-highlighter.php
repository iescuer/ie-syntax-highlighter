<?php
/**
 * Plugin Name:       ie syntax highlighter
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.0
 * Author:            Israel Escuer
 * Author URI:        https://israelescuer.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ie-syntax
 * Domain Path:       /languages
 */
/*
{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {URI to Plugin License}.
*/

function ie_add_prism() {
    // Register prism.css file
    wp_register_style(
        'ie-prismCSS', // handle name for the style so we can register, de-register, etc.
        plugin_dir_url( __FILE__ ) . '/css/prism.css' // location of the prism.css file
    );
    // Register prism.js file
    wp_register_script(
        'ie-prismJS', // handle name for the script so we can register, de-register, etc.
        plugin_dir_url( __FILE__ ) . '/js/prism.js' // location of the prism.js file
    );
    // Enqueue the registered style and script files
    wp_enqueue_style('ie-prismCSS');
    wp_enqueue_script('ie-prismJS');
}
add_action('wp_enqueue_scripts', 'ie_add_prism');


function ie_wpblocks_editor_scripts() {

  // Poner en cola estilos opcionales de solo editor
  wp_enqueue_style (
    'ie_wp-blocks-editor-css' ,
    plugin_dir_url( __FILE__ ) . '/css/prism.css'
  );
    
    // Poner en cola el archivo JS de bloque incluido
    wp_enqueue_script (
      'ie-wp-blocks-js' ,
      plugin_dir_url( __FILE__ ) . '/js/prism.js'
    );
}
// Las secuencias de comandos de gancho funcionan en el gancho del editor de bloques
add_action ( 'enqueue_block_editor_assets' , 'ie_wpblocks_editor_scripts' );
