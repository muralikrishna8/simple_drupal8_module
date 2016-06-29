<?php

namespace Drupal\dino_roar\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Logger\LoggerChannelFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\dino_roar\Jurassic\RoarGenerator;

class RoarController extends ControllerBase {

  private $roarGenerator;
  protected $loggerFactory;

  public function __construct(RoarGenerator $roarGenerator, LoggerChannelFactory $loggerFactory) {
    $this->roarGenerator = $roarGenerator;
    $this->loggerFactory = $loggerFactory;
  }

  public function roar($count) {
    $roar = $this->roarGenerator->getRoar($count);
    $this->loggerFactory->get("default")->debug($roar);

    return new Response($roar);
  }

  public static function create(ContainerInterface $container) {
    $roarGenerator = $container->get("dino_roar.roar_generator");
    $loggerFactory = $container->get("logger.factory");

    return new static($roarGenerator, $loggerFactory);
  }
}
