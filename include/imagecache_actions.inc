<?php
/**
 * @file
 * ImageCache Actions module related image effects.
 */

/**
 * @ingroup image
 * @{
 */

/**
 * Wrapper for default image_TOOLKIT_overlay().
 */
function image_tinypng_overlay(stdClass $image, stdClass $layer, $x, $y, $alpha = 100, $reverse = FALSE) {
  return _tinypng_fallback('overlay', $image, $layer, $x, $y, $alpha, $reverse);
}

/**
 * Wrapper for default image_TOOLKIT_imagecache_autorotate().
 */
function image_tinypng_imagecache_autorotate(stdClass $image) {
  return _tinypng_fallback('imagecache_autorotate', $image);
}

/**
 * Wrapper for default image_TOOLKIT_definecanvas().
 */
function image_tinypng_definecanvas(stdClass $image, array $data) {
  return _tinypng_fallback('definecanvas', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_imagemask().
 */
function image_tinypng_imagemask(stdClass $image, stdClass $mask) {
  return _tinypng_fallback('imagemask', $image, $mask);
}

/**
 * Wrapper for default image_TOOLKIT_roundedcorners().
 */
function image_tinypng_roundedcorners($image, $action) {
  return _tinypng_fallback('roundedcorners', $image, $action);
}

/**
 * Wrapper for default image_TOOLKIT_adjustlevels().
 */
function image_tinypng_adjustlevels(stdClass $image, array $data) {
  return _tinypng_fallback('adjustlevels', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_brightness().
 */
function image_tinypng_brightness(stdClass $image, array $data) {
  return _tinypng_fallback('brightness', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_coloroverlay().
 */
function image_tinypng_coloroverlay(stdClass $image, array $data) {
  return _tinypng_fallback('coloroverlay', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_colorshift().
 */
function image_tinypng_colorshift(stdClass $image, array $data) {
  return _tinypng_fallback('colorshift', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_convert().
 */
function image_tinypng_convert(stdClass $image, array $data) {
  return _tinypng_fallback('convert', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_desaturatealpha().
 */
function image_tinypng_desaturatealpha(stdClass $image, array $data) {
  return _tinypng_fallback('desaturatealpha', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_invert().
 */
function image_tinypng_invert(stdClass $image, array $data) {
  return _tinypng_fallback('invert', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_posterize().
 */
function image_tinypng_posterize(stdClass $image, $colors) {
  return _tinypng_fallback('posterize', $image, $colors);
}

/**
 * Wrapper for default image_TOOLKIT_image_effects_text().
 */
function image_tinypng_image_effects_text(stdClass $image, array $data) {
  return _tinypng_fallback('image_effects_text', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_auto_orient().
 */
function image_tinypng_auto_orient(stdClass $image, array $data) {
  return _tinypng_fallback('auto_orient', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_strip().
 */
function image_tinypng_strip(stdClass $image) {
  return _tinypng_fallback('strip', $image);
}

/**
 * @} End of "addtogroup image".
 */
