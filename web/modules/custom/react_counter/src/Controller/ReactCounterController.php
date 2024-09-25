<?php

namespace Drupal\react_counter\Controller;

use Drupal\Core\Controller\ControllerBase;

class ReactCounterController extends ControllerBase
{
  public function content()
  {
    return [
      "#markup" => '<div id="react-app"></div>',
      "#attached" => [
        "library" => ["react_counter/react_counter"],
      ],
    ];
  }
}