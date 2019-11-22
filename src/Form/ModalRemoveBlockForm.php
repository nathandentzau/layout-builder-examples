<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Form;

use Drupal\layout_builder\Form\RemoveBlockForm;
use Drupal\layout_builder_examples\Controller\ModalLayoutRebuildTrait;

/**
 * Provides a remove block using modals.
 */
class ModalRemoveBlockForm extends RemoveBlockForm {

  use ModalLayoutRebuildTrait;

}
