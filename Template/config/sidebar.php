<li <?= $this->app->checkMenuSelection('ConfigController', 'show', 'KanboardLittleThings') ?>>
    <?= $this->url->link(t('K.Little Things'), 'ConfigController', 'show', ['plugin' => 'KanboardLittleThings']) ?>
</li>