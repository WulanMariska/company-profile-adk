<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\SingletonModuleController as BaseModuleController;

class HomePageController extends BaseModuleController
{
    protected $moduleName = 'homePages';

    protected function setUpController(): void
    {
        $this->disablePermalink();
    }

    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            Input::make()
                ->name('title')
                ->label('Judul Beranda')
        );

        $form->add(
            Input::make()
                ->name('description')
                ->label('Deskripsi Beranda')
        );

        return $form;
    }
}
