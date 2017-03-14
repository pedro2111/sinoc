<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contrato as Contrato; 
use App\Models\Empresa as Empresa; 
use App\Models\macrocelula as Macrocelula; 
use App\Models\Coordenacao as Coordenacao;

use DB;
use function GuzzleHttp\json_decode;


class RelatorioController extends Controller
{
    public function notificacaoporcontrato()
    {

        //Pegando informações do usuário que está acessando o sistema
        $matricula  =   getenv('USERNAME');

        //Listando as empresas
        $Empresas = Empresa::all();
        $Contratos = Contrato::all();
        $Coordenacoes = Coordenacao::all();
        //Listando os contratos
        $Macrocelulas = Macrocelula::all();


        //Listando todos os contratos válidos do sistema     
        //$total = DB::select('SELECT COUNT(id_notificacao) NUM, no_empresa FROM NOTIFICACAO, CONTRATOS, EMPRESA WHERE NOTIFICACAO.id_contrato = CONTRATOS.id_contrato AND CONTRATOS.id_empresa = EMPRESA.id_empresa GROUP BY EMPRESA.no_empresa');
        
        $total = DB::select('SELECT count(NN.id_notificacao), NC.NU_CONTRATO FROM 
											"NOTIFICA"."NOTIFICACAO" NN
											INNER JOIN "NOTIFICA"."CONTRATOS" NC ON NC.ID_CONTRATO = NN.ID_CONTRATO
											GROUP BY NC.NU_CONTRATO');
        

//         $strpizza[][] = '';
//         $count = 1; 
//         foreach($total as $p) { 
        	
//         	//$strpizza[][$count] =  " { label: '". $p->nu_contrato ."', data: [[ ".$p->count ." ]], color: '#". $this->random_color() ."'}, ";
//         	$strpizza[1][$count] =   $p->nu_contrato;
//         	$strpizza[2][$count] =   $p->count;
//         	$strpizza[3][$count] =   "#". $this->random_color();
//         	$count = $count + 1;
//         }
        
        
        
        
        
        
        //Carregando View e repassando as variáveis necessárias
        return view('relatorio.notificacaoporcontrato', ['matricula' => $matricula,
                                'Empresas'  => $Empresas,  
                                'Contratos' => $Contratos,
        						'Coordenacoes' => $Coordenacoes,
        						'Macrocelulas' => $Macrocelulas,
                                'arrayPizza' => $total,
                                 ]);
        }

        
        
        function random_color_part() {
        	return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
        }
        
        function random_color() {
        	return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
        }
        
        

}