<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Profesor;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\ProfesorRepository;
use App\Http\Requests\Profesores\StoreProfesorRequest;

class ProfesorController extends Controller
{
    private $profesorRepository;

    /**
     * @param App\Repositories\Eloquent\ProfesorRepository $profesorRepository
     */
    public function __construct(ProfesorRepository $profesorRepository)
    {
        $this->profesorRepository = $profesorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profesores.index', [
            'profesores' => $this->profesorRepository->cursorPaginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Profesores\StoreProfesorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfesorRequest $request)
    {
        try {
            $this->profesorRepository->create($request->validated());
        } catch (Exception $e) {
            return back()->withInput()->withErrors([$e->getMessage()]);
        }

        return redirect('profesores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        return view('profesores.show', compact('profesor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesor $profesor)
    {
        return view('profesores.edit', compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Profesores\StoreProfesorRequest  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProfesorRequest $request, Profesor $profesor)
    {
        try {
            $this->profesorRepository->update($profesor, $request->validated());
        } catch (Exception $e) {
            return back()->withInput()->withErrors([$e->getMessage()]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesor $profesor)
    {
        try {
            $this->profesorRepository->delete($profesor);
        } catch(Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }

        return redirect('profesores');
    }
}
