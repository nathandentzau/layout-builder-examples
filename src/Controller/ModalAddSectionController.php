<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\CloseDialogCommand;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\layout_builder\Controller\AddSectionController;
use Drupal\layout_builder\SectionStorageInterface;
use Drupal\layout_builder_examples\Controller\ModalLayoutRebuildTrait;

/**
 * Provides a add section controller using modals.
 */
class ModalAddSectionController extends AddSectionController {

  use ModalLayoutRebuildTrait;

}
