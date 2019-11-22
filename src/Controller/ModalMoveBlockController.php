<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Controller;

use Drupal\layout_builder\Controller\MoveBlockController;

/**
 * Provides a move block controller using modals.
 */
class ModalMoveBlockController extends MoveBlockController {

  use ModalLayoutRebuildTrait;

}
