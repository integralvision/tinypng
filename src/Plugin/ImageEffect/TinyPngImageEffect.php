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

    // @todo implement this.
    return FALSE;
  }

}
