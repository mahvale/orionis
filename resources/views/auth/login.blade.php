<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ORIONIS EDUC-SERVICES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- LINEARICONS -->
    <link rel="stylesheet" href="register/fonts/linearicons/style.css">
 <link rel="shortcut icon" href="/images/favicon.png" type="image/png">
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="register/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- DATE-PICKER -->
    <link rel="stylesheet" href="register/vendor/date-picker/css/datepicker.min.css">
    
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="register/css/style.css">

     <script src="http://127.0.0.1:8200/js/app.js" defer></script>
  </head>

  <body> 

    <div class="wrapper">
      <div class="inner">
         <x-guest-layout>
            <x-auth-card>
        <form method="POST" action="{{ route('login') }}">
          <h3 style="font-size: 40px;" >Connectez vous</h3>
           <x-auth-validation-errors class="mb-2" :errors="$errors" />
          @csrf
          <div class="form-row"> 
            <div class="form-wrapper">
              <label for="">Email *</label>
              <input type="text" class="form-control" name="email" autofocus id="email" placeholder="Email" required>
            </div>
            <div class="form-wrapper">
              <label for="">Password *</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
            </div>
          </div>
          
          <div class="checkbox">
            <label>
              Vous n'avez pas encore de compte ? 
              <a href="register2" style="color:#4692f4;" class="text-primary">Créez !</a>
            </label>
          </div>
          <button type="submit" class="bg bg-info" style="background-color:#4692f4;padding: 20px;margin-top: 15px;color: #fff;" data-text="VALIDER">
            <span style="font-size: 20px;text-transform: uppercase;" >VALIDER</span>
          </button>
        </form>
         </x-auth-card>
          </x-guest-layout>
      </div>
    </div>
    
    <script src="register/js/jquery-3.3.1.min.js"></script>

    <!-- DATE-PICKER -->
    <script src="register/vendor/date-picker/js/datepicker.js"></script>
    <script src="register/vendor/date-picker/js/datepicker.en.js"></script>

    <script src="register/js/main.js"></script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>