<?php
/**
 * @file
 * Image module related image effects.
 */

/**
 * @ingroup image
 * @{
 */

/**
 * Wrapper for default image_TOOLKIT_resize().
 */
function image_tinypng_resize(stdClass $image, $width, $height) {
  return _tinypng_fallback('resize', $image, $width, $height);
}

/**
 * Wrapper for default image_TOOLKIT_rotate().
 */
function image_tinypng_rotate(stdClass $image, $degrees, $background = NULL) {
  return _tinypng_fallback('rotate', $image, $degrees, $background);
}

/**
 * Wrapper for default image_TOOLKIT_crop().
 */
function image_tinypng_crop(stdClass $image, $x, $y, $width, $height) {
  return _tinypng_fallback('crop', $image, $x, $y, $width, $height);
}

/**
 * Wrapper for default image_TOOLKIT_desaturate().
 */
function image_tinypng_desaturate(stdClass $image) {
  return _tinypng_fallback('desaturate', $image);
}

/**
 * Wrapper for default image_TOOLKIT_load().
 */
function image_tinypng_load(stdClass $image) {
  return _tinypng_fallback('load', $image);
}

/**
 * Wrapper for default image_TOOLKIT_create_tmp().
 */
function image_tinypng_create_tmp(stdClass $image, $width, $height) {
  return _tinypng_fallback('create_tmp', $image, $width, $height);
}

/**
 * Wrapper for default image_TOOLKIT_get_info().
 */
function image_tinypng_get_info(stdClass $image) {
  return _tinypng_fallback('get_info', $image);
}

/**
 * @} End of "addtogroup image".
 */
