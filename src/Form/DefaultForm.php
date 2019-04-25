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
    $form['text_input'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Text Input'),
      '#description' => $this->t('This is a text input'),
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
    $form['single_checkbox'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Single checkbox'),
    ];
    $form['radio'] = [
      '#type' => 'radio',
      '#title' => $this->t('A radio'),
      '#weight' => '0',
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
    parent::validateForm($form, $form_state);
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
