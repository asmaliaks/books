<?php
class Model_LibraryAcl extends Zend_Acl{
    public function __construct(){
       $this->add(new Zend_Acl_Resource('item'));       
       $this->add(new Zend_Acl_Resource('add'),'item');       
       $this->add(new Zend_Acl_Resource('edit'),'item');       
       $this->add(new Zend_Acl_Resource('remove'),'item'); 
       
        $this->add(new Zend_Acl_Resource('error'));
//        $this->add(new Zend_Acl_Resource('error'),'error');
       

       
       $this->add(new Zend_Acl_Resource('feedback'));
       $this->add(new Zend_Acl_Resource('feedback-list'), 'feedback');
       $this->add(new Zend_Acl_Resource('new-feedback'), 'feedback');
       $this->add(new Zend_Acl_Resource('remove-feedback'), 'feedback');
       
       $this->add(new Zend_Acl_Resource('items'));
       $this->add(new Zend_Acl_Resource('gallery-items'),'items');
       $this->add(new Zend_Acl_Resource('edit-gallery-item'),'items');
       $this->add(new Zend_Acl_Resource('remove-gallery-item'),'items');
       $this->add(new Zend_Acl_Resource('add-gallery-item'),'items');
       
       $this->add(new Zend_Acl_Resource('index'));
       $this->add(new Zend_Acl_Resource('list-of-services'), 'index');
       $this->add(new Zend_Acl_Resource('edit-service'), 'index');
       $this->add(new Zend_Acl_Resource('add-service'), 'index');
       $this->add(new Zend_Acl_Resource('description'), 'index');
       $this->add(new Zend_Acl_Resource('category-list'), 'index');
       $this->add(new Zend_Acl_Resource('service-list-by-category'), 'index');
       $this->add(new Zend_Acl_Resource('edit-category'), 'index');
       $this->add(new Zend_Acl_Resource('remove-category'), 'index');
       $this->add(new Zend_Acl_Resource('add-category'), 'index');
       
        $this->add(new Zend_Acl_Resource('search'));
        $this->add(new Zend_Acl_Resource('searching'), 'search');
       
       $this->add(new Zend_Acl_Resource('authentication'));
       $this->add(new Zend_Acl_Resource('log-in'), 'authentication');
       $this->add(new Zend_Acl_Resource('log-out'), 'authentication');
       $this->add(new Zend_Acl_Resource('google-auth'), 'authentication');
       
       $this->addRole(new Zend_Acl_Role('guest'));

       
       $this->allow('guest', 'items', 'gallery-items');
       $this->allow('guest', 'index');
       $this->allow('guest', 'index', 'list-of-services');
       $this->allow('guest', 'index', 'description');
       $this->allow('guest', 'index', 'category-list');
       $this->allow('guest', 'index', 'service-list-by-category');


       $this->allow('guest', 'authentication', 'log-in');
       $this->allow('guest', 'search');
       $this->allow('guest', 'search', 'searching');

       $this->allow('guest', 'index', 'add-service');
       $this->allow('guest', 'index', 'edit-service');
       $this->allow('guest', 'index', 'remove-service');
       $this->allow('guest', 'index', 'edit-category');
       $this->allow('guest', 'index', 'remove-category');
       $this->allow('guest', 'index', 'add-category');
       

    }
}