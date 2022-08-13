<?php $this->view("pizza/layout/header", $data) ?>

<!-- MAIN -->
<main role="main" class="scroll d-flex home-page">
  <?php $this->view("pizza/layout/sidebar", $data) ?>
  <div class="right-area w-100 h-100">
    <?php show($data['order_info']) ?>;
  </div>
</main>

<!-- FOOTER -->
<?php $this->view("pizza/layout/footer", $data) ?>