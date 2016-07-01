<?php
function dbCnct(){
    try{
        $db = include"config.php";
        if(!isset($db['dbconf'])){
            throw new \InvalidArgumentException("Não existe configuração com o banco.");
        }
        $host =(isset($db['dbconf']['host']))?$db['dbconf']['host']:NULL;
        $dbase = (isset($db['dbconf']['dbname']))?$db['dbconf']['dbname']:NULL;
        $user = (isset($db['dbconf']['user']))?$db['dbconf']['user']:NULL;
        $password =(isset($db['dbconf']['password']))?$db['dbconf']['password']:NULL;
        return new \PDO("mysql:host={$host};dbname={$dbase};charset=utf8",$user, $password);

    }catch(\PDOException $e){
        echo $e->getMessage() . "\n";
        echo $e->getTraceAsString() . "\n";
    }
}