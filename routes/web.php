<?php

use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

// Page d'accueil (Hero)

Route::get('/', function () {
    // take(3) limite à 3 résultats
    $projects = Project::latest()->take(3)->get();
    return view('home', compact('projects'));
})->name('home');

// Page Projets (Gérée par le contrôleur car il y a la base de données)
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');


Route::get('/cv', function () {
    return view('cv');
})->name('cv');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Routes Admin (Ajout de projet)
Route::get('/admin/add-project', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/admin/add-project', [ProjectController::class, 'store'])->name('projects.store');


// Route Page "Tous les projets" (Celle-ci garde tous les projets)
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// routes/web.php

Route::get('/about', function () {
    // DONNÉES EXTRAITES DE TON CV

    // 1. Compétences
    $skills = [
        'Développement App' => ['Java (POO) / JavaFX', 'C#', 'Python (Flask)', 'Bash'],
        'Web Full-Stack' => ['PHP / Laravel', 'React', 'HTML5 / CSS3'],
        'Bases de Données' => ['MySQL', 'PostgreSQL'],
        'Outils & Autres' => ['Git (GitHub/GitLab)', 'Unity', 'Suite JetBrains', 'Visual Studio Code'],
        'Langues' => ['Français (Natif)', 'Anglais (B1)']
    ];

    // 2. Parcours (Timeline)
    $timeline = [
        [
            'date' => 'Sept 2024 - Présent',
            'title' => 'BUT Informatique (2e année)',
            'place' => 'IUT de Lens',
            'desc' => 'Actuellement en 2e année. Recherche d\'un stage de 8 à 10 semaines à partir d\'avril.'
        ],
        [
            'date' => '2023 - 2024',
            'title' => 'Vice-trésorier du BDE',
            'place' => 'IUT de Lens',
            'desc' => 'Expérience associative au Bureau des Étudiants. Gestion d\'équipe et organisation.'
        ],
        [
            'date' => 'Juin 2024',
            'title' => 'Baccalauréat Technologique STI2D',
            'place' => 'Lycée Carnot, Bruay-la-Buissière',
            'desc' => 'Spécialité SIN (Systèmes d\'information et numérique).'
        ]
    ];

    return view('about-me', compact('skills', 'timeline'));
})->name('about');
