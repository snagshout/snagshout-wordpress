=== Snagshout ===
Contributors: snagshout
Tags: e-commerce, ecommerce, products, widget
Requires at least: 4.1.0
Tested up to: 4.6.1
Stable tag: 0.4.3
License: Apache 2.0
License URI: https://www.apache.org/licenses/LICENSE-2.0.txt

The Snagshout WordPress plugin allows you to embed deals from the Snagshout
syndication network, directly as a widget on your blog.

== Description ==

The Snagshout WordPress plugin allows you to embed deals from the Snagshout
syndication network, directly as a widget on your blog.

In order to use this plugin, you will need to register as a Snagshout partner.
You can do this by contacting Snagshout's customer support. Once you have an
account, you will be provided with a public/private key pair that can be set in
the plugin's administration panel.

== Installation ==

To use the install the plugin, you can either use the WordPress plugin
directory or manually upload it into your WordPress install.

=== Easy: Plugin directory ===

1. Login into your blog's administration panel.

2. Go to **Plugins >> Add New** using the sidebar.

3. Search for the plugin by typing `snagshout` into the search field.

4. Click the **Install Now** button.

5. After WordPress has finished downloading the plugin, click **Activate** to
   enable the plugin.

=== Advanced: Manual upload ===

1. Go to the [releases page][1] and download the latest version of
   `snagshout-wordpress.zip`.

2. Login into your blog's administration panel.

3. Go to **Plugins >> Add New** using the sidebar.

4. Click **Upload Plugin**.

5. Use the file picker to locate and upload the `snagshout-wordpress.zip` file.

6. After WordPress has finished, unpacking the plugin, activate it by clicking
   **Activate**.

== Getting Started ==

=== Configuration ===

After the plugin is activated, you will need to provide your partner account
credentials. As a partner, you should have received a key pair consisting of a
public ID and a secret key. These are used by the plugin to authenticate with
the Snagshout platform and fetch deals.

**Settings >> Snagshout:**

In the settings panel, you can provide your public ID and secret key, and also
set an optional affiliate ID to be included in all product links.

![Screenshot](https://github.com/sellerlabs/snagshout-wordpress/blob/master/assets/screenshot-01.png?raw=true)

=== Usage: Adding widgets ===

Once the plugin is configured, you can proceed to begin adding Snagshout deals
widgets into your site's sidebars and content areas.

> **NOTE:** Widget areas are defined by the themed used by your site. Most
themes include at least one sidebar, while some also include an area for
widgets below posts and pages.

**Appearance >> Widgets:**

On the widgets admin panel, you can select "Snagshout Deals" and add it into a
widget area. You can add as many widgets as you would like, with different
configurations. Each widget's appearance and content can be customized through
the provided options (Title, Layout, Category, Feed, etc).

![Screenshot](https://github.com/sellerlabs/snagshout-wordpress/blob/master/assets/screenshot-02.png?raw=true)

After saving your changes, the Snagshout widget will be loaded into your site
and begin displaying deals. If you provided an affiliate ID on the
configuration panel, product links will include it automatically.

![Screenshot](https://github.com/sellerlabs/snagshout-wordpress/blob/master/assets/screenshot-03.png?raw=true)
