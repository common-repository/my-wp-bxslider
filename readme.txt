=== WP BxSlider ===
Contributors: sohelwpexpert
Donate link: 
Tags: Slider, Cute Slider, awesome slider, WP slider, post slider, bx slider
Requires at least: 3.0.1
Tested up to: 4.0.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WP Slider is an awesome slider, super lightweight plugin for your wordpress website post slider. 

== Description ==

This plugin will enable awesome slider in your wordpress theme. You can use the WP bx slider via shortcode in everywhere you want, even in theme files. 

Plugin Features

* Shortcode System
* Wordpress Custom Post Enabled. 
* TinyMCE Button added for generating Shortcode.
* Fully Responsive. 
* Mobile touch, keyboard arrow supported. 
* Usable multiple WP bx slider.
& many More


Live Preview: http://paisleyfarmersmarket.ca/sohels/my-bxslide/

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `plugin-directory` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add a "WP-Slider" button on your editor. Use shortcode in page, post or in widgets. 
4. If you want use the WP bx slider in your theme php, Place `<?php echo do_shortcode('[bxslider1]'); ?>` in your templates.
5. In the [bxslider1] shortcode you can change post_type="", category="", count="" . Here count is total post. 
Shortcodes

<strong>Use WP bx slider shortcode</strong>
<pre>[bxslider1]</pre>

<strong>Here can change</strong>
<pre>[bxslider1 post_type="" category="" count=""]</pre>

== Frequently Asked Questions ==
= How can change post_type="" category="" count=""? =
In "post_type" you can use "post", "page" and other "custom_post_type". In "category" you can use your post category to slide category based. In "count" can use total how many post want to be slide.

If use post cat you must be use post_type
name or get defalet slider then cencel this section[ post_type=""] in shortcode.


== Screenshots ==

1. How to use shortcode in editor.
2. Another demo.



== Changelog ==

= 1.0 =
* Initial Release