<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Plugin\Layout;

/**
 * Provides a two column example layout.
 *
 * @Layout(
 *   id = "layout_builder_examples.two_column",
 *   label = "Two Column",
 *   path = "layouts/two-column",
 *   template = "two-column",
 *   library = "layout_builder_examples/layout-two-column",
 *   category = "Columns: 2",
 *   default_region = "first",
 *   icon_map = {
 *     {"first", "second"},
 *   },
 *   regions = {
 *     "first" = {
 *       "label" = "First",
 *     },
 *     "second"= {
 *       "label" = "Second",
 *     },
 *   }
 * )
 */
class TwoColumnExampleLayout extends ExampleLayoutBase {

  /**
   * {@inheritdoc}
   */
  protected function getDefaultWidth(): string {
    return self::WIDTH_50_50;
  }

  /**
   * {@inheritdoc}
   */
  protected function getWidths(): array {
    return [
      self::WIDTH_25_75 => $this->t('25% / 75%'),
      self::WIDTH_33_67 => $this->t('33% / 67%'),
      self::WIDTH_50_50 => $this->t('50% / 50%'),
      self::WIDTH_67_33 => $this->t('67% / 33%'),
      self::WIDTH_75_25 => $this->t('75% / 25%'),
    ];
  }

}
