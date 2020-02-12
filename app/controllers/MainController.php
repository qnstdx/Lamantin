<?php
use Grappy\App\Components\GrappyLogger;
use Grappy\App\Models\MainModel;
use Grappy\App\Core\View;

class MainController
{
    public function actionMain()
    {
        //Рендерим вьюшку, передав нужные параметры
        View::renderTemp("main", [
            'Vue_href_dev' => 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js',
            'title' => 'Grappy',
            'it_work' => 'it work',
            'h1' => 'Grappy',
            'version' => getenv('APP_V')
            /*'db_data' => $data*/
        ], $cache = true );

        return true;
    }
}
