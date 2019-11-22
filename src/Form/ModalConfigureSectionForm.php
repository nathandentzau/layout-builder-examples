<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\CloseDialogCommand;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Form\FormStateInterface;
use Drupal\layout_builder\Form\ConfigureSectionForm;
use Drupal\layout_builder\SectionStorageInterface;
use Drupal\layout_builder_examples\Controller\ModalLayoutRebuildTrait;

/**
 * Provides a configure section form using modals.
 */
class ModalConfigureSectionForm extends ConfigureSectionForm {

  use ModalLayoutRebuildTrait;

}
