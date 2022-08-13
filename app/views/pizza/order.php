<?php $this->view("pizza/layout/header", $data) ?>

<!-- MAIN -->
<main role="main" class="scroll d-flex home-page">
  <?php $this->view("pizza/layout/sidebar", $data) ?>

    <table class="table table-fluid" id="allPlayersTable">
        <thead>
            <tr>
                <th scope="col">OrderID</th>
                <th scope="col">CustomerName</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">CreatedTime</th>
                <th scope="col">Status</th>
                <th scope="col">ModifiedTime</th>
                <th scope="col">ProductID</th>
                <th scope="col">Quantity</th>
                <th scope="col">Amount</th>
                <th scope="col">Note</th>
                <th scope="col">RegisterCode</th>
                <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data['orders_list'] as $row) : ?>
            <tr>
                <td><?= $row->OrderID ?></td>
                <td ><?= $row->CustomerName ?></td>
                <td><?= $row->Phone ?></td>
                <td><?= $row->Address ?></td>
                <td><?= $row->CreatedTime ?></td>
                <td><?= $row->Status ?></td>
                <td><?= $row->ModifiedTime ?></td>
                <td><?= $row->ProductID ?></td>
                <td><?= $row->Quantity ?></td>
                <td><?= $row->Amount ?></td>
                <td><?= $row->Note ?></td>
                <td><?= $row->RegisterCode ?></td>
                <?php if($row->Status != "HUY"): ?>
                    <td>
                        <?php if($row->Status == "DAKHOITAO"): ?>
                            <button class="btn btn-warning">
                                <a href="<?= ROOT ?>stafforder/xac_nhan_don/<?= $row->OrderID ?>">Xác nhận</a> 
                            </button>
                        <?php elseif($row->Status == "DAXACNHAN"): ?>
                            <button class="btn btn-warning">
                                <a href="<?= ROOT ?>stafforder/tien_hanh_don/<?= $row->OrderID ?>">Tien hanh</a> 
                            </button>
                        <?php elseif($row->Status == "TIENHANH"): ?>
                            <button class="btn btn-warning">
                                <a href="<?= ROOT ?>stafforder/giao_don/<?= $row->OrderID ?>">GIAO</a> 
                            </button>
                        <?php elseif($row->Status == "DANGGIAO"): ?>
                            <button class="btn btn-warning">
                                <a href="<?= ROOT ?>stafforder/hoan_tat_don/<?= $row->OrderID ?>">Hoan tat</a> 
                            </button>
      
                        <?php endif; ?>

                        <?php if($row->Status != "HOANTAT"): ?>
                            <button class="btn btn-dark">
                                <a href="<?= ROOT ?>stafforder/huy_don/<?= $row->OrderID ?>">Hủy</a> 
                            </button>
                        <?php endif; ?>
                    </td>
                <?php endif; ?>
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

                <form method="GET">
                    <div class="form-item" hidden={true}>
                         <input id="ProductID" type="text" name="add_ProductID" placeholder="">
                    </div>
                    <div class="form-item">
                        <label for="don_gia">Đơn giá: </label>
                        <span id="don_gia">Chưa có giá</span>
                    </div>
                    <div class="form-item">
                        <label for="SoLuongMua">Số lượng</label>
                        <input id="SoLuongMua" type="text" name="so_luong_mua">
                    </div>
                    <input id="update_button" class="btn btn btn-dark" name="submit" type="submit" value="Them vao gio hang"></input>
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
            $(this).find("#ProductID").attr("value", json.ProductID);
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