<?php

namespace Drupal\tinypng\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Class RouteSubscriber.
 *
 * @package Drupal\tinypng\Routing
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    // This is not a good solution. Replace this if
    // https://www.drupal.org/project/drupal/issues/2940016 is closed.
    /** @var \Symfony\Component\Routing\Route $route */
    if ($route = $collection->get('image.style_public')) {
      $route->setDefault('_controller', '\Drupal\tinypng\Controller\TinyPngImageStyleDownloadController::deliver');
    }
    if ($route = $collection->get('image.style_private')) {
      $route->setDefault('_controller', '\Drupal\tinypng\Controller\TinyPngImageStyleDownloadController::deliver');
    }
  }

}
