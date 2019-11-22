<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Form;

use Drupal\layout_builder\Form\MoveBlockForm;
use Drupal\layout_builder_examples\Controller\ModalLayoutRebuildTrait;

/**
 * Provides a move block form using modals.
 */
class ModalMoveBlockForm  extends MoveBlockForm {

  use ModalLayoutRebuildTrait;

}
