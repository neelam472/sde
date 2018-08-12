<?php

/**
 * @file
 * Contains \Drupal\site_apikey\Controller\SiteApikeyController
 */

namespace Drupal\site_apikey\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;

class SiteApikeyController extends ControllerBase {

    /**
     * action accessChecker
     *
     * Provides route responses on uri http://drupal_8.local/page_json/apikey/nid
     * 
     * @return array
     */
    public function accessChecker($apikey, NodeInterface $page_node) {
        $siteapikey = \Drupal::config('system.site')->get('siteapikey');
        if ($apikey === $siteapikey) {
            if (!is_object($page_node)) {   
                echo t('Problem in Content loading ...!');
                die();
            }
            if ($page_node->getType() === 'page') {
                $serializer = \Drupal::service('serializer');
                $node_jsondata = $serializer->serialize($page_node, 'json', ['plugin_id' => 'entity']);
                echo $node_jsondata;
                die();
            }
            echo t('Acess Denied');
            die();
        }
        echo t('Access Denied!');
        die();
    }

    /**
     * {@inheritdoc}
     */
    public function site_apikey_form_submit($form, \Drupal\Core\Form\FormStateInterface $form_state) {
        $site_apikey_setting = $form['site_information']['siteapikey']['#value'] ? $form['site_information']['siteapikey']['#value'] : t('No API Key yet');
        \Drupal::configFactory()->getEditable('system.site')->set('siteapikey', $site_apikey_setting)->save();
    }

}
