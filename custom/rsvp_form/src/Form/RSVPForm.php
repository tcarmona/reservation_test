<?php

namespace Drupal\rsvp_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class RSVPForm.
 */
class RSVPForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'rsvp_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      '#required' => TRUE,
    ];
    $form['email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Email'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      '#required' => TRUE,
    ];

    // Load the event name from the current event, if any
    $node = \Drupal::routeMatch()->getParameter('node');
    $form['event'] = [
      '#type' => 'hidden',
      '#value' => ($node->id()) ? : "No event selected",
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
    // Validate the user email
    if (!\Drupal::service('email.validator')->isValid($form_state->getValue("email"))) {
      $form_state->setErrorByName("email", t("Please provide a valid email"));
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Save the reservation
    $data = [
      'name' => $form_state->getValue("name"),
      'field_email' => $form_state->getValue("email"),
      'field_event' => $form_state->getValue("event"),
    ];
    $reservation = entity_create('reservation', $data);
    $reservation->save();
    drupal_set_message(t("Reservation sent sucessfully. Hope to see you soon!"));
  }

}
