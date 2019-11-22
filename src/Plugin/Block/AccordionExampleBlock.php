<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Plugin\Block;

use Drupal\Component\Utility\Html;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Provides an account example block.
 *
 * @Block(
 *   id = "layout_builder_examples_accordion",
 *   admin_label = @Translation("Accordion"),
 * )
 */
class AccordionExampleBlock extends ExampleBlockBase {

  protected const DEFAULT_FORMAT = 'full_html';

  /**
   * {@inheritdoc}
   */
  public function getDefaultConfiguration(): array {
    $config = parent::getDefaultConfiguration();

    $config['title'] = NULL;
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

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#default_value' => $this->configuration['title'],
      '#required' => TRUE,
    ];

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

    $this->configuration['title'] = $form_state->getValue('title');
    $this->configuration['text'] = $form_state->getValue('text');
  }

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $build = parent::build();

    $container_id = Html::getUniqueId('layout-builder-examples-accordion');
    $build['accordion'] = [
      '#type' => 'container',
    ];

    $build['accordion']['title'] = [
      '#type' => 'link',
      '#url' => Url::fromRoute('<current>'),
      '#title' => $this->configuration['title'],
      '#attributes' => [
        'class' => ['js-layout-builder-examples-accordion'],
        'data-accordion-id' => $container_id,
      ],
    ];

    $build['accordion']['wrapper'] = [
      '#type' => 'container',
      '#attributes' => [
        'id' => $container_id,
        'style' => 'display: none',
      ],
    ];

    $build['accordion']['wrapper']['text'] = [
      '#type' => 'processed_text',
      '#format' => $this->configuration['text']['format'] ?? static::DEFAULT_FORMAT,
      '#text' => $this->configuration['text']['value'] ?? NULL,
    ];

    $build['#attached']['library'][] = 'layout_builder_examples/accordion';

    return $build;
  }

}
