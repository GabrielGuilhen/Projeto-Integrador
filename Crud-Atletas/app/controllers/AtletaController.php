<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Atleta;
use app\services\AtletaService;

class AtletaController extends Controller
{
    private AtletaService $service;

    public function __construct()
    {
        $this->service = new AtletaService();
    }

    public function listarTodos()
    {
        $data['lista'] = $this->service->getAtletas();
        $this->view('atletas/atletas_list', $data);
    }

    public function verAtleta()
    {
        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/atletas');
        }

        $data['atleta'] = $this->service->getAtleta($_GET['id']);
        $this->view('atletas/atletas_show', $data);
    }

    public function criar()
    {
        $this->autenticacaoRequired();
        $this->view('atletas/atletas_create', []);
    }

    public function editar()
    {
        $data['atleta'] = $this->service->getAtleta($_GET['id']);
        $this->view('atletas/atletas_edit', $data);
    }
    public function excluir()
    {
        if (!isset($_GET['id'])) {
            $this->redirect(URL_BASE . '/atletas');
        }
        // Busca as informações do atleta pra mostrar um aviso
        $data['atleta'] = $this->service->getAtleta($_GET['id']);
        if (!$data['atleta']) {
            $this->redirect(URL_BASE . '/atletas');
        }
        $this->view('atletas/atletas_exclude', $data);
    }

    public function salvar()
    {
        $this->adminRequired();

        $atleta = $this->atletaFromPost();
        try {
            $this->service->saveAtleta($atleta);// no service vai ser validado
            $this->redirect(URL_BASE . '/atletas');
        } catch (\Exception $e) {
            $data = [
                'atleta' => $_POST, // deixa os campos preenchidos
                'erro_geral' => $e->getMessage()
            ];

            $this->view('atletas/atletas_create', $data);
        }
    }

    public function atualizar()
    {
        $this->adminRequired();
        $atleta = $this->atletaFromPost();

        $prop = (new \ReflectionClass($atleta))->getProperty('id');
        $prop->setAccessible(true);
        $prop->setValue($atleta, $_POST['id']);

        $this->service->updateAtleta($atleta);
        $this->redirect(URL_BASE . '/atletas');
    }
    public function deletar()
    {
        $this->adminRequired();
        $id = $_POST['id'] ?? null;

        if ($id) {
            $this->service->deleteAtleta((int)$id);
        }

        $this->redirect(URL_BASE . '/atletas');
    }

    // --- privados ---

    private function atletaFromPost(): Atleta //professor, eu tinha feito de uma forma meio repetitiva, 
    //então pedi ajuda para o chataogptão e ele me sugeriu essa maneira. falou que é melhor para se eu quiser adicionar um novo campo, só preciso adicionar no form e aqui
    {
        $atleta = new Atleta();
        $atleta->setNome($_POST['nome']);
        $atleta->setAltura($_POST['altura'] !== '' ? (float)$_POST['altura'] : null);
        $atleta->setPeso($_POST['peso']   !== '' ? (float)$_POST['peso']   : null);
        $atleta->setTreinador($_POST['treinador'] !== '' ? $_POST['treinador'] : null);
        $atleta->setClube($_POST['clube']         !== '' ? $_POST['clube']     : null);
        $atleta->setFotoUrl(($_POST['foto_url'] ?? '') !== '' ? $_POST['foto_url'] : null);
        return $atleta;
    }
}
