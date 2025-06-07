<?php

namespace App\Http\Controllers;

use App\Desktop;
use Illuminate\Http\Request;

class DesktopController extends Controller
{

    public function index()
    {
        $desktops = Desktop::orderBy('nombre')->paginate(10);
        return view('desktops.index', compact('desktops'));
    }

    public function create()
    {
        return view('desktops.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        Desktop::create($validated);

        return redirect()->route('desktops.index')
            ->with('success', 'Desktop creado exitosamente.');
    }

    public function show(Desktop $desktop)
    {
        return view('desktops.show', compact('desktop'));
    }

    public function edit(Desktop $desktop)
    {
        return view('desktops.edit', compact('desktop'));
    }

    public function update(Request $request, Desktop $desktop)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $desktop->update($validated);

        return redirect()->route('desktops.show', $desktop)
            ->with('success', 'Desktop actualizado exitosamente.');
    }

    public function destroy(Desktop $desktop)
    {
        $desktop->delete();

        return redirect()->route('desktops.index')
            ->with('success', 'Desktop eliminado exitosamente.');
    }
}
