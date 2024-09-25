<?php

namespace Drupal\hello_react\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class HelloNameForm extends FormBase
{
  public function getFormId()
  {
    return 'hello-form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your name'),
      '#required' => TRUE,
    ];

    $form['pwd'] = [
      '#type' => 'password',
      '#title' => $this->t('Password'),
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $name = $form_state->getValue('name');
    \Drupal::messenger()->addMessage($this->t('Login successfully as @name!', ['@name' => $name]));
    $form_state->setRedirect('hello_react.greeting', ['user' => $name]);
  }
}