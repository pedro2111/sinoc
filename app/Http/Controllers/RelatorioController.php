<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contrato as Contrato; 
use App\Models\Empresa as Empresa; 
use App\Models\celula as Celula; 
use App\Models\macrocelula as Macrocelula; 


use Illuminate\Http\Request;
use DB;




class RelatorioController extends Controller
{
    public function totalporempresa()
    {

        //Pegando informações do usuário que está acessando o sistema
        $matricula  =   getenv('USERNAME');

        //Listando as empresas
        $Empresas = Empresa::all();
        $Contratos = Contrato::all();
        
        //Listando os contratos
        $Macrocelulas = Macrocelula::all();


        //Listando todos os contratos válidos do sistema     
        //$total = DB::select('SELECT COUNT(id_notificacao) NUM, no_empresa FROM NOTIFICACAO, CONTRATOS, EMPRESA WHERE NOTIFICACAO.id_contrato = CONTRATOS.id_contrato AND CONTRATOS.id_empresa = EMPRESA.id_empresa GROUP BY EMPRESA.no_empresa');
        
        $total = DB::select('SELECT COUNT(id_notificacao) NUM  FROM notificacao');
        

        //Carregando View e repassando as variáveis necessárias
        return view('relatorio', ['matricula' => $matricula,
                                'Empresas'  => $Empresas,  
                                'Contratos' => $Contratos,
                                'Total' => $total
                                 ]);
        }


}