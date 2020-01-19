<?php
use application\models\MainModel;
use application\core\View;

class MainController
{
    public function actionMain()
    {
        View::requireTemp( "main", [
            'Vue_href_dev' => 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js',
            'title' => 'Grappy',
            'it_work' => 'it work',
            'h1' => 'Grappy',
            'version' => '0.2.3',
            'db_data' => MainModel::WorkWithDb()
        ], $cache = true );

        return true;
    }
}
