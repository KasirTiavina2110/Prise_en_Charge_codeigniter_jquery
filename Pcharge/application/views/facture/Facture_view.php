<!DOCTYPE html>
<html>
<head>
<title>VEL'OPTIC</title>
   <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"-->
    <!-- Toastr -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"/>

    
  </head>
  <body>
  <nav>
    <ul>
        <li><a href="<?php echo base_url(); ?>MenuController/menu">Acceuil</a></li>

        <li>
            <a href="<?php echo base_url(); ?>AssureurController">Assureur</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>FactureController">Facture</a></li>
                
            </ul>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>EvenementController">Calendrier</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>EvenementController">Evenement</a></li>
                
            </ul>
        </li>
        <li><a href="<?php echo base_url(); ?>ChartController">Chart</a></li>
    </ul>
</nav>
<style type="text/css">
.container{
  margin-top: 150px;
  margin-right: 0px;
  margin-left: 300px;
  max-width: 1000px;
}
</style>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-8">
          <h1 class="text-center">
            Pris en Charge Veloptic
          </h1>
          <hr style="background-color: black; color: black; height: 1px;">
          
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-4">
          <!-- Add Records Modal -->
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#exampleModal">
           Ajouter
          </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nouveaux pris en Charge</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Add Records Form -->
                  <form action="" method="post" id="form">
                    <div class="form-group">
                      <label for="">Numero Facture</label>
                      <input type="text" id="numfacture" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Date Facture</label>
                      <input type="date" id="datefacture" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">reference</label>
                      <input type="text" id="reference" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">client</label>
                        <input type="text" id="client" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Montant</label>
                        <input type="text" id="montant" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Statut</label>
                        <input type="text" id="statut" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">idassureur</label>
                        <input type="text" id="idassureur" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                        <input type="text" id="type" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Numero Compte</label>
                        <input type="text" id="numcompte" class="form-control">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="add">Add Records</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-36">
          <div class="table-responsive">
            <table class="table" id="records">
              <thead>
                <tr>
                <th>id</th>
                 <th>Numero Facture</th>
                 <th>Date facturation</th>
                <th>Date delai</th>
                <th>reference</th>
                <th>client</th>
                <th>Montant</th>
                <th>Statut</th>
                <th>idassureur</th>
                <th>Type</th>
                <th>Numero de Compte</th>
                <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
     <!-- Edit Record Modal -->
     <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Facture Modification</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Edit Record Form -->
            <form action="" method="post" id="edit_form">
                    <input type="hidden" id="edit_record_id" code="edit_record_id" value="">
                    <div class="form-group">
                      <label for="">Numero Facture</label>
                      <input type="text" id="edit_numfacture" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Date Facture</label>
                      <input type="date" id="edit_datefacture" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="">Date delai</label>
                      <input type="date" id="edit_datedelai" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">reference</label>
                        <input type="text" id="edit_reference" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">client</label>
                        <input type="text" id="edit_client" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Montant</label>
                        <input type="text" id="edit_montant" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Statut</label>
                        <input type="text" id="edit_statut" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">idassureur</label>
                        <input type="text" id="edit_idassureur" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Type de Payement</label>
                        <input type="text" id="edit_type" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Numero Compte</label>
                        <input type="text" id="edit_numcompte" class="form-control">
                    </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="update">update</button>
          </div>
        </div>
      </div>
    </div>
    </body>
</html>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Toastr -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/js/all.min.js"></script>
    <!-- DataTables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

    <!-- Sweet Alert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Add Records -->
<script>
      $(document).on("click", "#add", function(e){
        e.preventDefault();

        var  numfacture = $("#numfacture").val();

        var  datefacture = $("#datefacture").val();

        var  datedelai = $("#datedelai").val();

        var  reference = $("#reference").val();

        var  client = $("#client").val();

        var  montant = $("#montant").val();

        var  statut = $("#statut").val();

        var  idassureur = $("#idassureur").val();

        var  type = $("#type").val();

        var numcompte = $("#numcompte").val();


        if (numfacture == "" || datefacture == "" || reference == "" || client == "" || montant == ""
       || statut == "" || idassureur == "" || type == ""){
          alert("Both field is required");
        }else{
          $.ajax({
            url: "<?php echo base_url(); ?>FactureController/insert",
            type: "post",
            dataType: "json",
            data: {
              numfacture:numfacture,
              datefacture:datefacture,
              datedelai:datedelai,
              reference:reference,
              client:client,
              montant:montant,
              statut:statut,
              idassureur:idassureur,
              type:type,
              numcompte:numcompte
            },
            success: function(data){
              if (data.response == "success") {
                $('#records').DataTable().destroy();
                fetch();
                $('#exampleModal').modal('hide');
                toastr["success"](data.message);
              }else{
                toastr["error"](data.message);
              }

            }
          });

          $("#form")[0].reset();

        }

      });
      
