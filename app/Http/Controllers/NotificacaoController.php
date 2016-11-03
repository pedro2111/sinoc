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
use App\Models\Motivo as Motivo;    
use App\Models\Indicador as Indicador; 
use App\Models\Notificacao as Notificacao;

use Carbon\Carbon as Carbon;



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
        $Coordenacoes = Coordenacao::all();

        //Listando todos os contratos válidos do sistema     
        $Notificacoes = DB::table('NOTIFICACAO')
            ->join('CONTRATOS', 'CONTRATOS.id_contrato', '=', 'NOTIFICACAO.id_contrato')
            ->where('NOTIFICACAO.deleted_at', null)
            ->where('CONTRATOS.deleted_at', null)
            
            ->select('CONTRATOS.*', 'NOTIFICACAO.*')
            ->get();    



        //Carregando View e repassando as variáveis necessárias
        return view('notificacao', ['matricula' => $matricula,
                                    'Empresas'  => $Empresas, 
                                    'Contratos' => $Contratos,
                                    'Coordenacoes' => $Coordenacoes,
                                    'Notificacoes' => $Notificacoes
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
        $Motivos = Motivo::all();
        $Indicadores = Indicador::all();

        //Carregando View e repassando as variaveis necessárias
        return view('notificacaoNova', ['matricula'        => $matricula,
                                        'Empresas'          => $Empresas, 
                                        'Contratos'         => $Contratos,
                                        'Contextos'         => $Contextos,
                                        'Macrocelulas'      => $Macrocelulas,
                                        'Celulas'           => $Celulas,
                                        'Coordenacoes'      => $Coordenacoes,
                                        'Impactos'          => $Impactos,
                                        'Motivos'           => $Motivos,
                                        'Indicadores'       => $Indicadores
                                 ]);
        }


   public function avaliar($id)
    {
        
        //Pegando informações do usuário que está acessando o sistema 
        $matricula  =  getenv('USERNAME');
        $Empresas = Empresa::all();
        $Contratos = Contrato::all();
        $Contextos = Contexto::all();
        $Macrocelulas = Macrocelula::all();
        $Celulas = Celula::all();
        $Coordenacoes = Coordenacao::all();
        $Impactos = Impacto::all();
        $Motivos = Motivo::all();
        $Indicadores = Indicador::all();

        //Buscando informações especificas do ID = $id
        $Notificacao = Notificacao::find($id);

      //Listando motivo da notificação
        $NotificacaoMotivo = DB::table('NOTIFICACAO_MOTIVO')
            ->where('NOTIFICACAO_MOTIVO.id_notificacao', $id)
            ->select('NOTIFICACAO_MOTIVO.*')
            ->get();    


        //Carregando View e repassando as variaveis necessárias
        return view('notificacaoAvaliar', [     'matricula' => $matricula,
                                                'Contratos'         => $Contratos,
                                                'Contextos'         => $Contextos,
                                                'Macrocelulas'      => $Macrocelulas,
                                                'Celulas'           => $Celulas,
                                                'Coordenacoes'      => $Coordenacoes,
                                                'Impactos'          => $Impactos,
                                                'Motivos'           => $Motivos,
                                                'Indicadores'       => $Indicadores,
                                                'Empresas'          => $Empresas, 
                                                'Notificacao'       => $Notificacao,
                                                'NotificacaoMotivo' => $NotificacaoMotivo
                                            ]);
    }



    public function justificar($id)
    {
        
        //Pegando informações do usuário que está acessando o sistema 
        $matricula  =  getenv('USERNAME');
        $Empresas = Empresa::all();
        $Contratos = Contrato::all();
        $Contextos = Contexto::all();
        $Macrocelulas = Macrocelula::all();
        $Celulas = Celula::all();
        $Coordenacoes = Coordenacao::all();
        $Impactos = Impacto::all();
        $Motivos = Motivo::all();
        $Indicadores = Indicador::all();

        //Buscando informações especificas do ID = $id
        $Notificacao = Notificacao::find($id);


        //Listando motivo da notificação
        $NotificacaoMotivo = DB::table('NOTIFICACAO_MOTIVO')
            ->where('NOTIFICACAO_MOTIVO.id_notificacao', $id)
            ->select('NOTIFICACAO_MOTIVO.*')
            ->get();    




        //Carregando View e repassando as variaveis necessárias
        return view('notificacaoJustificar', [  'matricula' => $matricula,
                                                'Contratos'         => $Contratos,
                                                'Contextos'         => $Contextos,
                                                'Macrocelulas'      => $Macrocelulas,
                                                'Celulas'           => $Celulas,
                                                'Coordenacoes'      => $Coordenacoes,
                                                'Impactos'          => $Impactos,
                                                'Motivos'           => $Motivos,
                                                'Indicadores'       => $Indicadores,
                                                'Empresas'          => $Empresas, 
                                                'Notificacao'       => $Notificacao, 
                                                'NotificacaoMotivo' => $NotificacaoMotivo
                                            ]);
    }




 public function ver($id)
    {
        
        //Pegando informações do usuário que está acessando o sistema 
        $matricula  =  getenv('USERNAME');
        $Empresas = Empresa::all();
        $Contratos = Contrato::all();
        $Contextos = Contexto::all();
        $Macrocelulas = Macrocelula::all();
        $Celulas = Celula::all();
        $Coordenacoes = Coordenacao::all();
        $Impactos = Impacto::all();
        $Motivos = Motivo::all();
        $Indicadores = Indicador::all();

        //Buscando informações especificas do ID = $id
        $Notificacao = Notificacao::find($id);

        //Listando motivo da notificação
        $NotificacaoMotivo = DB::table('NOTIFICACAO_MOTIVO')
            ->where('NOTIFICACAO_MOTIVO.id_notificacao', $id)
            ->select('NOTIFICACAO_MOTIVO.*')
            ->get();    


        //Carregando View e repassando as variaveis necessárias
        return view('notificacaoVer', [  'matricula' => $matricula,
                                                'Contratos'         => $Contratos,
                                                'Contextos'         => $Contextos,
                                                'Macrocelulas'      => $Macrocelulas,
                                                'Celulas'           => $Celulas,
                                                'Coordenacoes'      => $Coordenacoes,
                                                'Impactos'          => $Impactos,
                                                'Motivos'           => $Motivos,
                                                'Indicadores'       => $Indicadores,
                                                'Empresas'          => $Empresas, 
                                                'Notificacao'       => $Notificacao,
                                                'NotificacaoMotivo' => $NotificacaoMotivo
                                            ]);
    }



    public function incluirjustificativa(Request $request) { 
        
        $matricula  =  getenv('USERNAME');
        
        
        $nij = Notificacao::find($request->input('id_notificacao'));

        $nij->ds_justificativa = $request->input('ds_justificativa');
        $nij->ma_justificativa = $matricula;
        $nij->dt_justificativa = Carbon::now();

        $nij->save();

        //Redirecionandopara a página principal
        return redirect()->action('NotificacaoController@index')->with('status', 'Sua justificativa foi cadastrada com sucesso!');


    }


    public function incluiravaliacao(Request $request) { 
        
        $matricula  =  getenv('USERNAME');
        
        
        $nij = Notificacao::find($request->input('id_notificacao'));

        $nij->bit_aceito    = $request->input('bit_aceito');
        $nij->ds_naoacatado = $request->input('ds_naoacatado');
        $nij->ma_avaliador  = $matricula;
        $nij->dt_naoacatado = Carbon::now();

        $nij->save();

        //Redirecionandopara a página principal
        return redirect()->action('NotificacaoController@index')->with('status', 'Sua avaliação foi cadastrada com sucesso!');


    }

    public function corrigir($id) { 
        
        $matricula  =  getenv('USERNAME');
        
        $ncj = Notificacao::find($id);

        $ncj->dt_justificativa = NULL;
        $ncj->dt_naoacatado = NULL;

        $ncj->save();

        //Redirecionandopara a página principal
        return redirect()->action('NotificacaoController@index')->with('status', 'A notificação pode ser corrigida agora!');

    }


  public function buscar(Request $request) { 
        
        $matricula  =   getenv('USERNAME');

        $q = $request->input('q');


        //Listando as empresas
        $Empresas = Empresa::all();

        //Listando os contratos    
        $Contratos = Contrato::all();
        $Coordenacoes = Coordenacao::all();

        //Listando todos os contratos válidos do sistema     
        $Notificacoes = DB::table('NOTIFICACAO')
            ->join('CONTRATOS', 'CONTRATOS.id_contrato', '=', 'NOTIFICACAO.id_contrato')
            
            ->where('NOTIFICACAO.ds_ocorrencia', 'like', '%'.$q.'%')
            ->where('NOTIFICACAO.ds_ticket', 'like', '%'.$q.'%')    
            ->where('NOTIFICACAO.ds_notificacao', 'like', '%'.$q.'%')
            ->where('NOTIFICACAO.ds_justificativa', 'like', '%'.$q.'%')
            ->where('NOTIFICACAO.ds_naoacatado', 'like', '%'.$q.'%')
            ->where('NOTIFICACAO.ma_cadastro', 'like', '%'.$q.'%')

            ->where('NOTIFICACAO.deleted_at', null)
            ->where('CONTRATOS.deleted_at', null)
            
            ->select('CONTRATOS.*', 'NOTIFICACAO.*')
            ->get();    


            //print_r($Notificacoes);


        //Carregando View e repassando as variáveis necessárias
        return view('notificacao', ['matricula' => $matricula,
                                    'Empresas'  => $Empresas, 
                                    'Contratos' => $Contratos,
                                    'Coordenacoes' => $Coordenacoes,
                                    'Notificacoes' => $Notificacoes
                                 ]);

    }



    public function incluir(Request $request) 
    {

        //Capiturando os campos do formulário
        $n = new Notificacao;

        $n->id_contrato = $request->input('id_contrato');
        $n->ds_ocorrencia = $request->input('ds_ocorrencia');
        $n->id_notificadora = $request->input('id_notificadora');
        $n->id_impactada = $request->input('id_impactada');
        $n->ds_ticket = $request->input('ds_ticket');
        $n->ds_notificacao = $request->input('ds_notificacao');
        $n->nu_horas = $request->input('nu_horas');
        $n->id_impactada = $request->input('id_impactada');
        $n->ds_ticket = $request->input('ds_ticket');
        $n->ma_cadastro = getenv('USERNAME');
        $n->id_indicador = $request->input('id_indicador');
        //Salvando formulário
        $n->save();

        //Pegando o Id
        $newId = $n->id_notificacao;  

        //Motivo
        $id_motivo = [];
        $id_motivo = $request->input('id_motivo');
        foreach ($id_motivo as $mot) {
            $datasetMot[] = [
                'id_notificacao'    => $newId,
                'id_motivo'         => $mot,
            ];
        }
        DB::table('NOTIFICACAO_MOTIVO')->insert($datasetMot);

        //Redirecionandopara a página principal
        return redirect()->action('NotificacaoController@index')->with('status', 'Nova notificação foi incluida com sucesso!');
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