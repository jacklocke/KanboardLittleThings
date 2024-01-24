<?php

namespace Kanboard\Plugin\KanboardLittleThings\Controller;

/**
 * Class ConfigController
 *
 * @package Kanboard\Plugin\KanboardLittleThings\Controller
 */
class ConfigController extends \Kanboard\Controller\ConfigController
{
    public function show()
    {
        $this->response->html($this->helper->layout->config('KanboardLittleThings:config/KanboardLittleThings', array(
            'title' => t('Settings').' &gt; '.t('KanboardLittleThings settings'),
        )));
    }

    public function save()
    {
        $values =  $this->request->getValues();
        $values += array('calendar_user_subtasks_time_tracking' => 0);

        if ($this->configModel->save($values)) {
            $this->flash->success(t('Settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }

        $this->response->redirect($this->helper->url->to('ConfigController', 'show', array('plugin' => 'KanboardLittleThings')));
    }
}