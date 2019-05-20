<?php

namespace Drupal\rsvp_form\Plugin\Block;

use Drupal\Core\Block\BlockBase;

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
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['rsvpblock']['#markup'] = 'Implement RSVPBlock.';

    return $build;
  }

}
