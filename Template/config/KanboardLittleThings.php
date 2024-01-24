<div class="page-header">
    <h2><?= t('Little Things Settings') ?></h2>
</div>
<form method="post" action="<?= $this->url->href('ConfigController', 'save', array('plugin' => 'KanboardLittleThings')) ?>" autocomplete="off">

    <?= $this->form->csrf() ?>

    <fieldset>
        <legend><?= t('Legend in sidebar') ?></legend>
        <?= $this->form->radios('klittlethings_legend', array(
                'Legend' => t('Enabled'),
                'noLegend' => t('Disabled'),
            ),
            $values
        ) ?>
    </fieldset>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue"><?= t('Save') ?></button>
    </div>
</form>