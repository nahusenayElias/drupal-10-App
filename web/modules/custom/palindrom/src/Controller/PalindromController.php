<?php

namespace Drupal\palindrom\Controller;

use Drupal\Core\Controller\ControllerBase;

class PalindromController extends ControllerBase
{
  public function content()
  {
    return [
      "#markup" => '<div id="react-app"></div>',
      "#attached" => [
        "library" => ["palindrom/palindrom"],
      ],
    ];
  }
}