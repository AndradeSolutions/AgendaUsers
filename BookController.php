<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    //================================================
    // Vai buscar todas as contatos
    //================================================
    public function index()
    {
        $registros = Book::all();

        return view('/agenda_index', compact('registros'));
    }

    //================================================
    // Apresenta o form para criação de novos contatos
    //================================================
    public function create()
    {

        return view('/agenda_create');
    }

    //================================================
    // Gravar um contato na base de dados
    //================================================
    public function store(Request $request)
    {
        $contato = new Book();
        $contato->book_name = $request->text_name;
        $contato->book_email = $request->text_email;
        $contato->book_phone = $request->text_phone;

        $contato->save();

        return redirect('/agenda_index');
    }

    //================================================
    // Apresenta o form para editar um contato
    //================================================
    public function edit($id)
    {
        $contato = Book::find($id);
        return view('/agenda_edit', compact('contato'));
    }

    //================================================
    // Atualização do contato na base de dados
    //================================================
    public function update(Request $request, $id)
    {
        $contato = Book::find($id);
        $contato->book_name = $request->text_name;
        $contato->book_email = $request->text_email;
        $contato->book_phone = $request->text_phone;

        $contato->save();
        return redirect('/manage_book');
    }

    //================================================
    // Eliminar um contato na base de dados
    //================================================
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect('/manage_book');
    }

    //================================================
    // Apresentar um painel de gestão de dados
    // Carregar todos os contatos e apresentar em 
    // formato de tabela para gestão dos dados.
    //================================================
    public function management()
    {
        $registros = Book::all();
        return view('/agenda_manage', compact('registros'));
    }
}
