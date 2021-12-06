


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="cmdStyle/vendors/feather/feather.css">
  <link rel="stylesheet" href="cmdStyle/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="cmdStyle/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="cmdStyle/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="cmdStyle/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="cmdStyle/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="cmdStyle/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="cmdStyle/images/favicon.png" />
</head>

<body>



      <!-- partial -->

        <div class="content-wrapper">
          <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Passer commande</h4>
                  <p class="card-description">
                  esprit <code>team</code>
                  </p>
            
                  
                                <div class="body">
                            <form action="ajoutCommandeAction.php" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">nomUser</label>
                                        <input type="text" class="form-control" id="nomUser" name="nomUser" maxlength="10" minlength="3" required>
                                        
                                    </div>
                                   
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">prenomUser</label>
                                        <input type="text" class="form-control"id="prenomUser" name="prenomUser" min="10" max="200" required>
                                       
                                    </div>
                                    
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">addresse</label>
                                        <input type="text" class="form-control" id="addresse" name="addresse" required>
                                      
                                    </div>
                                  
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">telephone</label>
                                    <input type="text" name="telephone" id="telephone"    class="form-control" placeholder="Left Font Awesome Icon"  required>
                                       
                                    </div>
                                  
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">produit</label>
                                        <input type="text" class="form-control" id="id_produit" name="id_produit" required>
                                       
                                    </div>
                                   
                                </div>
                               
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">quantite</label>
                                    <input type="text" name="quantite" id="quantite"    class="form-control" placeholder="Left Font Awesome Icon"  required>
                                       
                                    </div>

                                    <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">modeLivraison</label>
                                    <input type="text" name="modeLivraison" id="modeLivraison"    class="form-control" placeholder="Left Font Awesome Icon"  required>
                                       
                                    </div>


                                    <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">modePaiement</label>
                                    <input type="text" name="modePaiement" id="modePaiement"    class="form-control" placeholder="Left Font Awesome Icon"  required>
                                       
                                    </div>



                                    <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">mail</label>
                                    <input type="text" name="mail" id="mail"    class="form-control" placeholder="Left Font Awesome Icon"  required>
                                       
                                    </div>
                                    <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">status</label>
                                    <input type="text" name="status" id="status"    class="form-control" placeholder="Left Font Awesome Icon"  required>
                                       
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
        <!-- partial:"cmdStyle/partials/_footer.html -->
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
  <script src="cmdStyle/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="cmdStyle/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="cmdStyle/js/off-canvas.js"></script>
  <script src="cmdStyle/js/hoverable-collapse.js"></script>
  <script src="cmdStyle/js/template.js"></script>
  <script src="cmdStyle/js/settings.js"></script>
  <script src="cmdStyle/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
