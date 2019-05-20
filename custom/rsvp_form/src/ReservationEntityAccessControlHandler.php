<?php

namespace Drupal\rsvp_form;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Reservation entity.
 *
 * @see \Drupal\rsvp_form\Entity\ReservationEntity.
 */
class ReservationEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\rsvp_form\Entity\ReservationEntityInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished reservation entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published reservation entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit reservation entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete reservation entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add reservation entities');
  }

}
