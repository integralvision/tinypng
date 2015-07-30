CONTENTS OF THIS FILE
---------------------
    
 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Maintainers
  
 
INTRODUCTION
------------
Provides TinyPNG integration for Drupal 7.
 
What does TinyPNG do?
TinyPNG uses smart lossy compression techniques to reduce the file size of your
PNG files. By selectively decreasing the number of colors in the image, fewer
bytes are required to store the data. The effect is nearly invisible but it
makes a very large difference in file size!

Why should I use TinyPNG?
PNG is useful because it's the only widely supported format that can store
partially transparent images. The format uses compression, but the files can
still be large. Use TinyPNG to shrink images for your apps and sites. It will
use less bandwidth and load faster.

For more information about TinyPNG please visit https://tinypng.com/.


REQUIREMENS
------------
Libraries module

A TinyPNG API key
You can request one for free at https://tinypng.com/developers.

Tinify PHP library
You can download it from https://github.com/tinify/tinify-php/

 
INSTALLATION
------------
Download Tinify PHP library from https://github.com/tinify/tinify-php/
and place it under $DRUPAL_ROOT/sites/all/libraries

Install as you would normally install a contributed Drupal module.
See: https://drupal.org/documentation/install/modules-themes/modules-7
for further information.
 
 
CONFIGURATION
------------
Having installed the module, go to admin/config/media/image-toolkit page and
select TinyPNG as default Image toolkit.
Save the form. Then select the secondary toolkit.
Save the form. Then setup the secondary toolkit too.


MAINTAINERS
------------
Vince Tikász, https://www.drupal.org/u/tikaszvince
