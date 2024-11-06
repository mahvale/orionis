<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ORIONIS EDUC-SERVICES</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- LINEARICONS -->
  <link rel="stylesheet" href="/register/fonts/linearicons/style.css">
  <link rel="shortcut icon" href="/images/favicon.png" type="image/png">
  <!-- MATERIAL DESIGN ICONIC FONT -->
  <link rel="stylesheet" href="/register/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

  <!-- DATE-PICKER -->
  <link rel="stylesheet" href="/register/vendor/date-picker/css/datepicker.min.css">
    
  <!-- STYLE CSS -->
  <link rel="stylesheet" href="/register/css/style.css">
  
  <!-- jQuery -->
  <script src="/register/js/jquery-3.3.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <style>
    /* Styles supplémentaires pour l'aperçu de l'image */
    .preview-image {
      max-width:100px;
      max-height:100px;
      margin-top:1px;
    }
  </style>
</head>

<body>

  <div class="wrapper">
    <div class="inner">
      <x-guest-layout>
        <x-auth-card>
          <form method="POST" action="{{ route('register2') }}" enctype="multipart/form-data">
            <h3 style="font-size: 30px;">Créer Votre Compte</h3>
            <x-auth-validation-errors class="mb-2" :errors="$errors" />
            @csrf 

            <div class="form-row">
              <div class="form-wrapper">
                <label for="">Nom *</label>
                <input type="text" class="form-control" name="name" autofocus id="name" placeholder="Nom" required>
              </div>
              <div class="form-wrapper">
                <label for="">Email *</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-wrapper">
                <label for="" style="font-size:14px;">Mot de passe *</label>
                <input type="password" id="password"  name="password"  placeholder="Mot de passe" class="form-control"  required>
              </div>
              <div class="form-wrapper">
                <label for="" style="font-size:14px;">Confirmer le mot de passe *</label>
                <input type="password" class="form-control" required  id="password_confirmation"  name="password_confirmation"  placeholder="Confirmer le mot de passe" >
              </div>
            </div>
            <div class="form-row last col-12">
              <div class="form-wrapper col-6">
                <label for="">Classe *</label>
                <select name="classroom_id" required class="form-control select2">
                  <option data-image="{{ asset('/images/classrooms/3.jpg') }}" style="text-transform: uppercase;">Classe</option>
                  @foreach ($classes as $classe)
                    <option value="{{ $classe->id }}" style="text-transform: uppercase;" data-image="{{ asset('/images/classrooms/' . $classe->name.'.jpg') }}">
                      {{ $classe->description }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-wrapper">
                <label for="telephone">Numéro de téléphone *</label>
                <input type="tel" class="form-control" id="tel" name="tel" placeholder="Numéro de téléphone" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-wrapper">
                <label for="profile_picture">Photo de profil *</label>
                <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*" onchange="previewImage(event)">
              </div>
              <div>
                <img id="preview" class="preview-image" src="#" alt="Aperçu de l'image" style="display: none;">
              </div>
            </div>
  
           
            <div class="checkbox">
              <label>
                Vous avez déjà un compte ?
                <a href="login" style="color:#4692f4;" class="text-primary">Se connecter</a>
              </label>
            </div>
            <button type="submit" style="background-color:#4692f4;padding: 20px;margin-top: 15px;color: #fff;" data-text="Valider">
              <span style="font-size: 20px;text-transform: uppercase;">VALIDER</span>
            </button>
          </form>
        </x-auth-card>
      </x-guest-layout>
    </div>
  </div>
  
  <!-- DATE-PICKER -->
  <script src="/register/vendor/date-picker/js/datepicker.js"></script>
  <script src="/register/vendor/date-picker/js/datepicker.en.js"></script>
  <script src="/js/jquery.min.js"></script>
  <!-- JavaScript personnalisé -->
  <script src="/register/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  
  <!-- Script pour l'aperçu de l'image -->
  <script>
    function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var preview = document.getElementById('preview');
        preview.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }

     function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var preview = document.getElementById('preview');
      preview.src = reader.result;
      preview.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
  }

    $(document).ready(function() {
      $('.select2').select2({
        templateResult: formatState,
        templateSelection: formatState
      });

      function formatState(state) {
        if (!state.id) {
          return state.text;
        }
        var image = $(state.element).data('image');
        var $state = $(
          '<span><img src="' + image + '" style="width: 20px; height: 20px; margin-right: 10px;" /> ' + state.text + '</span>'
        );
        return $state;
      }
    });

  </script>

</body>
<!-- Ce modèle a été conçu par Colorlib (https://colorlib.com) -->
</html>
