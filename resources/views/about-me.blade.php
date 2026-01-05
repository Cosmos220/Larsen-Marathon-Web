<x-layout>
    <style>
        /* Styles existants */
        .timeline { position: relative; max-width: 800px; margin: 0 auto; }
        .timeline::before { content: ''; position: absolute; left: 0; top: 0; height: 100%; width: 2px; background: var(--purple-light); }
        .timeline-item { position: relative; padding-left: 2.5rem; margin-bottom: 3rem; }
        .timeline-item::before { content: ''; position: absolute; left: -6px; top: 5px; width: 14px; height: 14px; background: var(--purple); border-radius: 50%; border: 3px solid var(--bg-body); }

        .skills-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; }
        .skill-card { background: var(--bg-card); padding: 2rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow); transition: transform 0.3s; }
        .skill-list li { margin-bottom: 0.5rem; color: var(--text-muted); display: flex; align-items: center; gap: 10px; }
        .skill-list li::before { content: '✔'; color: var(--purple); font-weight: bold; }

        /* --- STYLES MODALE --- */
        .modal-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.8); z-index: 9999;
            display: none; justify-content: center; align-items: center;
            backdrop-filter: blur(5px); opacity: 0; transition: opacity 0.3s ease;
        }
        .modal-overlay.open { display: flex; opacity: 1; }

        .modal-box {
            background: var(--bg-card); width: 90%; max-width: 1000px; height: 85vh;
            border-radius: 12px; position: relative;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            display: flex; flex-direction: column; overflow: hidden;
            transform: scale(0.95); opacity: 0;
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), opacity 0.3s ease;
        }
        .modal-overlay.open .modal-box { transform: scale(1); opacity: 1; }

        .modal-header {
            padding: 1rem; border-bottom: 1px solid var(--border-color);
            display: flex; justify-content: space-between; align-items: center;
            background: var(--bg-section-alt);
        }
        .close-modal-btn { background: none; border: none; font-size: 2rem; line-height: 1; color: var(--text-muted); cursor: pointer; transition: color 0.3s; }
        .close-modal-btn:hover { color: var(--purple); }
        .modal-body { flex: 1; padding: 0; background: #525659; }
        .pdf-frame { width: 100%; height: 100%; border: none; }
    </style>

    <section class="hero" style="padding-bottom: 2rem;">
        <div class="container">
            <h1 style="text-align: center; margin-bottom: 1rem; color: var(--text-main);">
                <span data-en="About Me" data-fr="À Propos">About Me</span><span style="color: var(--purple);">.</span>
            </h1>
        </div>
    </section>

    <section>
        <div class="container">

            <div style="display: flex; gap: 3rem; align-items: center; margin-bottom: 5rem; flex-wrap: wrap;">
                <div style="width: 250px; height: 250px; background: var(--bg-section-alt); border-radius: 50%; flex-shrink: 0; margin: 0 auto; overflow: hidden; display: flex; align-items: center; justify-content: center; border: 2px solid var(--border-color);">
                    <img src="{{ asset('/storage/Logo.png') }}" alt="Loïck DAVI" style="width: 100%; height: 100%; object-fit: cover;">
                </div>

                <div style="flex: 1; min-width: 300px;">
                    <h2 style="color: var(--text-main); margin-bottom: 1rem;">Loïck DAVI</h2>
                    <h3 style="color: var(--purple); font-size: 1.2rem; margin-bottom: 1rem;">Développeur d'applications</h3>

                    <p style="color: var(--text-muted); margin-bottom: 1rem; line-height: 1.8;">
                        Étudiant en 2e année de BUT Informatique à l'IUT de Lens. Je suis passionné par les nouvelles technologies et le développement (Java, Web, Mobile).
                    </p>
                    <p style="color: var(--text-main); font-weight: 500;">
                        🎯 Je suis actuellement à la recherche d'un stage de 8 à 10 semaines à partir du mois d'avril.
                    </p>
                </div>
            </div>

            <h2 class="section-title" data-en="My Resume" data-fr="Mon CV">My Resume</h2>

            <div style="display: flex; justify-content: center; gap: 1rem; margin-bottom: 4rem; flex-wrap: wrap;">
                <button onclick="openModal()" class="btn btn-secondary" style="cursor: pointer;">
                    👁️ <span data-en="Preview CV" data-fr="Aperçu du CV">Aperçu du CV</span>
                </button>

                <a href="{{ asset('CV-Davi-Loïck-Développeur-d-applications.pdf') }}" download class="btn btn-primary">
                    📥 <span data-en="Download PDF" data-fr="Télécharger PDF">Download PDF</span>
                </a>
            </div>

            <hr style="margin: 5rem 0; border: 0; border-top: 1px solid var(--border-color);">

            <h2 class="section-title" data-en ="Technical Skills "data-fr="Compétences">Technical Skills</h2>
            <div class="skills-grid">
                @foreach($skills as $category => $items)
                    <div class="skill-card">
                        <h3 style="color: var(--purple); margin-bottom: 1rem;">{{ $category }}</h3>
                        <ul class="skill-list">
                            @foreach($items as $item) <li>{{ $item }}</li> @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>

            <hr style="margin: 5rem 0; border: 0; border-top: 1px solid var(--border-color);">

            <h2 class="section-title" data-en = "Education & Experience"data-fr="Parcours & Formation">Education & Experience</h2>
            <div class="timeline">
                @foreach($timeline as $item)
                    <div class="timeline-item">
                        <span style="color:var(--purple); font-weight:bold;">{{ $item['date'] }}</span>
                        <h3 style="font-size:1.2rem; color: var(--text-main);">{{ $item['title'] }}</h3>
                        <p style="font-style:italic; color:var(--text-muted); margin-bottom: 0.5rem;">{{ $item['place'] }}</p>
                        <p style="color: var(--text-muted);">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <div id="cvModal" class="modal-overlay" onclick="closeModal(event)">
        <div class="modal-box">
            <div class="modal-header">
                <h3 style="margin:0;">Aperçu du CV</h3>
                <button class="close-modal-btn" onclick="closeModal(event, true)">×</button>
            </div>
            <div class="modal-body">
                <iframe src="{{ asset('CV-Davi-Loïck-Développeur-d-applications.pdf') }}" class="pdf-frame" title="CV Viewer"></iframe>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            const modal = document.getElementById('cvModal');
            modal.style.display = 'flex';
            setTimeout(() => { modal.classList.add('open'); }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeModal(event, force = false) {
            const modal = document.getElementById('cvModal');
            if (event.target.id === 'cvModal' || force) {
                modal.classList.remove('open');
                setTimeout(() => {
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }, 300);
            }
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                const modal = document.getElementById('cvModal');
                if(modal.classList.contains('open')) closeModal(event, true);
            }
        });
    </script>
</x-layout>
