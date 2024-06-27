## MVC Skeleton (PHP mySQL)

This is a skeleton for an MVC php website with a mySQL database.

> Feel free to use it and share with your friends ! 😊
&nbsp;  
> Add a star to help me gain visibility ⭐

You can add any Model or Controller you need. Just remember to declare it in the router (`index.php`).

The Security Controller and Model already contain login and register functions. 
You can modify them to fit your requirements 
(the $_SESSION values are affected in the login View).

The folder App contains the base Model & Controller.
The database connection is configured in the base Model.

### To create child Model :

A child Model extends the base Model.

Copy/paste the following code to create a child Model

```php
class ChildModel extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new ChildModel();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }


    public function get_function_in_child_model()
    {

        try {
            $requete = $this->bd->prepare('SELECT * FROM your_table');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

}
```

The Model returns a response with an array of objects.


### To create a child Controller

A child Controller extends the base Controller
Its name must contains "Controller_xxx"

```php

<?php

class Controller_ChildController extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }


    public function action_name_of_your_action()
    {
        $m=ChildModel::get_model();
        $data=['anything'=>$m->get_function_in_child_model()];
        $this->render("your_view",$data);
    }


}
```

The chld Controller must have an action default, don't erase it !

In the Controller, you call any function form any Model you want (ChildModel or another one)
The data is sent in the View with the $data variable, you can choose its name with "anything".

### In Views

In the HTML code, you can call an action with the folowing syntax :

```HTML
<a href="?controller=ChildController&action=name_of_your_action">Your action</a>
```

Feel free to contact me for more informations ! 😄
