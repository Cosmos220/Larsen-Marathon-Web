<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // 1. Affiche ton portfolio avec les projets de la BD
    public function index() {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    // Affiche un projet spécifique
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    // 2. Affiche le formulaire pour ajouter un projet
    public function create()
    {
        return view('projects.create');
    }

    // 3. Sauvegarde le projet dans la BD (AVEC IMAGE)
    public function store(Request $request)
    {
        // Validation (On ajoute les règles pour l'image)
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'desc_en' => 'required',
            'desc_fr' => 'required',
            'link' => 'required|url',
            'tags' => 'required',
            // Validation de l'image : optionnelle, type image, max 2Mo
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gestion des Tags (String -> Array)
        $data['tags'] = array_map('trim', explode(',', $request->tags));

        // 👇 GESTION DE L'UPLOAD DE L'IMAGE 👇
        if ($request->hasFile('image')) {
            // Sauvegarde dans storage/app/public/projects
            $path = $request->file('image')->store('projects', 'public');
            // On ajoute le chemin au tableau de données
            $data['image'] = $path;
        }

        Project::create($data);

        return redirect('/')->with('success', 'Projet ajouté !');
    }
}
