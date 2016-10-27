# Snagshout for Wordpress

The Snagshout WordPress plugin allows you to embed deals from the Snagshout
syndication network, directly as a widget on your blog.

  - [Requirements](#requirements)
  - [Installation](#installation)
    - [Easy: Plugin directory](#easy-plugin-directory)
    - [Advanced: Manual upload](#advanced-manual-upload)
  - [Configuration](#configuration)
  - [Usage: Adding widgets](#usage-adding-widgets)
  - [Development](#development)
  - [License](#license)

## Requirements

- A recent version of WordPress (4.1 or higher).

- The server hosting WordPress should be running PHP 5.6 or higher.

- A Snagshout partner account.

- The date/time of the server hosting the blog should be correctly setup.

## Installation

To use the install the plugin, you can either use the WordPress plugin
directory or manually upload it into your WordPress install.

### Easy: Plugin directory

1. Login into your blog's administration panel.

2. Go to **Plugins >> Add New** using the sidebar.

3. Search for the plugin by typing `snagshout` into the search field.

4. Click the **Install Now** button.

5. After WordPress has finished downloading the plugin, click **Activate** to
   enable the plugin.

### Advanced: Manual upload

1. Go to the [releases page][1] and download the latest version of
   `snagshout-wordpress.zip`.

2. Login into your blog's administration panel.

3. Go to **Plugins >> Add New** using the sidebar.

4. Click **Upload Plugin**.

5. Use the file picker to locate and upload the `snagshout-wordpress.zip` file.

6. After WordPress has finished, unpacking the plugin, activate it by clicking
   **Activate**.

## Configuration

After the plugin is activated, you will need to provide your partner account
credentials. As a partner, you should have received a key pair consisting of a
public ID and a secret key. These are used by the plugin to authenticate with
the Snagshout platform and fetch deals.

**Settings >> Snagshout:**

In the settings panel, you can provide your public ID and secret key, and also
set an optional affiliate ID to be included in all product links.

![Screenshot](https://github.com/sellerlabs/snagshout-wordpress/blob/master/assets/screenshot-01.png?raw=true)

## Usage: Adding widgets

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

## Development

Development of this plugin is done entirely using Docker containers. The plugin
source is mounted directly into a WordPress container. This allows developers
to easily try out the plugin across different WordPress versions.

Getting a developer environment mainly requires you to have Docker, a text
editor, and following the next steps:

1. Install Docker and Docker Compose.

2. Run `docker-compose up`.

3. Go to `http://localhost:8080` to setup your blog.

4. Login and enable the Snagshout plugin on the admin panel.

Once the plugin is enabled, any changes to the code on the local filesystem
will be reflected in the container, so you can use any editor on your local
system to modify the plugin.

### Publishing

To generate a ZIP file for releasing the plugin, simply use `make dist`. This
command will prepare a `dist` directory with the contents of the plugin and
compress it into a ZIP file.

Additionally, WordPress uses SVN for hosting plugins in their directory. In
order to update the plugin there, you'll need to clone the repository, and make
changes to the copy on trunk and tag a release if needed:

```sh
svn co https://plugins.svn.wordpress.org/snagshout remote
cd remote

# Make changes (use svn add and svn remove as needed)
# View status using: svn stat
# View diff using: svn diff

svn ci -m "Release. See github.com/sellerlabs/snagshout-wordpress."
```

When done, use `make clean` to restore the repository to its original state.
This deletes the ZIP file, `dist`, and `remote` directories for you.

### Tagging

When a new release is ready, maintainers can use `bash scripts/tag.sh`, which
will prompt for the version number (`X.X.X`) and the continue to perform all
the steps needed to publish and tag a new version of the plugin on both Git and
SVN.

### Changelog

The change log for this repository is automatically derived from commit
messages, which follow the Angular commit convention. To update the change log,
maintainers can use `make changelog`. It uses a Docker container which reads the
commit history and overwrites the change log file, and the commits it.

```sh
make changelog

git push
```

## License

This plugin is licensed under the Apache 2.0 license. Please refer to the
`LICENSE` file for more information.

[1]: https://github.com/sellerlabs/snagshout-wordpress/releases
