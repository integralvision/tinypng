<?php

namespace Drupal\tinypng\Plugin\ImageToolkit\Operation\gd;

use Drupal\system\Plugin\ImageToolkit\Operation\gd\GDImageToolkitOperationBase;


/**
 * Defines GD2 Crop operation.
 *
 * @ImageToolkitOperation(
 *   id = "gd_tinypng_tinypng",
 *   toolkit = "gd",
 *   operation = "tinypng_tinypng",
 *   label = @Translation("TinyPNG compress"),
 *   description = @Translation("Compress with TinyPNG API.")
 * )
 */
class TinyPng extends GDImageToolkitOperationBase {

  /**
   * Filesystem service.
   *
   * @var \Drupal\Core\File\FileSystemInterface
   */
  protected $fileSystem;

  protected $tempFileName;
  protected $tempPath;
  protected $resultPath;

  /**
   * {@inheritdoc}
   */
  protected function arguments() {
    // This operation does not use any parameters.
    return [];
  }

  /**
   * {@inheritdoc}
   */
  protected function execute(array $arguments) {
    $temp_file = $this->getTempPath();
    $temp_result = $this->getResultPath();

    $this->getToolkit()->save($temp_file);
    $tinypng = \Tinify\fromFile($temp_file);
    $tinypng->toFile($temp_result);

    $function = 'imagecreatefrom' . image_type_to_extension($this->getToolkit()->getType(), FALSE);
    $resource = $function($temp_result);
    imagedestroy($this->getToolkit()->getResource());
    $this->getToolkit()->setResource($resource);

    $this->cleanup();

    return TRUE;
  }

  /**
   * Get filesystem service.
   *
   * @return \Drupal\Core\File\FileSystemInterface|mixed
   *   Filesystem service.
   */
  protected function getFilesystem() {
    if (!$this->fileSystem) {
      $this->fileSystem = \Drupal::service('file_system');
    }
    return $this->fileSystem;
  }

  protected function getTempFileName() {
    if (!$this->tempFileName) {
      $this->tempFileName = $this->getFilesystem()->tempnam('temporary://', 'tinypng_tinypng_');
    }
    return $this->tempFileName;
  }

  protected function getTempPath() {
    if (!$this->tempPath) {
      $temp_file_name = $this->getTempFileName();
      $this->tempPath = $this->getFilesystem()->realpath($temp_file_name . '_1');
    }
    return $this->tempPath;
  }

  protected function getResultPath() {
    if (!$this->resultPath) {
      $temp_file_name = $this->getTempFileName();
      $this->resultPath = $this->getFilesystem()->realpath($temp_file_name . '_2');
    }
    return $this->resultPath;
  }

  protected function cleanup() {
    $this->getFilesystem()->unlink($this->getTempFileName());
    $this->getFilesystem()->unlink($this->getResultPath());
  }

}
