<?php

namespace Customer\Model;
use Zend\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

Class CustomerTable
{
	private $tableGateway;
	
	public function __construct(TableGatewayInterface $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	
	public function getAll()
	{
		return $this->tableGateway->select();
	}
	
	public function getCustomer($f_id)
	{
		$f_id = (int)$f_id;
		$rowset = $this->tableGateway->select(['f_id' => $f_id]);
		$row = $rowset->current();
		if(!$row)
			throw new RuntimeException(sprintf('Não encontrado o id %id', $f_id));
		return $row;
	}
	
	public function saveCustomer(Customer $customer)
	{
		$data = [
			'f_id' => $customer->getId(),
			'f_name' => $customer->getName(),
			'f_email' => $customer->getEmail(),
			'f_tel' => $customer->getTel(),
			'f_photo' => $customer->getPhoto()['tmp_name'],	
		];
		
		$f_id = (int)$customer->getId();
		if($f_id === 0)
		{
			$this->tableGateway->insert($data);
			return;
		}
		$this->tableGateway->update($data,['f_id' => $f_id]);		
	}
	
	public function deleteCustomer($f_id)
	{
		$this->tableGateway->delete(['f_id' => $f_id]);
	}
}

?>