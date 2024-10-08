<!-- resources/views/book-pdf.blade.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'Anecdotes</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
            background-color: rgb(177, 111, 25);
        }

        .book-container {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .book {
            position: relative;
            max-width: 350px;
            max-height: 500px;
            width: 90vw;
            height: 80vh;
            transition: transform 0.5s;
        }

        .paper {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            perspective: 1500px;
            transition: transform 0.5s, z-index 0.5s;
        }

        .front,
        .back {
            background-color: white;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            transform-origin: left;
            transition: transform 0.5s;
            overflow: hidden;
            padding: 20px;
        }

        .front {
            z-index: 1;
            backface-visibility: hidden;
            border-left: 3px solid powderblue;
        }

        .back {
            z-index: 0;
        }

        .front-content,
        .back-content {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            overflow: auto;
        }

        .back-content {
            transform: rotateY(180deg);
        }

        .flipped .front,
        .flipped .back {
            transform: rotateY(-180deg);
        }

        button {
            border: none;
            background-color: transparent;
            cursor: pointer;
            transition: transform 0.5s;
        }

        button:focus {
            outline: none;
        }

        button:hover i {
            color: #636363;
        }

        i {
            font-size: 50px;
            color: gray;
        }

        img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        h2,
        h3 {
            margin-bottom: 20px;
        }

        p {
            text-align: justify;
            margin-bottom: 10px;
        }

        button:disabled {
            cursor: not-allowed;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 0 20px;
            margin-top: 20px;
        }

        #prev-btn,
        #next-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            z-index: 1000;
        }

        #prev-btn {
            left: 150px;
            /* Ajuster ici pour rapprocher le bouton du livre */
        }

        #next-btn {
            right: 150px;
            /* Ajuster ici pour rapprocher le bouton du livre */
        }

        @media (max-width: 768px) {
            .book-container {
                justify-content: flex-start;
                padding-top: 20px;
            }

            .book {
                margin-bottom: 20px;
            }

            .button-container {
                position: fixed;
                bottom: 10px;
                /* Ajuster la distance depuis le bas de l'écran */
                left: 0;
                right: 0;
                padding: 0 20px;
                display: flex;
                justify-content: center;
                /* Centre les boutons */
            }

            #prev-btn,
            #next-btn {
                position: relative;
                top: 50%;
                transform: translateY(-50%);
                width: 50px;
                height: 50px;
                z-index: 1000;
                /* Assure que les boutons sont au-dessus du livre */
            }

            #prev-btn {
                left: 10px;
                /* Ajuster pour rapprocher du livre */
            }

            #next-btn {
                right: 10px;
                /* Ajuster pour rapprocher du livre */
            }

            .back {
                display: none;
            }

            .paper:last-child .back {
                display: block;
            }

            i {
                font-size: 40px;
            }

            .front-content,
            .back-content {
                font-size: 14px;
            }

            h2,
            h3 {
                margin-bottom: 15px;
            }

            p {
                margin-bottom: 8px;
            }
        }



        /**/


        .anecdote-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .anecdote-header h3 {
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
        }

        .anecdote-header .relation {
            margin-bottom: 0.25rem;
        }

        .anecdote-body {
            margin-bottom: 1rem;
            word-wrap: break-word;
            /* Ajouté pour éviter le débordement */
        }

        .anecdote-footer {
            border-top: 1px solid #eee;
            padding-top: 0.5rem;
            font-size: 0.875rem;
        }

        .anecdote-footer .location {
            color: #888;
        }

        .anecdote-footer .date {
            color: #aaa;
        }

        .container {
            padding: 20px;
            /* Ajoute du padding pour la marge de sécurité */
        }
    </style>
</head>

<body>
    <div class="book-container">
        <div id="book" class="book">
            <!-- Page 1 - Image de couverture -->
            <div id="p1" class="paper">
                <div class="front">
                    <div id="f1" class="front-content">
                        <img class="img-fluid" style="object-fit: cover;width:100%;"
                            src="{{ asset('image/homebook.png') }}" alt="Couverture">
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
            </div>

            <!-- Page 3 - Préface -->
            <div id="p3" class="paper">
                <div class="front">
                    <div id="f3" class="front-content">
                        <img class="img-fluid" style="object-fit: cover;width:100%;"
                            src="{{ asset('image/preface.png') }}" alt="préface">
                    </div>
                </div>
            </div>

            <!-- Pages d'anecdotes générées dynamiquement -->
            @foreach ($anecdotes as $index => $anecdote)
                <div id="p{{ $index + 4 }}" class="paper">
                    <div class="front">
                        <div id="f{{ $index + 4 }}" class="front-content">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title text-center">{{ $anecdote->prenom }} {{ $anecdote->nom }}</h3>
                                    <p class="card-text">{{ $anecdote->anecdote }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $anecdote->ville }},
                                            {{ $anecdote->pays }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Dernière page avec back -->
            <div id="last-page" class="paper">
                <div class="front">
                    <div id="f-last" class="front-content">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center">Merci pour votre lecture</h3>
                                <p class="card-text text-center">Fin du livre</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="back">
                    <div id="b-last" class="back-content">
                        <!-- Contenu du dos pour la dernière page -->
                        <p class="text-center">Retour</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
