<x-layout>
    <style>
        .contact-section {
            padding: 4rem 0;
            min-height: calc(100vh - 150px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            background: var(--bg-body) !important;
            color: var(--text-main) !important;
        }

        .contact-intro {
            text-align: center;
            max-width: 600px;
            margin: 0 auto 4rem auto;
            color: var(--text-muted);
            font-size: 1.1rem;
            line-height: 1.6;
        }

        /* GRILLE DES CARTES */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            width: 100%;
            max-width: 1000px;
        }

        /* STYLE D'UNE CARTE */
        .contact-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 2.5rem;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none; /* Pour les liens */
            cursor: pointer;
        }

        .contact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px -10px rgba(139, 92, 246, 0.3); /* Ombre violette légère */
            border-color: var(--purple);
        }

        /* ICÔNE */
        .icon-circle {
            width: 70px;
            height: 70px;
            background: var(--bg-section-alt);
            color: var(--purple);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            transition: background 0.3s;
        }

        .contact-card:hover .icon-circle {
            background: var(--purple);
            color: white;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 0.5rem;
        }

        .card-info {
            color: var(--text-muted);
            font-size: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .contact-section { padding-top: 2rem; }
        }
    </style>

    <section id="contact" class="contact-section">
        <div class="container">

            <h2 class="section-title" data-en="Get in Touch" data-fr="Me Contacter">Get in Touch</h2>

            <p class="contact-intro"
               data-en="I am currently looking for an 8 to 10-week internship starting in April. Feel free to reach out via email or phone."
               data-fr="Je suis actuellement à la recherche d'un stage de 8 à 10 semaines à partir d'avril. N'hésitez pas à me contacter par email ou par téléphone.">
                I am currently looking for an 8 to 10-week internship starting in April. Feel free to reach out via email or phone.
            </p>

            <div class="contact-grid">

                <a href="mailto:daviloick@gmx.com" class="contact-card">
                    <div class="icon-circle">✉️</div>
                    <h3 class="card-title">Email</h3>
                    <span class="card-info">daviloick@gmx.com</span>
                </a>

                <a href="tel:+33769224158" class="contact-card">
                    <div class="icon-circle">📞</div>
                    <h3 class="card-title" data-en="Phone" data-fr="Téléphone">Phone</h3>
                    <span class="card-info">07 69 22 41 58</span>
                </a>

                <a href="https://www.linkedin.com/" target="_blank" class="contact-card">
                    <div class="icon-circle">💼</div>
                    <h3 class="card-title">LinkedIn</h3>
                    <span class="card-info">Loïck Davi</span>
                </a>

                <a href="https://github.com/TonPseudo" target="_blank" class="contact-card">
                    <div class="icon-circle">🐙</div>
                    <h3 class="card-title">GitHub</h3>
                    <span class="card-info" data-en="Check my code" data-fr="Voir mon code">Voir mon code</span>
                </a>

                <div class="contact-card" style="cursor: default;">
                    <div class="icon-circle">📍</div>
                    <h3 class="card-title" data-en="Location" data-fr="Localisation">Location</h3>
                    <span class="card-info">Houdain (62150), France</span>
                </div>

            </div>

            <div style="margin-top: 4rem; text-align: center;">
                <a href="mailto:daviloick@gmx.com" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.1rem;">
                    <span data-en="Send me an Email" data-fr="M'envoyer un email">Send me an Email</span>
                </a>
            </div>

        </div>
    </section>
</x-layout>
