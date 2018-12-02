=== CSS UX ===
Contributors: Baldur ARge Sveinsson
Donate Link: 
Tags: css, styles, custom css, custom, ux, user experience, scss, sass
Requires at least: 3.0.1
Tested up to: 4.9.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add Custom CSS to your WordPress site.
Created by User Experience designer, in order to deliver a great experience.

== Description ==

An easy-to-use and beutiful WordPress Plugin to add custom CSS styles that override Plugin and Theme default styles. This plugin is designed to offer a great experience to anyone that would like to add their own CSS to their WordPress website.  Styles created with this plugin will render even if the theme is changed.

**Features**

- Customizer Control
- Active Plugin Support
- Useful Code Syntax Highlighter
- No configuration needed
- Simple interface built by user experience designer
- Virtually no impact on site performance
- No complicated database queries

== Installation ==

Install Simple CSS UX just as you would any other WP Plugin:

1.  [Download Simple CSS UX](https://bigsheepstudio.dk "CSS UX") from WordPress.org.

2.  Unzip the .zip file.

3.  Upload the Plugin folder (CSSUX/) to the wp-content/plugins folder.

4. Go to [Plugins Admin Panel](http://codex.wordpress.org/Administration_Panels#Plugins "Plugins Admin Panel") and find the newly uploaded Plugin, "Simple Custom CSS" in the list.

5. Click Activate Plugin to activate it.

6. Begin using the plugin by going to CSSUX > CSS in the Admin Menu.

[More help installing Plugins](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins "WordPress Codex: Installing Plugins")

== Frequently Asked Questions ==

= Will this Plugin work on my WordPress.com website? =

Sorry, this plugin is available for use only on self-hosted (WordPress.org) websites.

= My Custom CSS isn't showing up =

There are several reasons this could be happening:

* Your CSS is targeting the wrong selector.

* Your CSS selectors aren't specific enough.

For instance, you may have:

	a {
		color: #f00;
	}

When you need:

	\#content a {
		color: #f00;
	}

The specificity you need depends upon the CSS rules you are attempting to override.

* Your CSS isn't valid.

Please check your CSS at the [W3C CSS Validation Service](http://jigsaw.w3.org/css-validator/#validate_by_input+with_options" "W3C CSS Validation Service").

== Screenshots ==

1. The Simple Custom CSS Administration Screen

2. The Simple Custom CSS Customizer Section

= 1.0 =
Inital Release
