=== Plugin Name ===
Contributors: massimo.zappino
Donate link: http://tagmycode.com/
Tags: tags, embed, tagmycode, syntax, developers, highlighting, programming, snippets
Requires at least: 3.0
Tested up to: 3.9
Stable tag: 0.1.3

WP-TagMyCode lets you embed TagMyCode snippets into your posts.


== Description ==

WP-TagMyCode plugin enables you to insert embedded [TagMyCode](http://tagmycode.com/ "TagMyCode") snippets on your WordPress blog.

This plugin insert an iframe that shows the content of the snippet.

= How to use =

You can embed your snippet simply using this shortcode:

* `[tagmycode SNIPPET_ID WIDTH HEIGHT]`

= Parameters =

* `SNIPPET_ID` (required) - is the snippet id, e.g. 36
* `WIDTH` (optional) - width in pixel or percent, default value is 100%.
* `HEIGHT` (optional) - height in pixel or percent, default value is 500px;

= Examples =
* `[tagmycode 36]`
* `[tagmycode 36 100%]`
* `[tagmycode 36 600px]`
* `[tagmycode 36 100% 400px]`

== Installation ==

1. Upload `wp-tagmycode.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

No questions :)

== Screenshots ==

1. An example of TagMyCode embedded iframe

== Changelog ==

= 0.1.3 =
* Added support for https

= 0.1.2 =
* Initial release
