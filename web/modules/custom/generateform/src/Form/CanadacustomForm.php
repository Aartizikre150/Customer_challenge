<?php

namespace Drupal\generateform\Form;

use Drupal\node\NodeForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class CanadacustomForm.
 */
class CanadacustomForm extends NodeForm {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'node_canada_customs_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Let the parent class build the form.
    $form = parent::buildForm($form, $form_state);

    // Add your custom form elements here.
    $form['custom_element'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Custom Element'),
      '#default_value' => $this->node->get('field_custom_element')->value,
      '#weight' => 0,
    ];

    // Add more custom form elements as needed.

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Let the parent class handle its form submissions.
    parent::submitForm($form, $form_state);

    // Handle your custom form submissions.
    $values = $form_state->getValues();
    // Do something with the submitted values.
  }

}
