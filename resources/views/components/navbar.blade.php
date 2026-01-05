<header>
    <nav class="container">
        <a href="{{ route('home') }}" class="logo">LD<span style="color: var(--text-main);">.</span></a>

        <button class="mobile-menu-btn" onclick="toggleMenu()">☰</button>

        <ul class="nav-links" id="navLinks">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active-link' : '' }}" data-en="Home" data-fr="Accueil">Home</a></li>
            <li><a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.index') ? 'active-link' : '' }}" data-en="Projects" data-fr="Projets">Projects</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active-link' : '' }}" data-en="about me " data-fr="a propos de moi ">Skills</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active-link' : '' }}" data-en="Contact" data-fr="Contact">Contact</a></li>

            <li class="controls-container">
                <div class="lang-switcher">
                    <button class="control-btn active" onclick="switchLanguage('en')">EN</button>
                    <button class="control-btn" onclick="switchLanguage('fr')">FR</button>
                </div>

                <button class="control-btn theme-toggle-btn" onclick="toggleTheme()" aria-label="Toggle Dark Mode">
                    <span id="theme-icon">🌙</span>
                </button>
            </li>
        </ul>
    </nav>
</header>
