<?php

class Form_CategoryForm extends Zend_Form{
    
   public function __construct($option = null) {
   parent::__construct($option);
 
   $this->setName('category');
   
   $title = new Zend_Form_Element_Text('title');
   $title->setLabel('Название категории')
         ->setRequired();
   
   $desc = new Zend_Form_Element_Textarea('description');
   $desc->setLabel('Краткое описание')
        ->setRequired(true);
   
           
   

   
   $submit = new Zend_Form_Element_Submit('submit');
   $submit->setLabel('Сохранить')
          ->setAttrib('class', 'button2');
   
   $this->addElements(array($title, $desc, $submit));
   $this->setMethod('post');
   
   
        
        
    }
}
