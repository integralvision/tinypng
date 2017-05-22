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
  protected $tempUri;
  protected $resultUri;
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

    /** @var \Drupal\tinypng\TinyPng $tinypng */
    $tinypng = \Drupal::service('tinypng.compress');
    $tinypng->setFromFile($this->getTempUri());
    $tinypng->saveTo($this->getResultUri());

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

  protected function getTempUri() {
    if (!$this->tempUri) {
      $temp_file_name = $this->getTempFileName();
      $this->tempUri = $temp_file_name . '_1';
    }
    return $this->tempUri;
  }

  protected function getResultUri() {
    if (!$this->resultUri) {
      $temp_file_name = $this->getTempFileName();
      $this->resultUri = $temp_file_name . '_2';
    }

    return $this->resultUri;
  }

  protected function getTempPath() {
    if (!$this->tempPath) {
      $temp_uri= $this->getTempUri();
      $this->tempPath = $this->getFilesystem()->realpath($temp_uri);
    }
    return $this->tempPath;
  }

  protected function getResultPath() {
    if (!$this->resultPath) {
      $result_uri = $this->getResultUri();
      $this->resultPath = $this->getFilesystem()->realpath($result_uri);
    }
    return $this->resultPath;
  }

  protected function cleanup() {
    $this->getFilesystem()->unlink($this->getTempFileName());
    $this->getFilesystem()->unlink($this->getResultPath());
  }

}
