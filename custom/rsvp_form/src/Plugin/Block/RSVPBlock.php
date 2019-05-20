<?php

namespace Drupal\rsvp_form\Plugin\Block;

use Drupal\Core\Form\FormInterface;
use Drupal\Core\Block\BlockBase;
use Drupal\rsvp_form\Form\RSVPForm;

/**
 * Provides a 'RSVPBlock' block.
 *
 * @Block(
 *  id = "rsvpblock",
 *  admin_label = @Translation("RSVP Block"),
 * )
 */
class RSVPBlock extends BlockBase {

  /**
   * Get the RSVP form inside the block*
   * {@inheritdoc}
   */
  public function build() {
    $builder = \Drupal::formBuilder();
    $form = $builder->getForm(RSVPForm::class);
    return $form;
  }
}
