<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Plugin\Block;

use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a text example block.
 *
 * @Block(
 *   id = "layout_builder_examples_text",
 *   admin_label = @Translation("Text"),
 * )
 */
class TextExampleBlock extends ExampleBlockBase {

  protected const DEFAULT_FORMAT = 'full_html';

  /**
   * {@inheritdoc}
   */
  public function getDefaultConfiguration(): array {
    $config = parent::getDefaultConfiguration();

    $config['text'] = [
      'value' => NULL,
      'format' => static::DEFAULT_FORMAT,
    ];

    return $config;
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state): array {
    $form = parent::blockForm($form, $form_state);

    $form['text'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Text'),
      '#format' => $this->configuration['text']['format'] ?? static::DEFAULT_FORMAT,
      '#default_value' => $this->configuration['text']['value'] ?? NULL,
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state): void {
    parent::blockSubmit($form, $form_state);

    $this->configuration['text'] = $form_state->getValue('text');
  }

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $build = parent::build();

    $build['text'] = [
      '#type' => 'processed_text',
      '#format' => $this->configuration['text']['format'] ?? static::DEFAULT_FORMAT,
      '#text' => $this->configuration['text']['value'] ?? NULL,
    ];

    return $build;
  }

}
