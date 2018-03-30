<?php

namespace Drupal\tinypng\Form;

use Drupal\Core\Form\ConfigFormBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures forms module settings.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'tinypng_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'tinypng.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, Request $request = NULL) {
    $config = $this->config('tinypng.settings');
    $form['api_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('API Key'),
      '#default_value' => $config->get('api_key'),
      '#required' => TRUE,
    ];

    $form['on_upload'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Compress on upload'),
      '#default_value' => $config->get('on_upload'),
      '#description' => $this->t('Enable this if you want to compress every uploaded image.'),
    ];

    $form['upload_method'] = [
      '#type' => 'select',
      '#title' => $this->t('Integration Method'),
      '#default_value' => $config->get('upload_method'),
      '#options' => [
        'download' => 'Download',
        'upload' => 'Upload',
      ],
      '#states' => [
        'visible' => [
          '[data-drupal-selector="edit-on-upload"]' => ['checked' => TRUE],
        ],
      ],
      '#description' => $this->t('The download method requires that your site is hosted
       in a server accessible through the internet. The upload method is required
       on localhost.'),
    ];

    $form['image_action'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable TinyPNG image action'),
      '#default_value' => $config->get('image_action'),
      '#description' => $this->t('Define the TinyPNG image action that you can add to any of your image styles.'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->config('tinypng.settings')
      ->set('api_key', $values['api_key'])
      ->set('on_upload', (bool) $values['on_upload'])
      ->set('upload_method', $values['upload_method'])
      ->set('image_action', (bool) $values['image_action'])
      ->save();
  }

}
