<x-layout>
    <section id="projects">
        <div class="container">
            <h2 class="section-title" data-en="Featured Projects" data-fr="Projets Sélectionnés">Featured Projects</h2>

            <div class="projects-grid">
                @foreach($projects as $project)
                    <x-project-card :project="$project" />
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
