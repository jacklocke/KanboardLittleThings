<?php

namespace Kanboard\Plugin\KanboardLittleThings;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
// use Kanboard\Plugin\KanboardLittleThings\Helper\MyHelper;  // Helper Class and Filename should be exact
// use Kanboard\Helper;  // Add core Helper for using forms etc. inside external templates

class Plugin extends Base
{
    public function initialize()
    {
        // Template Override
        //  - Override name should be camelCase e.g. KanboardLittleThings
        //$this->template->setTemplateOverride('action/index', 'KanboardLittleThings:action/index');

        // CSS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:css', array('template' => 'plugins/KanboardLittleThings/Assets/css/KanboardLittleThings.css'));

        // JS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:js', array('template' => 'plugins/KanboardLittleThings/Assets/js/KanboardLittleThings.js'));

        // Views - Template Hook
        //  - Override name should start lowercase e.g. KanboardLittleThings
        //$this->template->hook->attach('template:project-header:view-switcher-before-project-overview', 'KanboardLittleThings:project_header/actions');

        // Views - Add Menu Item - Template Hook
        //  - Override name should start lowercase e.g. KanboardLittleThings
        //  - Example for menu item in kanboard settings page: $this->template->hook->attach('template:config:sidebar', 'KanboardLittleThings:config/sidebar');
        $this->template->hook->attach('template:config:sidebar', 'KanboardLittleThings:config/sidebar');


        //get the value of the setting
        $show_legend = $this->configModel->get('klittlethings_legend');

        if($show_legend != 'noLegend') {
            $this->template->hook->attach('template:dashboard:sidebar', 'KanboardLittleThings:dashboard/sidebar');
            $this->template->hook->attach('template:task:sidebar:actions', 'KanboardLittleThings:task/sidebar');
        }


        // Extra Page - Routes
        //  - Example: $this->route->addRoute('/my/custom/route', 'MyController', 'show', 'KanboardLittleThings');
        //  - Must have the corresponding action in the matching controller
        //$this->route->addRoute('/ / ', ' ', ' ', 'KanboardLittleThings');
        //$this->route->addRoute('KanboardLittleThings/:project_id', 'TaskThingController', 'show', 'plugin');

        // Helper
        //  - Example: $this->helper->register('helperClassNameCamelCase', '\Kanboard\Plugin\KanboardLittleThings\Helper\HelperNameExampleStudlyCaps');
        //  - Add each Helper in the 'use' section at the top of this file
        //$this->helper->register('myHelper', '\Kanboard\Plugin\KanboardLittleThings\Helper\MyHelper');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getPluginName()
    {
        return 'KanboardLittleThings';
    }

    public function getPluginDescription()
    {
        return t('some little things for a better daily experience');
    }

    public function getPluginAuthor()
    {
        return '';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getCompatibleVersion()
    {
        // Examples: '>=1.0.37' '<1.0.37' '<=1.0.37'
        return '>=1.2.32';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/jacklocke/KanboardLittleThings';
    }
}
