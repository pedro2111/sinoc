<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa as Empresa; 
use App\Models\Contrato as Contrato; 
use App\Models\Preposto as Preposto; 
use App\Models\Contexto as Contexto; 
use App\Models\Macrocelula as Macrocelula; 
use App\Models\Celula as Celula; 
use App\Models\Coordenacao as Coordenacao; 
use App\Models\Impacto as Impacto; 
//use App\Models\Indicador as Indicador; 




use Illuminate\Http\Request;
use DB;


class NotificacaoController extends Controller
{
    public function index()
    {

        //Pegando informações do usuário que está acessando o sistema
        $matricula  =   getenv('USERNAME');

        //Listando as empresas
        $Empresas = Empresa::all();

        //Listando os contratos    
        $Contratos = Contrato::all();

        //Listando todos os contratos válidos do sistema     
        $Prepostos = DB::table('PREPOSTO')
            ->join('CONTRATOS', 'CONTRATOS.id_contrato', '=', 'PREPOSTO.id_contrato')
            ->join('EMPRESA', 'EMPRESA.id_empresa', '=', 'CONTRATOS.id_empresa')
            ->where('PREPOSTO.deleted_at', null)
            ->where('CONTRATOS.deleted_at', null)
            ->select('CONTRATOS.*', 'PREPOSTO.*', 'EMPRESA.*')
            ->get();    



        //Carregando View e repassando as variáveis necessárias
        return view('notificacao', ['matricula' => $matricula,
                                 'Empresas'  => $Empresas, 
                                 'Contratos' => $Contratos,
                                 'Prepostos' => $Prepostos
                                 ]);

    }


    public function nova()
    {
        
        //Pegando informações do usuário que está acessando o sistema 
        $matricula  =  getenv('USERNAME');

        //Carregando modulos
        $Empresas = Empresa::all();
        $Contratos = Contrato::all();
        $Contextos = Contexto::all();
        $Macrocelulas = Macrocelula::all();
        $Celulas = Celula::all();
        $Coordenacoes = Coordenacao::all();
        $Impactos = Impacto::all();



   

        //Carregando View e repassando as variaveis necessárias
        return view('notificacaoNova', [ 'matricula'    => $matricula,
                                        'Empresas'      => $Empresas, 
                                        'Contratos'     => $Contratos,
                                        'Contextos'     => $Contextos,
                                        'Macrocelulas'   => $Macrocelulas,
                                        'Celulas'        => $Celulas,
                                        'Coordenacoes'   => $Coordenacoes,
                                        'Impactos'       => $Impactos
                                 ]);
    }






    public function editar($id)
    {
        
        //Pegando informações do usuário que está acessando o sistema 
        $matricula  =  getenv('USERNAME');

         //Listando as empresas
        $Empresas = Empresa::all();

        //Listando os contratos    
        $Contratos = Contrato::all();

        //Buscando informações especificas do ID = $id
        $Prepostos = DB::table('PREPOSTO')
            ->where('PREPOSTO.id_preposto', $id)
            ->select('PREPOSTO.*')
            ->get();   


        //Carregando View e repassando as variaveis necessárias
        return view('notificacaoNova', [ 'matricula' => $matricula,
                                        'Empresas'  => $Empresas, 
                                        'Contratos' => $Contratos, 
                                        'Prepostos' => $Prepostos
                                 ]);
    }


    public function incluir(Request $request) 
    {

        //Verificando se a solicitação veio da inclusão ou edição
        if($request->input('idpreposto') == "") { 
            $Preposto = new Preposto;
        } else {
            $Preposto = Preposto::find($request->input('idpreposto'));
            $Preposto->id_preposto    = $request->input('idpreposto');
        }

        //Capiturando os campos do formulário
        $Preposto->id_contrato       = $request->input('idcontrato');
        $Preposto->ma_preposto      = $request->input('mapreposto');
        $Preposto->no_preposto    = $request->input('nopreposto');
        

        //Salvando formulário
        $Preposto->save();

        //Redirecionandopara a página principal
        return redirect()->action('PrepostoController@index')->with('status', 'Sua solicitação foi executada com sucesso!');


    }


    public function delete($id)
    {
        //Encontrando e deletando Contrato (softDelete)
        $Preposto = Preposto::find($id);
        $Preposto->delete();

        //Redirecionando para a página principal
        return redirect()->action('PrepostoController@index')->with('status', 'Preposto deletado com sucesso');
    }


}