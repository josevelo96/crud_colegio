<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Grado;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\GradoRepository;
use App\Http\Requests\Grados\StoreGradoRequest;
use App\Repositories\Eloquent\ProfesorRepository;

class GradoController extends Controller
{
    private $gradoRepository;

    public function __construct(GradoRepository $gradoRepository)
    {
        $this->gradoRepository = $gradoRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('grados.index', [
            'grados' => $this->gradoRepository->cursorPaginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @param App\Repositories\Eloquent\ProfesorRepository $profesorRepository
     * @return \Illuminate\Http\Response
     */
    public function create(ProfesorRepository $profesorRepository)
    {
        return view('grados.create', [
            'profesores' => $profesorRepository->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Grados\StoreGradoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradoRequest $request)
    {
        try {
            $this->gradoRepository->create($request->validated());
        } catch (Exception $e) {
            return back()->withInput()->withErrors([$e->getMessage()]);
        }

        return redirect('grados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function show(Grado $grado)
    {
        return view('grados.show', compact('grado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Repositories\Eloquent\ProfesorRepository $profesorRepository
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfesorRepository $profesorRepository, Grado $grado)
    {
        return view('grados.edit', [
            'grado' => $grado,
            'profesores' => $profesorRepository->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Grados\StoreGradoRequest  $request
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGradoRequest $request, Grado $grado)
    {
        try {
            $this->gradoRepository->update($grado, $request->validated());
        } catch (Exception $e) {
            return back()->withInput()->withErrors([$e->getMessage()]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grado $grado)
    {
        try {
            $this->gradoRepository->delete($grado);
        } catch(Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }

        return redirect('grados');
    }
}
