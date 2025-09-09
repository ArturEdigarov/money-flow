<?php

    require_once './lips/rb-mysql.php';

    try{
        R::setup( 'mysql:host='. DB_HOST .';dbname='.  DB_NAME .'',
            DB_USER, DB_PASS ); 

        if(!R::testConnection()){
            throw new Exception ('Не удалось установить соединение с базой данных');
        }


    } catch (Exception $e){
        die('Ошибка подключения к баще данных: ' . $e->getMessage());
        
    }


     

      
?>