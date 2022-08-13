<?php $this->view("pizza/layout/header", $data) ?>

<!-- MAIN -->
<main role="main" class="scroll d-flex home-page">
  <?php $this->view("pizza/layout/sidebar", $data) ?>

  <table class="table table-fluid" id="allPlayersTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ComboName</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>hi</td>
                <td>hi</td>
                <td>hi</td>
            </tr>
        </tbody>

    </table>
</main>

<!-- FOOTER -->
<?php $this->view("pizza/layout/footer", $data) ?>