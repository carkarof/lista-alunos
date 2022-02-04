<?php

use Application\core\Controller;

class Alunos extends Controller
{
  /**
  * chama a view index.php da seguinte forma /user/index   ou somente   /user
  * e retorna para a view todos os usuários no banco de dados.
  */
  public function index()
  {  
    $Users = $this->model('Alunos'); // é retornado o model Alunos()
    $data = $Users::findAll();
    $this->view('alunos/index', ['alunos' => $data]);
  }

  /**
  * chama a view show.php da seguinte forma /user/show passando um parâmetro 
  * via URL /user/show/id e é retornado um array contendo (ou não) um determinado
  * usuário. Além disso é verificado se foi passado ou não um id pela url, caso
  * não seja informado, é chamado a view de página não encontrada.
  * @param  int   $id   Identificado do usuário.
  */
  public function show($id = null)
  {
    if (is_numeric($id)) {
      $Users = $this->model('Alunos');
      $data = $Users::findById($id);
      $this->view('alunos/show', ['alunos' => $data]);
    } else {
      $this->pageNotFound();
    }
  }


}
