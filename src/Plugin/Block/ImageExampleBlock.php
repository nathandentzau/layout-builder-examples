<?php

declare(strict_types = 1);

namespace Drupal\layout_builder_examples\Plugin\Block;

use Drupal\Core\Form\FormStateInterface;
use Drupal\file\Entity\File;

/**
 * Provides an image example block.
 *
 * @Block(
 *   id = "layout_builder_examples_image",
 *   admin_label = "Image",
 * )
 */
class ImageExampleBlock extends ExampleBlockBase {

  /**
   * {@inheritdoc}
   */
  public function getDefaultConfiguration(): array {
    $config = parent::getDefaultConfiguration();

    $config['image'] = NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state): array {
    $form = parent::blockForm($form, $form_state);

    $form['image'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Image'),
      '#upload_validators' => [
        'file_validate_extensions' => ['png gif jpg jpeg'],
        'file_validate_size' => [16000000],
      ],
      '#upload_location' => 'public://layout_builder_examples',
      '#default_value' => $this->configuration['image'] ?? NULL,
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state): void {
    parent::blockSubmit($form, $form_state);

    $this->configuration['image'] = $form_state->getValue('image');
  }

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $build = parent::build();

    $file = File::load($this->configuration['image'][0]);
    if (!$file) {
      return [];
    }

    $build['image'] = [
      '#theme' => 'image',
      '#uri' => $file->getFileUri(),
    ];

    return $build;
  }

}
