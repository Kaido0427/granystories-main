<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRANNY'STORIES</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}?v=1.0.1">
    <!-- Bootstrap CSS CDN -->
    <meta property="og:title" content="Granny Stories">
    <meta property="og:description" content="Livre du souvenir de Granny.">
    <meta property="og:image" content="https://grannystories.linatory.com/image/homebook.png">
    <meta property="og:url" content="https://grannystories.linatory.com">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Granny Stories">


    <style>
        .story-content {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .story-header {
            background-color: rgba(184, 130, 60, 0.8);
            padding: 5px;
            /* Réduit le padding */
            border-radius: 5px;
            margin-bottom: 8px;
            /* Réduit la marge */
        }

        .story-name {
            margin: 0;
            font-weight: bold;
            font-size: 0.6em;
            /* Réduit la taille du texte */
            overflow: hidden;
            text-overflow: ellipsis;

        }

        .story-relation {
            margin: 0;
            text-align: right;
            font-size: 0.4em;
            /* Réduit la taille du texte */
            font-style: italic;
            overflow: hidden;
            text-overflow: ellipsis;

        }

        .story-anecdote {
            font-size: 10px;
            /* Taille initiale, ajustée par le script */
            overflow: hidden;

            height: auto;
            /* La hauteur sera ajustée par la taille de la police */
            width: 100%;
            font-family: Verdana, Tahoma, sans-serif;
        }


        .story-footer {
            display: flex;
            justify-content: space-between;
            font-size: 0.55em;
            /* Réduit la taille du texte */
            padding: 2px;
            /* Réduit le padding */
            background-color: rgba(184, 130, 60, 0.8);
            border-radius: 4px;
        }

        .story-location {
            flex: 1;
            font-style: italic;
            font-weight: bold;
            overflow: hidden;
            text-overflow: ellipsis;

        }

        .story-date {
            text-align: right;
            overflow: hidden;
            text-overflow: ellipsis;

        }

        .image-container {
            width: 80%;
            /* Prendre 80% de la largeur du conteneur */
            height: auto;
            /* Ajuster la hauteur automatiquement */
            margin: 0 auto;
            /* Centrer horizontalement */
            display: flex;
            /* Utiliser flexbox pour centrer verticalement */
            align-items: center;
            /* Centrer verticalement */
            justify-content: center;
            /* Centrer horizontalement */
            text-align: center;
            /* Assurer que l'image est centrée dans le conteneur */
        }

        .img-fluid {
            max-width: 100%;
            /* Assurer que l'image ne dépasse pas le conteneur */
            height: auto;
            /* Conserver les proportions de l'image */
        }
    </style>


</head>


<body style="background-color:  rgb(177, 111, 25);">
    <div id="video-container"
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
        background-color: #9c6113; 
        display: flex; justify-content: center; align-items: center; 
        z-index: 9999; overflow: hidden; transition: opacity 0.5s ease;">
        <video autoplay muted loop
            style="position: absolute; top: 50%; left: 50%; width: 100%; height: 100%; 
              object-fit: contain; transform: translate(-50%, -50%);">
            <source src="{{ asset('videos/Grannys.mp4') }}" type="video/mp4">
            Votre navigateur ne supporte pas la balise vidéo.
        </video>
    </div>

    <div class="book-container">
        <div id="book" class="book">
            <!-- Page 1 - Image de couverture -->
            <div id="p1" class="paper">
                <div class="front">
                    <div id="f1" class="front-content">
                        <img class="img-fluid" 
                            src="{{ asset('image/homebook.png') }}" alt="Couverture">
                    </div>
                </div>
                <div class="back">
                    <div id="b1" class="back-content">
                        <!-- Dos vide -->
                    </div>
                </div>
            </div>

            <!-- Page 2 - Deuxième image -->
            <div id="p2" class="paper">
                <div class="front">
                    <div id="f2" class="front-content">
                        <img class="img-fluid" style="object-fit: cover;width:100%;"
                            src="{{ asset('image/granny.png') }}" alt="Deuxième image">
                    </div>
                </div>
                <div class="back">
                    <div id="b2" class="back-content">
                        <!-- Dos vide -->
                    </div>
                </div>
            </div>

            <!-- Page 3 - Préface -->
            <div id="p3" class="paper">
                <div class="front">
                    <div id="f3" class="front-content">
                        <img class="img-fluid" style="object-fit: cover;width:100%;"
                            src="{{ asset('image/preface.png') }}" alt="Préface">
                    </div>
                </div>
                <div class="back">
                    <div id="b3" class="back-content">
                        <!-- Dos vide -->
                    </div>
                </div>
            </div>

            <!-- Table des matières dynamique -->
            @php
                $itemsPerPage = 45;
                $totalPages = ceil(count($anecdotes) / $itemsPerPage);
            @endphp

            @for ($pageNum = 0; $pageNum < $totalPages; $pageNum++)
                <div id="p{{ 4 + $pageNum }}" class="paper">
                    <div class="front">

                        <div id="f{{ 4 + $pageNum }}" class="story-content">
                            <div class="story-header text-center">
                                <h6 class="story-name">MERCI À TOUS CEUX QUI ONT DÉJÀ INSÉRÉ LEUR TÉMOIGNAGE</h6>
                            </div>
                            <div style="font-size: 8.5px;">
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        <ul class="list-unstyled">
                                            @foreach ($anecdotes->slice($pageNum * $itemsPerPage, $itemsPerPage / 2) as $index => $anecdote)
                                                <li style="margin-bottom: 3px;"
                                                    data-name="{{ $anecdote->prenom }} {{ $anecdote->nom }}">
                                                    {{ $anecdote->prenom }} {{ $anecdote->nom }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-unstyled">
                                            @foreach ($anecdotes->slice($pageNum * $itemsPerPage + $itemsPerPage / 2, $itemsPerPage / 2) as $index => $anecdote)
                                                <li style="margin-bottom: 3px;"
                                                    data-name="{{ $anecdote->prenom }} {{ $anecdote->nom }}">
                                                    {{ $anecdote->prenom }} {{ $anecdote->nom }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="story-footer">
                                <span class="story-location">{{ $anecdotes->count() }} Témoignants</span>
                                <span class="story-date">{{ $pageNum + 1 }}/{{ $totalPages }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="back">
                        <div id="b{{ 4 + $pageNum }}" class="back-content">
                            <!-- Contenu du dos de la page (vide ou avec un contenu spécifique si nécessaire) -->
                        </div>
                    </div>
                </div>
            @endfor
            <!-- anecdote -->
            @php
                $pageHeight = 390; // Hauteur approximative de la zone de contenu en pixels
                $fontSize = 6.4; // Taille de police
                $lineHeight = $fontSize * 1.4; // Hauteur de ligne
                $charsPerLine = floor(220 / ($fontSize * 0.6)); // Nombre de caractères par ligne
                $linesPerPage = floor($pageHeight / $lineHeight);
                $charsPerPage = $charsPerLine * $linesPerPage;

                $totalPages = $totalPages + 4; // Ajustement pour les pages précédentes
            @endphp

            @foreach ($anecdotes as $index => $anecdote)
                @php
                    $anecdoteHtml = $anecdote->anecdote;
                    $pageContent = '';
                    $currentPage = 0;
                    $isFirstPage = true;
                    $hasImage = !empty($anecdote->image);
                    $createdAt = \Carbon\Carbon::parse($anecdote->created_at);
                    $isNewAnecdote = $createdAt->diffInSeconds(now()) <= 100;
                    $fake = $anecdote->id;
                @endphp

                @while ($anecdoteHtml !== '')
                    @php
                        $contentChunk = substr($anecdoteHtml, 0, $charsPerPage);

                        $lastPunctuationPos = max(
                            strrpos($contentChunk, '.'),
                            strrpos($contentChunk, ','),
                            strrpos($contentChunk, '!'),
                            strrpos($contentChunk, '?'),
                            strrpos($contentChunk, ' '),
                        );

                        if ($lastPunctuationPos !== false && $lastPunctuationPos > $charsPerPage - 20) {
                            $endPos = $lastPunctuationPos + 1;
                        } else {
                            if (preg_match('/<\/[a-z][a-z0-9]*>$/i', $contentChunk, $matches, PREG_OFFSET_CAPTURE)) {
                                $endPos = $matches[0][1] + strlen($matches[0][0]);
                            } else {
                                $endPos = strlen($contentChunk);
                            }
                        }

                        $pageContent = substr($anecdoteHtml, 0, $endPos);
                        $anecdoteHtml = substr($anecdoteHtml, $endPos);
                    @endphp

                    <div id="p{{ $totalPages }}" class="paper">
                        <div class="front">
                            <div class="story-content" data-name="{{ $anecdote->prenom }} {{ $anecdote->nom }}">
                                @if ($isFirstPage)
                                    <div class="story-header">
                                        <h5 class="story-name">{{ $anecdote->prenom }} {{ $anecdote->nom }}</h5>
                                        <p class="story-relation">{{ $anecdote->relation }}</p>
                                    </div>
                                @endif
                                <div class="story-anecdote"
                                    style="font-size: {{ $fontSize }}px; line-height: {{ $lineHeight }}px;"
                                    data-created-at="{{ $createdAt->timestamp }}"
                                    data-is-new="{{ $isNewAnecdote ? 'true' : 'false' }}">
                                    @if ($fake == 56)
                                        {!! $pageContent !!}
                                    @elseif (auth()->check() || $isNewAnecdote)
                                        {!! $pageContent !!}
                                    @else
                                        <div style="text-align: center;">
                                            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="150px"
                                                height="150px" viewBox="0 0 64 64" enable-background="new 0 0 64 64"
                                                xml:space="preserve" fill="#000000">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <g>
                                                        <path fill="#e79f04"
                                                            d="M20,14c0-6.627,5.373-12,12-12s12,5.373,12,12v10h-4V14c0-4.418-3.582-8-8-8s-8,3.582-8,8v10h-4V14z">
                                                        </path>
                                                        <g>
                                                            <path fill="#e6b36b"
                                                                d="M10,60c0,1.104,0.896,2,2,2h40c1.104,0,2-0.896,2-2v-4H10V60z">
                                                            </path>
                                                            <rect x="10" y="34" fill="#e6b36b" width="44"
                                                                height="20"></rect>
                                                            <path fill="#e6b36b"
                                                                d="M52,26H12c-1.104,0-2,0.895-2,2v4h44v-4C54,26.895,53.104,26,52,26z">
                                                            </path>
                                                        </g>
                                                        <g>
                                                            <path fill="#394240"
                                                                d="M52,24h-6V14c0-7.732-6.268-14-14-14S18,6.268,18,14v10h-6c-2.211,0-4,1.789-4,4v32c0,2.211,1.789,4,4,4 h40c2.211,0,4-1.789,4-4V28C56,25.789,54.211,24,52,24z M20,14c0-6.627,5.373-12,12-12s12,5.373,12,12v10h-4V14 c0-4.418-3.582-8-8-8s-8,3.582-8,8v10h-4V14z M38,14v10H26V14c0-3.314,2.687-6,6-6S38,10.686,38,14z M54,60c0,1.104-0.896,2-2,2 H12c-1.104,0-2-0.896-2-2v-4h44V60z M54,54H10V34h44V54z M54,32H10v-4c0-1.105,0.896-2,2-2h40c1.104,0,2,0.895,2,2V32z">
                                                            </path>
                                                            <path fill="#394240"
                                                                d="M29,44.979V49c0,1.656,1.343,3,3,3s3-1.344,3-3v-4.021c1.209-0.912,2-2.348,2-3.979c0-2.762-2.238-5-5-5 s-5,2.238-5,5C27,42.631,27.791,44.066,29,44.979z M32,38c1.657,0,3,1.342,3,3c0,1.305-0.837,2.402-2,2.816V49 c0,0.553-0.447,1-1,1s-1-0.447-1-1v-5.184c-1.163-0.414-2-1.512-2-2.816C29,39.342,30.343,38,32,38z">
                                                            </path>
                                                        </g>
                                                        <path fill="#2c8dce"
                                                            d="M32,38c1.657,0,3,1.342,3,3c0,1.305-0.837,2.402-2,2.816V49c0,0.553-0.447,1-1,1s-1-0.447-1-1v-5.184 c-1.163-0.414-2-1.512-2-2.816C29,39.342,30.343,38,32,38z">
                                                        </path>
                                                        <g opacity="0.15">
                                                            <path
                                                                d="M10,60c0,1.104,0.896,2,2,2h40c1.104,0,2-0.896,2-2v-4H10V60z">
                                                            </path>
                                                            <path
                                                                d="M52,26H12c-1.104,0-2,0.895-2,2v4h44v-4C54,26.895,53.104,26,52,26z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                            <p class="text-center" style="margin-top: 10px; font-weight: bold;">
                                                Confidentiel</p>
                                        </div>
                                    @endif
                                </div>
                                @if ($anecdoteHtml === '' && $hasImage)
                                    @php
                                        $totalPages++; // Page pour l'image
                                    @endphp
                                @endif
                                @if ($anecdoteHtml === '')
                                    <div class="story-footer">
                                        <span class="story-location">{{ $anecdote->ville }},
                                            {{ $anecdote->pays }}</span>
                                        <span
                                            class="story-date">{{ \Carbon\Carbon::parse($anecdote->created_at)->format('d/m/Y') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="back">
                            <div class="back-content p-3">
                                <!-- Dos vide -->
                            </div>
                        </div>
                    </div>

                    @if ($anecdoteHtml === '' && $hasImage)
                        <div id="p{{ $totalPages }}" class="paper">
                            <div class="front">
                                <div class="story-content">
                                    <div class="story-header">
                                        <h5 class="story-name">{{ $anecdote->prenom }} {{ $anecdote->nom }}</h5>
                                        <p class="story-relation">{{ $anecdote->relation }}</p>
                                    </div>
                                    <div class="image-container" style="text-align: center;">
                                        @auth
                                            <img class="img-fluid" style="object-fit: cover; width: 100%;"
                                                src="{{ asset('image/' . $anecdote->image) }}"
                                                alt="Image pour l'anecdote">
                                        @else
                                            <div style="text-align: center;">
                                                <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="150px"
                                                    height="150px" viewBox="0 0 64 64" enable-background="new 0 0 64 64"
                                                    xml:space="preserve" fill="#000000">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <g>
                                                            <path fill="#e79f04"
                                                                d="M20,14c0-6.627,5.373-12,12-12s12,5.373,12,12v10h-4V14c0-4.418-3.582-8-8-8s-8,3.582-8,8v10h-4V14z">
                                                            </path>
                                                            <g>
                                                                <path fill="#e6b36b"
                                                                    d="M10,60c0,1.104,0.896,2,2,2h40c1.104,0,2-0.896,2-2v-4H10V60z">
                                                                </path>
                                                                <rect x="10" y="34" fill="#e6b36b" width="44"
                                                                    height="20"></rect>
                                                                <path fill="#e6b36b"
                                                                    d="M52,26H12c-1.104,0-2,0.895-2,2v4h44v-4C54,26.895,53.104,26,52,26z">
                                                                </path>
                                                            </g>
                                                            <g>
                                                                <path fill="#394240"
                                                                    d="M52,24h-6V14c0-7.732-6.268-14-14-14S18,6.268,18,14v10h-6c-2.211,0-4,1.789-4,4v32c0,2.211,1.789,4,4,4 h40c2.211,0,4-1.789,4-4V28C56,25.789,54.211,24,52,24z M20,14c0-6.627,5.373-12,12-12s12,5.373,12,12v10h-4V14 c0-4.418-3.582-8-8-8s-8,3.582-8,8v10h-4V14z M38,14v10H26V14c0-3.314,2.687-6,6-6S38,10.686,38,14z M54,60c0,1.104-0.896,2-2,2 H12c-1.104,0-2-0.896-2-2v-4h44V60z M54,54H10V34h44V54z M54,32H10v-4c0-1.105,0.896-2,2-2h40c1.104,0,2,0.895,2,2V32z">
                                                                </path>
                                                                <path fill="#394240"
                                                                    d="M29,44.979V49c0,1.656,1.343,3,3,3s3-1.344,3-3v-4.021c1.209-0.912,2-2.348,2-3.979c0-2.762-2.238-5-5-5 s-5,2.238-5,5C27,42.631,27.791,44.066,29,44.979z M32,38c1.657,0,3,1.342,3,3c0,1.305-0.837,2.402-2,2.816V49 c0,0.553-0.447,1-1,1s-1-0.447-1-1v-5.184c-1.163-0.414-2-1.512-2-2.816C29,39.342,30.343,38,32,38z">
                                                                </path>
                                                            </g>
                                                            <path fill="#2c8dce"
                                                                d="M32,38c1.657,0,3,1.342,3,3c0,1.305-0.837,2.402-2,2.816V49c0,0.553-0.447,1-1,1s-1-0.447-1-1v-5.184 c-1.163-0.414-2-1.512-2-2.816C29,39.342,30.343,38,32,38z">
                                                            </path>
                                                            <g opacity="0.15">
                                                                <path
                                                                    d="M10,60c0,1.104,0.896,2,2,2h40c1.104,0,2-0.896,2-2v-4H10V60z">
                                                                </path>
                                                                <path
                                                                    d="M52,26H12c-1.104,0-2,0.895-2,2v4h44v-4C54,26.895,53.104,26,52,26z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <p class="text-center" style="margin-top: 10px; font-weight: bold;">
                                                    Confidentiel</p>
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                            <div class="back">
                                <div class="back-content">
                                    <!-- Dos vierge -->
                                </div>
                            </div>
                        </div>
                        @php
                            $totalPages++;
                            $hasImage = false; // Assurer que l'image est seulement ajoutée une fois
                        @endphp
                    @endif

                    @php
                        $isFirstPage = false;
                    @endphp
                @endwhile
            @endforeach

            <!-- Dernière page -->
            <div id="p{{ $totalPages }}" class="paper">
                <div class="front">
                    <div class="front-content">
                        <img class="img-fluid" style="object-fit: cover; width: 100%;"
                            src="{{ asset('image/grannyback.png') }}" alt="Dernière page">
                    </div>
                </div>
                <div class="back">
                    <div class="back-content">
                        <!-- Dos vierge -->
                    </div>
                </div>
            </div>

        </div>


        <div class="button-container justify-content-between">
            <button id="prev-btn" class="btn btn-warning" value=""></button>
            <button id="next-btn" class="btn btn-warning" value=""></button>
            {{-- <button id="download-pdf">Télécharger le Livre</button> --}}

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        var anecdotes = @json($anecdotes);
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const videoContainer = document.getElementById("video-container");

            window.addEventListener('load', function() {
                // Appliquer l'effet de transition pour masquer la vidéo
                videoContainer.style.opacity = "0";

                // Masquer le conteneur après la transition pour éviter les clics
                setTimeout(() => {
                    videoContainer.style.display = "none";
                }, 500); // Durée de la transition pour masquer le conteneur
            });
        });
    </script>

    <script>
        const prevBtn = document.querySelector("#prev-btn");
        const nextBtn = document.querySelector("#next-btn");
        const book = document.querySelector("#book");

        const createAnecdoteLink = document.createElement("a");
        createAnecdoteLink.classList.add("btn", "btn-primary", "mt-3");
        createAnecdoteLink.textContent = "Ajouter mon témoignage";
        createAnecdoteLink.style.zIndex = 10;
        createAnecdoteLink.style.fontSize = "12px";

        createAnecdoteLink.addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = "/anecdote/create";
        });

        book.parentNode.appendChild(createAnecdoteLink);

        function adjustButtonMargin() {
            createAnecdoteLink.style.marginTop = window.innerWidth <= 768 ? "5px" : "20px";
        }

        window.addEventListener('load', adjustButtonMargin);
        window.addEventListener('resize', adjustButtonMargin);

        console.log('Lien de création d\'anecdote créé');

        //===============================================
        const returnToListLink = document.createElement("a");
        returnToListLink.classList.add("btn", "btn-secondary", "mt-3", "ml-2");
        returnToListLink.textContent = "Revenir à la liste";
        returnToListLink.style.zIndex = 10;
        returnToListLink.style.fontSize = "12px";
        returnToListLink.style.display = "none"; // Masquer initialement

        // Ajouter l'événement de clic pour revenir à la liste
        returnToListLink.addEventListener('click', function(event) {
            event.preventDefault();
            goBackToList(); // Appeler la fonction pour revenir à la liste
        });

        createAnecdoteLink.parentNode.insertBefore(returnToListLink, createAnecdoteLink.nextSibling);
        //===============================

        let currentLocation = 1;
        const papers = document.querySelectorAll('.paper');
        let numOfPapers = papers.length;
        let maxLocation = numOfPapers + 1;

        function resizeText(element) {
            let fontSize = 16;
            element.style.fontSize = fontSize + 'px';
            while (element.scrollHeight > element.clientHeight && fontSize > 8) {
                fontSize--;
                element.style.fontSize = fontSize + 'px';
            }
        }

        function initializePages() {
            const prefaceElement = document.querySelector('#f2 .front-content');
            if (prefaceElement) {
                resizeText(prefaceElement);
            }
            document.querySelectorAll('.anecdote-page').forEach(page => {
                resizeText(page.querySelector('.anecdote-text'));
            });
        }

        function openBook() {
            if (window.innerWidth > 768) {
                book.style.transform = "translateX(50%)";
                prevBtn.style.transform = "translateX(-100px)";
                nextBtn.style.transform = "translateX(100px)";
            } else {
                book.style.transform = "translateX(0%)";
                prevBtn.style.transform = "translateX(0px)";
                nextBtn.style.transform = "translateX(0px)";
            }
        }

        function closeBook(isAtBeginning) {
            if (window.innerWidth > 768) {
                book.style.transform = isAtBeginning ? "translateX(0%)" : "translateX(100%)";
                prevBtn.style.transform = isAtBeginning ? "translateX(0px)" : "translateX(-100px)";
                nextBtn.style.transform = isAtBeginning ? "translateX(0px)" : "translateX(100px)";
            } else {
                book.style.transform = "translateX(0%)";
                prevBtn.style.transform = "translateX(0px)";
                nextBtn.style.transform = "translateX(0px)";
            }
        }

        function goNextPage() {
            if (currentLocation < maxLocation) {
                const paper = papers[currentLocation - 1];
                if (paper) {
                    paper.classList.add("flipped");
                    paper.style.zIndex = currentLocation;
                }
                if (currentLocation === 1) {
                    openBook();
                }
                currentLocation++;
                updateButtons();
            }
        }

        function goPrevPage() {
            if (currentLocation > 1) {
                const paper = papers[currentLocation - 2];
                if (paper) {
                    paper.classList.remove("flipped");
                    paper.style.zIndex = numOfPapers - currentLocation + 2;
                }
                if (currentLocation === 2) {
                    closeBook(true);
                } else if (currentLocation === maxLocation) {
                    openBook();
                }
                currentLocation--;
                updateButtons();
            }
        }

        function updateButtons() {
            const tableOfContentsPages = document.querySelectorAll('.paper .card').length;
            const firstAnecdotePage = 5 + tableOfContentsPages;

            prevBtn.disabled = (currentLocation === 1);
            prevBtn.style.opacity = (currentLocation === 1) ? 0.5 : 1;
            nextBtn.disabled = (currentLocation === maxLocation - 1);
            nextBtn.style.opacity = (currentLocation === maxLocation - 1) ? 0.5 : 1;

            if (currentLocation >= firstAnecdotePage) {
                returnToListLink.style.display = "inline-block"; // Afficher le bouton
            } else {
                returnToListLink.style.display = "none"; // Masquer le bouton
            }

            if (currentLocation === 1) {
                nextBtn.value = "Voir la page de garde";
                prevBtn.value = "";
            } else if (currentLocation === 2) {
                nextBtn.value = "Voir la préface";
                prevBtn.value = "Voir la couverture";
            } else if (currentLocation === 3) {
                nextBtn.value = "Page suivante";
                prevBtn.value = "Voir la page de garde";
            } else if (currentLocation >= 3 && currentLocation < firstAnecdotePage) {
                nextBtn.value = "Les Témoignages";
                prevBtn.value = "Page précédente";
            } else if (currentLocation === firstAnecdotePage) {
                nextBtn.value = "Témoignage suivant";
                prevBtn.value = "Page précédente";
            } else if (currentLocation === maxLocation - 1) {
                nextBtn.value = "Fin du livre";
                prevBtn.value = "Page précédente";
            } else if (currentLocation === maxLocation) {
                nextBtn.value = "Fin du livre";
                prevBtn.value = "Page précédente";
            } else {
                // Valeurs par défaut pour s'assurer que les boutons ne sont jamais vides
                nextBtn.value = "Témoignage suivant";
                prevBtn.value = "Page précédente";
            }

            prevBtn.textContent = prevBtn.value;
            nextBtn.textContent = nextBtn.value;

            if (window.innerWidth <= 768) {
                prevBtn.style.fontSize = nextBtn.style.fontSize = "6px";
                prevBtn.style.padding = nextBtn.style.padding = "6px 10px";
                returnToListLink.style.marginTop = "5px";
            } else {
                prevBtn.style.fontSize = nextBtn.style.fontSize = "12px";
                prevBtn.style.padding = nextBtn.style.padding = "8px 16px";
                returnToListLink.style.marginTop = "0";
            }
        }


        function initBook() {
            console.log('initBook() appelée');
            closeBook(true);
            papers.forEach((paper, index) => {
                paper.classList.remove("flipped");
                paper.style.zIndex = numOfPapers - index;
            });
            currentLocation = 1;
            updateButtons();
            initializePages();
        }

        function handleResize() {
            if (window.innerWidth <= 768) {
                closeBook(true);
            } else {
                if (currentLocation === 1) {
                    closeBook(true);
                } else if (currentLocation === maxLocation) {
                    closeBook(false);
                } else {
                    openBook();
                }
            }
            initializePages();
        }

        window.addEventListener('load', initBook);
        window.addEventListener('resize', handleResize);
        prevBtn.addEventListener("click", goPrevPage);
        nextBtn.addEventListener("click", goNextPage);
    </script>
    <script>
        // Fonction pour simuler la navigation vers la page suivante
        function simulateGoNextPage(times) {
            if (times > 0) {
                goNextPage();
                setTimeout(function() {
                    simulateGoNextPage(times - 1);
                }, 200);
            }
        }

        // Fonction pour naviguer vers une page spécifique en fonction du nom cliqué
        function navigateToName(targetName) {
            let targetPage = null;

            // Parcourir tous les éléments avec la classe .paper pour trouver la page cible
            document.querySelectorAll('.paper').forEach((paper, index) => {
                const nameElement = paper.querySelector(`[data-name="${targetName}"]`);
                if (nameElement && paper.querySelector('.story-header')) {
                    targetPage = index + 1; // Index des pages commence à 1
                    return; // Sortir de la boucle forEach dès qu'on trouve la première occurrence
                }
            });

            if (targetPage !== null) {
                const pagesToTurn = targetPage - currentLocation;
                simulateGoNextPage(pagesToTurn);
            } else {
                console.error(`Début de l'anecdote pour "${targetName}" non trouvé.`);
            }
        }

        // Ajouter des écouteurs d'événements aux éléments de la table des matières
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.story-content li').forEach(li => {
                li.style.cursor = 'pointer';
                li.addEventListener('click', function() {
                    const targetName = this.getAttribute('data-name');
                    if (targetName) {
                        navigateToName(targetName);
                    }
                });
            });
        });

        // Fonction pour simuler le retour à la liste des témoignants
        function simulateGoPrevPage(times) {
            if (times > 0) {
                goPrevPage();
                setTimeout(function() {
                    simulateGoPrevPage(times - 1);
                }, 200);
            }
        }


        function goBackToList() {
            const tableOfContentsPages = document.querySelectorAll('.paper .card').length;
            const firstAnecdotePage = 5 + tableOfContentsPages;

            // Calculer le nombre de pages à revenir
            const pagesToTurn = currentLocation - firstAnecdotePage + 1;
            simulateGoPrevPage(pagesToTurn);
        }
    </script>

</body>

</html>
