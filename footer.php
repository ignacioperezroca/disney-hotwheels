
        <div class="container min-height--0">
          <div class="row">
            <div class="col-xs-12">
              <div class="copyright">© & TM Lucasfilm Ltd.</div>
            </div>
          </div>
        </div>
				<!-- .footer -->
        <?php 
          if($_SERVER['SERVER_NAME'] != 'thet.com.ar'){ ?>
    	      <footer id="footer" class='bg-white'>
              <div id="goc-footer">
                <iframe src="//a.dilcdn.com/g/latino/home/footer.html" frameborder="0" style="display:block;width:100%;"></iframe>
              </div>
            </footer>
         <?php } ?>
        <!-- /.footer -->
      <!-- /.page-content-wrapper -->
      </div>
    <!-- /.wrapper -->
    </div>
    <!-- .modal -->
    <div class="container modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="col-xs-12">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h1 class="modal-title" id="myModalLabel">AYUDA</h1>
            </div>
            <div class="modal-body">
              <p><span>1. </span>Selecciona uno de los fondos temáticos. *Cada semana tendrás nuevas opciones.</p>
              <p><span>2. </span>Elige tu vehículo.</p>
              <p><span>3. </span>¡En sus marcas, listos, fuera! Esquiva los obstáculos para llegar a la meta lo más rápido que puedas.</p>
              <p><span>4. </span>Al finalizar la carrera podrás personalizar y descargar las tarjetas obtenidas.</p>
              <p><span>5. </span>¡Vuelve a jugar cada semana para completar la colección de pósteres!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade finished" id="finished" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h1 class="modal-title font28" id="myModalLabel">La carrera ha finalizado</h1>
          </div>
          <div class="modal-body">
            <a href="juego.php" class="btn btn-primary">vuelve a intentarlo!</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal -->
    <!-- Scripts -->
    <script src="js/bootstrap.js"></script>
    <!-- Include js plugin -->
    <!-- JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/animations.js"></script>
  </body>
</html>