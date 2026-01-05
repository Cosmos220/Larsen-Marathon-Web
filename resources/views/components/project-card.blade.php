@props(['project'])

<div class="project-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">

    <div style="height: 140px; width: 100%; background-color: var(--bg-section-alt); border-bottom: 1px solid var(--border-color); position: relative; flex-shrink: 0;">

        @if(isset($project->image) && $project->image)
            <img src="{{ asset('storage/' . $project->image) }}"
                 alt="{{ $project->title }}"
                 style="width: 100%; height: 100%; object-fit: cover;">
        @else
            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: var(--purple-light); font-size: 3rem; font-weight: bold; opacity: 0.3;">
                {{ substr($project->title, 0, 1) }}
            </div>
        @endif
    </div>

    <div style="padding: 1.5rem; display: flex; flex-direction: column; flex: 1;">

        <span class="project-type" style="margin-bottom: 0.5rem; font-size: 0.75rem;" data-en="{{ $project->category }}" data-fr="{{ $project->category }}">
            {{ $project->category }}
        </span>

        <h3 style="font-size: 1.25rem; margin-bottom: 0.5rem; line-height: 1.3;" data-en="{{ $project->title }}" data-fr="{{ $project->title }}">
            {{ $project->title }}
        </h3>

        <p style="margin-bottom: 1rem; font-size: 0.95rem; line-height: 1.5;" data-en="{{ Str::limit($project->desc_en, 90) }}" data-fr="{{ Str::limit($project->desc_fr, 90) }}">
            {{ Str::limit($project->desc_en, 90) }} </p>

        <div class="tech-tags" style="margin-bottom: 1rem;">
            @foreach($project->tags as $tag)
                <span class="tech-tag" style="font-size: 0.75rem; padding: 0.2rem 0.6rem;">{{ $tag }}</span>
            @endforeach
        </div>

        <a href="{{ route('projects.show', $project->id) }}" class="project-link" style="margin-top: auto; font-size: 0.9rem;">
            <span data-en="Read More →" data-fr="En savoir plus →">Read More →</span>
        </a>
    </div>

</div>
