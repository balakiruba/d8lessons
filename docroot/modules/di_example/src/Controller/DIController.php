<?php

/**
 * @file
 * Contains \Drupal\di_example\Controller\DIController.
 */

namespace Drupal\di_example\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\di_example\DITalk;

class DIController extends ControllerBase {

  /**
   * @var \Drupal\di_example\DITalk
   */
  protected $dITalk;

  /**
   * @param \Drupal\di_example\DITalk $DITalk
   */
  public function __construct(DITalk $DITalk) {
    $this->dITalk = $DITalk;
  }

  /**
   * When this controller is created, it will get the di_example.talk service
   * and store it.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   * @return static
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('di_example.talk')
    );
  }


  public function conversationAboutMood() {
    // We use the injected service to get the message.
    $message = $this->dITalk->getResponseToMood();

    // We return a render array of the message.
    return [
      '#type' => 'markup',
      '#markup' => '<p>' . $this->t($message) . '</p>',
    ];
  }
}
