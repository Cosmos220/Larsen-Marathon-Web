<x-layout>
    <section class="hero">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-text">


                    <h1>Loïck DAVI<span class="dot">.</span></h1>

                    <h2 style="font-size: 1.8rem; margin-bottom: 1rem; color: var(--text-main);"
                        data-en="Application Developer"
                        data-fr="Développeur d'applications">
                        Application Developer
                    </h2>

                    <p class="subtitle"
                       data-en="2nd year Computer Science student at IUT de Lens. "
                       data-fr="Étudiant en 2e année de BUT Informatique à l'IUT de Lens.">
                        2nd year Computer Science student at IUT de Lens.
                    </p>

                    <div class="cta-buttons">
                        <a href="{{ route('about') }}" class="btn btn-primary">
                            <span data-en="About me" data-fr="À propos de moi">About me</span>
                            <span>→</span>
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-secondary">
                            <span data-en="Contact Me" data-fr="Me contacter">Contact Me</span>
                        </a>
                    </div>
                </div>

                <div class="hero-image-container">
                    <div class="blob-bg"></div>
                    <div class="hero-img-placeholder" style="z-index: 1;">
                        <img src="{{ asset('/storage/Logo.png') }}" alt="Loïck DAVI" class="hero-img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="latest-projects" style="background-color: var(--bg-section-alt);">
        <div class="container">
            <h2 class="section-title" data-en="Latest Projects" data-fr="Derniers Projets">Latest Projects</h2>

            <div class="projects-grid">
                @foreach($projects as $project)
                    <x-project-card :project="$project" />
                @endforeach
            </div>

            <div style="text-align: center; margin-top: 3rem;">
                <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                    <span data-en="View All Projects →" data-fr="Voir tous les projets →">View All Projects →</span>
                </a>
            </div>
        </div>
    </section>
</x-layout>
