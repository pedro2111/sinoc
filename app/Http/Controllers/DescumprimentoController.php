<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa as Empresa; 
use App\Models\Contrato as Contrato; 
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
use App\Models\Descumprimento;


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
        $Descumprimento = DB::table('DESCUMPRIMENTO')
            ->join('CONTRATOS', 'CONTRATOS.id_contrato', '=', 'DESCUMPRIMENTO.id_contrato')
            ->where('DESCUMPRIMENTO.deleted_at', null)
            ->where('DESCUMPRIMENTO.deleted_at', null)
            
            ->select('CONTRATOS.*', 'DESCUMPRIMENTO.*')
            ->get();    

		
            
            

        //Carregando View e repassando as variáveis necessárias
        return view('descumprimento', [	'matricula' => $matricula,
                                    	'Empresas'  => $Empresas, 
                                    	'Contratos' => $Contratos,
                                    	'Coordenacoes' => $Coordenacoes,
                                    	'Descumprimento' => $Descumprimento
                                 ]);

    }


    public function novo()
    {
        
        //Pegando informações do usuário que está acessando o sistema 
        $matricula  =  getenv('USERNAME');

        //Carregando modulos
        $Contratos = Contrato::all();
        $Coordenacoes = Coordenacao::all();
     
        //Carregando View e repassando as variaveis necessárias
        return view('descumprimentoNovo', ['matricula'        	=> $matricula,
                                        'Contratos'         	=> $Contratos,
                                        'Coordenacoes'      	=> $Coordenacoes
                                 ]);
    }


    public function avaliar($id)
    {
        
        //Pegando informações do usuário que está acessando o sistema 
        $matricula  =  getenv('USERNAME');
        $Contratos = Contrato::all();
        $Coordenacoes = Coordenacao::all();

        //Buscando informações especificas do ID = $id
        $Descumprimento = Descumprimento::find(Crypt::decrypt($id));


        //Carregando View e repassando as variaveis necessárias
        return view('descumprimentoAvaliar', [  'matricula' 		=> $matricula,
                                                'Contratos'         => $Contratos,
                                                'Coordenacoes'      => $Coordenacoes,
                                                'Descumprimento'    => $Descumprimento
                                            ]);
    }



    public function justificar($id)
    {
    	
    
    	//Pegando informações do usuário que está acessando o sistema 
        $matricula  =  getenv('USERNAME');
        $Contratos = Contrato::all();
        $Coordenacoes = Coordenacao::all();

        //Buscando informações especificas do ID = $id
        $Descumprimento = Descumprimento::find(Crypt::decrypt($id));


        //Carregando View e repassando as variaveis necessárias
        return view('descumprimentoJustificar',[
                                                'matricula'         => $matricula,
                                                'Contratos'         => $Contratos,
                                                'Coordenacoes'      => $Coordenacoes,
                                                'Descumprimento'    => $Descumprimento
                                            ]);
    }


    public function avaliarresposta($id)
    {
        
    
        //Pegando informações do usuário que está acessando o sistema 
        $matricula  =  getenv('USERNAME');
        $Contratos = Contrato::all();
        $Coordenacoes = Coordenacao::all();

        //Buscando informações especificas do ID = $id
        $Descumprimento = Descumprimento::find(Crypt::decrypt($id));


        //Carregando View e repassando as variaveis necessárias
        return view('descumprimentoAvaliarresposta',[
                                                'matricula'         => $matricula,
                                                'Contratos'         => $Contratos,
                                                'Coordenacoes'      => $Coordenacoes,
                                                'Descumprimento'    => $Descumprimento
                                            ]);
    }


    public function ver($id)
    {
        
        //Pegando informações do usuário que está acessando o sistema 
        $matricula  =  getenv('USERNAME');
        $Contratos = Contrato::all();
        $Coordenacoes = Coordenacao::all();

        //Buscando informações especificas do ID = $id
        $Descumprimento = Descumprimento::find(Crypt::decrypt($id));

        //Carregando View e repassando as variaveis necessárias
        return view('descumprimentoVer', ['matricula' => $matricula,
                                          'Contratos'         => $Contratos,
                                          'Coordenacoes'      => $Coordenacoes,
                                          'Descumprimento'    => $Descumprimento
        ]);
    }



    public function incluirjustificativa(Request $request) { 
      
        $matricula  =  getenv('USERNAME');
        
        $nij = Descumprimento::find($request->input('id_descumprimento'));

        $nij->ds_justificativa      = $request->input('ds_justificativa');
        $nij->ma_justificativa      = $matricula;
        $nij->dt_justificativa      = Carbon::now();
        $nij->status                = 3; //Aguardar avaliação final

        $nij->save();

        //Redirecionandopara a página principal
        return redirect()->action('DescumprimentoController@index')
                            ->with('status', 'Sua justificativa foi cadastrada com sucesso!')
                            ->with('tipo', 'success');

    }


    public function incluiravaliacao(Request $request) { 
        
        $matricula  =  getenv('USERNAME');
        
        
        $nij = Descumprimento::find($request->input('id_descumprimento'));

        $nij->bit_favoravel    	= $request->input('bit_favoravel');
        $nij->ds_avaliacao 		= $request->input('ds_avaliacao');
        $nij->ma_avaliador  	= $matricula;
        $nij->dt_avaliacao 		= Carbon::now();
        
        if($request->input('bit_favoravel') == 0) {
            $nij->status	 		= 9; //Finalizado por avaliação negativa
        }
        else {
            $nij->status            = 2; //continua o fluxo
        }
        

        $nij->save();

        //Redirecionandopara a página principal
        return redirect()->action('DescumprimentoController@index')
        					->with('status', 'Sua avaliação foi cadastrada com sucesso!')
        					->with('tipo', 'success');
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

  	public function incluir(Request $request) 
  	{

        #Criando o objeto Descumprimento
        $n = new Descumprimento;

        $n->id_contrato = $request->input('id_contrato');
        $n->ds_titulo = $request->input('ds_titulo');
        $n->ds_descumprimento = $request->input('ds_descumprimento');
        $n->status = 1;
        $n->ma_cadastro = getenv('USERNAME');
        
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
        $newId = $n->id_descumprimento;  

        #Criando o número da notificação baseado no ID recém criado.
        $nd = "D" . Carbon::parse(Carbon::now())->format('Ym') . $newId;
        $ncj = Descumprimento::find($newId);
        $ncj->nu_descumprimento = $nd;
        $ncj->save();
        //------------------------------------------------------------------------------
        
  
        #Redirecionandopara a página principal
        return redirect()->action('DescumprimentoController@index')
        					->with('status', 'Novo descumprimento contratutal cadastrado com sucesso!')
        					->with('tipo', 'success');
    }


    public function delete($id)
    {
        // #Notificacao sendo deletada
        // #Esse metodo só irá ser disponibilizado para pessoas do RH / Logística  
        
    	$n = Descumprimento::find($id);
        $n->delete();

        // #Redirecionando para a página principal
        return redirect()->action('DescumprimentoController@index')
        			->with('status', 'Descumprimento deletado com sucesso')
        			->with('tipo', 'danger');
    }


}



