<?php

namespace App\Http\Controllers;

use App\Models\LetterType;
use App\Models\Letters;
use App\Models\User;
use Illuminate\Http\Request;

class LettersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letter = Letters::with('letterType', 'user')->get();
        return view('data.datasurat.index', compact('letter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $guru = User::all()->where('role', 'guru');
         $data = LetterType::all();

         return view('data.datasurat.create', compact('data','guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $arrayDistinct = array_count_values($request->recipients);
    $arrayAssoc = [];

    foreach ($arrayDistinct as $id => $count) {
        $user = User::find($id);
        if ($user) {
            $arrayItem = [
                "id" => $id,
                "name" => $user->name,
            ];

            array_push($arrayAssoc, $arrayItem);
        }
    }

    $request['recipients'] = $arrayAssoc;

    $process = Letters::create([
        'letter_perihal' => $request->letter_perihal,
        'letter_type_id' => $request->letter_type_id ,
        // . '/000' . $id . '/SMK Wikrama/XII/' . date('Y')
        'content' => $request->content,
        'recipients' => $request->recipients,
        'attachment' => $request->attachment,
        'notulis' => $request->notulis
    ]);

    if ($process) {
        $letter = Letters::where('letter_type_id', $request->letter_type_id)
                        ->orderBy('created_at', 'DESC')
                        ->first();

        if ($letter) {
            return redirect()->route('data.datasurat.print', $letter->id);
        } else {
            return redirect()->route('data.datasurat.home')->with('failed', 'Gagal menemukan data surat');
        }
    } else {
        return redirect()->route('data.datasurat.home')->with('failed', 'Gagal membuat data surat');
    }


    }

    /**
     * Display the specified resource.
     */
    public function show(letters $letters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(letters $letters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, letters $letters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(letters $letters)
    {
        //
    }
}
