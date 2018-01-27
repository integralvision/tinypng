<?php

namespace Drupal\tinypng\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    /** @var \Symfony\Component\Routing\Route $route */
    if ($route = $collection->get('image.style_public')) {
      $route->setDefault('_controller', '\Drupal\tinypng\Controller\TinyPngImageStyleDownloadController::deliver');
    }
    if ($route = $collection->get('image.style_private')) {
      $route->setDefault('_controller', '\Drupal\tinypng\Controller\TinyPngImageStyleDownloadController::deliver');
    }
  }

}
