# Lamantin
🐘MVC Framework🐘

# DOCS:
* # Instalation
  * ```shell script 
    git clone https://github.com/jolydev24/Lamantin.git
  * At the root of the project folder: 
    ```shell script
      composer install --ignore-platform-reqs
    ```
  * if when you try to open the site you have an error loading classes then: 
      ```shell script
        composer dump-autoload --optimize
      ```
  * Clone Lanatin frontend **(https://github.com/jolydev24/lamantin-frontend.git)** and repack in / project
  
* # Work with Lamantin
  * ### bit of theory:
    >All you need to work is Bootstrap.php **(/app/core/Bootstrap.php)**, Controllers **(/app/http/controllers/)** and Models **(/app/models)**
  * ### Practice
    #### To create your page you need:
    * >Place your html file in **/public/views/**
    * >Go to Bootstrap.php **(/app/core/Bootstrap.php)** and write in the ```routes()``` method: 
    ```php
    $this->router->any('/you_url', function(){
        return (new YouControllerName())->youName();
    });
    ```
    
    If you create new Controller **(/app/http/controllers/YouControllerName.php)**, when write to the controller:
    ```php
       namespace Lamantin\App\Http\Controllers;
       
       use Lamantin\App\Core\View;
       
       class YouControllerName
       {
           //Action name which you wrote in Bootstrap.php ( return (new YouControllerName())->name() )
           public function youName()
           {
               // Render you html file which you place at /public/views/
               View::render("you_file_name", [
                    'something' => 'something-value'
               ]);
           }
       }
    ```
    If you don't create new controller, when choose controller **(/app/http/controllers)** and write this code:
    ```php
       public function youName()
       {
           // Render you html file which you place at /public/views/
           View::render("you_file_name", [
                'something' => 'something-value'
           ]); 
       }
    ```