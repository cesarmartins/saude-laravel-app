<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PacienteController extends Controller
{

    /**
     * @return Collection
     */
    public function index()
    {
        return Paciente::all();
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'pac_nome' => 'required|string|max:255',
            'pac_dataNascimento' => 'required|date'
        ]);
        return Paciente::create($request->all());
    }


    /**
     * @param Paciente $paciente
     * @return Paciente
     */
    public function show(Paciente $paciente)
    {
        return $paciente;
    }

    /**
     * @param Request $request
     * @param Paciente $paciente
     * @return Paciente
     */
    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'pac_nome' => 'sometimes|required|string|max:255',
            'pac_dataNascimento' => 'sometimes|required|date',
            'pac_telefone' => 'sometimes|required|string|max:15',
        ]);

        $paciente->update($request->all());

        return $paciente;
    }

    /**
     * @param Paciente $paciente
     * @return Application|ResponseFactory|\Illuminate\Foundation\Application|Response
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return response(null, 204);
    }
}
