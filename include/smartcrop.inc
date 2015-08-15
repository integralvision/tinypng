<?php
/**
 * @file
 * Smartcrop module related image effects.
 */

/**
 * @ingroup image
 * @{
 */

/**
 * Wrapper for default image_TOOLKIT_smartcrop_scale().
 */
function image_tinypng_smartcrop_scale(stdClass $image, $requested_x, $requested_y, $upscale) {
  return _tinypng_fallback('smartcrop_scale', $image, $requested_x, $requested_y, $upscale);
}

/**
 * Wrapper for default image_TOOLKIT_smartcrop_crop().
 */
function image_tinypng_smartcrop_crop(stdClass $image, $requested_x, $requested_y, $upscale) {
  return _tinypng_fallback('smartcrop_crop', $image, $requested_x, $requested_y, $upscale);
}

/**
 * @} End of "addtogroup image".
 */
