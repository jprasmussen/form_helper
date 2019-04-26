<?php

namespace Drupal\form_helper\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DefaultForm.
 */
class DefaultForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'default_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['textfield'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Text Input'),
      '#description' => $this->t('This is a text input'),
      '#maxlength' => 64,
      '#size' => 64,
    ];
    $form['textfield_validate'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Text input that will not validate'),
      '#description' => $this->t('This is a text input that will fail on submit'),
      '#maxlength' => 64,
      '#size' => 64,
    ];
    $form['telephone'] = [
      '#type' => 'tel',
      '#title' => $this->t('Telephone'),
      '#description' => $this->t('A tel input'),
    ];
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#description' => $this->t('An email input'),
    ];
    $form['checkbox'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('A checkbox'),
    ];
    $form['checkboxes'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('A checkbox list'),
      '#options' => [
        'one' => 'One',
        'two' => 'Two',
        'Three' => 'Three',
      ]
    ];
    $form['radio'] = [
      '#type' => 'radio',
      '#title' => $this->t('A radio'),
    ];
    $form['radios'] = [
      '#type' => 'radio',
      '#title' => $this->t('A radio list'),
      '#options' => [
        'one' => 'One',
        'two' => 'Two',
        'Three' => 'Three',
      ]
    ];
    $form['textarea'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Textarea'),
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $form_state->setErrorByName('textfield_validate', $this->t('Oooops, you can not submit this form.'));
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }

  }

}
