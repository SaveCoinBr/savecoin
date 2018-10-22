<?php

namespace App\Http\Controllers;

use App\Banco;
use App\Conta;
use App\TipoConta;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ContasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->Conta = new Conta();
        $this->TipoConta = new TipoConta();
        $this->Banco = new Banco();
    }


    /**
     * INICANDO INDEX E JS PARA LEITURA DA TELA
    */
    public function index(){
        return view('contas.index');
    }

    /**
     * CARREGANDO TODAS AS CONTAS
    */
    public function load_contas(Request $request){
        $contas = $this->Conta->with(['banco', 'tipo_conta'])->where('usuarios_id',Auth::user()->id)->paginate(10);
        return view('contas.load_contas', compact('contas'));
    }

    /**
     * CARREGANDO UMA CONTA
    */
    public function load_conta(Request $request){
        $id = $request->all('id');
        $contas = $this->Conta->where([
            ['usuarios_id', '=',Auth::user()->id],
            ['id', '=', $id]
        ])->first();
        return response()->json($contas);
    }

    /**
     * METODO PARA SAVAR DADOS
    */
    public function salvar(Request $request){

        $dados = $request->all();
        if(empty($dados['id'])){
            $conta = $this->Conta;
        }else{
            $conta = $this->Conta->where('id',$dados['id'])->first();
        }

        $conta->usuarios_id = Auth::user()->id;
        $conta->tipo_conta_id = $dados['tipo_conta'];
        $conta->nm_conta = $dados['nome_conta'];
        $conta->banco_id = $dados['banco'];
        $conta->nu_agencia = $dados['agencia'];
        $conta->nu_conta = $dados['conta'];
        $ret = $conta->save();

        return response()->json(($ret !== false));
    }

    public function load_tipo_contas(Request $request){
        $tiposContas = $this->TipoConta->where('fl_ativo', 1)->get();
        return response()->json($tiposContas);
    }
    public function load_bancos(Request $request){
        $bancos = $this->Banco->get();
        return response()->json($bancos);
    }
}
