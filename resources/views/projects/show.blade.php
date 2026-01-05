<x-layout>
    <style>
        .project-container {
            max-width: 900px; /* On limite la largeur pour la lisibilité (comme sur l'image) */
            margin: 0 auto;
        }

        /* 1. LIEN RETOUR */
        .back-link {
            display: inline-flex;
            align-items: center;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            transition: color 0.3s ease;
        }
        .back-link:hover {
            color: var(--purple);
        }

        /* 2. TITRE */
        .project-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--text-main);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        /* 3. IMAGE BANNIÈRE */
        .project-banner {
            width: 100%;
            height: 400px; /* Une belle hauteur */
            background-color: var(--bg-card); /* Fond gris/sombre si l'image est un PNG transparent */
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
            margin-bottom: 2rem;
            position: relative;
        }
        .project-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Remplit tout le cadre */
            object-position: center;
        }

        /* 4. SECTION INFOS */
        .info-section {
            margin-bottom: 2rem;
        }
        .info-label {
            font-weight: 700;
            color: var(--text-main);
            margin-right: 0.5rem;
        }
        .tech-list {
            display: inline-flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        /* Style des tags pour qu'ils ressemblent à du texte propre ou des badges subtils */
        .tech-badge {
            color: var(--purple);
            font-weight: 600;
            font-size: 1rem;
        }
        /* Séparateur virgule via CSS pour faire "clean" */
        .tech-badge:not(:last-child)::after {
            content: ", ";
            color: var(--text-muted);
        }

        .project-desc {
            font-size: 1.1rem;
            line-height: 1.7;
            color: var(--text-muted);
            margin-top: 1rem;
            white-space: pre-wrap;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .project-banner { height: 250px; }
            .project-title { font-size: 2rem; }
        }
    </style>

    <section style="padding-top: 2rem; padding-bottom: 5rem;">
        <div class="container project-container">

            <a href="{{ route('projects.index') }}" class="back-link">
                ← <span data-en="Back to portfolio" data-fr="Retour au portfolio">Retour au portfolio</span>
            </a>

            <h1 class="project-title">{{ $project->title }}</h1>

            <div class="project-banner">
                @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                @else
                    <div style="width:100%; height:100%; display:flex; align-items:center; justify-content:center; background: linear-gradient(135deg, var(--bg-card), var(--bg-section-alt));">
                        <span style="font-size: 3rem; font-weight:bold; color: var(--purple); opacity:0.5;">
                            {{ substr($project->title, 0, 1) }}
                        </span>
                    </div>
                @endif
            </div>

            <div class="info-section">

                <div style="margin-bottom: 1.5rem;">
                    <span class="info-label" data-en="Technologies used :" data-fr="Technos utilisées :">Technos utilisées :</span>
                    <span class="tech-list">
                        @foreach($project->tags as $tag)
                            <span class="tech-badge">{{ $tag }}</span>
                        @endforeach
                    </span>
                </div>

                <div>
                    <span class="info-label" style="display:block; margin-bottom:0.5rem;" data-en="Description :" data-fr="Description :">Description :</span>
                    <div class="project-desc">
                        <span data-en="{{ $project->desc_en }}" data-fr="{{ $project->desc_fr }}">
                            {{ $project->desc_en }}
                        </span>
                    </div>
                </div>

                <div style="margin-top: 2rem;">
                    <a href="{{ $project->link }}" target="_blank" class="btn btn-primary">
                        <span data-en="Visit Project" data-fr="Voir le projet">Voir le projet</span>
                        <span style="margin-left:5px;">↗</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout>
