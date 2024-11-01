=== Plugin Name ===

Plugin Name:  Word Security
Description:  This plugin helps you to secure your wordpress.
Plugin URI:   https://wordpress.org/plugins/Word-Security
Author:       SPcits - spcits.com
Author URI:   http://spcits.com
Version:      1.0
Text Domain:  wordsecurity
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
Contributors: Shubhneet
Requires at least: 3.3.1
Tested up to: 4.9.4
Stable tag: 4.0.3
Tags: wordpress security,wordpress security plugin, wordpress website security, wordpress protection, best wordpress security, wp security plugin, wordpress security scan, wordpress secure website, best wp security, wp protect plugin, wp security wordpress plugin


WordSecurity plugin helps you to secure file structure of your wordpress site and restricted access to your files, folders and login section.

== Description ==

WordSecurity plugin helps you to secure file structure of your wordpress site and restricted access to your files, folders and login section.

You can use WordSecurity Plugin to perform following actions on your wordpress site


1. Disable Directory Browsing (Secure)
2. Disable HTTP Access to .htaccess (Secure)
3. Disable HTTP Access to wp-config.php (Secure)
4. Restrict Login Access By IP
5. Manage List for Allowed IP Addresses for Login


== Installation ==


1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Settings->WordSecurity screen to configure the plugin

== Frequently Asked Questions ==

= How to use this plugin ? ? =

You can simly activate the plugin and can choose secure settings on settings page.

= I have configured the plugin but It's not working ? =

Please check if your .htaccess is writeable since it's important that this file should be editable.

= I had enabled "Restrict Login Access By IP", now my ip has changed is there a way I can still login ? =

Sorry, you can not login either you will have to remove the plugin from plugins folder via ftp.
or you will have to modify wp_options table for option name wordsecurity_options .


== Screenshots ==

1. WordSecurity Settings Page
