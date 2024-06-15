<?php

namespace App\Controllers;

use App\Models\Apartamento;
use App\Core\Controller;

class ApartamentoController extends Controller
{
    protected string $view = "apartamento";
    protected string $title = "Cadastro de apartamentos";

    public function index()
    {
        // Exemplo de método para listar todos os apartamentos
        // Você pode implementar a lógica para buscar os dados do banco de dados aqui
        // Exemplo simplificado:
        $apartamentos = Apartamento::all(); // Supondo que há um método estático 'all()' para buscar todos os apartamentos
        return $this->view($this->view . '.index', compact('apartamentos'));
    }

    public function show($id)
    {
        // Exemplo de método para mostrar detalhes de um apartamento específico
        // Você pode implementar a lógica para buscar um apartamento pelo ID aqui
        // Exemplo simplificado:
        $apartamento = Apartamento::find($id); // Supondo que há um método estático 'find($id)' para buscar por ID
        return $this->view($this->view . '.show', compact('apartamento'));
    }

    public function create()
    {
        // Exemplo de método para mostrar o formulário de criação de um novo apartamento
        return $this->view($this->view . '.create');
    }

    public function store($request)
    {
        // Exemplo de método para armazenar um novo apartamento no banco de dados
        // $request contém os dados recebidos do formulário de criação
        $apartamento = new Apartamento();
        $apartamento->setDescricao($request['descricao']); // Defina os atributos com os dados recebidos

        if ($apartamento->save()) {
            // Redirecionar para uma página de sucesso ou retornar uma resposta adequada
            return $this->redirect()->route('apartamentos.index');
        } else {
            // Tratar caso ocorra algum erro ao salvar
            return $this->back()->withInput();
        }
    }

    public function edit($id)
    {
        // Exemplo de método para mostrar o formulário de edição de um apartamento
        $apartamento = Apartamento::find($id); // Supondo que há um método estático 'find($id)' para buscar por ID
        return $this->view($this->view . '.edit', compact('apartamento'));
    }

    public function update($request, $id)
    {
        // Exemplo de método para atualizar um apartamento no banco de dados
        // $request contém os dados recebidos do formulário de edição
        $apartamento = Apartamento::find($id); // Supondo que há um método estático 'find($id)' para buscar por ID
        $apartamento->setDescricao($request['descricao']); // Atualize os atributos com os dados recebidos

        if ($apartamento->save()) {
            // Redirecionar para uma página de sucesso ou retornar uma resposta adequada
            return $this->redirect()->route('apartamentos.index');
        } else {
            // Tratar caso ocorra algum erro ao salvar
            return $this->back()->withInput();
        }
    }

    public function delete($id)
    {
        // Exemplo de método para deletar um apartamento do banco de dados
        $apartamento = Apartamento::find($id); // Supondo que há um método estático 'find($id)' para buscar por ID

        if ($apartamento->delete()) {
            // Redirecionar para uma página de sucesso ou retornar uma resposta adequada
            return $this->redirect()->route('apartamentos.index');
        } else {
            // Tratar caso ocorra algum erro ao deletar
            return $this->back()->withInput();
        }
    }
}
