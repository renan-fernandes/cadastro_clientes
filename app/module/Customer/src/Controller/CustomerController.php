<?php

namespace Customer\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CustomerController extends AbstractActionController
{
	private $table;
	
	public function __construct($table) 
	{
		$this->table = $table;
	}
	
	public function indexAction()
	{
		return new viewModel(['customers' => $this->table->getAll()]);
	}
	
	public function addAction()
	{
		$form = new \Customer\Form\CustomerForm();
		$form->get('submit')->setValue('Adicionar');
		$request = $this->getRequest();
		
		if(!$request->isPost())
		{
			return new viewModel(['form' => $form]);
		}
		$customer = new \Customer\Model\Customer();
		
		$postData = array_merge_recursive(
			$request->getPost()->toArray(),
			$request->getFiles()->toArray()			
		);	

		$form->setData($postData);
		
		if(!$form->isValid())
		{
			return new viewModel(['form' => $form]);
		}	
		
		$customer->exchangeArray($form->getData());
		$this->table->saveCustomer($customer);
		
		return $this->redirect()->toRoute('customer');
	}
	
	public function editAction()
	{
		$id = (int)$this->params()->fromRoute('id', 0);
		if($id === 0)
			return $this->redirect()->toRoute('customer', ['action' => 'add']);
		
		try{
			$customer = $this->table->getCustomer($id);
		} 
		catch(Exception $e){
			return $this->redirect()->toRoute('customer', ['action' => 'index']);			
		}
		
		$form = new \Customer\Form\CustomerForm();
		$form->bind($customer);
		$form->get('submit')->setAttribute('value', 'Salvar');
		$request = $this->getRequest();
		$viewData = ['id' => $id, 'form' => $form];
		if(!$request->isPost())
		{
			return $viewData;
		}
		
		$postData = array_merge_recursive(
			$request->getPost()->toArray(),
			$request->getFiles()->toArray()			
		);
		
		$form->setData($postData);
		if(!$form->isValid())
		{
			return $viewData;
		}
		
		$this->table->saveCustomer($form->getData());
		return $this->redirect()->toRoute('customer');
	}
	
	public function deleteAction()
	{
		$id = (int)$this->params()->fromRoute('id', 0);
		if($id === 0)
			return $this->redirect()->toRoute('customer', ['action' => 'index']);
		
		$request = $this->getRequest(); 
		if($request->isPost())
		{
			$del = $request->getPost('del', 'Não');
			if($del == 'Sim')
			{
				$id = (int)$request->getPost('id');
				$this->table->deleteCustomer($id);
			}
			return $this->redirect()->toRoute('customer');
		}			
		
		return ['id' => $id, 'customer' => $this->table->getCustomer($id)];
	}
}

?>