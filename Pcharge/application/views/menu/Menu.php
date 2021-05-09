<!DOCTYPE html>
<html>
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
            <a href="">Calendrier</a>
            <ul>
                <li><a href="<?php echo base_url(); ?>EvenementController">Evenement</a></li>
                
            </ul>
        </li>
        <li><a href="<?php echo base_url(); ?>ChartController">Chart</a></li>
    </ul>
</nav>
<style type="text/css">
  .logout{
  margin-top: 100px;

  
}
  </style>
  <div class="logout"><a href="<?php echo base_url(); ?>MenuController/logout" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Deconnexion
        </a>
</div>
<div class="search-wrapper">
    <div class="input-holder">
        <input type="text" class="search-input" placeholder="Type to search" />
        <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button>
    </div>
    <span class="close" onclick="searchToggle(this, event);"></span>
</div>
</body>
<script>
    function searchToggle(obj, evt) {
        var container = $(obj).closest('.search-wrapper');
        if (!container.hasClass('active')) {
            container.addClass('active');
            evt.preventDefault();
        } else if (container.hasClass('active') && $(obj).closest('.input-holder').length == 0) {
            container.removeClass('active');
            // clear input
            container.find('.search-input').val('');
        }
    }
</script>

</html>