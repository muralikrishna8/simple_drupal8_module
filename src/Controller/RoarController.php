<?php

namespace Drupal\dino_roar\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\dino_roar\Jurassic\RoarGenerator;

class RoarController extends ControllerBase {

  private $roarGenerator;

  public function __construct(RoarGenerator $roarGenerator) {
    $this->roarGenerator = $roarGenerator;
  }

  public function roar($count) {
    $roar = $this->roarGenerator->getRoar($count);

    return new Response($roar);
  }

  public static function create(ContainerInterface $container) {
    $roarGenerator = $container->get("dino_roar.roar_generator");

    return new static($roarGenerator);
  }
}
