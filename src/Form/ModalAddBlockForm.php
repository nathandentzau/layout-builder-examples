<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Form;

use Drupal\layout_builder\Form\AddBlockForm;
use Drupal\layout_builder_examples\Controller\ModalLayoutRebuildTrait;

/**
 * Provides an add block form using modals.
 */
class ModalAddBlockForm extends AddBlockForm {

  use ModalLayoutRebuildTrait;

}
