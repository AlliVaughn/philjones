<?php
namespace Drupal\shc_migrate_change_club\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\MapArray;


class QualtricsSettingsForm extends ConfigFormBase {

    /**
    *array An array of configuration object names that are editable
	*/
   protected function getEditableConfigNames() {
   return ['shc_migrate_change_club.credentials'];
  }

   public function getFormID() {
    return 'qualtrics_settings_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('shc_migrate_change_club.credentials');  //since we are extending ConfigFormBase instaad of FormBase, it gives use access to the config object
    $form['api_token'] = array(
      '#type' => 'textfield',
      '#description' => t('API Token'),
      '#title' => t('API Token'),
      '#default_value' => $config->get('api_token'),
    );
    $form['data_center'] = array(
      '#type' => 'textfield',
      '#description' => t('Data Center'),
      '#title' => t('Data Center'),
      '#default_value' => $config->get('data_center'),
    );
    $form['survey_id'] = array(
      '#type' => 'textfield',
      '#description' => t('Survey ID'),
      '#title' => t('Survey ID'),
      '#default_value' => $config->get('survey_id'),
    );
    return parent::buildForm($form,$form_state);
  }

  /**
   * Form submission handler.
   *
   *  $form -> An associative array containing the structure of the form.
   *  $form_state -> An associative array containing the current state of the form.
   */

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('shc_migrate_change_club.credentials')
      ->set('api_token', $form_state->getValue('api_token'))
      ->set('data_center', $form_state->getValue('data_center'))
      ->set('survey_id', $form_state->getValue('survey_id'))
      ->save();
  }
}
