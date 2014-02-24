<?php

class Model_DbTable_Service extends Zend_Db_Table_Abstract{
    protected $_name = 'service';
    
    public function editService($title, $category, $desc, $serviceId, $author, $writeDate, $publDate){
        $date = new DateTime();
        $data = array('title'       => $title,
                      'author'      => $author,
                      'description' => $desc,
                      'write_date'  => strtotime($writeDate),
                      'publ_date'   => strtotime($publDate),
                      'update_date' => $date->getTimestamp()
            );
       
        $where = $this->getAdapter()->quoteInto('id = ?', $serviceId);
        $this->update($data, $where);
    }
    public function getServiceById($serviceId){
        $row = $this->fetchRow($this->select()->where('id = ?', $serviceId));
        if (!$row) {
            return null;
        }else{
        //get array for fetching the data
        $row->toArray();
        return $row;
        }
    }
    public function getCategoryByServiceId($serviceId){
        $array = $this->fetchRow($this->select()->where('id = ?', $serviceId));
        $category = $array['category_id'];
        return $category;
    }
    public function getCategoryService($categoryId){
        $row = $this->fetchRow($this->select()->where('category_id = ?', $categoryId));
        if (!$row) {
            return null;
        }else{
        //get array for fetching the data
        $row->toArray();
        return $row;
        }      
    }
    public function addService($title, $category, $desc, $writeDate, $publDate, $author){
        $date = new DateTime();
        $data = array('title' => $title,
                      'description' => $desc,
                      'category_id' => $category,
                      'write_date'  => strtotime($writeDate),
                      'publ_date'   => strtotime($publDate),
                      'add_date'    => $date->getTimestamp(),
                      'author'      => $author
            );
        $this->insert($data);
    }
    public function removeService($serviceId)
    {
        $where = $this->getAdapter()->quoteInto('id = ?', $serviceId);
        $this->delete($where);
    }
    public function search($name, $addDate, $updateDate, $writeDate, $publDate){
        $result = $this->fetchAll($this->select()->where('title LIKE ?', '%'.$name.'%'));

        return $result->toArray();
    }

    private function getItemById($serviceId){
        $row = $this->fetchRow($this->select()->where('id = ?', $serviceId));
        if (!$row) {
            return null;
        }else{
        //get array for fetching the data
        $row;
        return $row;
        }        
    }
}