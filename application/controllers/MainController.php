<?php
use application\components\Log;
use application\models\MainModel;
use application\core\View;

class MainController
{
    public function actionMain()
    {
        try {
            View::requireTemp("main", [
                'Vue_href_dev' => 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js',
                'title' => 'Grappy',
                'it_work' => 'it work',
                'h1' => 'Grappy',
                'version' => getenv('APP_V'),
                'db_data' => MainModel::WorkWithDb()
            ], $cache = true);
        } catch ( Exception $e ) {
            if ( getenv( 'APP_DEBUG' == true ) )
            {
                Log::debugLogger( 'DEBUG', 'Error with temp main.html', [
                    'URL' => $_SERVER['REQUEST_URI']
                ] );
            } else {
                throw new Exception ( 'Error with temp main.html' . $e->getMessage(), 1 );
            }
        }

        return true;
    }
}
