=== KISS short links ===  
Contributors: KISS Plugins  
Tags: shortlink, short url, url, copy url, clipboard, post id, admin, editor  
Requires at least: 5.8  
Tested up to: 6.6  
Stable tag: 1.2.0  
Requires PHP: 7.4  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

A simple, no-fuss plugin to display and copy the default WordPress short link for any post, page, or custom post type.  

== Description ==  

Keep It Simple! The "KISS short links" plugin embraces this philosophy by doing one thing perfectly: it makes it effortless to access the default WordPress short link (`/?p=ID`).  

In the post editor, right below the main permalink, this plugin displays the short link along with a clean, one-click copy icon. This saves you the hassle of publishing a post and manually constructing the URL just to get the short link. It's perfect for when you need a stable, clean URL that will never change, even if the post's slug does.  

**Features:**  
* Displays the post's short link (`yourdomain.com/?p=123`) in the editor.
* Works for all post types (posts, pages, and CPTs).
* Features a single-click clipboard icon to copy the link instantly.
* Extremely lightweight and built with WordPress best practices.
* No settings page, no branding, no fluff—it just works.

== Installation ==  

1.  **From your WordPress dashboard (easiest way):**  
    * Navigate to 'Plugins' > 'Add New'.
    * Click 'Upload Plugin'.
    * Choose the `kiss-short-links.zip` file you downloaded and click 'Install Now'.
    * Activate the plugin through the 'Plugins' menu in WordPress.

2.  **Via FTP:**  
    * Unzip the `kiss-short-links.zip` file.
    * Upload the `kiss-short-links` folder to the `/wp-content/plugins/` directory on your server.
    * Activate the plugin through the 'Plugins' menu in WordPress.

Once activated, edit any post or page to see the KISS Short Link below the title and permalink.

== Frequently Asked Questions ==  

**Does this work with the Classic Editor and the Block Editor (Gutenberg)?**
Yes, it works seamlessly with both editors.

**What post types are supported?**
It supports all public post types, including regular Posts, Pages, and any Custom Post Types (CPTs) you have registered.

**Does this plugin create or store new URLs?**
No. It simply reveals the default, built-in short link that WordPress creates for every post. It does not add any data to your database or create custom vanity slugs.

**Where does the short link appear?**
It appears in the post editor screen, directly beneath the permalink editor that is located under the post title.

== Screenshots ==

1.  The KISS Short Link displayed cleanly in the editor with its copy icon.
2.  The "Copied!" confirmation message provides clear user feedback.

== Changelog ==

= 1.2.0 =
* Enhancement: Removed the button background for a cleaner, icon-only appearance against the editor's background.

= 1.1.0 =
* Enhancement: Replaced the "Copy" text with a Dashicon clipboard icon for a more modern and compact UI.
* Enhancement: Improved accessibility by adding an `aria-label` to the copy button.

= 1.0.1 =
* Enhancement: Added localization functions for translation readiness.
* Fix: Improved JavaScript to be more robust and compatible with various admin screen setups.

= 1.0.0 =
* Initial release. Basic functionality to show the short link with a text-based "Copy" button.
