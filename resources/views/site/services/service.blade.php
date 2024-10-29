<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Services</title>

    <!--============================ Style CSS ================================-->
    <link rel="stylesheet" href="{{('services/service.css')}}">

    <!--============================ Style du formulaire ================================-->
    <link rel="stylesheet" href="{{('forms/popupservices.css')}}">

    <!--=============== style etreContacter ===================-->
    <link rel="stylesheet" href="{{('forms/etreContacter.css')}}">

    <!--============================ Bootstrap ================================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!--============================ Font Awesome ================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

    <header>
        <div class="heads1">
            <nav class="nav1">
                <ul class="nav1-left">
                    <li><i class="fa-solid fa-phone"></i><a href="{{url('/contacts')}}">(+237) 698 846 759 / 233 474
                            200</a></li>
                    <li><i class="fa-solid fa-envelope"></i><a
                            href="{{url('/contacts')}}">consulting@full-experts.com</a></li>
                    <li><i class="fa-regular fa-clock"></i><a href="{{url('/qui_sommes_nous')}}">Lundi - Vendredi :
                            07h30 - 17h30</a></li>
                </ul>

                <ul class="nav1-right">
                    <li><a href="https://www.facebook.com/profile.php?id=61566266383722" target="_blank"><i
                                class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="https://www.instagram.com/fullexpertsconsulting/" target="_blank"> <i
                                class="fa-brands fa-instagram"></i> </a></li>
                    <li><a href="https://whatsapp.com/channel/0029VaoqAyE0G0Xm89hBMM28" target="_blank"><i
                                class="fa-brands fa-whatsapp"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/full-experts-consulting-officiel" target="_blank"><i
                                class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a href="https://x.com/fullexperts" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="heads2">
            <div class="logo">
                <div class="rond">
                    <div style="--i:1;" class="rond1"></div>
                    <div style="--i:2;" class="rond2"></div>
                    <div style="--i:3;" class="rond3"></div>
                </div>
                <p> <span id="span1">FULL EXPERTS</span> <span id="span2">CONSULTING</span></p>
            </div>

            <div class="navigue">
                <li><a href="{{url('/')}}">Accueil</a></li>
                <li><a href="{{url('/service')}}">Services</a></li>
                <div class="dropdown" style="color: #312f82;">
                    <li>
                        <a>
                            À Propos de Nous <i class="fa-solid fa-caret-down"></i>
                        </a>
                    </li>
                    <li class="dropdown-content" id="myDropdown" class="nav-item dropdown">
                        <a class="dropdown-item" href="{{url('/qui_sommes_nous')}}">Qui sommes nous ?</a>
                        <a class="dropdown-item" href="{{url('/pourquoi_nous_choisir')}}">Pourquoi nous choisir ?</a>
                    </li>
                </div>
                <li><a href="{{url('/contacts')}}">Contact</a></li>
            </div>

            <!--=============Menu Hamburger ================-->
            <div class="hamburger" style="cursor: pointer; font-size:1em;"><i class="fa-solid fa-bars"></i></div>
            <div class="hamburger-menu">
                <div class="close-hamburger" style="cursor: pointer; font-size:2em;"><i
                        class="fa-solid fa-rectangle-xmark"></i></div>
                <a href="{{url('/')}}">Accueil</a>
                <a href="{{url('/service')}}">Services</a>
                <a href="{{url('/qui_sommes_nous')}}">Qui sommes nous ?</a>
                <a href="{{url('/pourquoi_nous_choisir')}}">Pourquoi nous choisir ?</a>
                <a href="{{url('/contacts')}}">Contact</a>
            </div>

            <div class=" place--btn" id="openPopupBtn2">
                <button class="butt btn-1">Intégrez Notre Équipe <i class="fa-solid fa-clock-rotate-left"></i></button>
            </div>


            <!--============================ Formulaire Integrer Notre equipe ============================-->
            <div id="popupForm" class="popup-container">
                <div class="form-container">
                    <!-- Your form content goes here -->
                    <form action="{{url('/equipe_valid')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="head-title">
                            <h3>Vos compétences peuvent transformer des projets</h3>
                        </div>
                        <div class="form-step form-step-actives">
                            <label for="name">Votre nom</label>
                            <input type="text" id="name" name="name" required>

                            <label for="phone">Votre numéro de téléphone</label>
                            <input type="tel" id="phone" name="phone" required>

                            <label for="email">Votre email</label>
                            <input type="email" id="email" name="email" required>

                            <label for="name">Votre Domaine D'expertise</label>
                            <input type="text" id="name" name="expert_domain" required>

                            <label for="uploadContainer">CV (en PDf) :</label>
                            <input type="file" class="upload-container" name="cv" accept=".pdf" id="uploadContainer"
                                required>
                        </div>
                        <button type="submit" class="btnnext">Envoyer</button>

                    </form>
                </div>
            </div>

        </div>
    </header>

    <section class="banner-global">
        <div class="text-banner-global">
            <h1>Explorez nos solutions adaptées à vos besoins.</h1>
        </div>
    </section>


    <div class="container-fluid">

        <!--row 2-->
        <section class="services-section">
            <h1 style="color: #2f3a4a;
                        font-size: clamp(2em,5vw,4em);
                        margin: 1.5em auto;
                        text-align: center;width:33%;border-left: .5rem solid #002bb9;">Nos Offres</h1>
            <div class="services-container">

                <div class="service-card ">
                    <img src=" {{asset('images/ser1.png')}} " class="boxxx" data-target="#form-investment">
                    <h2 class="boxxx" data-target="#form-investment">Collecte & Analyse des données</h2>
                    <p class="description boxxx" data-target="#form-investment">
                        Dans un monde où l'information est cruciale, nous nous engageons à transformer vos données
                        brutes en informations exploitables grâce à des méthodes rigoureuses et des outils performants.
                        Notre expertise en collecte et analyse des données vous permet non seulement d'identifier des
                        tendances clés, mais aussi de prendre des décisions éclairées qui renforceront votre stratégie globale.
                        <br>
                        - Approche Méthodologique <br>
                        Nous considérons chaque projet comme unique. Notre équipe s’investit dès la conception du plan
                        de collecte, en s'assurant que chaque méthode choisie — qu'il s'agisse de questionnaires,
                        d'entretiens ou d'interviews — est parfaitement adaptée à vos besoins spécifiques. Nous nous
                        appuyons sur des techniques de collecte de données éprouvées, garantissant ainsi la fiabilité et la validité des informations recueillies.
                        <br> - Équipe Dédiée sur le Terrain <br>
                        Pour maximiser l'efficacité de nos études, nous mettons en place des enquêteurs formés et expérimentés sur le terrain. Ils sont non seulement capables de collecter des données, mais également d'interagir avec les participants pour recueillir des insights qualitatifs précieux. Cette approche humaine enrichit notre compréhension des enjeux et des motivations qui sous-tendent les comportements des consommateurs.
                        <br> - Analyse Approfondie et Présentation des Résultats <br>
                        Après la collecte, chaque donnée est soigneusement analysée et interprétée par notre équipe d'experts. Nous utilisons des outils d'analyse avancés pour déceler des schémas, des corrélations et des insights significatifs. Une fois l’analyse terminée, nous présentons les résultats de manière claire et concise, accompagnés de recommandations stratégiques. Nos présentations sont conçues pour faciliter la compréhension et l’intégration des résultats dans votre prise de décision.
                        <br> - Amélioration Continue <br>
                        Nous croyons que la collecte et l'analyse des données ne sont pas des fins en soi, mais plutôt des leviers pour l'amélioration continue. En intégrant régulièrement les retours d’expérience et les nouvelles données dans votre stratégie, vous pourrez rester agile face aux évolutions du marché. Notre engagement est de vous accompagner à chaque étape, afin que vous puissiez maximiser le potentiel de vos données et atteindre vos objectifs.

                    </p>
                    <button class="read-more-btn">Lire la suite</button>
                </div>

                <div class="service-card">
                    <img src="{{asset('images/ser2.png')}}" class="boxxx" data-target="#form-funding">
                    <h2 class="boxxx" data-target="#form-funding">Montage des Projets</h2>
                    <p class="description boxxx" data-target="#form-funding">
                        Le montage des projets est un service complet que nous offrons aux entrepreneurs, en particulier ceux de la diaspora qui souhaitent investir dans leur pays d’origine. Ce service s’adresse à tous ceux qui aspirent à concrétiser des idées novatrices et à transformer leurs ambitions en réalités tangibles. Nous accompagnons chaque étape du processus, de l’idéation à la réalisation, en passant par la maturation des projets.
                        <br> - Processus d’Incubation Structuré <br>
                        Notre approche se décline en plusieurs phases clés. Nous commençons par une étude de faisabilité, qui permet d’évaluer le potentiel de votre projet et d’identifier les opportunités et les risques associés. Cette analyse préliminaire est cruciale pour s’assurer que le projet repose sur des bases solides.
                        Ensuite, nous réalisons une étude d’implantation afin de déterminer le meilleur emplacement pour votre projet, en tenant compte des facteurs économiques, sociaux et environnementaux. Cette étape vise à garantir que votre projet soit bien intégré dans le tissu local.
                        <br> - Élaboration de Documents Stratégiques <br>
                        Nous vous assistons également dans l’élaboration de business plans détaillés et de cahiers des charges précis. Ces documents stratégiques sont essentiels pour articuler votre vision, définir vos objectifs et établir les ressources nécessaires pour la mise en œuvre de votre projet.
                        La modélisation et la conception de prototypes font également partie de notre offre. Nous travaillons avec vous pour créer des prototypes viables qui peuvent être testés et ajustés avant le lancement. Cette phase est essentielle pour valider l’idée et affiner le produit final.
                        <br> - Coordination et Suivi des Équipes <br>
                        La réussite d’un projet repose sur une gestion efficace des équipes. Nous assurons la coordination des différentes parties prenantes, veillant à ce que chacun soit aligné sur les objectifs du projet. Notre équipe se charge également du suivi et de l’évaluation des progrès réalisés, garantissant ainsi que le projet avance conformément au calendrier prévu.
                        <br> - Recherche de Financement et Négociation <br>
                        Nous comprenons que le financement est souvent un défi majeur pour les entrepreneurs. C’est pourquoi nous proposons un accompagnement dans la recherche de financements adaptés, en identifiant les opportunités de financement public et privé. De plus, nous vous aidons dans la négociation avec les partenaires afin d’établir des collaborations fructueuses qui renforceront la viabilité de votre projet.
                        <br> - Encadrement Juridique et Réglementaire <br>
                        Enfin, nous intégrons un encadrement juridique nécessaire à la mise en œuvre de votre projet. Nos experts s’assurent que toutes les démarches soient conformes aux réglementations en vigueur, vous permettant de vous concentrer sur le développement de votre entreprise en toute sérénité.

                    </p>
                    <button class="read-more-btn">Lire la suite</button>
                </div>

                <div class="service-card">
                    <img src="{{asset('images/ser3.jpg')}}" class="boxxx" data-target="#form-action">
                    <h2 class="boxxx" data-target="#form-action">Conseils & Accompagnement</h2>
                    <p class="description boxxx">
                        Notre service de conseils et d'accompagnement offre une expertise sur mesure, spécialement conçu pour répondre aux besoins des PME, des startups et des particuliers. Nous sommes déterminés à fournir un soutien personnalisé qui aide nos clients à naviguer dans des environnements complexes et parfois hostiles.
                        <br>- Analyse et Compréhension Approfondies
                        Au cœur de notre intervention se trouve une analyse approfondie des sujets que vous rencontrez. Nous nous engageons à comprendre non seulement les enjeux spécifiques de votre projet, mais aussi les acteurs impliqués et le contexte socio-économique dans lequel vous évoluez. Cette approche holistique nous permet d'identifier les défis et les opportunités qui s'offrent à vous.
                        <br>- Formation et Maîtrise des Sujets <br>
                        Nous croyons en l'importance de la formation pour donner aux demandeurs les outils nécessaires pour maîtriser leur sujet. Nos sessions de formation sont conçues pour renforcer vos compétences, vous permettant de faire face à des situations difficiles avec confiance et assurance. Nous vous enseignons les meilleures pratiques et stratégies pour anticiper et surmonter les obstacles.
                        <br>- Mise en Relation Stratégique <br>
                        En plus de notre expertise, nous facilitons également des mises en relation avec des partenaires stratégiques. Que ce soit pour établir des collaborations, trouver des mentors ou accéder à des réseaux professionnels, nous vous aidons à bâtir des connexions qui peuvent propulser votre projet vers le succès.
                        <br>- Soutien à Chaque Étape <br>
                        Nous sommes à vos côtés à chaque étape de votre parcours. Que vous soyez en phase de démarrage, de croissance ou de transformation, notre équipe est là pour vous accompagner et vous conseiller sur les meilleures décisions à prendre. Profitez de notre expertise pour optimiser votre efficacité, augmenter votre agilité et prendre de l'altitude.
                        <br>- Exploitez Pleinement Votre Potentiel <br>
                        En choisissant notre service, vous ne bénéficiez pas seulement de conseils, mais d’un véritable partenariat engagé. Nous vous aidons à exploiter pleinement votre potentiel, à prendre des décisions éclairées et à tracer un chemin vers la réussite. Ensemble, nous pouvons transformer vos aspirations en réalisations concrètes.

                    </p>
                    <button class="read-more-btn">Lire la suite</button>
                </div>

                <div class="service-card ">
                    <img src="{{asset('images/ser4.jpg')}}" class="boxxx" data-target="#form-performance">
                    <h2 class="boxxx" data-target="#form-performance">Formation & Education</h2>
                    <p class="description boxxx" data-target="#form-performance">

                        Notre objectif est de renforcer les compétences et de développer le potentiel humain à travers des programmes d'apprentissage adaptés à tous. Que vous soyez un particulier, un professionnel chevronné ou une entreprise, nous vous proposons une large gamme d'outils d'apprentissage axés sur les résultats.
                        <br>- Renforcement et Acquisition de Compétences <br>
                        Nous croyons fermement que l’apprentissage continu est essentiel dans un monde en constante évolution. Nos programmes sont conçus pour vous aider à acquérir de nouvelles compétences et à perfectionner celles que vous possédez déjà. Grâce à notre approche personnalisée, nous veillons à ce que chaque participant puisse progresser à son rythme et atteindre ses objectifs.
                        <br>- Approche Pédagogique Innovante <br>
                        Notre approche pédagogique repose sur l’innovation et l'interactivité. Nous intégrons des méthodes d'enseignement modernes qui favorisent l'engagement et la participation active. Vous bénéficierez de l'expertise de nos formateurs, qui apportent des expériences pratiques et des connaissances approfondies dans leurs domaines respectifs, garantissant ainsi un apprentissage enrichissant et pertinent.

                        <br>Offres Variées de Formation <br>
                        <br>Nos offres de formation comprennent une diversité de formats pour répondre à vos besoins spécifiques :
                        <br>• Formations en Présentiel : Participez à des ateliers et séminaires interactifs qui favorisent l’échange et la collaboration.
                        <br>• Formations en Ligne : Accédez à nos webinaires et modules en ligne, vous permettant d'apprendre à votre rythme, où que vous soyez.
                        <br>• Formations sur le Terrain : Profitez d’une immersion pratique qui vous permettra d’appliquer vos compétences directement dans un environnement professionnel.
                        <br>• Formations Techniques : Développez des compétences spécialisées, notamment dans des domaines de pointe tels que l’intelligence artificielle, pour vous préparer aux défis de demain.
                        <br>- Stimulation de Votre Carrière
                        En choisissant nos programmes de formation, vous investissez dans votre avenir professionnel. Nos formations sont conçues pour stimuler votre carrière et vous permettre d'atteindre vos ambitions. Que vous souhaitiez évoluer dans votre poste actuel ou explorer de nouvelles opportunités, nous sommes là pour vous accompagner dans votre parcours de développement personnel et professionnel.


                    </p>
                    <button class="read-more-btn">Lire la suite</button>
                </div>

                <div class="service-card">
                    <img src="{{asset('images/ser5.jpg')}}" class=" boxxx" data-target="#form-visibility">
                    <h2 class=" boxxx" data-target="#form-visibility">Marketing & Communication</h2>
                    <p class="description boxxx" data-target="#form-visibility">
                        Nous sommes à vos côtés pour vous accompagner dès la conception de stratégies marketing, en intégrant les attentes et les besoins de votre public cible. Notre objectif est de réaliser des campagnes sur mesure qui augmentent la visibilité et la notoriété de votre entreprise, tout en s’appuyant sur une analyse approfondie du marché.
                        <br>- Stratégies Personnalisées et Efficaces <br>
                        Notre approche commence par une étude détaillée de votre produit, permettant de mieux comprendre ses atouts et ses points de différenciation. Nous concevons ensuite des campagnes publicitaires et de promotion adaptées, en veillant à ce qu’elles résonnent avec votre audience.
                        <br>- Création de l’Identité de Marque <br>
                        La création de votre identité de marque est essentielle pour établir une connexion durable avec vos clients. Nous vous aidons à définir votre vision, vos valeurs et votre message, afin que votre marque se démarque sur le marché. Chaque élément, du logo aux supports de communication, est conçu pour refléter votre unicité.
                        Planification d’Événements et Relations Publiques
                        Nous offrons également des services de planification d’événements et d’actions de relations publiques. Que ce soit pour le lancement d’un produit, des conférences ou des événements de réseautage, nous nous occupons de chaque détail pour garantir leur succès et renforcer votre présence médiatique.
                        <br>- Stratégies de Croissance à Grande Échelle <br>
                        Nos propositions incluent la création de stratégies à grande échelle visant à augmenter vos revenus. En nous appuyant sur des analyses de marché précises et des prévisions de tendances, nous développons des actions ciblées qui vous aideront à atteindre vos objectifs financiers.
                        <br>- Expertise en Communication Numérique <br>
                        Dans un monde de plus en plus connecté, notre savoir-faire en communication numérique est un atout majeur. Nous vous accompagnons dans l’utilisation des réseaux sociaux et d’autres canaux numériques pour maximiser votre budget publicitaire et atteindre votre public de manière efficace. Grâce à des techniques d’optimisation et de ciblage avancées, nous vous aidons à obtenir des résultats probants et mesurables.


                    </p>
                    <button class="read-more-btn">Lire la suite</button>
                </div>

                <div class="service-card">
                    <img src="{{asset('images/ser6.jpg')}}" class="boxxx" data-target="#form-research">
                    <h2 class="boxxx" data-target="#form-research">Développement Web & Application</h2>
                    <p class="description boxxx" data-target="#form-research">

                        Notre mission est de concevoir des solutions numériques innovantes qui répondent aux besoins quotidiens des Camerounais. Nous croyons en l'importance d'une présence en ligne efficace et adaptée, c'est pourquoi notre équipe de développeurs utilise des technologies de pointe pour créer des interfaces utilisateur attrayantes et fonctionnelles.
                        <br>- Technologies de Développement Avancées <br>
                        Pour le développement de l'interface utilisateur, nous utilisons des langages et frameworks modernes tels que JavaScript, React, React Native, Vue.js, et Angular. Ces technologies nous permettent de créer des expériences utilisateur dynamiques et intuitives.
                        Du côté serveur, nous intégrons des langages robustes comme PHP, Python, .NET, et JavaScript (Node.js). Cela nous permet de gérer efficacement les fonctionnalités de vos applications et de traiter les données en toute sécurité.
                        <br>- Solutions sur Mesure et Performantes <br>
                        Notre service vous offre la possibilité de concevoir des sites web et des applications sur mesure, adaptés à vos besoins spécifiques. Grâce à la technologie DevOps et aux solutions Cloud, nous garantissons des performances optimales et une évolutivité pour vos projets.
                        Nous mettons également en œuvre des solutions de commerce en ligne, créant des plateformes de vente qui facilitent vos transactions et améliorent l'expérience client. En parallèle, nous nous engageons à optimiser votre référencement naturel (SEO) pour garantir que votre site soit facilement accessible et visible sur les moteurs de recherche.
                        <br>- Sécurité et Protection des Données <br>
                        La préservation des informations personnelles est une priorité pour nous. Nous intégrons des pratiques de sécurité avancées pour protéger vos données et celles de vos utilisateurs. Cela inclut des protocoles de cryptage et des mesures de conformité aux réglementations en matière de protection des données.
                        <br>- Intelligence Artificielle et Analyse des Données <br>
                        Nous tirons également parti de l'intelligence artificielle pour améliorer vos solutions. En intégrant des outils d'analyse avancée, nous vous aidons à exploiter les données collectées pour prendre des décisions éclairées et anticiper les besoins de vos utilisateurs.

                        otre savoir<br>-faire en communication numérique est un atout majeur. Nous vous accompagnons dans l’utilisation des réseaux sociaux et d’autres canaux numériques pour maximiser votre budget publicitaire et atteindre votre public de manière efficace. Grâce à des techniques d’optimisation et de ciblage avancées, nous vous aidons à obtenir des résultats probants et mesurables.
                    </p>
                    <button class="read-more-btn">Lire la suite</button>
                </div>

                <div class="service-card ">
                    <img src="{{asset('images/ser7.jpg')}}" class="boxxx" data-target="#form-research1">
                    <h2 class="boxxx" data-target="#form-research1">Bâtiments & Travaux Publics</h2>
                    <p class="description boxxx" data-target="#form-research1">

                        Dans le domaine du génie civil, nous nous engageons à bâtir pour les générations futures. Nos projets sont conçus pour allier modernité et valorisation de l'identité et de la culture africaines. Nous croyons que chaque bâtiment doit être une œuvre intemporelle qui s’intègre harmonieusement dans le patrimoine local tout en répondant aux exigences contemporaines.
                        <br>- Qualité et Durabilité au Cœur de Nos Projets <br>
                        Nos constructions sont élaborées avec un souci constant de qualité et de durabilité. Nous respectons les normes architecturales et écologiques les plus rigoureuses, garantissant ainsi des ouvrages qui résistent à l’épreuve du temps tout en minimisant leur impact environnemental. Chaque projet est une occasion de créer des espaces qui inspirent et enrichissent la communauté.
                        <br>- Expertise et Équipe Qualifiée <br>
                        Avec notre expertise reconnue et notre équipe hautement qualifiée, nous sommes en mesure de concrétiser tous vos projets, qu'il s'agisse de construction neuve ou de rénovation. Notre savoir-faire s’étend également à des domaines variés tels que la construction de routes, le remblayage (c’est une technique utilisée en construction et en génie civil qui consiste à remplir un espace vide ou à rehausser le sol avec des matériaux, tels que des gravats, de la terre ou d'autres matériaux inertes.), la pose de pavés, et la mise en place de forages.
                        <br>- Aménagement Intérieur et Extérieur <br>
                        Nous ne nous contentons pas de construire ; nous aménageons également vos espaces, qu'ils soient intérieurs ou extérieurs. Chaque aménagement est conçu pour optimiser l'esthétique et la fonctionnalité, créant ainsi des environnements agréables et pratiques.
                        <br>- Services de Haute Qualité et Respect des Normes <br>
                        Notre engagement envers la qualité se traduit par une offre complète de services, incluant des études géotechniques, topographiques, hydrologiques, environnementales et sismiques. Nous veillons à respecter scrupuleusement les délais et les budgets établis, assurant ainsi la satisfaction de nos clients à chaque étape du projet.

                    </p>
                    <button class="read-more-btn">Lire la suite</button>
                </div>

                <div class="service-card">
                    <img src="{{asset('images/ser8.jpeg')}}" class="boxxx" data-target="#form-research2">
                    <h2 class="boxxx" data-target="#form-research2">Qualité Hygiène Sécurité Environnement (QHSE)
                    </h2>
                    <p class="description boxxx" data-target="#form-research2">
                        La gestion de la qualité, de l'hygiène, de la sécurité et de l'environnement (QHSE) est essentielle pour garantir l'efficacité opérationnelle et la pérennité des entreprises. Ces concepts englobent non seulement la sécurité des employés et la conformité aux normes en vigueur, mais aussi la préservation de l'environnement et la prévention des risques. Ignorer ces aspects peut nuire gravement à l'image, à la réputation et au chiffre d'affaires d'une entreprise.
                        <br>- Notre Expertise au Service de Votre Performance <br>
                        Nous mettons à votre disposition notre expertise pour élaborer, suivre et évaluer un système QHSE performant et adapté à vos besoins spécifiques. Nos solutions vous aident à intégrer des pratiques responsables et durables dans votre organisation, tout en favorisant un environnement de travail sain et sécurisé.
                        <br>Une Gamme Complète de Services
                        <br>Nous proposons une variété de produits et services pour vous accompagner dans votre démarche QHSE, incluant :
                        <br>• Audits QHSE : Évaluations approfondies de vos pratiques actuelles pour identifier les points d’amélioration et garantir la conformité.
                        <br>• Création de Procédures : Élaboration de procédures sur mesure qui répondent aux exigences réglementaires et optimisent vos opérations.
                        <br>• Certification ISO : Accompagnement dans le processus de certification ISO, garantissant une reconnaissance internationale de vos standards de qualité.
                        <br>• Gestion des Crises : Mise en place de plans de gestion des crises pour anticiper et répondre efficacement à tout incident.
                        <br>• Contrôle et Surveillance : Suivi régulier des indicateurs de performance QHSE pour assurer une amélioration continue.
                        <br>- Adopter une Approche Responsable et Durable
                        <br>En optant pour nos solutions QHSE, vous choisissez d’adopter une approche proactive en matière de sécurité, de qualité et de respect de l’environnement. Cela vous permet non seulement de minimiser les risques, mais également de renforcer la confiance de vos clients et partenaires, tout en améliorant votre compétitivité sur le marché.

                    </p>
                    <button class="read-more-btn">Lire la suite</button>
                </div>

                <div class="service-card">
                    <img src="{{asset('images/finance.jpg')}}" class="boxxx" data-target="#form-research3">
                    <h2 class="boxxx" data-target="#form-research3">Gestion et Finance</h2>
                    <p class="description boxxx" data-target="#form-research3">
                        La gestion de votre comptabilité, de vos déclarations fiscales et de votre trésorerie est notre priorité. Nous vous accompagnons également dans vos projets d'investissement, vous garantissant ainsi un soutien complet dans la gestion financière de votre entreprise. Notre équipe de spécialistes s'engage à assurer une gestion efficace de vos dossiers comptables et financiers.
                        <br>- Efficacité et Précision dans la Gestion Financière <br>
                        Grâce à notre expertise, nous garantissons la précision des données financières et le respect des réglementations en vigueur. Nous mettons en œuvre des pratiques optimales pour gérer vos ressources de manière efficiente, ce qui vous permet de vous concentrer sur le développement de votre activité.
                        <br>- Valeurs Éthiques et Déontologiques <br>
                        Nos experts partagent des valeurs éthiques solides, telles que l'intégrité, l'objectivité, la loyauté et la diligence. Ces principes renforcent la transparence de nos processus et améliorent la crédibilité des documents financiers que nous produisons. Vous pouvez ainsi avoir confiance en la qualité des informations sur lesquelles vous basez vos décisions.
                        <br>- Analyses Financières Fiables pour des Décisions Éclairées <br>
                        Nous vous offrons des analyses financières détaillées et fiables, vous permettant de prendre les décisions les plus appropriées pour votre entreprise. En ayant accès à des données pertinentes et à des recommandations éclairées, vous pourrez optimiser votre rentabilité et mieux anticiper les défis futurs.

                    </p>
                    <button class="read-more-btn">Lire la suite</button>
                </div>

                <div class="service-card">
                    <img src="{{asset('images/serr10.png')}}" class="boxxx">
                    <h2 class="boxxx" data-target="#form-research4">Tourisme & Hôtellerie </h2>
                    <p class="description boxxx" data-target="#form-research4">
                        De la planification de votre voyage à la réservation de services essentiels tels que le logement, le transport et les restaurants, notre équipe se tient à votre disposition pour vous offrir une assistance complète. Nous proposons des services de conseil, de guide touristique, de réservation d'activités locales et d’accompagnement multilingue pour garantir une expérience de voyage fluide et agréable.
                        <br>- Optimisation de Votre Budget de Voyage <br>
                        Nous vous aidons à optimiser votre budget en trouvant des options économiques qui correspondent parfaitement à vos besoins. Que vous soyez un particulier en quête d'une escapade ou une entreprise planifiant un séjour professionnel, nous mettons tout en œuvre pour dénicher les meilleures offres et solutions adaptées à votre projet.
                        <br>- Expériences Uniques et Enrichissantes <br>
                        Notre objectif est de vous faire vivre des expériences uniques et mémorables. Nous vous proposons une sélection d’activités locales qui vous permettront d'explorer la culture, l’histoire et les traditions de votre destination. Chaque voyage devient ainsi une opportunité d'enrichissement personnel et de découverte.
                        <br>- Solutions Personnalisées pour Tous <br>
                        Que vous voyagiez seul, en famille ou en groupe, notre service s'adapte à toutes vos attentes. Nous offrons un ensemble de solutions sur mesure, conçues pour répondre à vos préférences et à vos exigences spécifiques, afin de rendre votre séjour inoubliable.


                    </p>
                    <button class="read-more-btn">Lire la suite</button>
                </div>

            </div>
        </section>

        <!-- =================== Formulaires services ==================== -->
        <div id="form-investment" class="modal-form">
            <h3>Collecte & Analyse des données</h3>
            <form action="{{url('/service_valid')}}" method="POST">
                @csrf
                <label for="name-investment">Nom :</label>
                <input type="text" id="name-investment" name="name" required>

                <label for="email-investment">Email :</label>
                <input type="email" id="email-investment" name="email" required>

                <label for="phone-investment">Telephone :</label>
                <input type="text" id="phone-investment" name="phone" required>

                <input type="text" value="Collecte & analyse des données" name="type" hidden>

                <label for="message-investment">Message :</label>
                <textarea id="message-investment" name="message" required></textarea>

                <button type="submit">Envoyer</button>
            </form>
            <button class="close-form">X</button>
        </div>

        <div id="form-funding" class="modal-form">
            <h3>Montage des Projets</h3>
            <form action="{{url('/service_valid')}}" method="POST">
                @csrf
                <label for="name-funding">Nom :</label>
                <input type="text" id="name-funding" name="name" required>

                <label for="email-funding">Email :</label>
                <input type="email" id="email-funding" name="email" required>

                <label for="phone-funding">Telephone :</label>
                <input type="text" id="phone-funding" name="phone" required>

                <input type="text" value="Montage des projets" name="type" hidden>

                <label for="message-funding">Message :</label>
                <textarea id="message-funding" name="message" required></textarea>

                <button type="submit">Envoyer</button>
            </form>
            <button class="close-form">X</button>
        </div>

        <div id="form-action" class="modal-form">
            <h3>Conseils & Accompagnement</h3>
            <form action="{{url('/service_valid')}}" method="POST">
                @csrf
                <label for="name-action">Nom :</label>
                <input type="text" id="name-action" name="name" required>

                <label for="email-action">Email :</label>
                <input type="email" id="email-action" name="email" required>

                <label for="phone-action">Telephone :</label>
                <input type="text" id="phone-action" name="phone" required>

                <input type="text" value="Conseils & accompagnement" name="type" hidden>

                <label for="message-action">Message :</label>
                <textarea id="message-action" name="message" required></textarea>

                <button type="submit">Envoyer</button>
            </form>
            <button class="close-form">X</button>
        </div>

        <div id="form-performance" class="modal-form">
            <h3>Formation & Education</h3>
            <form action="{{url('/service_valid')}}" method="POST">
                @csrf
                <label for="name-performance">Nom :</label>
                <input type="text" id="name-performance" name="name" required>

                <label for="email-performance">Email :</label>
                <input type="email" id="email-performance" name="email" required>

                <label for="phone-performance">Telephone :</label>
                <input type="text" id="phone-performance" name="phone" required>

                <input type="text" value="Formation & éducation" name="type" hidden>

                <label for="message-performance">Message :</label>
                <textarea id="message-performance" name="message" required></textarea>

                <button type="submit">Envoyer</button>
            </form>
            <button class="close-form">X</button>
        </div>

        <div id="form-visibility" class="modal-form">
            <h3>Marketing & Communication</h3>
            <form action="{{url('/service_valid')}}" method="POST">
                @csrf
                <label for="name-visibility">Nom :</label>
                <input type="text" id="name-visibility" name="name" required>

                <label for="email-visibility">Email :</label>
                <input type="email" id="email-visibility" name="email" required>

                <label for="phone-visibility">Telephone :</label>
                <input type="text" id="phone-visibility" name="phone" required>

                <input type="text" value="Marketing & communication" name="type" hidden>

                <label for="message-visibility">Message :</label>
                <textarea id="message-visibility" name="message" required></textarea>

                <button type="submit">Envoyer</button>
            </form>
            <button class="close-form">X</button>
        </div>

        <div id="form-research" class="modal-form">
            <h3>Développement Web & Application</h3>
            <form action="{{url('/service_valid')}}" method="POST">
                @csrf
                <label for="name-research">Nom :</label>
                <input type="text" id="name-research" name="name" required>

                <label for="email-research">Email :</label>
                <input type="email" id="email-research" name="email" required>

                <label for="phone-research">Telephone :</label>
                <input type="text" id="phone-research" name="phone" required>

                <input type="text" value="Développement Web & Mobile" name="type" hidden>

                <label for="message-research">Message :</label>
                <textarea id="message-research" name="message" required></textarea>

                <button type="submit">Envoyer</button>
            </form>
            <button class="close-form">X</button>
        </div>

        <div id="form-research1" class="modal-form">
            <h3>Bâtiments & Travaux Publics</h3>
            <form action="{{url('/service_valid')}}" method="POST">
                @csrf
                <label for="name-research">Nom :</label>
                <input type="text" id="name-research" name="name" required>

                <label for="email-research">Email :</label>
                <input type="email" id="email-research" name="email" required>

                <label for="phone-research">Telephone :</label>
                <input type="text" id="phone-research" name="phone" required>

                <input type="text" value="Bâtiments & Travaux Publics" name="type" hidden>

                <label for="message-research">Message :</label>
                <textarea id="message-research" name="message" required></textarea>

                <button type="submit">Envoyer</button>
            </form>
            <button class="close-form">X</button>
        </div>

        <div id="form-research2" class="modal-form">
            <h3>Qualité, Hygiène, Sécurité, Environnement (QHSE)</h3>
            <form action="{{url('/service_valid')}}" method="POST">
                @csrf
                <label for="name-research">Nom :</label>
                <input type="text" id="name-research" name="name" required>

                <label for="email-research">Email :</label>
                <input type="email" id="email-research" name="email" required>

                <label for="phone-research">Telephone :</label>
                <input type="text" id="phone-research" name="phone" required>

                <input type="text" value="Qualité, Hygiène, Sécurité, Environnement (QHSE)" name="type" hidden>

                <label for="message-research">Message :</label>
                <textarea id="message-research" name="message" required></textarea>

                <button type="submit">Envoyer</button>
            </form>
            <button class="close-form">X</button>
        </div>

        <div id="form-research3" class="modal-form">
            <h3>Gestion et Finance</h3>
            <form action="{{url('/service_valid')}}" method="POST">
                @csrf
                <label for="name-research">Nom :</label>
                <input type="text" id="name-research" name="name" required>

                <label for="email-research">Email :</label>
                <input type="email" id="email-research" name="email" required>

                <label for="phone-research">Telephone :</label>
                <input type="text" id="phone-research" name="phone" required>

                <input type="text" value="Gestion et Finance" name="type" hidden>

                <label for="message-research">Message :</label>
                <textarea id="message-research" name="message" required></textarea>

                <button type="submit">Envoyer</button>
            </form>
            <button class="close-form">X</button>
        </div>
        <div id="form-research4" class="modal-form">
            <h3>Tourisme & Hôtellerie</h3>
            <form action="{{url('/service_valid')}}" method="POST">
                @csrf
                <label for="name-research">Nom :</label>
                <input type="text" id="name-research" name="name" required>

                <label for="email-research">Email :</label>
                <input type="email" id="email-research" name="email" required>

                <label for="phone-research">Telephone :</label>
                <input type="text" id="phone-research" name="phone" required>

                <input type="text" value="Gestion et Finance" name="type" hidden>

                <label for="message-research">Message :</label>
                <textarea id="message-research" name="message" required></textarea>

                <button type="submit">Envoyer</button>
            </form>
            <button class="close-form">X</button>
        </div>
    </div>



    </div>


    <div class="heros">
        <div class="overlay"></div>
        <div class="hero-text">
            <h3 style="font-size: clamp(1.4em,1vw,3.5em);">Chez Full Experts Consulting, notre offre commerciale est régulièrement renouvelée.</h3>
            <p style=" font-size: clamp(.7em,1vw,1.5em);">Les produits et services innovants sont essentiels pour toutes les entreprises.
                Il est important d'investir dans leur développement car ils jouent un rôle essentiel dans la croissance et la rentabilité
                de l'entreprise, en particulier lorsqu'ils répondent aux besoins des clients. </p>
        </div>
    </div>


    <footer>
        <div class="contain">
            <!--================== Logo ====================-->
            <div class="logo">
                <div class="rond">
                    <div style="--i:1;" class="rond1"></div>
                    <div style="--i:2;" class="rond2"></div>
                    <div style="--i:3;" class="rond3"></div>
                </div>
                <p> <span id="span1">FULL EXPERTS</span> <span id="span2">CONSULTING</span></p>
                {{-- <p><strong><i>Les Experts c'est Nous!</i></strong></p> --}}
            </div>

            <!--================== Paragraphe ====================-->
            <div class="paragraphe">
                <p><strong><i>Les Experts c'est Nous!</i></strong></p>
            </div>

            <!--================== Social-Media ====================-->
            {{-- <div class="social-media">
                <a href="https://www.facebook.com/profile.php?id=61565898610787" target="_blank"><i
                        class="fa-brands fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/fullexpertsconsulting/" target="_blank"> <i
                        class="fa-brands fa-instagram"></i> </a>
                <a href="https://whatsapp.com/channel/0029VaoqAyE0G0Xm89hBMM28" target="_blank"><i
                        class="fa-brands fa-whatsapp"></i></a>
                <a href="https://www.linkedin.com/company/full-experts-consulting-officiel" target="_blank"><i
                            class="fa-brands fa-linkedin-in"></i></a>
                <a href="https://x.com/fullexperts" target="_blank"><i
                            class="fa-brands fa-x-twitter"></i></a>
            </div> --}}
            <hr id="ligne1">

            <div class="row ">
                <div class="clearfix">
                    <div class="footer__column">
                        <ul>
                            <h3>Siège social</h3>
                            <li> <a href="#"><i class="fa-solid fa-location-dot"></i> 1<sup>er</sup> étage immeuble GMC
                                    <br>
                                    face Quiferou - Bonamoussadi</a></li>
                        </ul>
                        <ul>
                            <h3>Contact</h3>
                            <li><i class="fa-solid fa-phone"></i> <a href="{{url('/contacts')}}">(+237) 698 846 759 /
                                    233 474 200</a></li>
                            <li><i class="fa-solid fa-envelope"></i> <a
                                    href="{{url('/contacts')}}">consulting@full-experts.com</a></li>
                        </ul>
                        <ul>
                            <h3>Réseaux Sociaux</h3>
                            <li>
                                <div class="social-media">
                                    <a href="https://www.facebook.com/profile.php?id=61565898610787" target="_blank"><i
                                            class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/fullexpertsconsulting/" target="_blank"> <i
                                            class="fa-brands fa-instagram"></i> </a>
                                    <a href="https://whatsapp.com/channel/0029VaoqAyE0G0Xm89hBMM28" target="_blank"><i
                                            class="fa-brands fa-whatsapp"></i></a>
                                    <a href="https://www.linkedin.com/company/full-experts-consulting-officiel"
                                        target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="https://x.com/fullexperts" target="_blank"><i
                                            class="fa-brands fa-x-twitter"></i></a>

                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="footer__column">
                        <h3>Plan du site</h3>
                        <ul>
                            <li><a href="{{url('/')}}">Accueil</a></li>
                            <li><a href="{{url('/service')}}">Services</a></li>
                            <li><a href="{{url('/qui_sommes_nous')}}">Qui sommes nous ?</a></li>
                            <li><a href="{{url('/pourquoi_nous_choisir')}}">Pourquoi nous choisir ?</a></li>
                            <li><a href="{{url('/contacts')}}">Contact</a></li>
                        </ul>
                    </div>

                    <div class="footer__column">
                        <h3>Informations Globales</h3>


                        <ul>
                            <li><a id="legales">Mentions légales</a></li>
                            <li><a id="cookies">Politiques de cookies</a></li>
                            <li><a id="cgv">CGV</a></li>
                            <button id="openPopupBtn1">Intégrez Notre Équipe <i
                                    class="fa-solid fa-clock-rotate-left"></i></button>
                        </ul>


                        <div id="popup1" class="pop">
                            <div class="pop-content">
                                <h1>MENTIONS LEGALES </h1>
                                <div>
                                    <h3>01. Présentation Du Site </h3>
                                    <p>En vertu de l’article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l’économie numérique, il est précisé aux utilisateurs du site https://full-experts-consulting.com
                                        l’identité des différents intervenants dans le cadre de sa réalisation et de son suivi. <br>
                                        Propriétaire: Full Experts Consulting https://full-experts-consulting.com <br>
                                        Adresse : Douala Cameroun- bonamoussadi <br>
                                        Responsable de publication : Yvanna <br>

                                        Création & Concept : Full Experts Consulting https://full-experts-consulting.com
                                    </p>
                                </div>

                                <div>
                                    <h3>03. Description Des Services Fournis </h3>
                                    <p>Le site a pour objet de fournir une information concernant les activités de l’entreprise Full Experts Consulting. <br>
                                        Full Experts Consulting s’efforce de fournir sur le site des informations aussi précises que possible. Toutefois,
                                        il ne pourra être tenu responsable des omissions, des inexactitudes ou des carences dans la mise à jour, qu’elles
                                        soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations. <br>
                                        Toutes les informations indiquées sur le site sont données à titre indicatif, et sont
                                        susceptibles d’évoluer. Par ailleurs, les renseignements figurant sur le site ne sont
                                        pas exhaustifs. Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne. <br>

                                    </p>
                                </div>

                                <div>
                                    <h3>04. Limitations De Responsabilité </h3>
                                    <p>Full Experts Consulting ne pourra être tenu responsable des dommages directs et indirects
                                        causés au matériel de l’utilisateur lors de l’accès au site. <br>
                                        Des espaces interactifs (possibilité de poser des questions
                                        dans l’espace contact) sont à la disposition des utilisateurs.
                                        Full Experts Consulting se réserve le droit de supprimer,
                                        sans mise en demeure préalable, tout contenu déposé dans cet
                                        espace qui conviendrait à la législation applicable au Cameroun,
                                        en particulier aux dispositions relatives à la protection des données.
                                        Le cas échéant, Full Experts Consulting se réserve également la possibilité
                                        de mettre en cause la responsabilité civile et/ou pénale de l’utilisateur,
                                        notamment en cas de message à caractère raciste, injurieux ou diffamant. <br>
                                    </p>
                                </div>

                                <div>
                                    <h3>05. Gestion Des Données Personnelles </h3>
                                    <p>Au Cameroun, la protection des données personnelles est régie par la loi
                                        n° 2023/015 du 15 juin 2023 portant sur la protection des données à
                                        caractère personnel. Cette loi, inspirée des normes internationales telles
                                        que le Règlement général sur la protection des données (RGPD), définit
                                        un cadre juridique rigoureux pour le traitement des données personnelles
                                        et garantit les droits des personnes concernées. <br>
                                        À l’occasion de l’utilisation du site peuvent être recueillis : <br>

                                        – L’URL des liens par l’intermédiaire desquels l’utilisateur a accédé au site, <br>
                                        – Le fournisseur d’accès de l’utilisateur, <br>
                                        – L’adresse de protocole Internet (IP) de l’utilisateur. <br> <br>


                                        En tout état de cause, Full Experts Consulting ne collecte des informations personnelles relatives à l’utilisateur
                                        que pour le besoin de certains services proposés par le site. L’utilisateur fournit ces informations en toute connaissance
                                        de cause, notamment lorsqu’il procède par lui-même à leur saisie. Il est alors précisé à l’utilisateur du site l’obligation
                                        ou non de fournir ces informations. Conformément aux dispositions des articles 38 et suivants de la loi 78-17 du 6 janvier
                                        1990 relative à l’informatique, aux fichiers et aux libertés, tout utilisateur dispose d’un droit d’accès, de rectification
                                        et d’opposition aux données personnelles le concernant, en effectuant sa demande écrite et signée, accompagnée d’une copie du
                                        titre d’identité avec signature du titulaire de la pièce, en précisant l’adresse à laquelle la réponse doit être envoyée.
                                        Aucune information personnelle de l’utilisateur du site n’est publiée à l’insu de l’utilisateur, échangée, transférée,
                                        cédée ou vendue sur un support quelconque à des tiers. Seule l’hypothèse du rachat de Full Experts Consulting et de ses
                                        droits permettrait la transmission des dites informations à l’éventuel acquéreur qui serait à son tour tenu de la même
                                        obligation de conservation et de modification des données vis-à-vis de l’utilisateur du site. <br>

                                        Les bases de données sont protégées par les dispositions de la loi n° 2000/011 du 19 décembre 2000
                                        portant sur le droit d'auteur et les droits voisins au Cameroun, ainsi que par la réglementation en
                                        vigueur relative à la protection des œuvres de l'esprit, y compris les bases de données.
                                    </p>
                                </div>

                                <div>
                                    <h3>06. Cookies </h3>
                                    <p>La navigation sur le site est susceptible de provoquer l’installation de cookie(s) sur l’ordinateur de
                                        l’utilisateur. Un cookie est un fichier de petite taille, qui ne permet pas l’identification de
                                        l’utilisateur, mais qui enregistre des informations relatives à la navigation d’un ordinateur
                                        sur un site. Les données ainsi obtenues visent à faciliter la navigation ultérieure sur le site,
                                        et ont également vocation à permettre diverses mesures de fréquentation. <br>
                                        Le refus d’installation d’un cookie peut entraîner l’impossibilité d’accéder à certains services.<br>

                                    </p>
                                </div>

                                <div>
                                    <h3>07. Droit Applicable Et Attribution De Juridiction </h3>
                                    <p>Tout litige en relation avec l’utilisation du site est soumis au droit français. Il est fait
                                        attribution exclusive de juridiction aux tribunaux compétents du Cameroun.
                                    </p>
                                </div>
                                <button class="close---btn" onclick="closePopup('popup1')">Fermer</button>
                            </div>
                        </div>


                        <div id="popup2" class="pop">
                            <div class="pop-content">
                                <h1>Politique de cookies </h1>
                                <p>Cette politique de cookies a été mise à jour pour la dernière fois le 23 avril 2024 et s’applique aux citoyens et aux
                                    résidents permanents légaux de l’Espace Économique de la CEMAC.
                                </p>

                                <div>
                                    <h3>1. Introduction </h3>
                                    <p>Notre site web, http://full-expert-consulting.com (ci-après : « le site web ») utilise des cookies et autres
                                        technologies liées (par simplification, toutes ces technologies sont désignées par le terme « cookies »).
                                        Des cookies sont également placés par des tierces parties que nous avons engagées. Dans le document ci-dessous,
                                        nous vous informons de l’utilisation des cookies sur notre site web.
                                    </p>
                                </div>

                                <div>
                                    <h3>2. Que sont les cookies ? </h3>
                                    <p>Un cookie est un petit fichier simple envoyé avec les pages de ce site web et stocké par votre navigateur sur le
                                        disque dur de votre ordinateur ou d’un autre appareil. Les informations qui y sont stockées peuvent être renvoyées
                                        à nos serveurs ou aux serveurs des tierces parties concernées lors d’une visite ultérieure.
                                    </p>
                                </div>

                                <div>
                                    <h3>3. Que sont les scripts ? </h3>
                                    <p>Un script est un élément de code utilisé pour que notre site web fonctionne correctement
                                        et de manière interactive. Ce code est exécuté sur notre serveur ou sur votre appareil.
                                    </p>
                                </div>

                                <div>
                                    <h3>4. Qu’est-ce qu’une balise invisible ? </h3>
                                    <p>Une balise invisible (ou balise web) est un petit morceau de texte ou d’image invisible
                                        sur un site web, utilisé pour suivre le trafic sur un site web. Pour ce faire,
                                        diverses données vous concernant sont stockées à l’aide de balises invisibles.
                                    </p>
                                </div>

                                <div>
                                    <h3>5. Cookies </h3>
                                    <p> <span id="ccc">5.1 Cookies techniques ou fonctionnels</span> <br>
                                        Certains cookies assurent le fonctionnement correct de certaines parties du site web et la
                                        prise en compte de vos préférences en tant qu’internaute. En plaçant des cookies fonctionnels,
                                        nous vous facilitons la visite de notre site web. Ainsi, vous n’avez pas besoin de saisir
                                        à plusieurs reprises les mêmes informations lors de la visite de notre site web et,
                                        par exemple, les éléments restent dans votre panier jusqu’à votre paiement. Nous pouvons
                                        déposer ces cookies sans votre consentement. <br> <br> <br>

                                        <span id="ccc">5.2 Cookies statistiques</span> <br>
                                        Nous utilisons des cookies statistiques afin d’optimiser l’expérience des internautes sur
                                        notre site web. Avec ces cookies statistiques, nous obtenons des informations sur l’utilisation
                                        de notre site web. Nous demandons votre permission pour placer des cookies statistiques <br>

                                        <span id="ccc">5.3 Cookies de marketing/suivi </span> <br>
                                        Les cookies de marketing/suivi sont des cookies ou toute autre forme de stockage local,
                                        utilisés pour créer des profils d’utilisateurs afin d’afficher de la publicité ou de
                                        suivre l’utilisateur sur ce site web ou sur plusieurs sites web dans des finalités marketing similaires.
                                        Consent to service divers
                                    </p>
                                </div>

                                <div>
                                    <h3>6. Consentement </h3>
                                    <p>Lorsque vous visitez notre site web pour la première fois, nous vous montrerons une fenêtre contextuelle
                                        avec une explication sur les cookies. Dès que vous cliquez sur « Accepter », vous consentez à ce que
                                        nous utilisions tous les cookies et extensions comme décrit dans la fenêtre contextuelle et la présente
                                        politique de cookies. Vous pouvez désactiver l’utilisation des cookies via votre navigateur, mais
                                        veuillez noter que notre site web pourrait ne plus fonctionner correctement. <br> <br> <br>

                                        <span id="ccc">6.1 Gérez vos réglages de consentement</span> <br>
                                        Vous avez chargé la politique de cookies sans le support de JavaScript. Sur AMP, vous pouvez utiliser
                                        l’onglet de gestion du consentement en bas de la page.
                                    </p>
                                </div>

                                <div>
                                    <h3>7. Activer/désactiver et supprimer les cookies </h3>
                                    <p>Vous pouvez utiliser votre navigateur internet pour supprimer automatiquement ou manuellement les cookies.
                                        Vous pouvez également spécifier que certains cookies ne peuvent pas être placés. Une autre option consiste
                                        à modifier les réglages de votre navigateur Internet afin que vous receviez un message à chaque fois qu’un
                                        cookie est placé. Pour plus d’informations sur ces options, reportez-vous aux instructions de la section
                                        Aide de votre navigateur. <br>

                                        Veuillez noter que notre site web peut ne pas marcher correctement si tous les cookies sont désactivés.
                                        Si vous supprimez les cookies dans votre navigateur, ils seront de nouveau placés après votre consentement
                                        lorsque vous revisiterez notre site web.
                                    </p>
                                </div>

                                <div>
                                    <h3>8. Vos droits concernant les données personnelles </h3>
                                    <p>Vous avez les droits suivants concernant vos données personnelles : <br>
                                        • Vous avez le droit de savoir pourquoi vos données personnelles sont nécessaires, ce qui leur
                                        arrivera et combien de temps elles seront conservées. <br>
                                        • Droit d’accès : vous avez le droit d’accéder à vos données personnelles que nous connaissons. <br>
                                        • Droit de rectification : vous avez le droit à tout moment de compléter, corriger, faire supprimer
                                        ou bloquer vos données personnelles. <br>
                                        • Si vous nous donnez votre consentement pour le traitement de vos données, vous avez le droit
                                        de révoquer ce consentement et de faire supprimer vos données personnelles. <br>
                                        • Droit de transférer vos données : vous avez le droit de demander toutes vos données personnelles au responsable
                                        du traitement et de les transférer dans leur intégralité à un autre responsable du traitement. <br>
                                        • Droit d’opposition : vous pouvez vous opposer au traitement de vos données. Nous obtempérerons,
                                        à moins que certaines raisons ne justifient ce traitement. <br>

                                        Pour exercer ces droits, veuillez nous contacter. Veuillez vous référer aux coordonnées au bas de cette
                                        politique de cookies. Si vous avez une plainte concernant la façon dont nous traitons vos données,
                                        nous aimerions en être informés, mais vous avez également le droit de déposer une plainte auprès
                                        de l’autorité de contrôle (l’autorité chargée de la protection des données).
                                    </p>
                                </div>

                                <div>
                                    <h3>9. Coordonnées </h3>
                                    <p>Pour des questions et/ou des commentaires sur notre politique de cookies et cette déclaration,
                                        veuillez nous contacter en utilisant les coordonnées suivantes : <br>

                                        Full Experts Consulting <br>
                                        Douala– Bonamoussadi <br>
                                        Site web: http://full-expert-consulting.com <br>
                                        E-mail : consulting@full-experts.com <br>
                                        Numéro de téléphone: 698 846 759 / 233 474 200 <br>

                                    </p>
                                </div>
                                <button class="close---btn" onclick="closePopup('popup2')">Fermer</button>
                            </div>
                        </div>

                        <div id="popup3" class="pop">
                            <div class="pop-content">
                                <h1>Conditions Générales de Vente </h1>

                                <div>
                                    <h3>Contrat Préambule : </h3>
                                    <p>Full Experts Consulting est une entreprise en pleine croissance, spécialisée dans divers secteurs tels que la collecte
                                        et l’analyse de données, le conseil en gestion de projets, le développement web, le BTP, et la formation. L’entreprise
                                        Full Experts Consulting propose au client qu’il l’accepte aux conditions ci-dessous d’assurer des missions d’expertise,
                                        de conseil, de représentation et d’accompagnement. Le présent contrat a pour objet de définir les conditions dans
                                        lesquelles l’entreprise Full Experts Consulting s’engage à assurer la prestation définie en préambule pour le compte
                                        de son client. Chaque mission commence par une analyse détaillée de la demande que le Client confie à l’entreprise
                                        Full Experts Consulting. Cette analyse permet de définir le processus qui sera mis en place afin d’assurer au mieux
                                        la bonne fin de l’opération envisagée. Elle permet également de définir les conditions tarifaires qui seront appliquées
                                        en fonction des dossiers.
                                    </p>
                                </div>

                                <div>
                                    <h3>Article 1 : Objet du contrat </h3>
                                    <p>Les présentes Conditions Générales de Vente (CGV), ci-après exposées, afférentes aux services de l’entreprise Full Experts
                                        Consulting sont régulièrement portées à la connaissance du Client et ont pour objet de définir les conditions dans lesquelles
                                        l’entreprise Full Experts Consulting assure l’exécution des prestations confiées par le client et telles que mentionnées
                                        sur la présente lettre de mission. Elles en constituent les conditions essentielles et déterminantes et prévalent sur
                                        toutes les conditions générales et/ou tout autre document émanant du Client, quels qu’en soient les termes. Ainsi,
                                        toute commande adressée à l’entreprise Full Experts Consulting implique l’acceptation sans réserve des présentes conditions
                                        générales, excepté si l’entreprise Full Experts Consulting a accepté de manière expresse d’inclure des clauses particulières
                                        avant la date de formation du contrat.
                                    </p>
                                </div>

                                <div>
                                    <h3>Article 2 : Nature des prestations </h3>
                                    <p>L’entreprise Full Experts Consulting est spécialisée dans l’expertise de divers secteurs tels que la collecte et l’analyse
                                        de données, le conseil en gestion de projets, le développement web, le BTP, et la formation. L’entreprise Full Experts
                                        Consulting met son expertise et son savoir-faire au profit de ses clients et à ce titre, met à leur disposition l’ensemble
                                        de ses services, notamment ses services d’expertises de collecte et analyse des données, montage des projets, conseil
                                        & accompagnement, formations & éducation, marketing & communication, développement web & réseaux sociaux, Bâtiments &
                                        Travaux Publics (BTP), qualité hygiène sécurité & environnement, comptabilité & finances, santé & assurance, hôtels &
                                        tourisme pour le compte du mandant (Client) en lien avec les objectifs qui auront été définis préalablement entre le
                                        Client et l’entreprise Full Experts Consulting.
                                    </p>
                                </div>

                                <div>
                                    <h3>Article 3 : Tarifs et conditions de paiement </h3>
                                    <p>Les prix des prestations indiqués en Francs CFA sont ceux en vigueur au moment de la passation de la Commande
                                        (par acceptation de la présente lettre de mission), sont fermes et non révisables. Les prix des Prestations
                                        comprennent la taxe sur la valeur ajoutée (TVA) au taux français en vigueur au jour de la passation de la Commande.
                                        Tout changement du taux français de TVA applicable sera automatiquement répercuté au Client par L’entreprise Full
                                        Experts Consulting sur le prix des Prestations. Les devis sont émis par l’entreprise Full Experts Consulting pour
                                        une durée de validité de 3 (trois) mois à compter de la date d’émission. Les prix des Prestations sont fixés dans
                                        la présente lettre de mission qui a valeur de devis. <br>

                                        Les Prestations sont fournies sur la base de l’acceptation de la présente lettre de mission. Elle spécifie l’objet
                                        et le cadre de nos investigations. Notre mission est strictement limitée à son contenu. Toute mission ou prestation
                                        complémentaire fera l’objet d’une information préalable du mandant (Client) afin que celui-ci soit en mesure de manifester son accord. <br>

                                        Pour toute expertise ou opération d’assistance technique, le règlement de la facture se fera dans son intégralité au plus tard le jour du
                                        rendez-vous lors du déplacement de l’expert sur les lieux de l’expertise. Pour des raisons de coûts et de gestion administrative, le règlement
                                        s’effectue en deux étapes : 60% à la commande (signature de la lettre de mission) et les 40% restant au plus tard le jour du rendez-vous où a
                                        lieu la mission d’expertise, comme indiqué ci-dessus. Dans les cas où le travail est réalisé sur place, sans déplacement physique, le paiement
                                        se fait à réception de la note expertise, du rapport technique ou de tout autre document technique ou de chiffrage relatif à l’exécution de
                                        la mission du cabinet. Lors d’un suivi de chantier ou travaux, les modalités sont définies au cas par cas en fonction des modalités d’accompagnement
                                        (taille du chantier, fréquence des rdv de suivi et contrôle, etc.). <br>

                                        Modalités de règlement : <br>
                                        Les règlements s’effectuent par virement uniquement via le RIB de la société ci-dessous : l’entreprise accepte les paiements par chèque pour des
                                        dossiers concernant des suivis de chantier où les règlements correspondent à un pourcentage du montant total des travaux engagés par le mandant.
                                        Tout règlement par chèque doit faire l’objet d’une demande écrite par mail sous réserve d’acceptation l’entreprise Full Experts Consulting.

                                    </p>
                                </div>

                                <div>
                                    <h3>Article 4 : Retard de paiement </h3>
                                    <p>Toute somme non payée à son échéance ou tout règlement non conforme au montant facturé donnera lieu de plein droit et sans mise en demeure préalable,
                                        au paiement de pénalités de retard, calculée sur la base du taux directeur semestriel du service de prestation. <br>

                                        Ces pénalités courent dès le jour suivant la date de règlement portée sur la facture et jusqu’au jour du paiement effectif sachant que tout mois
                                        commencé est dû dans son entier. Le défaut de paiement à l’échéance entraînera, après l’envoi d’un courrier de mise en demeure par l’entreprise Full
                                        Experts Consulting au Client, l’exigibilité immédiate de toutes les sommes restant dues par ce dernier, outre les intérêts et pénalités prévus dans
                                        cet article ainsi que les frais judiciaires éventuels. <br>

                                        En outre, l’entreprise Full Experts Consulting pourra suspendre ou résilier toutes les prestations en cours sans préjudice de toute autre voie d’action.
                                        Le Client ne sera pas autorisé à retenir ou différer le paiement de toute somme due à l’entreprise Full Experts Consulting même en cas de litige ou de réclamation. <br>
                                    </p>
                                </div>

                                <div>
                                    <h3>Article 5 : Demande d’intervention </h3>
                                    <p>Toute mission fait l’objet d’une demande d’intervention préalable par le mandant (Client).
                                        De plus, elle est soumise à l’acceptation d’une lettre de mission.
                                    </p>
                                </div>

                                <div>
                                    <h3>Article 6 : Validation des échanges électroniques </h3>
                                    <p>Le mandant (Client) reconnaît la validité et la force des échanges électroniques et accepte
                                        que lesdits échanges électroniques reçoivent la même force probante qu’un écrit signé de manière manuscrite.
                                    </p>
                                </div>

                                <div>
                                    <h3>Article 7 : Objet des prestations </h3>
                                    <p>Les prestations et missions assurées par l’entreprise Full Experts Consulting, répondent à des règles de déontologie
                                        strictes. Le rapport d’expertise est transmis par mail, une forme papier pourra être demandée, elle sera envoyée par
                                        courrier postal au client moyennant des frais supplémentaires de 55.000XAF liés aux coûts d’impression et d’envoi du dossier.
                                    </p>
                                </div>

                                <div>
                                    <h3>Article 8 : Confidentialité </h3>
                                    <p>Tous les rapports, comptes rendus, protocoles, et autres documents ainsi que les fichiers attachés sont confidentiels et destinés
                                        exclusivement à l’usage de la personne à laquelle ils sont adressés ou destinés. La publication, l’usage, la distribution,
                                        l’impression ou la copie non autorisée des rapports et des attachements qu’ils contiennent sont strictement interdits.
                                        Par ailleurs, l’entreprise Full Experts Consulting s’engage à ne pas utiliser les informations et données fournies par
                                        ses Clients ou prospects à des fins commerciales. Ses engagements en matière de confidentialité et de traitement des données
                                        sont accessibles aux adresses suivantes : <br>
                                        • Mentions légales : consulting@full-experts.com <br>
                                        • Politique de confidentialité : https:// full-experts–consulting de-cookies-cemac.

                                    </p>
                                </div>

                                <div>
                                    <h3>Article 9 : Limites de prestations </h3>
                                    <p>Toutes les dispositions pour que l’entreprise Full Experts Consulting puisse réaliser correctement sa mission doivent être
                                        prises par le mandant, qui doit s’assurer de l’accessibilité aux différentes parties du bâtiment. La responsabilité de l’expert
                                        missionné par l’entreprise Full Experts Consulting ne pouvant être engagée relativement à des zones inaccessibles par
                                        encombrement ou par conception. L’analyse se veut des plus exhaustive mais n’exclut pas des absences dues au fait de
                                        renseignements imparfaits ou partiels ou éléments et informations qui auraient été cachés à l’expert. <br>

                                        Toutefois, à la demande expresse du mandant (Client) certaines investigations invasives pourront être réalisées; pour
                                        certaines, par l’expert s’il possède le matériel adéquat et pour les autres, par un sapiteur (entreprise spécialisée).
                                        Dans tous les cas, les frais de sapiteur et de réparation inhérents aux investigations seront supportés par le mandant.


                                    </p>
                                </div>

                                <div>
                                    <h3>Article 1 : Objet du contrat </h3>
                                    <p>Les présentes Conditions Générales de Vente (CGV), ci-après exposées, afférentes aux services de l’entreprise Full Experts
                                        Consulting sont régulièrement portées à la connaissance du Client et ont pour objet de définir les conditions dans lesquelles
                                        l’entreprise Full Experts Consulting assure l’exécution des prestations confiées par le client et telles que mentionnées
                                        sur la présente lettre de mission. Elles en constituent les conditions essentielles et déterminantes et prévalent sur
                                        toutes les conditions générales et/ou tout autre document émanant du Client, quels qu’en soient les termes. Ainsi,
                                        toute commande adressée à l’entreprise Full Experts Consulting implique l’acceptation sans réserve des présentes conditions
                                        générales, excepté si l’entreprise Full Experts Consulting a accepté de manière expresse d’inclure des clauses particulières
                                        avant la date de formation du contrat.
                                    </p>
                                </div>

                                <div>
                                    <h3>
                                        Article 10 : Conditions d’investigations
                                    </h3>
                                    <p>Les expertises sont réalisées selon un rendez-vous fixé au préalable avec le mandant. Pour tout rendez-vous annulé par le mandant
                                        (Client), le jour même de la prestation, le coût du déplacement est à la charge de celui-ci à travers un forfait kilométrique
                                        pris sur le barème des impôts. Les contrôles sont visuels et/ou par appareils adaptés : hygromètre, scléromètre, scanners,
                                        détecteur de métaux, etc… <br>
                                        L’expert ne peut engager d’investigations invasives ou devra dans ce cas faire appel à un sapiteur, dont le coût d’intervention
                                        sera soumis à acceptation par le biais d’un devis, au client, et dont la charge incomberait à ce dernier le cas échéant. Le
                                        mandant (Client) s’engage par ailleurs à fournir à l’entreprise Full Experts Consulting, tout document utile à sa mission.
                                    </p>
                                </div>

                                <div>
                                    <h3>Article 11 : Force Majeur </h3>
                                    <p>La responsabilité de l’entreprise Full Experts Consulting ne pourra être engagée en cas de survenance d’un évènement insurmontable
                                        et imprévisible. Constituent des évènements de force majeure ou cas fortuits, outre ceux habituellement retenus par la jurisprudence
                                        des Cours et Tribunaux français, toute interruption des télécommunications, défaillance du réseau de distribution d’électricité,
                                        perte de connectivité à Internet quels que soient les équipements où le réseau en cause, dès lors qu’ils ne sont pas sous le contrôle
                                        de l’entreprise Full Experts Consulting et susceptibles d’affecter le bon déroulement des prestations de l’entreprise Full Experts Consulting. <br>
                                        Dans un premier temps, les cas de force majeure suspendront l’exécution du contrat. Si les cas de force majeure ont une durée d’existence supérieure
                                        à 1 mois, le présent contrat sera résilié automatiquement, sauf accord contraire entre les parties, sans que cette résiliation ouvre droit à indemnités
                                        de part et d’autre.
                                    </p>
                                </div>

                                <div>
                                    <h3>Article 12 : Qualifications </h3>
                                    <p>Toutes les missions proposées par l’entreprise Full Experts Consulting, sont réalisées par des experts en possession des qualifications et agréments
                                        nécessaires, permettant la bonne tenue des expertises, la cohérence des informations données et la reconnaissance de leur intervention.
                                    </p>
                                </div>

                                <div>
                                    <h3>Article 13 : Conditions financières et propriété intellectuelle </h3>
                                    <p>De convention expresse, les prestations fournies restent la propriété de l’entreprise Full Experts Consulting, tant que le mandant ne s’est pas acquitté
                                        du coût de celle-ci. Le défaut de paiement interdit tout transfert de propriété du rapport d’expertise ou de tout document inhérent à sa prestation
                                        (liste de réserves, protocoles d’accord, etc…), à partir de la date d’échéance, et rend abusive toute exploitation des prestations, qu’elle soit le
                                        fait du mandant ou des tiers. En cas de retard de paiement, les indemnités forfaitaires en vigueur pourront être appliquées. En cas de non-paiement, l’article 4 s’appliquera.
                                    </p>
                                </div>

                                <div>
                                    <h3>Article 14 : Droit de rétractation </h3>
                                    <p>Conformément au droit de rétractation, le mandant dispose d’un délai de rétractation conformément à l’article L221-18 du code de la consommation, qui
                                        stipule que le délai de 14 jours court à compter du jour de la signature de la lettre de mission. Par conséquent, il ne pourra avoir lieu un quelconque
                                        déplacement de nos experts sans que ce délai ne soit expiré. Toutefois, ce délai pourrait être abrogé en cas de sollicitation expresse du mandant, qui
                                        a jugé un caractère d’urgence ou de dangerosité pour ses propres intérêts. Pour ce faire, le mandant doit renoncer à son droit de rétractation en cochant
                                        la mention afférente en page 13 de la lettre de mission qui lui aura été préalablement envoyée.
                                    </p>
                                </div>

                                <div>
                                    <h3>Article 15 : Incessibilité du contrat </h3>
                                    <p>Les parties ayant été choisies en fonction de leur personnalité, elles s’interdisent expressément de céder le présent contrat en tout ou en partie, à titre
                                        onéreux ou gratuit, sous quelque forme que ce soit, ou d’en sous-traiter l’exécution totale ou partielle à un tiers sans l’autorisation préalable de l’autre partie.
                                    </p>
                                </div>

                                <div>
                                    <h3>Article 16 : Litiges et attribution juridique </h3>
                                    <p>Les présents, contrat et conditions générales sont soumis au Droit Camerounais. En cas de litige concernant la validité, l’exécution, l’interprétation et/ou la rupture
                                        des présents, contrat et Conditions Générales, les parties conviennent de s’efforcer de résoudre à l’amiable ledit litige dans un délai d’un mois à compter de la date
                                        de survenance de ce dernier. A défaut d’accord dans ce délai, la partie la plus diligente pourra saisir le Tribunal de grande instance au Cameroun auquel les parties
                                        attribuent expressément compétence, et ce même en cas d’appel en garantie et de pluralité de défendeurs. .
                                    </p>
                                </div>
                                <button class="close---btn" onclick="closePopup('popup3')">Fermer</button>
                            </div>
                        </div>

                    </div>
                </div>
                <hr id="ligne2">
                <h6>© 2024 Full Experts Consulting</h6>
            </div>
        </div>
    </footer>
    </div>
    <!--END CONTAINER-FLUID MAIN DIV-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="{{('services/service.js')}}"></script>
</body>

</html>