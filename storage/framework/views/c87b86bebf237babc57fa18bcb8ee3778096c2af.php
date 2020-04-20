<?php $__env->startSection('breadcrump'); ?>

    <section class="content-header">
        <h1>
            Магазин
        </h1>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <h2 class="page-header">Новые пакеты (товары) </h2>
        </div>

        <?php echo view('admin.shop.packet-list-loop',['row' => $row, 'max_packet_user_number' => $max_packet_user_number,'packet_type' => 'item']); ?>


    </div>

   



    <div class="modal-dialog" id="shop_modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeModal()"><span aria-hidden="true">×</span></button>
                <h2 class="modal-title" id="modal_title"></h2>
            </div>
            <div class="modal-body">
                <p id="modal_desc"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" onclick="closeModal()">Закрыть</button>
            </div>
        </div><!-- /.modal-content -->
    </div>

    <div class="modal-dialog" id="buy_modal" style="max-width: 350px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeModal()"><span aria-hidden="true">×</span></button>
                <h2 class="modal-title">Купить пакет</h2>
            </div>

            <div class="modal-footer">
                <button  style="width: 100%; margin-bottom: 20px" type="button" onclick="closeModal()" class="btn btn-default pull-left">Закрыть</button>
                
                <button style="margin-left:0px; background-color: #38b9ea; width: 100%; margin-bottom: 20px" type="button" id="send_request_btn" class="btn btn-default pull-left">Отправить запрос</button>
                <button style="margin-left:0px; background-color: #38b9ea; width: 100%; margin-bottom: 20px" type="button" id="buy_packet_from_balance_btn" class="btn btn-default pull-left">Снять с баланса</button>
            </div>
        </div><!-- /.modal-content -->
    </div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>