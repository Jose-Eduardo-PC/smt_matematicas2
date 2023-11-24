<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ToolRating;
use Illuminate\Http\Request;

class HerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $ratings = ToolRating::where('user_id', $userId)->get();
        return view('admin.herramientas.index', compact('ratings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Tabla de Cosenos, Senos y Cosenos
    public function show()
    {
        $toolName = "Tabla de Cosenos, Senos y Cosenos";
        $toolRating = ToolRating::where('user_id', auth()->user()->id)
            ->where('tool_name', $toolName)
            ->first();

        if ($toolRating) {
            $rating = $toolRating->rating;
        } else {
            $rating = null;
        }

        return view('admin.herramientas.show', ['rating' => $rating]);
    }
    public function store(Request $request)
    {
        $toolName = "Tabla de Cosenos, Senos y Cosenos";
        $userId = auth()->user()->id;

        // Busca una calificación existente
        $rating = ToolRating::where('user_id', $userId)
            ->where('tool_name', $toolName)
            ->first();

        // Si no existe, crea una nueva instancia
        if (!$rating) {
            $rating = new ToolRating;
            $rating->user_id = $userId;
            $rating->tool_name = $toolName;
        }

        // Actualiza y guarda la calificación
        $rating->rating = $request->rating;
        $rating->save();

        return back()->with('success', 'Calificación guardada exitosamente!');
    }
    //Funciones trigonometricas
    public function show1()
    {
        $toolName = "Funciones trigonometricas";
        $toolRating = ToolRating::where('user_id', auth()->user()->id)
            ->where('tool_name', $toolName)
            ->first();

        if ($toolRating) {
            $rating = $toolRating->rating;
        } else {
            $rating = null;
        }

        return view('admin.herramientas.show1', ['rating' => $rating]);
    }
    public function store1(Request $request)
    {
        $toolName = "Funciones trigonometricas";
        $userId = auth()->user()->id;

        // Busca una calificación existente
        $rating = ToolRating::where('user_id', $userId)
            ->where('tool_name', $toolName)
            ->first();

        // Si no existe, crea una nueva instancia
        if (!$rating) {
            $rating = new ToolRating;
            $rating->user_id = $userId;
            $rating->tool_name = $toolName;
        }

        // Actualiza y guarda la calificación
        $rating->rating = $request->rating;
        $rating->save();

        return back()->with('success', 'Calificación guardada exitosamente!');
    }
    //Calcular Amplitud y Periodo
    public function show2()
    {
        $toolName = "Calcular Amplitud y Periodo";
        $toolRating = ToolRating::where('user_id', auth()->user()->id)
            ->where('tool_name', $toolName)
            ->first();

        if ($toolRating) {
            $rating = $toolRating->rating;
        } else {
            $rating = null;
        }

        return view('admin.herramientas.show2', ['rating' => $rating]);
    }
    public function store2(Request $request)
    {
        $toolName = "Calcular Amplitud y Periodo";
        $userId = auth()->user()->id;

        $rating = ToolRating::where('user_id', $userId)
            ->where('tool_name', $toolName)
            ->first();

        if (!$rating) {
            $rating = new ToolRating;
            $rating->user_id = $userId;
            $rating->tool_name = $toolName;
        }

        $rating->rating = $request->rating;
        $rating->save();

        return back()->with('success', 'Calificación guardada exitosamente!');
    }
    //Calculadora de Triángulos
    public function show3()
    {
        $toolName = "Calculadora de Triángulos";
        $toolRating = ToolRating::where('user_id', auth()->user()->id)
            ->where('tool_name', $toolName)
            ->first();

        if ($toolRating) {
            $rating = $toolRating->rating;
        } else {
            $rating = null;
        }

        return view('admin.herramientas.show3', ['rating' => $rating]);
    }
    public function store3(Request $request)
    {
        $toolName = "Calculadora de Triángulos";
        $userId = auth()->user()->id;

        $rating = ToolRating::where('user_id', $userId)
            ->where('tool_name', $toolName)
            ->first();

        if (!$rating) {
            $rating = new ToolRating;
            $rating->user_id = $userId;
            $rating->tool_name = $toolName;
        }

        $rating->rating = $request->rating;
        $rating->save();

        return back()->with('success', 'Calificación guardada exitosamente!');
    }
    //Calculadora gráfica
    public function show4()
    {
        $toolName = "Calculadora gráfica";
        $toolRating = ToolRating::where('user_id', auth()->user()->id)
            ->where('tool_name', $toolName)
            ->first();

        if ($toolRating) {
            $rating = $toolRating->rating;
        } else {
            $rating = null;
        }

        return view('admin.herramientas.show4', ['rating' => $rating]);
    }
    public function store4(Request $request)
    {
        $toolName = "Calculadora gráfica";
        $userId = auth()->user()->id;

        // Busca una calificación existente
        $rating = ToolRating::where('user_id', $userId)
            ->where('tool_name', $toolName)
            ->first();

        // Si no existe, crea una nueva instancia
        if (!$rating) {
            $rating = new ToolRating;
            $rating->user_id = $userId;
            $rating->tool_name = $toolName;
        }

        // Actualiza y guarda la calificación
        $rating->rating = $request->rating;
        $rating->save();

        return back()->with('success', 'Calificación guardada exitosamente!');
    }
}
