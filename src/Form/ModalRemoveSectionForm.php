<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Form;

use Drupal\layout_builder\Form\RemoveSectionForm;
use Drupal\layout_builder_examples\Controller\ModalLayoutRebuildTrait;

/**
 * Provides a remove section form using modals.
 */
class ModalRemoveSectionForm extends RemoveSectionForm {

  use ModalLayoutRebuildTrait;

}
