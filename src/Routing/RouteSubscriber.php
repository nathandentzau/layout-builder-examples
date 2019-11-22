<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Drupal\layout_builder_examples\Controller\ModalAddSectionController;
use Drupal\layout_builder_examples\Controller\ModalChooseBlockController;
use Drupal\layout_builder_examples\Controller\ModalChooseSectionController;
use Drupal\layout_builder_examples\Controller\ModalMoveBlockController;
use Drupal\layout_builder_examples\Form\ModalAddBlockForm;
use Drupal\layout_builder_examples\Form\ModalConfigureSectionForm;
use Drupal\layout_builder_examples\Form\ModalMoveBlockForm;
use Drupal\layout_builder_examples\Form\ModalRemoveBlockForm;
use Drupal\layout_builder_examples\Form\ModalRemoveSectionForm;
use Drupal\layout_builder_examples\Form\ModalUpdateBlockForm;
use Symfony\Component\Routing\RouteCollection;

/**
 * Provides a route subscriber to alter registered routes.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection): void {
    $route = $collection->get('layout_builder.add_section');
    if ($route) {
      $route->setDefault('_controller', ModalAddSectionController::class . '::build');
    }

    $route = $collection->get('layout_builder.choose_section');
    if ($route) {
      $route->setDefault('_controller', ModalChooseSectionController::class . '::build');
    }

    $route = $collection->get('layout_builder.configure_section');
    if ($route) {
      $route->setDefault('_form', ModalConfigureSectionForm::class);
    }

    $route = $collection->get('layout_builder.remove_section');
    if ($route) {
      $route->setDefault('_form', ModalRemoveSectionForm::class);
    }

    $route = $collection->get('layout_builder.choose_block');
    if ($route) {
      $route->setDefault('_controller', ModalChooseBlockController::class . '::build');
    }

    $route = $collection->get('layout_builder.add_block');
    if ($route) {
      $route->setDefault('_form', ModalAddBlockForm::class);
    }

    $route = $collection->get('layout_builder.update_block');
    if ($route) {
      $route->setDefault('_form', ModalUpdateBlockForm::class);
    }

    $route = $collection->get('layout_builder.remove_block');
    if ($route) {
      $route->setDefault('_form', ModalRemoveBlockForm::class);
    }

    $route = $collection->get('layout_builder.move_block_form');
    if ($route) {
      $route->setDefault('_form', ModalMoveBlockForm::class);
    }

    $route = $collection->get('layout_builder.move_block');
    if ($route) {
      $route->setDefault('_controller', ModalMoveBlockController::class . '::build');
    }
  }

}
