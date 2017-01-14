=== Snagshout ===
Contributors: snagshout
Tags: e-commerce, ecommerce, products, widget
Requires at least: 4.1.0
Tested up to: 4.6.1
Stable tag: 0.4.7
License: Apache 2.0
License URI: https://www.apache.org/licenses/LICENSE-2.0.txt

The Snagshout WordPress Plugin allows you to embed deals from the Seller Labs
Deal Network directly through a widget onto your website.

== Description ==

The Snagshout WordPress Plugin allows you to embed deals from the Seller Labs
Deal Network directly through a widget onto your website.

Promote thousands of product deals with the click of a button. The Seller Labs
Deal Network / Snagshout removes the hassle from looking for deals to promote to
your audience. Easily create new pages to host deals on, or integrate deals into
pages you have already developed. The best part? You get to keep 100% of the
affiliate commissions! Developed by Seller Labs for its Deal Network Partners
and Snagshout Partners, this plugin lets you promote deals easily from a
simple-to-use plugin.

You must have already registered with Seller Labs as a Deal Network Partner in
order to be eligible. More information at http://sellerlabs.com/deal-network.

Features:

- Thousands of product deals at your fingertips.

- Customizable: Easily choose the number of deals, categories, and how they are
  displayed.

- Automatic Updates: We’ll automatically update deals that are displayed.

- 100% affiliate commissions: Not only do you get to keep 100% of the Amazon
  affiliate commissions earned, we’ll automatically add your Amazon affiliate
  link to every deal.

== Installation ==

To use the install the plugin, you can either use the WordPress plugin
directory or manually upload it into your WordPress install.

**Easy: Plugin directory**

1. Login into your blog's administration panel.

2. Go to **Plugins >> Add New** using the sidebar.

3. Search for the plugin by typing `snagshout` into the search field.

4. Click the **Install Now** button.

5. After WordPress has finished downloading the plugin, click **Activate** to
   enable the plugin.

**Advanced: Manual upload**

1. Go to the [releases page][1] and download the latest version of
   `snagshout-wordpress.zip`.

2. Login into your blog's administration panel.

3. Go to **Plugins >> Add New** using the sidebar.

4. Click **Upload Plugin**.

5. Use the file picker to locate and upload the `snagshout-wordpress.zip` file.

6. After WordPress has finished, unpacking the plugin, activate it by clicking
   **Activate**.

[1]: https://github.com/sellerlabs/snagshout-wordpress/releases

== Configuration ==

After the plugin has been activated, you will need to provide your partner
account credentials. As a partner, you should have received a key pair
consisting of a public ID and a secret key. These are used by the plugin to
authenticate with the Snagshout platform and fetch deals.

**Settings >> Snagshout:**

In the settings panel, you can provide your public ID and secret key, as well
as set an optional affiliate ID to be included in all product links.

== Usage: Adding widgets ==

Once the plugin has been configured, you can start adding Snagshout deals
widgets into your site's sidebars and content areas.

> **NOTE:** Widget areas are defined by the themed used on your site. Most
themes include at least one sidebar, while some include an area for widgets
below posts and pages.

**Appearance >> Widgets:**

- On the widgets admin panel, you can select "Snagshout Deals" and add it into
  a widget area. You can add as many widgets as you would like, with different
  configurations. Each widget's appearance and content can be customized through
  the provided options (Title, Layout, Category, Feed, etc).

- After saving your changes, the Snagshout widget will be loaded into your site
  and begin displaying deals. If you provided an affiliate ID on the
  configuration panel, product links will include it automatically.

- Usage: Adding Deals To Content or Inline

If your template does not support Widgets in the Page content or inline,
you can use [Turbo Widgets][2].

[2]: https://wordpress.org/plugins/turbo-widgets/
