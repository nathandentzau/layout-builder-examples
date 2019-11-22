<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Form;

use Drupal\layout_builder\Form\UpdateBlockForm;
use Drupal\layout_builder_examples\Controller\ModalLayoutRebuildTrait;

/**
 * Provides an update block form using modals.
 */
class ModalUpdateBlockForm extends UpdateBlockForm {

  use ModalLayoutRebuildTrait;

}
