<?php 
namespace Pessoa\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PessoaController extends AbstractActionController {

	private $table;

	public function __construct($table) {
		$this->table = $table;
	}

	public function indexAction() {
		return new ViewModel(['pessoas' => $this->table->getAll()]);
	}

	public function adicionarAction(){
		return new ViewModel();
	}

	public function salvarAction(){
		return new ViewModel();
	}

	public function editarAction(){
		return new ViewModel();
	}
	public function removerAction(){
		return new ViewModel();
	}
	public function confirmacaoAction() {

	}

	/**
		/pessoa -> index
		/pessoa/adicionar -> adicionarAction
		/pessoa/salvar ->salvarAction
		/pessoa/editar/1 ->editarAction
		/pessoa/remover/1 ->removerAction
		/pessoa/confirmacao ->confirmacaoAction
	*/

}