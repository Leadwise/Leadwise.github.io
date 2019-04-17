=== Monostack ===

Contributors: mapk
Tags: blog, translation-ready, custom-background, custom-colors, custom-logo, footer-widgets, full-width-template, rtl-language-support, threaded-comments, one-column

Requires at least: 4.0
Tested up to: 5.1
Stable tag: 2.0.4
License: GNU General Public License v2 (GPLv2) or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Monostack is a Gutenberg-ready WordPress theme that brings the beauty of code editors to the frontend. With a strong focus on typography and color, Monostack highlights specific grammar much like syntax highlighting does in code editors. Monostack is named after the "monospace" font stack used throughout the theme.

Based on [Underscores](http:underscores.me/) and the [Gutenberg Starter Theme](https://github.com/WordPress/gutenberg-starter-theme) which uses the [GPL 2 License](https://github.com/WordPress/gutenberg-starter-theme/blob/master/LICENSE), Monostack is designed and further developed by [Mark Uraine](https://markuraine.com/) and [Ernesto Mendez](https://profiles.wordpress.org/mendezcode/).

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= What does "Gutenberg-ready" mean? =

"Gutenberg-ready" is a way to indicate that this theme supports the Gutenberg plugin and the usage of blocks in the new editor. There are no sidebars in this theme and widgets are not recommended since they will all eventually be blocks anyways. Monostack takes advantage of the 100% width layout for Gutenberg blocks to work correctly.

= Does this theme support any plugins? =

Monostack includes support for Infinite Scroll in Jetpack. It also works best with the Gutenberg plugin.

= Is there a problem with IE 11? =

Yes. I use CSS variables which are not supported in IE. I also use ES6 (ie. arrow functions and includes) which are also not supported in IE.

== Changelog ==

= 2.0.4 =
* Added the ability to use custom excerpts.

= 2.0.3 =
* Updated the .site-title styles so that it displays correctly across all screens.

= 2.0.2 =
* Updated some styling for the preformatted and code blocks. Tested with 5.0.

= 2.0.1 =
* Added Ernesto Mendez to the readme.txt file for his excellent dev work.

= 2.0 =
* A big version jump due to a refactor of the syntax highlighting code. Using regex now and adapted fully for translations. There is still a minor issue with text at the end of sentences not being highlighted.

= 1.2.1 =
* Removed the rtl.css file since I'm not using it.

= 1.2 =
* Using wp_localize_script() to help translate the js file. Removed the $posted_on from the functions.php file and replaced with $time_string instead.

= 1.0.5 =
* Removed '_s' from language file, and fixed the default color for the Customizer to match the theme's background color. Removed custom header from functions.php file.

= 1.0.4 =
* Updated name of language file to reflect theme name.

= 1.0.3 =
* Updated for Gutenberg color palette when utilizing background and text colors with Gutenberg selectors.

= 1.0.2 =
* Updated CSS adding styling to all Gutenberg default blocks.

= 1.0.1 =
* Updated screenshot.png to align with WordPress.org guidelines.

= 1.0 =
* Initial release

== Credits ==

* Based on Underscores http://underscores.me/, (C) 2012-2017 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
