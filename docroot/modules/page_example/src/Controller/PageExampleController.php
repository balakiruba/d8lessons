<?php
/* *
@file
Contains \Drupal\page_example\Controller\PageExampleController.
 */

namespace Drupal\page_example\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Drupal\Core\Link;

class PageExampleController extends ControllerBase {
  public function description() {
    $simple_link = Url::fromRoute('page_example_simple')->toString();
    $arguments_url = Url::fromRoute('page_example_description', [], ['absolute' => TRUE]);
    $arguments_link = Link::fromTextAndUrl(t('arguments page'), $arguments_url)->toString();
    $build = [ '#markup' => t( 'The Page example module provides two pages, "simple" and "arguments".' . ' ' . '  ', [ '@simple_link' => $simple_link, '@arguments_link' => $arguments_link, '@arguments_url' => $arguments_url->toString() ] ), ];
    return $build;
}
  public function simple() {
    return [ '#markup' => ' ' . t('Simple page: The quick brown fox jumps over the lazy dog.') . '', ];
  }
}
