<section>
  <div id="contato">
    <div class="container">
      <div class="row">
        <div class="col s12 m10 offset-l2 l8 offset-m1 center">
          <img src="<?php echo base_url('assets/img/titulo_home.jpg'); ?>" class="responsive-img">
          <p class="waves-effect waves-light btn-primary btn-large space-patrocinador"> <i class="material-icons left">contact_phone</i> CONTATO</p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col l12 m12 s12 justificado">
        <h3 class="text-theme contato-titulo">Alguma dúvida?<br>Entre em Contato</h3>
        <h5 class="contato-texto">Telefone: +55 (35) 3829-1255 <br> E-mail: necs.dcs.ufla@gmail.com</h5>
        <h3 class="text-theme contato-titulo">Ou preencha o formulário abaixo</h3>
         <form class="col s12" action="<?php echo base_url('main/contato')?>" method='post'>
          <div class="row">
            <div class="input-field form-group col m12 s12">
              <i class="material-icons prefix">account_circle</i>
              <input id="name" name="name" type="text" class="validate" required>
              <label for="name">Nome</label>
            </div>
            <div class="input-field col m6 s12">
              <i class="material-icons prefix">mail</i>
              <input id="email" name="email" type="email" class="validate" required>
              <label for="email">E-mail</label>
            </div>
            <div class="input-field col m6 s12">
              <i class="material-icons prefix">phone</i>
              <input id="phone" name="phone" type="tel" class="validate" required>
              <label for="phone">Telefone</label>
            </div>
            <div class="input-field form-group col m12 s12">
              <i class="material-icons prefix">mode_edit</i>
              <textarea id="message" name="message" type="text" class="validate materialize-textarea" required></textarea> 
              <label for="message">Mensagem</label>
            </div>
          </div>
          <?php if($alerta){ ?>
          <div class="row">
            <div class="col s12 m12 l12">
              <div class='card-panel "<?php $alerta['class'] ?>"'>
              <span class="white-text"><?php $alerta['mensagem'] ?>
                </span>
              </div>
            </div>
          </div>
          <?php } ?>
          <button type="submit" name="enviar" value="enviar" class="waves-effect waves-light btn btn-primary right">Enviar Mensagem</button>


        </form>
      </div>
    </div>
  </div>

</section>
