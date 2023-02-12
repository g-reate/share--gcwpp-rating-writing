=== Rating-Writing ===
Contributors: grace-create
Donate link: 
Tags: rating, blog, affiliate, simple
Requires at least: 4.5
Tested up to: 4.5
Stable tag: 1.2.4
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Plugin for write in your own rating star into a WordPress blog.

== Description ==

Rating-Writing is against himself chose things, is a plug-in order to evaluate on its own. it is possible to get started easily.

Please wrote in functions.php, if you want to use in "custom_post_type".

function my_filter_screens() {
  return array( 'post', 'page', 'custom post type slug' );
}
add_filter( 'gcrw_filter_screens', 'my_filter_screens' );

== Installation ==

1. Upload the entire rating-writing folder to the /wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently asked questions ==

Do you have questions or issues with Rating-Writing? Look at the following page.

http://grace-create.com/blog/web/20160120.html

== Screenshots ==

1. Admin-1
2. Admin-2
3. Admin-3
4. Browser



== Changelog ==

18 Jun 2016
-----------
= V1.2.4 =
* fix includes/meta-boxes.php.

31 Jan 2016
-----------
= V1.2.3 =
* fix css/gcrw.css.
* fix includes/meta-boxes.php.

21 Jan 2016
-----------
= V1.2.2 =
* Enabled the "custom_post_type".
* fix languages.

20 Jan 2016
-----------
= V1.2.1 =
* Enabled the "page".
* fix CSS.

17 Jan 2016
-----------
= V1.2 =
* Change the picture to the Web fonts in Web site.

09 Jan 2016
-----------
= V1.1 =
* Change the style of the admin page.

= V1.0 =
27 Dec 2015
-----------
* Initial working version.



== Upgrade notice ==



== Arbitrary section 1 ==

