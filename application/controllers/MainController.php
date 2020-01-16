<?php
use application\models\MainModel;
use application\core\View;

class MainController
{
    public function actionMain()
    {
        View::requireTemp ( "main", [
            'it_work' => 'it work'
        ] );
        MainModel::WorkWithDb ();

        return true;
    }
}
