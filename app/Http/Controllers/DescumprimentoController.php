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


use Carbon\Carbon as Carbon;
use Crypt as Crypt;
use Illuminate\Http\Request;
use DB;


class DescumprimentoController extends Controller
{
	
	
	
    public function index()
    {

        //Pegando informações do usuário que está acessando o sistema
        $matricula  =   getenv('USERNAME');

        //Itens do menu esquerda de busca
        $Empresas = Empresa::all();
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


    public function novo()
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
        $Notificacao = Notificacao::find(Crypt::decrypt($id));

      //Listando motivo da notificação
        $NotificacaoMotivo = DB::table('NOTIFICACAO_MOTIVO')
            ->where('NOTIFICACAO_MOTIVO.id_notificacao', Crypt::decrypt($id))
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
        $Notificacao = Notificacao::find(Crypt::decrypt($id));


        //Listando motivo da notificação
        $NotificacaoMotivo = DB::table('NOTIFICACAO_MOTIVO')
            ->where('NOTIFICACAO_MOTIVO.id_notificacao', Crypt::decrypt($id))
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
        $Notificacao = Notificacao::find(Crypt::decrypt($id));

        //Listando motivo da notificação
        $NotificacaoMotivo = DB::table('NOTIFICACAO_MOTIVO')
            ->where('NOTIFICACAO_MOTIVO.id_notificacao', Crypt::decrypt($id))
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
        
        
        if($request->file('justificativa_anexo')) {
        
        	$doc = $request->file('justificativa_anexo');
        	$prefix = Carbon::parse(Carbon::now())->format('Ymdhi');
        	$destinationPath = storage_path() . '/uploads';
        
        	if(!$doc->move($destinationPath, $prefix.'_'.$doc->getClientOriginalName())) {
        		return $this->errors(['message' => 'Erro ao salvar o arquivo anexo.', 'code' => 400]);
        	} else {
        		$nij->justificativa_anexo = $prefix.'_'.$doc->getClientOriginalName();
        	}	 
        }
        
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
        
        $ncj = Notificacao::find(Crypt::decrypt($id));

        $ncj->dt_justificativa = NULL;
        $ncj->dt_naoacatado = NULL;

        $ncj->save();

        #Redirecionandopara a página principal
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
            
            ->Where('NOTIFICACAO.deleted_at', null)
            ->Where('CONTRATOS.deleted_at', null)
            
            ->orWhere('NOTIFICACAO.ds_ocorrencia', 'like', '%'.$q.'%')
            ->orWhere('NOTIFICACAO.ds_ticket', 'like', '%'.$q.'%')    
            ->orWhere('NOTIFICACAO.ds_notificacao', 'like', '%'.$q.'%')
            ->orWhere('NOTIFICACAO.ds_justificativa', 'like', '%'.$q.'%')
            ->orWhere('NOTIFICACAO.ds_naoacatado', 'like', '%'.$q.'%')
            ->orWhere('NOTIFICACAO.ma_cadastro', 'like', '%'.$q.'%')

    
            
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

        #Criando o objeto Notificacao
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
        
        $n->dt_fim_justificativa = Carbon::now()->endOfMonth()->format('d/m/Y H:i');
        
        if($request->file('nome_anexo')) {
        
	        $doc = $request->file('nome_anexo');
	        $prefix = Carbon::parse(Carbon::now())->format('Ymdhi');
	        $destinationPath = storage_path() . '/uploads';
	       
	        if(!$doc->move($destinationPath, $prefix.'_'.$doc->getClientOriginalName())) {
	        	return $this->errors(['message' => 'Erro ao salvar o arquivo anexo.', 'code' => 400]);
	        } else {
	        	$n->nome_anexo = $prefix.'_'.$doc->getClientOriginalName(); 
	        }
	        
        }
        
        #Salvando formulário
        $n->save();

        #Pegando o ID do novo registro criado
        $newId = $n->id_notificacao;  

        #Criando o número da notificação baseado no ID recém criado.
        $nd = "N" . Carbon::parse(Carbon::now())->format('Ym') . $newId;
        $ncj = Notificacao::find($newId);
        $ncj->nu_notificacao = $nd;
        $ncj->save();
        //------------------------------------------------------------------------------
        
        #Fazendo a inclusão na tabela :Motivo
        $id_motivo = [];
        $id_motivo = $request->input('id_motivo');
        foreach ($id_motivo as $mot) {
            $datasetMot[] = [
                'id_notificacao'    => $newId,
                'id_motivo'         => $mot,
            ];
        }
        DB::table('NOTIFICACAO_MOTIVO')->insert($datasetMot);

        #Redirecionandopara a página principal
        return redirect()->action('NotificacaoController@index')->with('status', 'Nova notificação foi incluida com sucesso!');
    }


    public function delete($id)
    {
        // #Notificacao sendo deletada
        // #Esse metodo só irá ser disponibilizado para pessoas do RH / Logística  
        
    	$n = Notificacao::find($id);
        $n->delete();

        // #Redirecionando para a página principal
        return redirect()->action('NotificacaoController@index')->with('status', 'Notificação deletada com sucesso');
    }


}