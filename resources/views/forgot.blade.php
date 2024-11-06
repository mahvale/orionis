<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Regal Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <style type="text/css">
    #examplePassword1::placeholder{
        color: #fff;
    }

     #examplePassword1::value{
        color: #fff;
    }
    .container-scroller{
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 20px; /* Marge autour du bloc de code */
      background-color: #f8f8f8;
      border: 1px solid #58dffc;
      border-radius: 5px;
      max-width: 90%; /* Largeur maximale du bloc de code */
      overflow: hidden; /* Ajoute une barre de défilement si le contenu dépasse */
      margin-left: 80px;
      height:10%;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth lock-full-bg">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-transparent text-left p-5 text-center">
              <img src="images/faces/face13.png" class="lock-profile-img" alt="img">
              <form class="pt-5">

                <div class="form-group"  >
                  <label for="examplePassword1" style="color:#fff" > Renseigner votre Email</label>
                  <input type="text" class="form-control text-center" value="" id="examplePassword1" placeholder="Email...">
                </div>


                <div class="mt-5">
                  <a class="btn btn-block btn-info  btn-lg font-weight-medium" href="index.html">Valider</a>
                </div>

                <div class="mt-3 text-center">
                  <a href="#" class="auth-link text-white">Sign in using a different account</a>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
</body>

</html>
