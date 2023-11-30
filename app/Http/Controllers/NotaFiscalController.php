<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetNotaByNumberRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNotaFiscalRequest;
use App\Mail\NotaFiscal;
use App\Models\Nota;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NotaFiscalController extends Controller
{
    public function store(StoreNotaFiscalRequest $request){

        try {

            DB::beginTransaction();

            $nota = Nota::create([
                'user_id'   => auth()->user()->id,
                'numero'    => $request->numero,
                'valor'     => $request->valor,
                'cnpj_remetente' => $request->cnpj_remetente,
                'nome_remetente' => $request->nome_remetente,
                'cnpj_transportador' => $request->cnpj_transportador,
                'nome_transportador' => $request->nome_transportador
            ]);

            Mail::to(auth()->user()->email)->send(new NotaFiscal(['name' => auth()->user()->name, 'nota' => $nota]));

            DB::commit();

            return response($nota, 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response('Erro ao inserir nota fiscal. ' . $th->getMessage(), 500);
        }
    }

    public function getAll(Request $request){
        Nota::where('user_id', auth()->user()->id)->update(['data_emissao' => Carbon::now()]);
        return Nota::where('user_id', auth()->user()->id)->get();
    }

    public function getByNumber(GetNotaByNumberRequest $request){
        Nota::where('user_id', auth()->user()->id)->where('numero', $request->numero)->update(['data_emissao' => Carbon::now()]);
        return Nota::where('user_id', auth()->user()->id)->where('numero', $request->numero)->get();
    }
}
