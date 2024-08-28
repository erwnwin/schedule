         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Jadwal Final for Share</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">
                     <a href="<?= base_url('jadwal-fix') ?>" class="btn btn-sm btn-dangerku mb-2 float-right"> Kembali</a>
                     <a href="<?= $pdf_path ?>" target="_blank" class="btn btn-sm btn-primaryku mb-2 mr-1 float-right"> Unduh</a>
                     <embed src="<?= $pdf_path ?>" type="application/pdf" width="100%" height="600px" />
                 </div>
             </section>

             <div>
                 <br>
             </div>
         </div>