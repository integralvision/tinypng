<?php
/**
 * @file
 * Textimage (3.+) module related image effects.
 */

/**
 * @ingroup image
 * @{
 */

/**
 * Wrapper for default image_TOOLKIT_textimage_get_font_path().
 */
function image_tinypng_textimage_get_font_path($image, $data = array()) {
  return _tinypng_fallback('textimage_get_font_path', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_textimage_text_to_image().
 */
function image_tinypng_textimage_text_to_image($image, $data = array()) {
  return _tinypng_fallback('textimage_text_to_image', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_textimage_get_bounding_box().
 */
function image_tinypng_textimage_get_bounding_box($image, $data = array()) {
  return _tinypng_fallback('textimage_get_bounding_box', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_textimage_text_stroke().
 */
function image_tinypng_textimage_text_stroke($image, $data = array()) {
  return _tinypng_fallback('textimage_text_stroke', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_textimage_draw_polygon().
 */
function image_tinypng_textimage_draw_polygon($image, $data = array()) {
  return _tinypng_fallback('textimage_draw_polygon', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_textimage_draw_line().
 */
function image_tinypng_textimage_draw_line($image, $data = array()) {
  return _tinypng_fallback('textimage_draw_line', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_textimage_draw_ellipse().
 */
function image_tinypng_textimage_draw_ellipse($image, $data = array()) {
  return _tinypng_fallback('textimage_draw_ellipse', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_textimage_imagecolor().
 */
function image_tinypng_textimage_imagecolor($image, $data = array()) {
  return _tinypng_fallback('textimage_imagecolor', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_textimage_create_transparent().
 */
function image_tinypng_textimage_create_transparent(stdClass $image, $width, $height, $transparent = NULL) {
  return _tinypng_fallback('textimage_create_transparent', $image, $data);
}

/**
 * Wrapper for default image_TOOLKIT_textimage_set_transparency().
 */
function image_tinypng_textimage_set_transparency(stdClass $image, $color) {
  return _tinypng_fallback('textimage_set_transparency', $image, $data);
}

/**
 * @} End of "addtogroup image".
 */
