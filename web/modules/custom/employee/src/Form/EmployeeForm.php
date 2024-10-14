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
    $formField = $form_state->getValues();

    $firstName = trim($formField['emp_firstname']);
    $lastName = trim($formField['emp_lastname']);
    $email = trim($formField['emp_email']);
    $zipcode = trim($formField['emp_zipcode']);

    if(!preg_match("/^([a-zA-Z']+)$/", $firstName)) {
      $form_state->setErrorByName('emp_firstname', $this->t('Enter valid first name'));
    }

    if(!preg_match("/^([a-zA-Z']+)$/", $lastName)) {
      $form_state->setErrorByName('emp_lastname', $this->t('Enter valid last name'));
    }

    if(!\Drupal::service('email.validator')->isValid($email)) {
      $form_state->setErrorByName('emp_email', $this->t('Enter valid email address'));
    }

    if(!preg_match("/^\d{1,6}$/", $zipcode)) {
      $form_state->setErrorByName('emp_zipcode', $this->t('Enter valid zip code'));
    }

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $this->messenger()->addStatus($this->t('Employee data has been saved successfully.'));
    $form_state->setRedirect('employee.employee');
  }

}
