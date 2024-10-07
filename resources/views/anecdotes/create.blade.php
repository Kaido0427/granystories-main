@extends('layouts.app')

@section('content')
    <div class="form-body">
    
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h4 style="color: black;text-align:center;">SOUMETTRE MON TEMOIGNAGE</h4>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error')) 
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('anecdote.store') }}" method="POST" class="requires-validation" novalidate>
                            @csrf
                            <div class="col-md-12">
                                <label for="nom">Nom de Famille</label> 
                                <input class="form-control" type="text" id="nom" name="nom" placeholder="Nom de Famille"
                                    required>
                                <div class="valid-feedback">Le champ Nom est valide!</div>
                                <div class="invalid-feedback">Le champ Nom ne peut pas être vide!</div>
                            </div>

                            <div class="col-md-12">
                                <label for="prenom">Prénoms</label>
                                <input class="form-control" type="text" id="prenom" name="prenom"
                                    placeholder="Prénoms" required>
                                <div class="valid-feedback">Le champ Prénom est valide!</div>
                                <div class="invalid-feedback">Le champ Prénom ne peut pas être vide!</div>
                            </div>

                            <div class="col-md-12">
                                <label for="relation">Lien avec Granny</label>
                                <select class="form-control" id="relation" name="relation" required>
                                    <option value="">Choisissez votre lien avec Granny</option>
                                    <option value="Enfants">Enfants</option>
                                    <option value="Petits-enfants">Petits-enfants</option>
                                    <option value="Gendres/Brue">Gendres/Brue</option> 
                                    <option value="Famille">Famille</option>
                                    <option value="Belle Famille">Belle Famille</option>
                                    <option value="Amis">Amis</option>
                                    <option value="Connaissance">Connaissance</option>
                                </select>
                                <div class="valid-feedback">Vous avez sélectionné un lien!</div>
                                <div class="invalid-feedback">Veuillez sélectionner votre lien avec Granny!</div>
                            </div>

                            <div class="col-md-12">
                                <label for="ville">Ville</label>
                                <input class="form-control" type="text" id="ville" name="ville" placeholder="Ville"
                                    maxlength="30" required>
                                <div class="valid-feedback">Le champ Ville est valide!</div>
                                <div class="invalid-feedback">Le champ Ville ne peut pas être vide!</div>
                            </div>

                            <div class="col-md-12">
                                <label for="pays">Pays</label>
                                <input class="form-control" type="text" id="pays" name="pays" placeholder="Pays"
                                    maxlength="30" required>
                                <div class="valid-feedback">Le champ Pays est valide!</div>
                                <div class="invalid-feedback">Le champ Pays ne peut pas être vide!</div>
                            </div>

                            <div class="col-md-12">
                                <label for="anecdote">Témoignage</label>
                                <textarea class="form-control" id="anecdote" maxlength="20000" name="anecdote" rows="5" placeholder="Votre Témoignage...." required></textarea>
                                <div class="valid-feedback">Le champ Anecdote est valide!</div>
                                <div class="invalid-feedback">Le champ Anecdote ne peut pas être vide!</div>
                            </div>
                            <script src="https://cdn.tiny.cloud/1/0jdx0ubagl2hslxqeh20jvw2k44jzm6w4whh58ishn59mvn4/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

                            <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
                                 <script>
                                    tinymce.init({ 
                                      selector: 'textarea',
                                      plugins: 'lists',
                                      toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignjustify',
                                      menubar: false,
                                      branding: false,
                                    });
                                  </script>
                            <script> 
                                document.getElementById('anecdote').addEventListener('input', function() {
                                    const maxChars = 20000;
                                    const currentLength = this.value.length;

                                    if (currentLength > maxChars) {
                                        alert("Le texte ne doit pas dépasser en moyenne 800 mots !");
                                        this.value = this.value.substring(0, maxChars);
                                    }
                                });
                            </script>


                            <div class="d-flex justify-content-between">
                                <div class="form-button mt-3">
                                    <button id="submit" type="submit" class="btn btn-warning">Ajouter</button>
                                </div>
                                <div class="form-button mt-3">
                                    <a href="/" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                                      </svg></a>
                                </div>
                              
                            </div>
                            <style>
                                .d-flex {
                                    display: flex;
                                    gap: 10px;
                                    /* Espace entre les boutons */
                                }

                                .btn {
                                    padding: 10px 20px;
                                    font-size: 16px;
                                }

                                .btn-primary {
                                   
                                    border: none;
                                }

                                .btn:hover,
                                .btn:focus {
                                    opacity: 0.9;
                                }
                            </style>

                        </form>

                    </div>
                </div>
            </div>
    </div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

        *,
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
            -moz-osx-font-smoothing: grayscale;
        }

        html,
        body {
            height: 100%;
            background-color: rgb(156, 108, 45);
            margin: 0;
            padding: 0;
            overflow: auto;
        }

        .form-body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 200vh;
            padding: 10px;
        }

        .form-holder {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: none;
        }

        .form-holder .form-content {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 5px;
        }

        .form-content .form-items {
            border: 3px solid #fff;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            border-radius: 10px;
            background-color: #fff;
            transition: all 0.4s ease;
        }

        .form-content h3 {
            color: #fff;
            text-align: left;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
        }
   

      
        .was-validated .form-check-input:invalid~.form-check-label,
        .was-validated .form-check-input:valid~.form-check-label {
            color: #000000;
        }

        .form-content input[type=text],
        .form-content input[type=password],
        .form-content input[type=email],
        .form-content select,
        .form-content textarea {
            width: 100%;
            padding: 9px 10px;
            text-align: left;
            border: 0;
            outline: 0;
            border-radius: 6px;
            background-color: #f8f9fa;
            font-size: 15px;
            font-weight: 300;
            color: #495057;
            margin-top: 16px;
        }

        .form-content textarea {
            resize: vertical;
            min-height: 80px;
        }

        .btn-primary {
            background-color: #6C757D;
            border: none;
            outline: none;
            box-shadow: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: #495056;
            outline: none;
            border: none;
        }

        .invalid-feedback {
            color: #ff606e;
        }

        .valid-feedback {
            color: #2acc80;
        }

        
    </style>
    <script>
        (function() {
            'use strict'
            const forms = document.querySelectorAll('.requires-validation')
            Array.from(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')

                        // Scroll to the first invalid field
                        const firstInvalidField = form.querySelector(':invalid');
                        if (firstInvalidField) {
                            firstInvalidField.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                        }
                    }, false) 
                })
        })()
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sélectionner tous les éléments avec la classe col-md-12
            var elements = document.querySelectorAll('.col-md-12');
    
            // Appliquer les styles de padding
            elements.forEach(function(element) {
                element.style.paddingLeft = '5px';
                element.style.paddingRight = '5px';
            });
        });
    </script>
    
@endsection
