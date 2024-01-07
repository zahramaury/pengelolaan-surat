<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LetterType;
use Illuminate\Http\Request;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
     {
        $letterTypes = LetterType::all();
        return view('data.klasifikasi.index', compact('letterTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $letterTypes = LetterType::all();

        return view('data.klasifikasi.create', compact('letterTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'letter_code' => 'required|numeric',
            'name_type' => 'required|min:3',
        ]);


        $letterType = LetterType::count();

        LetterType::create([
            'letter_code' => $request->letter_code . '-' . $letterType,
            'name_type' => $request->name_type,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guru = User::all()->where('role', 'guru');
        $letterType = LetterType::find($id);
        return view('data.klasifikasi.detail', compact('letterType', 'guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $letterTypes = LetterType::find($id);
        return view('data.klasifikasi.edit', compact('letterTypes'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LetterType $letterType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        LetterType::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
