<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alex Morgan - Developer Portfolio</title>
    <style>
        /* --- TON CSS EXACT (Copié-Collé) --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --purple: #8b5cf6; --purple-light: #a78bfa; --purple-dark: #7c3aed;
            --gray-50: #f9fafb; --gray-100: #f3f4f6; --gray-200: #e5e7eb;
            --gray-300: #d1d5db; --gray-600: #4b5563; --gray-700: #374151; --gray-900: #111827;
        }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif; line-height: 1.6; color: var(--gray-900); background-color: white; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        header { position: fixed; top: 0; width: 100%; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); z-index: 1000; transition: all 0.3s ease; }
        nav { display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; }
        .logo { font-size: 1.5rem; font-weight: 700; color: var(--purple); text-decoration: none; transition: transform 0.3s ease; }
        .logo:hover { transform: scale(1.05); }
        .nav-links { display: flex; gap: 2rem; list-style: none; align-items: center; }
        .nav-links a { color: var(--gray-700); text-decoration: none; font-weight: 500; transition: color 0.3s ease; position: relative; }
        .nav-links a:hover { color: var(--purple); }
        .nav-links a::after { content: ''; position: absolute; width: 0; height: 2px; bottom: -5px; left: 0; background-color: var(--purple); transition: width 0.3s ease; }
        .nav-links a:hover::after { width: 100%; }
        .lang-switcher { display: flex; gap: 0.5rem; }
        .lang-btn { padding: 0.4rem 0.8rem; border: 1px solid var(--gray-300); background: white; color: var(--gray-700); border-radius: 6px; cursor: pointer; font-size: 0.9rem; transition: all 0.3s ease; }
        .lang-btn:hover, .lang-btn.active { background: var(--purple); color: white; border-color: var(--purple); }
        .mobile-menu-btn { display: none; background: none; border: none; font-size: 1.5rem; cursor: pointer; color: var(--gray-700); }
        section { padding: 6rem 0; min-height: 100vh; display: flex; align-items: center; }
        .hero { background: linear-gradient(135deg, var(--gray-50) 0%, white 100%); text-align: center; }
        .hero-content h1 { font-size: 3.5rem; margin-bottom: 1rem; color: var(--gray-900); animation: fadeInUp 0.8s ease; }
        .hero-content .tagline { font-size: 1.5rem; color: var(--gray-600); margin-bottom: 2rem; animation: fadeInUp 0.8s ease 0.2s backwards; }
        .hero-content .subtitle { font-size: 1.1rem; color: var(--gray-600); max-width: 600px; margin: 0 auto 3rem; animation: fadeInUp 0.8s ease 0.4s backwards; }
        .cta-buttons { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; animation: fadeInUp 0.8s ease 0.6s backwards; }
        .btn { padding: 1rem 2rem; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; display: inline-block; }
        .btn-primary { background: var(--purple); color: white; border: 2px solid var(--purple); }
        .btn-primary:hover { background: var(--purple-dark); border-color: var(--purple-dark); transform: translateY(-2px); box-shadow: 0 10px 25px rgba(139, 92, 246, 0.3); }
        .btn-secondary { background: white; color: var(--purple); border: 2px solid var(--purple); }
        .btn-secondary:hover { background: var(--purple); color: white; transform: translateY(-2px); box-shadow: 0 10px 25px rgba(139, 92, 246, 0.2); }
        .section-title { font-size: 2.5rem; margin-bottom: 3rem; text-align: center; color: var(--gray-900); position: relative; }
        .section-title::after { content: ''; display: block; width: 60px; height: 4px; background: var(--purple); margin: 1rem auto 0; border-radius: 2px; }
        .projects-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; }
        /* Les styles .project-card sont gérés dans le composant Blade, mais le CSS reste ici pour l'instant */
        .project-card { background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); transition: all 0.3s ease; border: 1px solid var(--gray-200); }
        .project-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(139, 92, 246, 0.15); border-color: var(--purple-light); }
        .project-type { display: inline-block; padding: 0.4rem 1rem; background: var(--gray-100); color: var(--purple); border-radius: 20px; font-size: 0.85rem; font-weight: 600; margin-bottom: 1rem; }
        .project-card h3 { font-size: 1.5rem; margin-bottom: 1rem; color: var(--gray-900); }
        .project-card p { color: var(--gray-600); margin-bottom: 1.5rem; }
        .tech-tags { display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1.5rem; }
        .tech-tag { padding: 0.3rem 0.8rem; background: var(--purple-light); color: white; border-radius: 6px; font-size: 0.85rem; }
        .project-link { color: var(--purple); text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: gap 0.3s ease; }
        .project-link:hover { gap: 1rem; }
        .skills-container { max-width: 900px; margin: 0 auto; }
        .skills-intro { text-align: center; font-size: 1.1rem; color: var(--gray-600); margin-bottom: 3rem; line-height: 1.8; }
        .skills-categories { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; }
        .skill-category { background: var(--gray-50); padding: 2rem; border-radius: 12px; border: 2px solid var(--gray-200); transition: all 0.3s ease; }
        .skill-category:hover { border-color: var(--purple-light); transform: translateY(-5px); box-shadow: 0 10px 30px rgba(139, 92, 246, 0.1); }
        .skill-category h3 { color: var(--purple); margin-bottom: 1.5rem; font-size: 1.3rem; display: flex; align-items: center; gap: 0.5rem; }
        .skill-list { list-style: none; }
        .skill-list li { padding: 0.6rem 0; color: var(--gray-700); display: flex; align-items: center; gap: 0.5rem; }
        .skill-list li::before { content: '▹'; color: var(--purple); font-weight: bold; font-size: 1.2rem; }
        .contact-section { background: linear-gradient(135deg, var(--purple) 0%, var(--purple-dark) 100%); color: white; }
        .contact-container { max-width: 700px; margin: 0 auto; text-align: center; }
        .contact-section .section-title { color: white; }
        .contact-section .section-title::after { background: white; }
        .contact-intro { font-size: 1.1rem; margin-bottom: 3rem; opacity: 0.95; }
        .contact-form { background: white; padding: 2.5rem; border-radius: 12px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2); }
        .form-group { margin-bottom: 1.5rem; text-align: left; }
        .form-group label { display: block; color: var(--gray-700); font-weight: 600; margin-bottom: 0.5rem; }
        .form-group input, .form-group textarea { width: 100%; padding: 0.8rem; border: 2px solid var(--gray-200); border-radius: 8px; font-size: 1rem; transition: border-color 0.3s ease; font-family: inherit; }
        .form-group input:focus, .form-group textarea:focus { outline: none; border-color: var(--purple); }
        .form-group textarea { resize: vertical; min-height: 120px; }
        .form-submit { width: 100%; padding: 1rem; background: var(--purple); color: white; border: none; border-radius: 8px; font-size: 1.1rem; font-weight: 600; cursor: pointer; transition: all 0.3s ease; }
        .form-submit:hover { background: var(--purple-dark); transform: translateY(-2px); box-shadow: 0 10px 25px rgba(139, 92, 246, 0.3); }
        footer { background: var(--gray-900); color: white; text-align: center; padding: 2rem 0; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @media (max-width: 768px) {
            .nav-links {
                position: fixed;
                top: 70px; /* Ajusté pour être sous le header */
                left: -100%;
                flex-direction: column;
                background: white;
                width: 100%;
                padding: 2rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                transition: left 0.3s ease;
            }
            .nav-links.active { left: 0; }
            main { padding-top: 70px; } /* Ajustement du padding sur mobile */
        }

        .hidden { display: none; }
    </style>
</head>
<body>
<header>
    <nav class="container">
        <a href="#home" class="logo">LD</a>
        <button class="mobile-menu-btn" onclick="toggleMenu()">☰</button>
        <ul class="nav-links" id="navLinks">
            <li><a href="#home" data-en="Home" data-fr="Accueil">Home</a></li>
            <li><a href="#projects" data-en="Projects" data-fr="Projets">Projects</a></li>
            <li><a href="#skills" data-en="Skills" data-fr="Compétences">Skills</a></li>
            <li><a href="#cv" data-en="Resume" data-fr="CV">Resume</a></li>
            <li><a href="#contact" data-en="Contact" data-fr="Contact">Contact</a></li>
            <li class="lang-switcher">
                <button class="lang-btn active" onclick="switchLanguage('en')">EN</button>
                <button class="lang-btn" onclick="switchLanguage('fr')">FR</button>
            </li>
        </ul>
    </nav>
</header>

<section id="home" class="hero">
    <div class="container">
        <div class="hero-content">
            <h1 data-en="Loick Davi" data-fr="Loick DAVI">Loick Davi</h1>

            <p>ntm<p/>
            <p class="tagline" data-en="Computer Science Student & Full-Stack Developer" data-fr="Étudiant en Informatique & Développeur Full-Stack">Computer Science Student & Full-Stack Developer</p>
            <div class="cta-buttons">
                <a href="#projects" class="btn btn-primary" data-en="View Projects" data-fr="Voir les Projets">View Projects</a>
                <a href="#cv" class="btn btn-secondary" data-en="Download Resume" data-fr="Télécharger CV">Download Resume</a>
                <a href="#contact" class="btn btn-secondary" data-en="Get in Touch" data-fr="Me Contacter">Get in Touch</a>
            </div>
        </div>
    </div>
</section>

<section id="projects">
    <div class="container">
        <h2 class="section-title" data-en="Featured Projects" data-fr="Projets Sélectionnés">Featured Projects</h2>

        <div class="projects-grid">
            @foreach($projects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>

        <div style="margin-top: 3rem; text-align: center;">
            <a href="{{ url('/admin/add-project') }}" class="btn btn-secondary" style="border-style: dashed;">
                <span data-en="+ Add New Project" data-fr="+ Ajouter un Projet">+ Add New Project</span>
            </a>
        </div>
    </div>
</section>

<section id="skills">
    <div class="container">
        <h2 class="section-title" data-en="Skills & Expertise" data-fr="Compétences & Expertise">Skills & Expertise</h2>
        <div class="skills-container">
            <p class="skills-intro" data-en="As a computer science student with a passion for both development and design..." data-fr="En tant qu'étudiant en informatique passionné par le développement et le design...">
                As a computer science student with a passion for both development and design, I've cultivated a diverse skill set that bridges technical proficiency with creative problem-solving.
            </p>

            <div class="skills-categories">
                <div class="skill-category">
                    <h3 data-en="💻 Programming Languages" data-fr="💻 Langages de Programmation">💻 Programming Languages</h3>
                    <ul class="skill-list">
                        <li>JavaScript / TypeScript</li>
                        <li>Python</li>
                        <li>Java</li>
                        <li>SQL</li>
                    </ul>
                </div>

                <div class="skill-category">
                    <h3 data-en="🛠️ Frameworks & Tools" data-fr="🛠️ Frameworks & Outils">🛠️ Frameworks & Tools</h3>
                    <ul class="skill-list">
                        <li>React / Vue.js</li>
                        <li>Laravel / Symfony</li>
                        <li>Git / Docker</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="contact-section">
    <div class="container contact-container">
        <h2 class="section-title" data-en="Contact Me" data-fr="Me Contacter">Contact Me</h2>
        <p class="contact-intro" data-en="Let's build something amazing together." data-fr="Créons quelque chose d'incroyable ensemble.">Let's build something amazing together.</p>

        <form class="contact-form">
            <div class="form-group">
                <label>Email</label>
                <input type="email" placeholder="email@example.com">
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea></textarea>
            </div>
            <button type="submit" class="form-submit" data-en="Send Message" data-fr="Envoyer">Send Message</button>
        </form>
    </div>
</section>

<footer>
    <p>&copy; 2026 Alex Morgan.</p>
</footer>

<script>
    function toggleMenu() {
        const navLinks = document.getElementById('navLinks');
        navLinks.classList.toggle('active');
    }

    function switchLanguage(lang) {
        document.querySelectorAll('.lang-btn').forEach(btn => {
            btn.classList.remove('active');
            if (btn.innerText.toLowerCase() === lang) {
                btn.classList.add('active');
            }
        });

        const elements = document.querySelectorAll('[data-en]');
        elements.forEach(el => {
            if (lang === 'fr') {
                if (el.dataset.fr) el.innerText = el.dataset.fr;
            } else {
                if (el.dataset.en) el.innerText = el.dataset.en;
            }
        });
    }
</script>
</body>
</html>
