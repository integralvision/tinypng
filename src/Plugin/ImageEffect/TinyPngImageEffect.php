<?php

namespace Drupal\tinypng\Plugin\ImageEffect;

use Drupal\Core\Image\ImageInterface;
use Drupal\image\ImageEffectBase;

/**
 * Class TinyPngImageEffect.
 *
 * @ImageEffect(
 *   id = "tinypng_tinypng",
 *   label = @Translation("TinyPNG"),
 *   description = @Translation("Compress image with TinyPNG API.")
 * )
 */
class TinyPngImageEffect extends ImageEffectBase {

  /**
   * {@inheritdoc}
   */
  public function applyEffect(ImageInterface $image) {
    if (!tinypng_is_mime_supported($image->getMimeType())) {
      return FALSE;
    }

    if (!$this->checkTinyPngConfig()) {
      return FALSE;
    }

    return $image->apply('tinypng_tinypng');
  }

  /**
   * Check ImageAction mode is enabled.
   */
  protected function checkTinyPngConfig() {
    $api_key = tinypng_api_key();
    if (empty($api_key)) {
      return FALSE;
    }

    \Tinify\setKey($api_key);
    return tinypng_handle_with_image_actions();
  }

}
