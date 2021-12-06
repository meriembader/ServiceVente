


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href=../BackOffice/vendors/feather/feather.css">
  <link rel="stylesheet" href=../BackOffice/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href=../BackOffice/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href=../BackOffice/vendors/typicons/typicons.css">
  <link rel="stylesheet" href=../BackOffice/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href=../BackOffice/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href=../BackOffice/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href=../BackOffice/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
 
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
   
 

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Paiement</h4>
                  <p class="card-description">
                  esprit <code>team</code>
                  </p>
            
                  
                                <div class="body">
                            <form action="ajoutPaiementAction.php" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">commandeRef</label>
                                        <input type="text" class="form-control" id="commandeRef" name="commandeRef" maxlength="10" minlength="3" required>
                                        
                                    </div>
                                   
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">produit</label>
                                        <input type="text" class="form-control"id="produit" name="produit" min="10" max="200" required>
                                       
                                    </div>
                                    
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">prix</label>
                                        <input type="number" class="form-control" id="prix" name="prix" required>
                                      
                                    </div>
                                  
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">Date</label>
                                    <input type="datetime-local" name="date" id="date"  value="<?=date('Y-m-d\TH:i')?>"  class="form-control" placeholder="Left Font Awesome Icon"  required>
                                       
                                    </div>
                                  
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">mode</label>
                                        <input type="text" class="form-control" id="mode" name="mode" required>
                                       
                                    </div>
                                   
                                </div>
                               
                                <button class="btn btn-success waves-effect" type="submit">Valider</button>
                                <button class="btn btn-danger waves-effect" type="reset">Annuler</button>
                            </form>
                        </div>
                </div>
              </div>
            </div>
           
         
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../BackOffice/partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src=../BackOffice/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src=../BackOffice/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src=../BackOffice/js/off-canvas.js"></script>
  <script src=../BackOffice/js/hoverable-collapse.js"></script>
  <script src=../BackOffice/js/template.js"></script>
  <script src=../BackOffice/js/settings.js"></script>
  <script src=../BackOffice/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
