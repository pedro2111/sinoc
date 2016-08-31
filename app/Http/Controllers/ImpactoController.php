<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa as Empresa; 
use App\Models\Impacto as Impacto; 

use Illuminate\Http\Request;
use DB;




class ImpactoController extends Controller
{
    public function index()
    {

        //Pegando informações do usuário que está acessando o sistema
        $matricula  =   getenv('USERNAME');

        //Listando as empresas
        $Empresas = Empresa::all();

        //Listando todos os contratos válidos do sistema     
        $Impactos = DB::table('IMPACTO')
            ->where('IMPACTO.deleted_at', null)
            ->select('IMPACTO.*')
            ->get();    



        //Carregando View e repassando as variáveis necessárias
        return view('impacto', ['matricula' => $matricula,
                                 'Impactos'  => $Impactos 
                                 ]);

    }





    public function editar($id)
    {
        
        //Pegando informações do usuário que está acessando o sistema 
        $matricula  =  getenv('USERNAME');

         //Listando as empresas
        $Impactos = DB::table('IMPACTO')
                    ->where('IMPACTO.id_impacto', $id)
                    ->select('IMPACTO.*')
                    ->get();

        
        //Carregando View e repassando as variaveis necessárias
        return view('impactoEditar', ['matricula' => $matricula,
                                        'Impactos'  => $Impactos
                                    ]);
    }


    public function incluir(Request $request) 
    {

        //Verificando se a solicitação veio da inclusão ou edição
        if($request->input('idimpacto') == "") { 
            $Impacto = new Impacto;
        } else {
            $Impacto = Impacto::find($request->input('idimpacto'));
            $Impacto->id_impacto      = $request->input('idimpacto');
        }

        //Capiturando os campos do formulário
        $Impacto->no_impacto       = $request->input('noimpacto');
       
     
        //Salvando formulário
        $Impacto->save();

        //Redirecionandopara a página principal
        return redirect()->action('ImpactoController@index')->with('status', 'Sua solicitação foi executada com sucesso!');


    }


    public function delete($id)
    {
        //Encontrando e deletando Contrato (softDelete)
        $Impacto = Impacto::find($id);
        $Impacto->delete();

        //Redirecionando para a página principal
        return redirect()->action('ImpactoController@index')->with('status', 'Impacto excluído com sucesso!');
    }


}