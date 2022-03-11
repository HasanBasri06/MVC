<?php 

    namespace App\Models\Database;

    use App\Result\SuccessResult;
    use Exception;

    class CrudRepository{

        private static $tableName;
        private static $whereMethod;


        public static function table($tableName){
            self::$tableName = $tableName;
            
        }

        public static function save($args){

            $tableName = self::$tableName;
            
            echo "SELECT * FROM {$tableName}";


        }

        public static function delete($args)
        {

            

            $tableName = self::$tableName;
            $sql = "DELETE FROM {$tableName} WHERE {$args[0]} = :{$args[0]}";

            $is_have = "SELECT * FROM {$tableName} WHERE {$args[0]} = :{$args[0]}";
            $is_have_query = Connect::connect()->prepare($is_have);
            $is_have_query->bindParam($args[0], $args[1]);
            
            $is_have_query->execute();

            $isHave = $is_have_query->fetchAll(\PDO::FETCH_ASSOC);
            $result = array();


            if(!empty($isHave[0][$args[0]])){

                
                $query = Connect::connect()->prepare($sql);
                $query->bindParam($args[0], $args[1]);
                
                $execute = $query->execute();

                $succesResult = (new SuccessResult)->resultMessage("Kulanıcı başarıyla silindi");

                array_push($result, $succesResult);                
                
            }
            else{
                throw new Exception("olmayan bir değer silinmek istiyor");
            }

            return $result;
                


        }

        public static function findAll()
        {

            $result = array();

            $tableName = self::$tableName;

            $sql = "SELECT * FROM {$tableName}";

            $query = Connect::connect()->query($sql);
            $data = $query->fetchAll(\PDO::FETCH_ASSOC);

            if(!empty($data)){
                $succesResult = (new SuccessResult)->resultMessage("Kullanıcılar başarıyla getirildi");
                array_push($result, $succesResult, $data);
            }
            else{
                $errorResult = (new SuccessResult)->resultMessage("Kullanıcılar getirilirken bir hata oluştu");
                array_push($result, $errorResult);
            }

            return $result;


        }

        public static function update($args)
        {

            $result = array();

            $tableName = self::$tableName;

            
            $whereMethod = self::$whereMethod;
            $sql = "UPDATE {$tableName} SET {$args[0]} = :{$args[0]} WHERE {$whereMethod[0]} = :{$whereMethod[0]}";
            $query = Connect::connect()->prepare($sql);
            $query->bindParam($args[0], $args[1]);
            $query->bindParam($whereMethod[0], $whereMethod[1]);
            $data = $query->execute();

            if(!empty($data)){
                $succesResult = (new SuccessResult)->resultMessage("Kullanıcının ismi değiştirildi");
                array_push($result, $succesResult);
            }
            else{
                $errorResult = (new SuccessResult)->resultMessage("Kullanıcı verisi değiştirildi");
                array_push($result, $errorResult);
            }

            return $result;

        }

        public static function where($args)
        {
            self::$whereMethod = $args;
        }

    }