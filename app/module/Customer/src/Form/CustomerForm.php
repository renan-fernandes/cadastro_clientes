<?php

namespace Customer\Form;
use Zend\Form\Form;

class CustomerForm extends Form
{
	public function __construct()
	{
		parent::__construct('customer', []);
		
		$this->setInputFilter(new CustomerFormFilter());
		$this->add(new \Zend\Form\Element\Hidden('f_id'));
		$this->add(new \Zend\Form\Element\Text('f_name',['label' => 'Nome']));
		$this->add(new \Zend\Form\Element\Email('f_email',['label' => 'Email']));
		$this->add(new \Zend\Form\Element\Text('f_tel',['label' => 'Telefone']));
		$this->add(new \Zend\Form\Element\File('f_photo',['label' => 'Foto']));

		$submit = new \Zend\Form\Element\Submit('submit');
		$submit->setAttributes(['value' => 'Salvar', 'id' => 'submit_btn']);
		$this->add($submit);
	}
} 

?>