<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Controller;

use Drupal\layout_builder\Controller\ChooseSectionController;
use Drupal\layout_builder\SectionStorageInterface;

/**
 * Provides a choose section controller using modals.
 */
class ModalChooseSectionController extends ChooseSectionController {

  /**
   * {@inheritdoc}
   */
  public function build(SectionStorageInterface $section_storage, $delta) {
    $build = parent::build($section_storage, $delta);

    foreach ($build['layouts']['#items'] as &$item) {
      $item['#attributes']['data-dialog-type'] = 'modal';
      unset($item['#attributes']['data-dialog-renderer']);
    }

    return $build;
  }

}
