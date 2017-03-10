=== Plugin Name ===

Contributors: pcfreak30
Donate link: http://www.paypal.me/pcfreak30
Tags: nonce
Requires at least: 2.7.0
Tested up to: 4.7.3
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin to allow a configurable nonce security code lifetime

== Description ==

This plugin will allow you change the expire time for nonce codes generated with `wp_create_nonce`

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/nonce-extender` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
4. Visit the general options to change the nonce


== Frequently Asked Questions ==

* Help!, I locked myself out from changing settings or doing any actions as the nonce time is too short!

Please add `define('DISABLE_NONCE_EXTENDER', true);` to your `wp-config.php` file to disable the nonce from being changed, and then go and fix the option

== Changelog ==

### 0.1.0 ###

* Initial version