<?php

declare(strict_types=1);

namespace Drupal\employee\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a employee form.
 */
final class EmployeeForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'employee_employee';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {

    $form['emp_firstname'] = [
      '#type' => 'textarea',
      '#title' => $this->t('First Name'),
      '#required' => TRUE,
      '#maxlength' => 30,
    ];

    $form['emp_lastname'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last Name'),
      '#required' => TRUE,
      '#maxlength' => 30,
    ];

    $form['emp_firstname'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#required' => TRUE,
      '#maxlength' => 30,
    ];

    $form['emp_email'] = [
      '#type' => 'email',
      '#title' => $this->t('Employee Email'),
      '#required' => TRUE,
      '#maxlength' => 100,
    ];

    $form['emp_zipcode'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Employee ZIP Code'),
      '#required' => TRUE,
      '#maxlength' => 6,
    ];

    $form['actions'] = [
      '#type' => 'actions',
      'submit' => [
        '#type' => 'submit',
        '#value' => $this->t('Save'),
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    // @todo Validate the form here.
    // Example:
    // @code
    //   if (mb_strlen($form_state->getValue('message')) < 10) {
    //     $form_state->setErrorByName(
    //       'message',
    //       $this->t('Message should be at least 10 characters.'),
    //     );
    //   }
    // @endcode
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $this->messenger()->addStatus($this->t('Employee data has been saved successfully.'));
    $form_state->setRedirect('<front>');
  }

}
