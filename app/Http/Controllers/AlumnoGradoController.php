<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\AlumnoGrado;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\GradoRepository;
use App\Repositories\Eloquent\AlumnoRepository;
use App\Repositories\Eloquent\AlumnoGradoRepository;
use App\Http\Requests\AlumnosGrados\StoreAlumnoGradoRequest;

class AlumnoGradoController extends Controller
{
    private $alumnoGradoRepository;

    public function __construct(AlumnoGradoRepository $alumnoGradoRepository)
    {
        $this->alumnoGradoRepository = $alumnoGradoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clases.index', [
            'alumnos_grados' => $this->alumnoGradoRepository->cursorPaginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param App\Repositories\Eloquent\AlumnoRepository $alumnoRepository
     * @param App\Repositories\Eloquent\GradoRepository $gradoRepository
     * @return \Illuminate\Http\Response
     */
    public function create(AlumnoRepository $alumnoRepository, GradoRepository $gradoRepository)
    {
        return view('clases.create', [
            'alumnos' => $alumnoRepository->all(),
            'grados' => $gradoRepository->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\AlumnosGrados\StoreAlumnoGradoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlumnoGradoRequest $request)
    {
        try {
            $alumno_grado = $this->alumnoGradoRepository->create($request->validated());
        } catch (Exception $e) {
            return back()->withInput()->withErrors([$e->getMessage()]);
        }

        return redirect('clases');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\AlumnoGrado $alumno_grado
     * @return \Illuminate\Http\Response
     */
    public function show(AlumnoGrado $alumno_grado)
    {
        return view('clases.show', compact('alumno_grado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Repositories\Eloquent\AlumnoRepository $alumnoRepository
     * @param App\Repositories\Eloquent\GradoRepository $gradoRepository
     * @param  App\Models\AlumnoGrado $alumno_grado
     * @return \Illuminate\Http\Response
     */
    public function edit(AlumnoRepository $alumnoRepository, GradoRepository $gradoRepository, AlumnoGrado $alumno_grado) 
    {
        return view('clases.edit', [
            'alumno_grado' => $alumno_grado,
            'alumnos' => $alumnoRepository->all(),
            'grados' => $gradoRepository->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\AlumnosGrados\StoreAlumnoGradoRequest  $request
     * @param  App\Models\AlumnoGrado $alumno_grado
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAlumnoGradoRequest $request, AlumnoGrado $alumno_grado)
    {
        try {
            $this->alumnoGradoRepository->update($alumno_grado, $request->validated());
        } catch (Exception $e) {
            return back()->withInput()->withErrors([$e->getMessage()]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\AlumnoGrado $alumno_grado
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlumnoGrado $alumno_grado)
    {
        try {
            $this->alumnoGradoRepository->delete($alumno_grado);
        } catch(Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }
        return redirect('clases');
    }
}
