<?php

namespace Drupal\dino_roar\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;
use Drupal\dino_roar\Jurassic\RoarGenerator;

class RoarController extends ControllerBase {

  public function roar($count) {
    $roarGenerator = new RoarGenerator();

    $roar = $roarGenerator->getRoar($count);

    return new Response($roar);
  }

}
