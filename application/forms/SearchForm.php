<?php

class Form_SearchForm extends Zend_Form
{
        public function __construct($option = null) {
        parent::__construct($option);
        
        $this->setName('search');
        $this->setAction('/search/searching');
        $this->addAttribs(array('class', 'row'));
        
        $nameField = new Zend_Form_Element_Text('name');
        $nameField->setLabel('Название книги');
        
        $author = new Zend_Form_Element_Text('author');
        $author->setLabel('Автор');
        // add date
        $addDateSince = new Zend_Form_Element_Text('addDateSince');
        $addDateSince->setLabel('Дата добавления c :')               
                ->setAttrib('id', 'searchAddSincePicker');
        $addDateTo = new Zend_Form_Element_Text('addDateTo');
        $addDateTo->setLabel('по :')
                ->setAttrib('id', 'searchAddToPicker');
        // update date
        $updateDateSince = new Zend_Form_Element('updateDateSince');
        $updateDateSince->setLabel('Дата обновления с :')
                ->setAttrib('id', 'searchUpdateSincePicker');
        $updateDateTo = new Zend_Form_Element_Text('updateDateTo');
        $updateDateTo->setLabel('по :')
                ->setAttrib('id', 'searchUpdateToPicker');
        // write date
        $writeDateSince = new Zend_Form_Element_text('writeDateSince');
        $writeDateSince->setLabel('Дата написания с :')
                ->setAttrib('id', 'searchWriteSincePicker');
        $writeDateTo = new Zend_Form_Element_Text('writeDateTo');
        $writeDateTo->setLabel('по :')
                ->setAttrib('id', 'searchWriteToPicker');
        // publication date
        $publDateSince = new Zend_Form_Element_Text('publDateSince');
        $publDateSince->setLabel('Дата публикации с :')
                ->setAttrib('id', 'searchPublSincePicker');
        $publDateTo = new Zend_Form_Element_Text('publDateTo');
        $publDateTo->setLabel('по :')
                ->setAttrib('id', 'searchPublToPicker');
        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('искать')
               ->setAttrib('class', 'button1');
        
        $this->addElements(array($nameField, $author, $addDateSince, $addDateTo, $updateDateSince, $updateDateTo, $writeDateSince, $writeDateTo, $publDateSince, $publDateTo, $submit));
        $this->setMethod('post');
        }
}        