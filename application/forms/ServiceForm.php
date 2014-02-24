<?php

class Form_ServiceForm extends Zend_Form
{
        public function __construct($option = null) {
        parent::__construct($option);
        
        $this->setName('service');
    
        $title = new Zend_Form_Element('title');
        $title->setLabel('Название')
               ->setRequired()
               ->addErrorMessage('Поле обязательно для заполнения');
        
        $author = new Zend_Form_Element('author');
        $author->setLabel('Автор')
               ->setRequired()
               ->addErrorMessage('Поле обязательно для заполнения');
 
        $writeDate = new Zend_Form_Element_Text('writeDate');
        $writeDate->setLabel('Дата Написания')
                  ->setRequired(true)
                  ->addErrorMessage('Укажите дату написания')
                  ->setAttrib('id', 'writeDatePicker');
        
        $publDate = new Zend_Form_Element_Text('publDate');
        $publDate->setLabel('Дата Публикации')
                ->setRequired(true)
                ->addErrorMessage('Укажите дату публикации')
                ->setAttrib('id', 'publDatePicker');
        //   dbrequest
        $catObj = new Model_DbTable_Categories();
        $cat = $catObj->fetchAll();
        $cat = $cat->toArray();
        
        
        $category = new Zend_Form_Element_Radio('category');
        $category->setLabel('Выберите полку')
                 ->setRequired(true)
                 ->addErrorMessage('Необходимо выбрать категорию');
        foreach($cat as $value){
            $category->addMultiOption($value['id'], $value['title']);
        }
         
        

        
        $description = new Zend_Form_Element_Textarea('description');
        $description->setLabel('Подробное описание')
                    ->addFilter('HtmlEntities')
                    ->setAttrib('rows', '40')
                    ->setAttrib('cols', '50');

        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Сохранить')
               ->setAttrib('class', 'button2');
        
        $this->addElements(array($title, $author, $description, $category, $writeDate, $publDate, $submit));
        $this->setMethod('post');
    }
}
    