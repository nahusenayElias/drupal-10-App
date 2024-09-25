<?php

namespace Drupal\hello_react\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;

class HelloController extends ControllerBase
{
  public function landing()
  {
    $url = Url::fromRoute('hello_react.form');
    $link = Link::fromTextAndUrl($this->t('Click to login'), $url)->toString();
    return ['#markup' => $this->t('Welcome, guest! @link', [
      '@link' => $link,
    ])];
  }

  public function greeting($user)
  {
    return ['#markup' => $this->t('Hello, @user!', ['@user' => $user])];
  }
}