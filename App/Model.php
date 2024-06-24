<?php

/* ------------------------- Add a Model ------------------------ */
/*
Create your model in Models.

Declare it in index.php.

Make sure the functions are protected, not private.

The constructor must call the parent constructor.

In each model, you must instantiate the specific model.
*/

class Model
{
    protected $bd;

    private static $instance=null;

    protected function __construct()
    {
        try {
            $this->bd = new PDO('mysql:host=localhost:3306;dbname=your_database', 'root', 'password');
            $this->bd->query("SET NAMES 'utf8'");
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        } 
        catch (PDOException $e) 
        {
            die('<p>Echec connexion. Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Model();
        }
        return self::$instance;
    }


   
}