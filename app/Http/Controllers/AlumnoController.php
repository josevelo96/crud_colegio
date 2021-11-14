<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\AlumnoRepository;
use App\Repositories\Eloquent\GradoRepository;
use App\Http\Requests\Alumnos\StoreAlumnoRequest;

class AlumnoController extends Controller
{
    private $alumnoRepository;

    public function __construct(AlumnoRepository $alumnoRepository)
    {
        $this->alumnoRepository = $alumnoRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alumnos.index', [
            'alumnos' => $this->alumnoRepository->cursorPaginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Alumnos\StoreAlumnoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlumnoRequest $request)
    {
        try {
            $this->alumnoRepository->create($request->validated());
        } catch (Exception $e) {
            return back()->withInput()->withErrors([$e->getMessage()]);
        }

        return redirect('alumnos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Alumnos\StoreAlumnoRequest  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAlumnoRequest $request, Alumno $alumno)
    {
        try {
            $this->alumnoRepository->update($alumno, $request->validated());
        } catch (Exception $e) {
            return back()->withInput()->withErrors([$e->getMessage()]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        try {
            $this->alumnoRepository->delete($alumno);
        }  catch(Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }

        return redirect('alumnos');
    }

    /**
     * @param App\Models\Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function clases(Alumno $alumno)
    {
        return view('alumnos.clases', compact('alumno'));
    }

    /**
     * @param App\Repositories\Eloquent\GradoRepository $gradoRepository
     * @param App\Models\Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function agregar_clase(GradoRepository $gradoRepository, Alumno $alumno)
    {
        return view('alumnos.agregar_clase', [
            'alumno' => $alumno,
            'grados' => $gradoRepository->all(),
        ]);
    }
}
