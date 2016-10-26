# Snagshout for Wordpress

The Snagshout WordPress plugin allows you to embed deals from the Snagshout
syndication network, directly as a widget on your blog.

## Requirements

- A recent version of WordPress (4.1 or higher).

- The server hosting WordPress should be running PHP 5.6 or higher.

- A Snagshout partner account.

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
# View status using: svn status
# View diff using: svn diff

svn ci -m "Release version vX.X.X"
```

When done, use `make clean` to restore the repository to its original state.
This deletes the ZIP file, `dist`, and `remote` directories for you.

## License

This plugin is licensed under the Apache 2.0 license. Please refer to the
`LICENSE` file for more information.

[1]: https://github.com/sellerlabs/snagshout-wordpress/releases
