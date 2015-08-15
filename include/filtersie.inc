<?php
/**
 * @file
 * FiltersIE module related image effects.
 */

/**
 * @ingroup image
 * @{
 */

/**
 * Wrapper for default image_TOOLKIT_filtersie_convolution().
 */
function image_tinypng_filtersie_convolution(stdClass $image, $matrix, $divisor, $offset) {
  return _tinypng_fallback('filtersie_convolution', $image, $matrix, $divisor, $offset);
}

/**
 * Wrapper for default image_TOOLKIT_filtersie_UnsharpMask().
 */
function image_tinypng_filtersie_UnsharpMask(stdClass $image, $amount, $radius, $threshold) {
  return _tinypng_fallback('filtersie_UnsharpMask', $image, $amount, $radius, $threshold);
}

/**
 * @} End of "addtogroup image".
 */
