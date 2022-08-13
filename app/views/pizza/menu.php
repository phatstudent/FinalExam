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
                <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data['products_list'] as $row) : ?>
            <tr>
                <td><?= $row->ProductID ?></td>
                <td ><?= $row->ComboName ?></td>
                <td><?= $row->Description ?></td>
                <td><?= $row->Price ?></td>
                <td>
                    <button class="btn btn-dark">
                        <a data-toggle="modal" detaches=<?=str_replace(" ","__",json_encode($row))?> data-target="#update_player" >Buy</a> 
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>
</main>

<div class="modal fade" id="update_player" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Đặt hàng
                <!-- <h5 class="modal-title" id="exampleModalLabel">Housing</h5> -->
                <button type="button" class="close my-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 id="ProductComboName">
                    <!-- Update player -->
                </h1>

                <form method="POST">

                    <div class="form-item">
                        <label for="updated_ClubName">Đơn giá: </label>
                        <span id="don_gia">hello</span>
                    </div>
                    <div class="form-item">
                        <label for="updated_Position">Số lượng</label>
                        <input id="Position" type="text" name="updated_Position" placeholder="">
                    </div>
                    <input id="update_button" class="btn btn btn-dark" name="submit" type="submit"></input>
                </form>

            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.closebtn').on('click',function() {
            $('.modal').modal('hide');
        });

        $(document).on('show.bs.modal','#update_player', function (event) {
            var relate =  $(event.relatedTarget);
            var data = relate.attr('detaches');
            data = data.replaceAll("__"," ");
            console.log(data);
            var json = JSON.parse(data);
            // alert(data);
            // $(this).find("#update_button").attr("onclick", str)
            // var fullname = $(this).getElementsByName("updated_FullName");
            // fullname.attr("placeholder", "s");
            // $(this).find("#ProductComboName").attr("value", json.ComboName)
            document.getElementById("don_gia").innerHTML = json.Price + " VND";
            document.getElementById("ProductComboName").innerHTML = json.ComboName;
        });

        // $(document).on('show.bs.modal','#deletePlayerConfirm', function (event) {
        //     var myVal = $(event.relatedTarget).data('val');
        //     var str = "window.location.href='<?= ROOT ?>players/DeletePlayer/" + myVal + "'";
        //     $(this).find("#delete_confirmed").attr("onclick", str)
        // });
    });
</script>

<!-- FOOTER -->
<?php $this->view("pizza/layout/footer", $data) ?>