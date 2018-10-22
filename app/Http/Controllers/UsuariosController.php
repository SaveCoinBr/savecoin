<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Psy\debug;

class UsuariosController extends Controller
{
    private $usuarioLogado = null;

    public function __construct()
    {
        $this->middleware('auth');

        $this->usuarioLogado = Auth::user();
        $this->Usuario = new User();
    }

    public function index() {
        $usuarios = $this->Usuario->paginate(5);
        return view('usuarios.index', compact('usuarios'));
    }

    private function save(array $dados){
        if(empty($dados['id'])){
            $usuario = $this->Usuario;
        }else{
            $usuario = $this->Usuario->where('id', $dados['id'])->first();
        }
        $usuario->id =$dados['id'];
        $usuario->nm_usuario =$dados['name'];
        $usuario->email =$dados['email'];
        $usuario->password =Hash::make($dados['password']);
        return $usuario->save();
    }

    public function cadastrar(Request $request){
        if($request->method() == 'POST'){
            $retorno = $this->save($request->all());
            if($retorno !== false) {
                return redirect()->route('usuarios.index');
            }
        }
        return view('usuarios.cadastrar', ['tela' => 'cadastrar']);
    }

    public function editar(Request $request, $id){
        if($request->method() == 'POST'){
//            dd($request->all());
            $retorno = $this->save($request->all());
            if($retorno !== false) {
                return redirect()->route('usuarios.index');
            }
        }else {
            $usuario = $this->Usuario->where('id', $id)->first();
            return (($usuario !== null) ? view('usuarios.cadastrar', array_merge(['tela' => 'editar'],compact('usuario'))) : abort(404));
        }
    }

    public function visualizar($id) {
        $usuario = $this->Usuario->where('id', $id)->first();
        return (($usuario !== null) ? view('usuarios.visualizar', compact('usuario')) : abort(404));
    }
}
