<?php

namespace Customer\Form;
use Zend\Filter\File\RenameUpload;
use Zend\InputFilter\Input;
use Zend\Validator;
use Zend\InputFilter\FileInput;
use Zend\InputFilter\InputFilter;
use Zend\Validator\File\MimeType;
use Zend\Validator\File\Size;

class CustomerFormFilter extends InputFilter
{
	public function __construct()
	{
		$f_photo = new FileInput('f_photo');
		$f_photo->setRequired(true);
		$f_photo->getFilterChain()->attach(new RenameUpload([
			'target' => './public/img/profile_img',
			'use_upload_extension' => true,
			'randomize' => true			
		]));
		
		$f_photo->getValidatorChain()
			->attach(new MimeType([
				'image/gif',
				'image/jpeg',
				'image/png',
				'enableHeaderCheck' => true	
			]));
			
		$this->add($f_photo); 
	}
} 

?>