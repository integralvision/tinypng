CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * TODO


INTRODUCTION
------------
Provides TinyPNG integration for Drupal 8. This module creates a new
image effect which you can add to your image styles.

What does TinyPNG do?
TinyPNG uses smart lossy compression techniques to reduce the file size of your
PNG or JPG files. By selectively decreasing the number of colors in the image,
fewer bytes are required to store the data. The effect is nearly invisible but
it makes a very large difference in file size!

Why should I use TinyPNG?
PNG is useful because it's the only widely supported format that can store
partially transparent images. The format uses compression, but the files can
still be large. Use TinyPNG to shrink images for your apps and sites. It will
use less bandwidth and load faster.

For more information about TinyPNG please visit https://tinypng.com/.



REQUIREMENS
------------
A TinyPNG API key
You can request one for free at https://tinypng.com/developers.

Tinify PHP library >= 1.4.0



INSTALLATION
------------
1. Go to your site root directory and run
  "composer require tinify/tinify:1.4.*".
2. Enable TinyPNG in the Drupal admin.



CONFIGURATION
------------
Having installed the module, go to /admin/config/tinypng page and set your
TinyPNG API key.

On the same page you can select the mode you want to compress images.

With "Compress on upload" mode you will compress images when every uploaded
images.

With "TinyPNG image action" mode you have the opportunity to keep your original
image untouched and select the image styles you want to compress.
After this mode is enabled you can add TinyPNG effect to any of your
image styles.



TODO
------------
* Make the file size displayed after upload the compressed image size rather
  than the original. After refreshing the page the filesize is correctly
  displayed.
* Create a service to provide this module functionality for other modules to
  integrate.
* Implement ImageMagick toolkit operation
