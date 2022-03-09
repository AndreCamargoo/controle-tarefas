<?php

namespace App\Http\Controllers;

use App\Exports\TarefasExport;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

use Maatwebsite\Excel\Facades\Excel;

class TarefaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Verificação manual
            if (auth()->check()) {
                return 'Seja bem vindo novamente ' . auth()->user()->name;
            } else {
                return 'Você não está logado no sistema';
            } 
        */
        $user_id = auth()->user()->id;
        $tarefas = Tarefa::where('user_id', $user_id)->paginate(10);

        return view('tarefa.index', [
            'tarefas' => $tarefas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all('tarefa', 'data_limite_conclusao');
        $dados['user_id'] = auth()->user()->id;

        $tarefa = Tarefa::create($dados);

        $destinatario = auth()->user()->email;

        Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));

        return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', ['tarefa' => $tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        if ($tarefa->user_id != auth()->user()->id) {
            return view('acesso-negado');
        }

        return view('tarefa.edit', [
            'tarefa' => $tarefa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        if ($tarefa->user_id != auth()->user()->id) {
            return view('acesso-negado');
        }

        $tarefa->update($request->all());
        return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        if ($tarefa->user_id != auth()->user()->id) {
            return view('acesso-negado');
        }

        $tarefa->delete();

        return redirect()->route('tarefa.index');
    }

    public function exportacao($extensao)
    {
        if (in_array($extensao, ['xlsx', 'csv', 'pdf'])) {
            return Excel::download(new TarefasExport, 'lista_de_tarefas.' . $extensao);
        }

        return redirect()->route('tarefa.index');
    }

    public function exportar()
    {
        $tarefas = auth()->user()->tarefas()->get();

        $pdf = PDF::loadView('tarefa.pdf', [
            'tarefas' => $tarefas
        ]);

        //Tipo de papel a4, latter
        //orientação do papel: landscape (paisagem), portrait (retrato)
        $pdf->setPaper('a4', 'landscape');

        //return $pdf->download('lista_de_tarefas.pdf');
        return $pdf->stream('lista_de_tarefas.pdf');
    }
}