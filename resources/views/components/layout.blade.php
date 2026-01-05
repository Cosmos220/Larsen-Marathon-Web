<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loïck Davi - Portfolio</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        /* --- VARIABLES --- */
        :root {
            --purple: #8b5cf6; --purple-light: #a78bfa; --purple-dark: #7c3aed;
            --bg-body: #ffffff; --bg-section-alt: #f9fafb; --bg-card: #ffffff;
            --bg-nav: rgba(255, 255, 255, 0.95);
            --text-main: #111827; --text-muted: #4b5563;
            --border-color: #e5e7eb; --shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            --blob-opacity: 0.1;
        }

        body.dark-mode {
            --bg-body: #0f172a; --bg-section-alt: #1e293b; --bg-card: #1e293b;
            --bg-nav: rgba(15, 23, 42, 0.95);
            --text-main: #f3f4f6; --text-muted: #9ca3af;
            --border-color: #334155; --shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            --blob-opacity: 0.2;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            background-color: var(--bg-body); color: var(--text-main);
            display: flex; flex-direction: column; min-height: 100vh;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; width: 100%; }

        /* --- CSS NAVBAR (Appliqué au composant x-navbar) --- */
        header {
            position: fixed; top: 0; width: 100%;
            background: var(--bg-nav); backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px rgba(0,0,0,0.1); z-index: 1000;
            transition: all 0.3s ease; border-bottom: 1px solid var(--border-color);
        }

        nav {
            display: flex; justify-content: space-between; align-items: center;
            height: 3rem;
            padding: 2.5rem 0;
        }

        .logo { font-size: 1.5rem; font-weight: 700; color: var(--purple); text-decoration: none; }
        .nav-links { display: flex; gap: 1.5rem; list-style: none; align-items: center; }
        .nav-links a { color: var(--text-muted); text-decoration: none; font-weight: 500; transition: color 0.3s ease; position: relative; }
        .nav-links a:hover, .nav-links a.active-link { color: var(--purple); }

        /* CONTROLS (Langue & Theme) */
        .controls-container { display: flex; align-items: center; gap: 1rem; }
        .lang-switcher { display: flex; gap: 0.5rem; }
        .control-btn { padding: 0.4rem 0.8rem; border: 1px solid var(--border-color); background: var(--bg-card); color: var(--text-muted); border-radius: 6px; cursor: pointer; font-size: 0.9rem; transition: all 0.3s ease; }
        .control-btn:hover, .control-btn.active { background: var(--purple); color: white; border-color: var(--purple); }
        .theme-toggle-btn { font-size: 1.2rem; padding: 0.3rem 0.6rem; }
        .mobile-menu-btn { display: none; background: none; border: none; font-size: 1.5rem; cursor: pointer; color: var(--text-main); }

        /* MAIN CONTENT */
        main { flex: 1; padding-top: 110px; } /* Ajusté car la nav est plus grande */
        section { padding: 5rem 0; display: flex; align-items: center; }

        /* HERO STYLES */
        .hero { background: linear-gradient(135deg, var(--bg-section-alt) 0%, var(--bg-body) 100%); overflow: hidden; position: relative; }
        .hero-grid { display: flex; align-items: center; justify-content: space-between; gap: 4rem; }
        .hero-text { flex: 1; }
        .hero-text h1 { font-size: 3.5rem; margin-bottom: 1rem; color: var(--text-main); line-height: 1.2; }
        .hero-text h1 .dot { color: var(--purple); }
        .hero-text .tagline { font-size: 1.5rem; color: var(--purple); margin-bottom: 1.5rem; font-weight: 600; }
        .hero-text .subtitle { font-size: 1.1rem; color: var(--text-muted); margin-bottom: 3rem; max-width: 600px; }

        .hero-image-container { flex: 1; position: relative; display: flex; justify-content: center; align-items: center; }
        .blob-bg { position: absolute; z-index: -1; width: 400px; height: 400px; background: linear-gradient(45deg, var(--purple), var(--purple-light)); filter: blur(80px); opacity: var(--blob-opacity); border-radius: 50%; animation: blobFloat 8s infinite alternate ease-in-out; }
        .hero-img-placeholder { width: 350px; height: 400px; background-color: var(--border-color); border-radius: 20px; box-shadow: var(--shadow); position: relative; overflow: hidden; }
        @keyframes blobFloat { from { transform: translate(0, 0) scale(1); } to { transform: translate(20px, -20px) scale(1.1); } }

        /* BOUTONS */
        .cta-buttons { display: flex; gap: 1rem; flex-wrap: wrap; }
        .btn { padding: 0.8rem 2rem; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 0.5rem; }
        .btn-primary { background: var(--purple); color: white; border: 2px solid var(--purple); }
        .btn-primary:hover { background: var(--purple-dark); border-color: var(--purple-dark); transform: translateY(-2px); box-shadow: 0 10px 25px rgba(139, 92, 246, 0.3); }
        .btn-secondary { background: transparent; color: var(--text-main); border: 2px solid var(--border-color); }
        .btn-secondary:hover { border-color: var(--purple); color: var(--purple); transform: translateY(-2px); }

        /* GENERAL STYLES (Cards, Titles, Footer) */
        .section-title { font-size: 2.5rem; margin-bottom: 3rem; text-align: center; color: var(--text-main); position: relative; }
        .section-title::after { content: ''; display: block; width: 60px; height: 4px; background: var(--purple); margin: 1rem auto 0; border-radius: 2px; }

        .projects-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2rem; width: 100%; margin-top: 2rem; }
        .project-card { background: var(--bg-card); border-radius: 16px; padding: 2rem; box-shadow: var(--shadow); transition: all 0.3s ease; border: 1px solid var(--border-color); display: flex; flex-direction: column; justify-content: space-between; height: 100%; }
        .project-card:hover { transform: translateY(-5px); border-color: var(--purple); }
        .project-type { align-self: flex-start; width: fit-content; display: inline-block; padding: 0.4rem 1rem; background: var(--bg-section-alt); color: var(--purple); border-radius: 20px; font-size: 0.85rem; font-weight: 600; margin-bottom: 1rem; }
        .project-card h3 { font-size: 1.5rem; margin-bottom: 1rem; color: var(--text-main); }
        .project-card p { color: var(--text-muted); margin-bottom: 1.5rem; }
        .tech-tags { display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1.5rem; }
        .tech-tag { padding: 0.3rem 0.8rem; background: var(--bg-section-alt); color: var(--text-muted); border: 1px solid var(--border-color); border-radius: 6px; font-size: 0.85rem; }
        .project-link { color: var(--purple); text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: gap 0.3s ease; }

        #skills, #cv { background: var(--bg-section-alt); }
        .skills-intro { color: var(--text-muted); }
        .skill-category { background: var(--bg-card); border-color: var(--border-color); }
        .skill-list li { color: var(--text-muted); }
        .cv-preview { background: var(--bg-card); }
        .cv-item h3, .cv-item h4 { color: var(--text-main); }
        .cv-item p { color: var(--text-muted); }

        .contact-section { background: linear-gradient(135deg, var(--purple) 0%, var(--purple-dark) 100%); color: white; }
        .contact-section .section-title { color: white; } .contact-section .section-title::after { background: white; }
        .contact-form { background: var(--bg-card); }
        .form-group label { color: var(--text-main); }
        .form-group input, .form-group textarea { background: var(--bg-body); color: var(--text-main); border-color: var(--border-color); }

        footer { background: var(--bg-body); color: var(--text-muted); border-top: 1px solid var(--border-color); text-align: center; padding: 3rem 0; display: flex; justify-content: center; align-items: center; flex-direction: column; }

        @media (max-width: 992px) {
            .hero-grid { flex-direction: column-reverse; text-align: center; gap: 3rem; }
            .hero-text .subtitle { margin: 0 auto 3rem; }
            .cta-buttons { justify-content: center; }
        }
        @media (max-width: 768px) {
            .nav-links { position: fixed; top: 85px; left: -100%; flex-direction: column; background: var(--bg-card); width: 100%; padding: 2rem; box-shadow: var(--shadow); transition: left 0.3s ease; align-items: flex-start; }
            .nav-links.active { left: 0; }
            .mobile-menu-btn { display: block; }
            .lang-switcher { display: none; }
            .hero-content h1 { font-size: 2.5rem; }
        }
    </style>
