<?php

class SearchController extends Zend_Controller_Action{

    public function _init(){
        
    }
    public function indexAction(){
      $this->view->title = 'Поиск';  
      $this->view->headTitle('Поиск', 'APPEND');
      $form = new Form_SearchForm();
      $this->view->form = $form;
    }
    public function searchingAction(){
      $request = $this->getRequest();
      if($request->isPost()){
          $name = $request->getParam('name');
          $author = $request->getParam('author');
          $addDateSince = $request->getParam('addDateSince');
          $addDateTo = $request->getParam('addDateTo');
          $updateDateSince = $request->getParam('updateDateSince');
          $updateDateTo = $request->getParam('updateDateTo');
          $writeDateSince = $request->getParam('writeDateSince');
          $writeDateTo = $request->getParam('writeDateTo');
          $publDateSince = $request->getParam('publDateSince');
          $publDateTo = $request->getParam('publDateTo');
  
      }

      $servicesObj = new Model_ListServices();
      $searchList = $servicesObj->search($name, $author, strtotime($addDateSince), strtotime($addDateTo), strtotime($updateDateSince), strtotime($updateDateTo), strtotime($writeDateSince), strtotime($writeDateTo), strtotime($publDateSince), strtotime($publDateTo));
      $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($searchList));
      $paginator->setItemCountPerPage(6)
                ->setCurrentPageNumber($this->getParam('page', 1));    
          
      $this->view->paginator = $paginator;
             

    }

}