<?php

class IndexController extends Zend_Controller_Action{
    public function _init(){
      $this->view->addHelperPath('ZendX/JQuery/View/Helper', 'ZendX_JQuery_View_Helper');  
    }
    public function indexAction(){
      $this->_redirect('/index/category-list');
    }
    public function listOfServicesAction(){
      $this->view->title = 'Книги';  
      $this->view->headTitle('Книги', 'APPEND');
      $servicesObj = new Model_ListServices();
      $serviceList = $servicesObj->listServices();
  //   pagination    
      $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($serviceList));
      $paginator->setItemCountPerPage(6)
                ->setCurrentPageNumber($this->getParam('page', 1));
      
      $this->view->paginator = $paginator;
//      $serviceObj = new Model_DbTable_Service();
//
//      $this->view->services = $serviceObj->fetchAll();
     

    }
    public function serviceListByCategoryAction(){
      $categoryId = $_GET['id']; 
    
      $servicesObj = new Model_ListServices();
      $serviceList = $servicesObj->getServiceByCategory($categoryId);
      $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($serviceList));
      $paginator->setItemCountPerPage(9)
                ->setCurrentPageNumber($this->getParam('page', 1));
      
      $this->view->paginator = $paginator;

    }
    
    public function editServiceAction(){
      $this->view->title = 'Редактировать';  
      $this->view->headTitle('Редактировать', 'APPEND');
      $this->view->headScript()->appendFile('/public/js/fck/ckeditor.js');
      $this->view->headScript()->appendFile('/public/js/fck/config.js');
      $this->view->headScript()->appendFile('/public/js/fck/adapters/jquery.js');
      $form = new Form_ServiceForm();
      $this->view->form = $form;
      $serviceObj = new Model_DbTable_Service();
      $serviceId = $_GET['id'];
      
      $request = $this->getRequest();
      if ($request->isPost()) {
        if ($form->isValid($this->_request->getPost())) {
  
            
            $title = $form->getValue('title');
            $author = $form->getValue('author');
            $category = $form->getValue('category');
            $writeDate = $form->getValue('writeDate');
            $publDate = $form->getValue('publDate');
            $desc = $form->getValue('description');
            $serviceObj->editService($title, $category, $desc, $serviceId, $author, $writeDate, $publDate);
            $this->_redirect('/index/description/page/2?id='.$serviceId);
        }
      }else{
         $service = $serviceObj->getServiceById($serviceId);
         $form->getElement('title')->setValue($service['title']);
         $form->getElement('writeDate')->setValue(gmdate("m/d/Y", $service['write_date']));
         $form->getElement('publDate')->setValue(gmdate("m/d/Y", $service['publ_date']));
         $form->getElement('author')->setValue($service['author']);
         $form->getElement('category')->setValue($service['category_id']);
         $form->getElement('description')->setValue($service['description']);
      }  
    }
    public function addServiceAction(){
      $this->view->title = 'Добавление';  
      $this->view->headTitle('Добавление', 'APPEND');

      
      
            
      $categoryObj = new Model_DbTable_Categories();
      $cat =  $categoryObj->fetchAll();
      $cat = $cat->toArray();
      $this->view->cat = $cat;


      
      $form = new Form_ServiceForm();
      $this->view->form = $form;
      $serviceObj = new Model_DbTable_Service();
      $request = $this->getRequest();
      if ($request->isPost()) {
        if ($form->isValid($this->_request->getPost())) {
            $title = $form->getValue('title');
            $writeDate = $form->getValue('writeDate');
            $author = $form->getValue('author');
            $publDate = $form->getValue('publDate');
            $category = $form->getValue('category');
            $desc = $form->getValue('description');
            $serviceObj->addService($title,  $category, html_entity_decode($desc), $writeDate, $publDate, $author);
            $this->_redirect('/index/add-service');
        }
      }   
    }
    public function descriptionAction(){

      $serviceId = $_GET['id'];

      
      $serviceObj = new Model_DbTable_Service();
      $service = $serviceObj->getServiceById($serviceId);
      $serviceCategory = $serviceObj->getCategoryByServiceId($serviceId);
      
      $this->view->serviceCategory = $serviceCategory;
      $this->view->service = $service;
      $this->view->title = $service['title'];  
      $this->view->headTitle($service['title'], 'APPEND');
      
    }
    public function removeServiceAction(){
      $this->view->title = 'Удаление книги';  
      $this->view->headTitle('Удаление книги', 'APPEND');
      $serviceId = $_GET['id'];
      $serviceObj = new Model_DbTable_Service();
      $serviceObj->removeService($serviceId);
      $this->_redirect('/service/list-of-services/');
    }
    
    public function categoryListAction(){
      $this->view->title = 'Полки';  
      $this->view->headTitle('Полки', 'APPEND');

        //   pagination 


      $categoryObj = new Model_ListCategories();
      $categoryList = $categoryObj->listCategories();
      
   
      $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($categoryList));
      $paginator->setItemCountPerPage(6)
                ->setCurrentPageNumber($this->getParam('page', 1));
      
      $this->view->paginator = $paginator; 
      

    }
    public function addCategoryAction(){
      $this->view->title = 'Новая полка';  
      $this->view->headTitle('Новая полка', 'APPEND'); 
      //print_r(date("d-m-Y"));exit;
      $form = new Form_CategoryForm();
      $this->view->form = $form;
      $categoryObj = new Model_DbTable_Categories();
      $request = $this->getRequest();
      if($request->isPost()){
          if($form->isValid($this->_request->getPost())){
              $title = $form->getValue('title');
             
              $desc = $form->getValue('description');
              $categoryObj->addCategory($title, $desc);
              
              $this->_redirect('/service/add-category');
          }
      }
    }
    public function editCategoryAction(){
      $this->view->title = 'Редактировать полку';  
      $this->view->headTitle('Редактировать полку', 'APPEND');  
      
      

      $categoryObj = new Model_DbTable_Categories();
      $categoryId = $_GET['id'];
      
      $form = new Form_CategoryForm();
      $this->view->form = $form;
      $request = $this->getRequest();
      if($request->isPost()){
          if($form->isValid($this->_request->getPost())){
              $category = $categoryObj->getCategoryById($categoryId);
              $title = $form->getValue('title');
              $desc = $form->getValue('description');
              $categoryObj->editCategory($category['id'], $title, $desc);
              
              $this->_redirect('/service/category-list');              
          }
      }else{
          $category = $categoryObj->getCategoryById($categoryId);
          $form->getElement('title')->setValue($category['title']);
          $form->getElement('category_image')->setValue($category['category_image']);
          $form->getElement('description')->setValue($category['desc']);
          
      }
    }
    public function removeCategoryAction(){
      $categoryId = $_GET['id'];  
      $categoryObj = new Model_DbTable_Categories();
         
      $categoryObj->removeCategoty($categoryId);
      $this->_redirect('/service/category-list');
    }
    
    private function getServiceId($service){
        $serviceObj = new Model_DbTable_Service();
        $servisce = $serviceObj->getServiceById($service);
        return $service['id'];
    }
    
}
