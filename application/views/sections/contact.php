  <div id="contato">
    <div class="container contato-body">
      <div class="row">
        <div class="col l4 m6 offset-l8 offset-m6 s12">
        <h3 class="text-accent titulo-sessao"><img src="<?php echo base_url('assets/img/contato.png'); ?>" class="responsive-img img-titulo right"></h3>
        </div>
        <div class="col l12 m12 s12 justificado">
         <?php echo validation_errors(); ?>
         <form class="col s12" action="<?php echo base_url('Welcome/enviar_email')?>" method='post'>
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
          <button type="submit" name="enviar" value="enviar" class="waves-effect waves-light btn btn-primary right">Enviar Mensagem</button>
          <?php echo $this->session->flashdata('msg'); ?>

        </form>
      </div>
    </div>
  </div>
</div>
</div>

