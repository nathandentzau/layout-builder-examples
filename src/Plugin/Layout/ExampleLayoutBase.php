<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Plugin\Layout;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Layout\LayoutDefault;
use Drupal\Core\Plugin\PluginFormInterface;
use Drupal\file\Entity\File;

/**
 * Provides an example layout base.
 */
abstract class ExampleLayoutBase extends LayoutDefault implements PluginFormInterface {

  protected const WIDTH_100 = '100';

  protected const WIDTH_25_75 = '25-75';

  protected const WIDTH_33_67 = '33-67';

  protected const WIDTH_50_50 = '50-50';

  protected const WIDTH_67_33 = '67-33';

  protected const WIDTH_75_25 = '75-25';

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration(): array {
    return [
      'background_image' => NULL,
      'background_color' => NULL,
      'width' => $this->getDefaultWidth(),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state): array {
    $form['width'] = [
      '#type' => 'select',
      '#title' => $this->t('Column Widths'),
      '#options' => $this->getWidths(),
      '#default_value' => $this->configuration['width'] ?? $this->getDefaultWidth(),
      '#required' => TRUE,
    ];

    $form['background_color'] = [
      '#type' => 'select',
      '#title' => $this->t('Background Color'),
      '#options' => [
        'pink' => $this->t('Pink'),
        'purple' => $this->t('Purple'),
        'orange' => $this->t('Orange'),
        'yellow' => $this->t('Yellow'),
        'salmon' => $this->t('Salmon'),
      ],
      '#empty_option' => $this->t('None'),
      '#default_value' => $this->configuration['background_color'] ?? NULL,
    ];

    $form['background_image'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Background Image'),
      '#upload_validators' => [
        'file_validate_extensions' => ['png gif jpg jpeg'],
        'file_validate_size' => [16000000],
      ],
      '#upload_location' => 'public://layout_builder_examples',
      '#default_value' => $this->configuration['background_image'] ?? NULL,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state): void {}

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state): void {
    $this->configuration['width'] = $form_state->getValue('width');
    $this->configuration['background_color'] = $form_state->getValue('background_color');
    $this->configuration['background_image'] = $form_state->getValue('background_image');
  }

  /**
   * {@inheritdoc}
   */
  public function build(array $regions): array {
    $build = parent::build($regions);

    $build['#attributes']['class'][] = 'layout--twocol-section--' . $this->configuration['width'];

    $background_color = $this->configuration['background_color'] ?? NULL;
    if ($background_color) {
      $build['#attributes']['style'] = 'background-color: ' . $background_color;
    }

    $background_image = $this->configuration['background_image'][0] ?? NULL;
    if ($background_image) {
      $file = File::load($background_image);
      if ($file) {
        $build['#attributes']['style'] = 'background-image: url(' . $file->createFileUrl() . ')';
      }
    }

    return $build;
  }

  /**
   * Get the default layout width.
   *
   * @return string
   *   The default layout width.
   */
  abstract protected function getDefaultWidth(): string;

  /**
   * Get the available layout widths.
   *
   * @return string[]
   *   The available layout widths.
   */
  abstract protected function getWidths(): array;

}
