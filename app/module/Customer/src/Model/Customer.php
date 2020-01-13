<?php

namespace Customer\Model;

class Customer implements \Zend\Stdlib\ArraySerializableInterface
{
	private $f_id;
	private $f_name;
	private $f_email;
	private $f_tel;
	private $f_photo;
	
	public function exchangeArray(array $data)
	{
		$this->f_id = !empty($data['f_id']) ? $data['f_id'] : null;
		$this->f_name = !empty($data['f_name']) ? $data['f_name'] : null;
		$this->f_email = !empty($data['f_email']) ? $data['f_email'] : null;
		$this->f_tel = !empty($data['f_tel']) ? $data['f_tel'] : null;
		$this->f_photo = !empty($data['f_photo']) ? $data['f_photo'] : null;
	}
	
	public function getId()
	{
		return $this->f_id;
	}
	
	public function setId($f_id)
	{
		$this->f_id = $f_id;
	}
	
	public function getName()
	{
		return $this->f_name;
	}
	
	public function setName($f_name)
	{
		$this->f_name = $f_name;
	}
	
	public function getEmail()
	{
		return $this->f_email;
	}
	
	public function setEmail($f_email)
	{
		$this->f_email = $f_email;
	}
	
	public function getTel()
	{
		return $this->f_tel;
	}
	
	public function setTel($f_tel)
	{
		$this->f_tel = $f_tel;
	}
	
	public function getPhoto()
	{
		return $this->f_photo;
	}
	
	public function setPhoto($f_photo)
	{
		$this->f_photo = $f_photo;
	}
	
	 public function getArrayCopy(): array {
        return [
            'f_id' => $this->f_id,
            'f_name' => $this->f_name,
            'f_email' => $this->f_email,
            'f_tel' => $this->f_tel,
            'f_photo' => $this->f_photo,
        ];
    }
}

?>