</head>
<body id="body">

<x-navbar />

<main>
    {{ $slot }}
</main>

<x-footer />

<script>
    function toggleMenu() {
        document.getElementById('navLinks').classList.toggle('active');
    }

    // Langue
    function switchLanguage(lang) {
        // Mettre à jour les boutons (visuel)
        document.querySelectorAll('.lang-switcher .control-btn').forEach(btn => {
            btn.classList.remove('active');
            if (btn.innerText.toLowerCase() === lang) {
                btn.classList.add('active');
            }
        });

        // Mettre à jour le texte de la page
        document.querySelectorAll('[data-en]').forEach(el => {
            if (lang === 'fr') {
                if (el.dataset.fr) el.innerText = el.dataset.fr;
            } else {
                if (el.dataset.en) el.innerText = el.dataset.en;
            }
        });

        // SAUVEGARDE DANS LE NAVIGATEUR
        localStorage.setItem('lang', lang);
    }

    // 2. Au chargement de la page : Vérifier s'il y a une langue sauvegardée
    document.addEventListener('DOMContentLoaded', () => {
        // Récupère la langue stockée (ou 'en' par défaut si rien n'est stocké)
        const savedLang = localStorage.getItem('lang') || 'en';

        // Applique la langue sauvegardée
        switchLanguage(savedLang);
    });

    const body = document.getElementById('body');
    const themeIcon = document.getElementById('theme-icon');
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme === 'dark') {
        body.classList.add('dark-mode');
        if(themeIcon) themeIcon.innerText = '☀️';
    }

    function toggleTheme() {
        body.classList.toggle('dark-mode');
        let theme = 'light';
        if (body.classList.contains('dark-mode')) {
            theme = 'dark';
            if(themeIcon) themeIcon.innerText = '☀️';
        } else {
            if(themeIcon) themeIcon.innerText = '🌙';
        }
        localStorage.setItem('theme', theme);
    }
</script>
</body>
</html>
