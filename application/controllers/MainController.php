<?php
use application\components\GrappyLogger;
use application\models\MainModel;
use application\core\View;

class MainController
{
    public function actionMain()
    {
        //Подключаемся к базе данных
        $db = new MainModel( getenv( 'DB_HOST' ), getenv( 'DB_DATABASE' ), getenv( 'DB_USERNAME' ), getenv( 'DB_PASSWORD' ) );

        //Выполняем запрос
        $data = $db->db->query( "SELECT * FROM grappy.foo" );

        //Рендерим вьюшку, передав нужные параметры
        View::renderTemp("main", [
            'Vue_href_dev' => 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js',
            'title' => 'Grappy',
            'it_work' => 'it work',
            'h1' => 'Grappy',
            'version' => getenv('APP_V'),
            'db_data' => $data
        ], $cache = false );

        return true;
    }
}
