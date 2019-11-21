<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Plugin\Layout;

/**
 * Provides a one column example layout.
 *
 * This plugin is registered using layout_builder_examples.layouts.yml.
 */
class OneColumnExampleLayout extends ExampleLayoutBase {

  /**
   * {@inheritdoc}
   */
  protected function getDefaultWidth(): string {
    return self::WIDTH_100;
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidths(): array {
    return [self::WIDTH_100 => $this->t('100%')];
  }

}
