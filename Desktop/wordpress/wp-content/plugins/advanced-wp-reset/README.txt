=== Advanced WordPress Reset ===
Contributors: symptote
Tags: database, reset database, reset, clean, restore
Requires at least: 4.0
Requires PHP: 7.0
Tested up to: 6.3
Stable tag: 2.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Reset and restore your WordPress database to its original status, just like if you make a fresh installation.

== Description ==

📢 If you are looking to clean up your database and delete orphaned items, consider using our plugin: [Advanced Database Cleaner](https://wordpress.org/plugins/advanced-database-cleaner).

The 'Advanced WordPress Reset' plugin lets you reset your WordPress site back to how it was when you first started. This means you can have a fresh start without doing a whole new WordPress installation. With this plugin, you can also reset specific items by executing tools such as: clean up the "uploads" folder, delete all comments, remove all plugins, etc.

This plugin is a time-saver, especially for developers, designers, marketers, webmasters, and anyone who frequently sets up fresh WordPress installations after testing various plugins or themes.

The free version of this plugin offers two main feature categories:

= Site reset =
* Runs a new installation without going through the 5 minutes WordPress installation
* Resets the database without deleting or modifying any of your files (all your WordPress, plugins, and themes files are kept as they are without modifying them in any way)
* Deletes all database customizations made by plugins and themes
* Deletes all content including posts, pages, options, menus, etc.
* Detects the Admin user and recreates it with its saved password. If the Admin user does not exist, the current logged in user will be recreated with its current password with wp_user_level 10
* Keeps the blog name after the reset

= Reset tools =
* Clean up 'uploads' folder (/wp-content/uploads) by deleting all its content. This includes images, videos, music, documents, subfolders, etc.
* Delete all themes (the plugin uses WordPress core functions to delete themes). You have the possibility to keep the currently active theme or delete it as well
* Delete all plugins (the plugin will deactivate them first then uninstall them using WordPress core functions)
* Clean up "wp-content" folder. All files and folders inside '/wp-content' directory will be deleted, except 'index.php' and the following folders: 'plugins', 'themes', 'uploads' and 'mu-plugins'
* Delete Must-use plugins. All MU plugins in '/wp-content/mu-plugins' will be deleted. These are plugins that cannot be disabled except by removing their files from the must-use directory
* Delete ".htaccess" file. This is a critical WordPress core file used to enable or disable features of websites hosted on Apache. In some cases, you may need to delete it to do some tests
* Delete all comments. All types of comments will be deleted. Comments meta will also be deleted
* Delete pending comments. These are the comments that are awaiting moderation
* Delete spam comments
* Delete trashed comments. These are comments that you have deleted and sent to the Trash
* Delete pingbacks. Pingbacks allow you to notify other website owners that you have linked to their article on your website
* Delete trackbacks. Although there are some minor technical differences, a trackback is basically the same things as a pingback

The use of the plugin is quick, convenient, and safe. It is impossible to accidentally click on the reset buttons without your permission. You are always invited to confirm your actions.

### 🔥 PRO VERSION FEATURES  [(Official website)](https://awpreset.com?utm_source=wordpress_org&utm_medium=link&utm_campaign=ongoing&utm_content=awr_homepage) 🔥

Explore new features with our [Pro version](https://awpreset.com?utm_source=wordpress_org&utm_medium=link&utm_campaign=ongoing&utm_content=awr_homepage) and elevate your WordPress management experience. Don't just reset; reset smarter with [Advanced WP Reset Pro](https://awpreset.com?utm_source=wordpress_org&utm_medium=link&utm_campaign=ongoing&utm_content=awr_homepage).

* **Nuclear & Custom Resets**: Go beyond Basic Resets by removing themes, plugins, uploads, and everything else, or pick and choose what you want to include or exclude in a Custom-built Reset.

* **37 Clean-Up tools**: Clean up menus, widgets, cache, roles, options, etc., and improve your website’s performance and maintainability.

* **Collections**: Group your favorite tools in a collection so you can run them with a single click or automate their execution.

* **Snapshots**: Snapshots are instant copies of your site’s database that can be quickly restored when needed.

* **Automation & Scheduling**: Advanced automation and scheduling capabilities to take snapshots and run collections without your intervention.

* **WP Switcher**: Downgrade and upgrade to any WordPress version with a single click.

###Multisite Support

* The plugin does not support Multisite installation for now. We will add compatibility as soon as possible.

== Installation ==

This section describes how to install the plugin and get it working.

= Single site installation =
* After extraction, upload the Plugin to your `/wp-content/plugins/` directory
* Go to "Dashboard" &raquo; "Plugins" and choose 'Activate'
* The plugin page can be accessed via "Dashboard" &raquo; "Tools" &raquo; "Advanced WP reset"

== Screenshots ==

1. Reset
2. Snapshots
3. Tools
4. Collections
5. WP switcher

== Changelog ==

= 2.0.1 - 28/08/2023 =
- Fix: session bug fixed now
- Tweak: CSS improvements

= 2.0 - 16/08/2023 =
- Tweak: entire code and style refactored
- New: introducing our PRO version: https://awpreset.com

= 1.7 - 11/04/2023 =
- Fix: admin user was not properly recreated in some cases, this has been fixed
- Tweak: enhancing the JS and CSS codes little bit
- Tweak: you are now logged in directly after the reset
- Security: improving the plugin's security

= 1.6 - 01/07/2022 =
- Security fix: enhancing the security of the plugin by escaping some URLs before outputting them

= 1.5 - 23/02/2022 =
- New: feature to clean up 'uploads' folder
- New: feature to delete all themes
- New: feature to delete all plugins
- New: feature to clean up 'wp-content' folder
- New: feature to delete MU plugins
- New: feature to delete the '.htaccess' file
- New: feature to delete all comments
- New: feature to delete pending comments
- New: feature to delete spam comments
- New: feature to delete trashed comments
- New: feature to delete pingbacks
- New: feature to delete trackbacks
- Tweak: completely rewriting the JavaScript code
- Tweak: enhancing the CSS code
- Tweak: enhancing the PHP code
- Tested with WordPress 5.9

= 1.1.1 - 17/09/2020 =
- Tweak: enhancing the JavaScript code
- Tweak: we are now using SweetAlert for all popup boxes
- Tweak: enhancing some blocks of code
- Tested with WordPress 5.5

= 1.1.0 =
* Some changes to CSS style
* Changing a direct text to _e() for localization
* Test the plugin with WP 5.1

= 1.0.1 =
* The plugin is now Reactivated after the reset
* Adding "Successful Reset" message

= 1.0.0 =
* First release: Hello world!

== Frequently Asked Questions ==

= What does mean "reset my database"? =
This option will reset your WordPress database back to its original status, just like if you make a new installation. That is to say, a clean installation without any content or customizations

= Can I safely reset my database? =
Yes, resetting is safe if you don't have crucial content at risk. If any issues arise, we're here to help :)

= Will any files be deleted after the reset? =
It depends. Based on the reset option you choose, files might or might not be deleted.

= Will plugins/themes get deleted after the reset? =
It varies. Depending on the reset option you select, some plugins/themes may remain intact, while others could be removed.

= Is this plugin compatible with multisite? =
No, it is not compatible with multisite. We will try to fix this compatibility as soon as possible.

= Is this plugin compatible with SharDB, HyperDB, or Multi-DB? =
The plugin is not supposed to be compatible with SharDB, HyperDB, or Multi-DB for now.