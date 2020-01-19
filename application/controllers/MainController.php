<?php
use application\models\MainModel;
use application\core\View;

class MainController
{
    public function actionMain()
    {
        View::requireTemp("main", [
            'Vue_href_dev' => 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js',
            'title' => 'Grappy',
            'it_work' => 'it work',
            'h1' => 'Grappy',
            'version' => getenv( 'APP_V' ),
            'db_data' => MainModel::WorkWithDb()
        ], $cache = true );
        return true;
    }
}
