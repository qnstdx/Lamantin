<?php
use application\models\MainModel;
use application\core\View;

class MainController
{
    public function actionMain()
    {
        View::requireTemp ( "main" );
        MainModel::WorkWithDb ();
        return true;
    }
}
