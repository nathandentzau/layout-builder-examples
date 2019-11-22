<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides an example block base.
 */
abstract class ExampleBlockBase extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function getDefaultConfiguration(): array {
    return [
      'background_color' => NULL,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state): array {
    $form['background_color'] = [
      '#type' => 'select',
      '#title' => $this->t('Background Color'),
      '#options' => [
        'red' => $this->t('Red'),
        'green' => $this->t('Green'),
        'blue' => $this->t('Blue'),
      ],
      '#empty_option' => $this->t('None'),
      '#default_value' => $this->configuration['background_color'] ?? NULL,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state): void {
    $this->configuration['background_color'] = $form_state->getValue('background_color');
  }

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $build = ['#type' => 'container'];

    $background_color = $this->configuration['background_color'] ?? NULL;
    if ($background_color) {
      $build['#attributes']['style'] = "background-color: {$background_color};";
    }

    return $build;
  }

}
