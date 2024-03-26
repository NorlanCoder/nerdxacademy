<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class formationController extends Controller
{
    public function index()
    {
        return view('frontend.formations.index', [
            'formations' => Formation::all()
        ]);
    }

    public function home()
    {
        return view('frontend.home', [
            'formations' => Formation::all()
        ]);
    }

    public function create()
    {
        return view('frontend.formations.create');
    }

    public function show(Formation $formation)
    {
        return view('frontend.formations.show', [
            'formation' => $formation
        ]);
    }

    public function edit(Formation $formation)
    {
        return view('frontend.formations.edit', [
            'formation' => $formation
        ]);
    }

    public function store(Request $request)
    {
        // dd('$formation');
        $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'string', 'max:255'],
            'format' => ['required', 'string', 'max:255'],
            'time' => ['required', 'string', 'max:255'],
            'adress' => ['required', 'string', 'max:255'],
            'participants' => ['required', 'integer'],
            'language' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image'],
            'price' => ['required', 'integer'],
            'content' => ['required', 'string'],
        ]);

        $formation = Formation::create(
            [
                ...$request->only(
                    'label',
                    'date',
                    'duration',
                    'format',
                    'time',
                    'adress',
                    'participants',
                    'language',
                    'price',
                    'content'
                )
            ]
        );

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('formation_images', 'public');
            $formation->image = $imagePath;
            $formation->save();
        }

        return redirect()->route('home')->with('success', 'Formation ajoutée avec succès');
    }

    public function update(Request $request, Formation $formation)
    {
        $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'string', 'max:255'],
            'format' => ['required', 'string', 'max:255'],
            'time' => ['required', 'string', 'max:255'],
            'adress' => ['required', 'string', 'max:255'],
            'participants' => ['required', 'integer'],
            'language' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image'],
            'price' => ['required', 'integer'],
            'content' => ['required', 'string'],
        ]);

        $formation->update([
            ...$request->only(
                'label',
                'date',
                'duration',
                'format',
                'time',
                'adress',
                'participants',
                'language',
                'price',
                'content'
            )
        ]);

        return redirect()->route('index')->with('success', 'Formation modifiée avec succès');
    }

    public function destroy(Formation $formation)
    {
        $formation->delete();

        return redirect()->route('home')->with('success', 'Formation supprimée avec succès');
    }
}
