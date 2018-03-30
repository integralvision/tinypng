<?php

namespace Drupal\tinypng;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\File\FileSystemInterface;

/**
 * Class FileCount.
 */
class TinyPng {

  /**
   * Config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Config.
   *
   * @var \Drupal\Core\Config\ImmutableConfig
   */
  protected $config;

  /**
   * File system.
   *
   * @var \Drupal\Core\File\FileSystemInterface
   */
  protected $fileSystem;

  /**
   * TinyPNG API key.
   *
   * @var string
   */
  protected $apiKey;

  /**
   * Tinify Source.
   *
   * @var \Tinify\Source
   */
  protected $tinyfySource;

  /**
   * TinyPng service constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   Config factory.
   * @param \Drupal\Core\File\FileSystemInterface $file_system
   *   File system.
   */
  public function __construct(
    ConfigFactoryInterface $config_factory,
    FileSystemInterface $file_system
  ) {
    $this->configFactory = $config_factory;

    $this->config = $this->configFactory->get('tinypng.settings');
    $this->fileSystem = $file_system;
  }

  /**
   * Instantiates a new instance of this class.
   *
   * This is a factory method that returns a new instance of this class. The
   * factory should pass any needed dependencies into the constructor of this
   * class, but not the container itself. Every call to this method must return
   * a new instance of this class; that is, it may not implement a singleton.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The service container this instance should use.
   *
   * @return \Drupal\tinypng\TinyPng
   *   Instance.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('file_system')
    );
  }

  /**
   * Set TinyPNG API key.
   *
   * @param string $key
   *   TinyPNG API key.
   * @param bool $reset
   *   Force to update previous API key.
   *
   * @return $this
   *   Current instance.
   */
  public function setApiKey($key = NULL, $reset = FALSE) {
    if (empty($this->apiKey) || $reset) {
      if (empty($key)) {
        $key = $this->config->get('api_key');
      }
      $this->apiKey = $key;
      \Tinify\setKey($key);
      \Tinify\setAppIdentifier('Drupal/' . \Drupal::VERSION);
    }
    return $this;
  }

  /**
   * Compress with \Tinify\fromUrl.
   *
   * @param string $url
   *   URI of image file.
   *
   * @return $this
   *   Current instance.
   */
  public function setFromUrl($url) {
    $this->setApiKey();
    $origin = file_create_url($url);
    $this->tinyfySource = \Tinify\fromUrl($origin);

    return $this;
  }

  /**
   * Compress with \Tinify\fromFile.
   *
   * @param string $uri
   *   URI of file.
   *
   * @return $this
   *   Current instance.
   */
  public function setFromFile($uri) {
    $this->setApiKey();
    $path = $this->fileSystem->realpath($uri);
    $this->tinyfySource = \Tinify\fromFile($path);

    return $this;
  }

  /**
   * Save result to file.
   *
   * @param string $uri
   *   Destination URI.
   *
   * @return bool|int
   *   Size of new file.
   */
  public function saveTo($uri) {
    $path = $this->fileSystem->realpath($uri);
    return $this->tinyfySource->toFile($path);
  }

}
