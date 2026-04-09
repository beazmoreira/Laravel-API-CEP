<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {

        return view('usuario');
    } /*framework retorna para uma resposta de vizualização */

    public function salvar(Request $request)
    { /*public: indica que o método pode ser acessado fora da classe*/
        /*Salvar: inserir dados request: parametro da função para inserir a classe*/

       $request->validate([
        'nome'   => 'required',
        'email'  => 'required|email',
        'cep'    => 'required',
        'rua'    => 'required',
        'bairro' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
    ]);

        /* Indica o banco de dados e a tabela onde será feita */
        DB::table('usuarios')->insert([

            'nome' => $request->nome,
            'email' => $request->email,
            'cep' => $request->cep,
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,

        ]);

        return redirect('/usuario'); /*Volta ao usuário*/
    }
}
