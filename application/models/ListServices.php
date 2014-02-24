<?php

class Model_ListServices {
    
    public function listServices(){
       $db = Zend_Db_Table::getDefaultAdapter();
       $selectServices = new Zend_Db_Select($db);
       $selectServices->from('service')->order('id');
       
       return $selectServices;
    }
    public function getServiceByCategory($categoryId){
        $db = Zend_Db_Table::getDefaultAdapter();
        $selectCategoryServices = new Zend_Db_Select($db);
        $selectCategoryServices->from('service')->where('category_id = ?', $categoryId)->order('id DESC');
        
        return $selectCategoryServices;
    }    
    public function search($name, $author, $addDateSince, $addDateTo, $updateDateSince, $updateDateTo, $writeDateSince, $writeDateTo, $publDateSince, $publDateTo){

       $date = new DateTime();
       if($name){
           $nameQuery = "title LIKE '%$name%' AND";
       }else{
           $nameQuery = NULL;
       }
       if($author){
            $authorQuery = "author LIKE '%$author%' AND ";
       }else{
           $authorQuery = NULL; 
       }       
       if(!$addDateSince){
           $addDateSince = NULL;
       } 
       if (!$addDateTo) {
           $addDateTo = $date->getTimestamp();
       }
       if (!$updateDateSince){
           $updateDateSince = NULL;
       }
       if (!$updateDateTo){
           $updateDateTo = $date->getTimestamp();
       }
       if (!$writeDateSince){
           $writeDateSince = NULL;
       }
       if (!$writeDateTo){
           $writeDateTo = $date->getTimestamp();
       }
       if (!$publDateSince){
           $publDateSince = NULL;
       }
       if (!$publDateTo){
           $publDateTo = $date->getTimestamp();
       }
        $db = Zend_Db_Table::getDefaultAdapter();
        $searchBook = new Zend_Db_Select($db);

        $where = "$nameQuery $authorQuery write_date BETWEEN '$writeDateSince' AND '$writeDateTo' AND publ_date BETWEEN '$publDateSince' AND '$publDateTo' AND update_date BETWEEN '$updateDateSince' AND '$updateDateTo' AND add_date BETWEEN '$addDateSince' AND '$addDateTo'";

        $searchBook->from('service')->where($where)->order('title DESC');

        return $searchBook;

      
    }
}