/*$(document).on("click","#add",function(e) {
  e.preventDefault();
  var code = $("#code").val();
  var res = code.toUpperCase();
  var assurance = $("#assurance").val();
  var res1 = assurance.toUpperCase();
  var societe = $("#societe").val();
  var res2 = societe.toUpperCase();
  
});
*/

      // Fetch Records

      function fetch(){
        $.ajax({
          url: "<?php echo base_url(); ?>FactureController/fetch",
          type: "post",
          dataType: "json",
          success: function(data){
            if (data.response == "success") {

                var i = "1";
                  $('#records').DataTable( {
                      "data": data.posts,
                      "responsive": true,
                      dom: 
                          "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                          "<'row'<'col-sm-12'tr>>" +
                          "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                      buttons: [
                          'copy', 'excel', 'pdf'
                      ],
                      "columns": [
                          { "render": function(){
                            return a = i++;
                          } },
                          { "data": "numfacture" },
                          { "data": "datefacture" },
                          {"data":"datedelai"},
                          {"data":"reference"},
                          {"data":"client"},
                          {"data":"montant"},
                          {"data":"statut"},
                          {"data":"idassureur"},
                          {"data":"type"},
                          {"data":"numcompte"},
                          { "render": function ( data, type, row, meta ) {
                            var a = `
                                    <a href="#" value="${row.id}" id="del" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                    <a href="#" value="${row.id}" id="edit" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
                            `;
                            return a;
                          } }
                      ]
                  } );                
              }else{
                toastr["error"](data.message);
              }

          }
        });

      }

      fetch();
      // Delete Record

      $(document).on("click", "#del", function(e){
        e.preventDefault();

        var del_id = $(this).attr("value");

        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger mr-2'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Etes-vous sure?',
          text: "Ceci est irreversible!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Oui, supprimer!',
          cancelButtonText: 'Non, Annuler!',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {

              $.ajax({
                url: "<?php echo base_url(); ?>FactureController/delete",
                type: "post",
                dataType: "json",
                data: {
                  del_id: del_id
                },
                success: function(data){
                  if (data.response == "success") {
                      $('#records').DataTable().destroy();
                      fetch();
                      swalWithBootstrapButtons.fire(
                        'Supprimer!',
                        'Votre fichier à été supprimer.',
                        'success'
                      );
                  }else{
                      swalWithBootstrapButtons.fire(
                        'Annulation',
                        'Votre fichier est intact',
                        'error'
                      );
                  }

                }
              });


            
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Annulation',
              'Votre fichier est intact',
              'error'
            )
          }
        });

      });

      // Edit Record

      $(document).on("click", "#edit", function(e){
        e.preventDefault();

        var edit_id = $(this).attr("value");

        $.ajax({
          url: "<?php echo base_url(); ?>FactureController/edit",
          type: "post",
          dataType: "json",
          data: {
            edit_id: edit_id
          },
          success: function(data){
            if (data.response == "success") {
                $('#edit_modal').modal('show');
                $("#edit_record_id").val(data.post.id);
                $("#edit_numfacture").val(data.post.numfacture);
                $("#edit_datefacture").val(data.post.datefacture);
                $("#edit_datedelai").val(data.post.datedelai);
                $("#edit_reference").val(data.post.reference);
                $("#edit_client").val(data.post.client);
                $("#edit_montant").val(data.post.montant);
                $("#edit_statut").val(data.post.statut);
                $("#edit_idassureur").val(data.post.idassureur);
                $("#edit_type").val(data.post.type);
                $("#edit_numcompte").val(data.post.numcompte);
              }else{
                toastr["error"](data.message);
              }
          }
        });

      });

      // update Record

      $(document).on("click", "#update", function(e){
        e.preventDefault();

        var edit_record_id = $("#edit_record_id").val();
        var  edit_numfacture = $("#edit_numfacture").val();
        var  edit_datefacture = $("#edit_datefacture").val();
        var  edit_datedelai = $("#edit_datedelai").val();
        var  edit_reference = $("#edit_reference").val();
        var  edit_client = $("#edit_client").val();
        var  edit_montant = $("#edit_montant").val();
        var  edit_statut = $("#edit_statut").val();
        var  edit_idassureur = $("#edit_idassureur").val();
        var  edit_type = $("#edit_type").val();
        var edit_numcompte = $("edit_#numcompte").val();
        if (edit_record_id == "" || edit_numfacture == "" ||  edit_datefacture == ""|| edit_datedelai == "" ||  edit_reference == "" ||  edit_client == "" ||  edit_montant == ""
       ||  edit_statut == "" ||  edit_idassureur == "" ||  edit_type == "") {
          alert("Both field is required");
        }else{
          $.ajax({
            url: "<?php echo base_url(); ?>FactureController/update",
            type: "post",
            dataType: "json",
            data: {
              edit_record_id: edit_record_id,
              edit_numfacture: edit_numfacture,
              edit_datefacture: edit_datefacture,
              edit_datedelai: edit_datedelai,
              edit_reference: edit_reference,
              edit_client: edit_client,
              edit_montant: edit_montant,
              edit_statut: edit_statut,
              edit_idassureur: edit_idassureur,
              edit_type: edit_type,
              edit_numcompte: edit_numcompte
            },
            success: function(data){
              if (data.response == "success") {
                $('#records').DataTable().destroy();
                fetch();
                $('#edit_modal').modal('hide');
                toastr["success"](data.message);
              }else{
                toastr["error"](data.message);
              }
            }
          });

        }

      });
    </script>