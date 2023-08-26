



<?php $__env->startSection('title', 'Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>

<div class="pagamento">
<div class="head-pagamento">

    <div class="icone">
    <ion-icon class="icon" name="checkmark-circle-outline"></ion-icon>
    </div>

    <div class="text-header">
        <strong> <?php if($venda->status == 0): ?> Aguardando Pagamento <?php else: ?> Pago <?php endif; ?> </strong> <br>
        <small> <?php if($venda->status == 0): ?> Finalize o pagamento <?php else: ?> Parabéns, você já esta concorrendo <?php endif; ?> </small>
    </div>

</div>
<div class="body-pagamento">
   <?php if($venda->status == 0): ?>
   <div class="alert alert-warning" role="alert">
    Pix copia e cola: abra o aplicativo do seu banco pelo celular, selecione PIX e faça o pagamento. Ou escaneie o código com um celular.
    </div>

    <div class="qr-code">
        <!-- qrcode -->
        <img class="img-qrcode" src="data:image/png;base64,<?php echo e($pag->point_of_interaction->transaction_data->qr_code_base64 ?? ''); ?>"> 

        
    </div>
    

   
    <div class="copia-cola">
        <div class="input">
            <input type="text" id="qr_code_text" value="<?php echo e($pag->point_of_interaction->transaction_data->qr_code ?? ''); ?>">
        </div>
        <button id="btn-copia" class="btn-copiar" data-clipboard-target="#qr_code_text"><ion-icon name="documents-outline"></ion-icon></button>
    </div>
   <?php endif; ?>
</div>
</div>
 
                                <div class="body">
                                <div class="item-sorteio">
                                        <img src="/img/cursos/<?php echo e($venda->sorteio->image); ?>" alt="<?php echo e($venda->sorteio->name); ?>">
                                        <div class="info-item">
                                            <strong> <?php echo e($venda->sorteio->name); ?> </strong><br>
                                            <small> <?php echo e(mb_strimwidth($venda->sorteio->regulamento, 0, 50, "...")); ?> </small>
                                            <div class="info-pisca">
                                                Concorra agora!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="detalhes_compra">
                                        <h6> <ion-icon name="information-circle-outline"></ion-icon>
 Detalhes da sua compra  </h6>

                                        <div class="infos">
                                            <p><b>Comprador: </b> <?php echo e($venda->user->name); ?> </p>
                                            <hr>

                                            <p><b>Telefone: </b> <?php echo e($venda->user->phone); ?> </p>
                                            <hr>

                                            <p><b>Data/horário: </b> <?php echo e(date('d/m/Y', strtotime($venda->created_at))); ?> às <?php echo e(date('H:i', strtotime($venda->created_at))); ?> </p>
                                            <hr>

                                            <p><b>Situação: </b> <?php if($venda->status == 0): ?> Aguardando Pagamento <?php else: ?> Pago <?php endif; ?> </p>
                                            <hr>

                                            <p><b>Total: </b> <?php echo e('R$ '.number_format($venda->valueAll, 2, ',', '.')); ?>  </p> <br>
                                          
                                            <hr>

                                            <p><b>Cotas: </b> <?php $__currentLoopData = $venda->cotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(sprintf("%04s",$cota->number)); ?>,   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </p>
                                        </div>
                                    </div>
                                </div>

                                

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/impac075/galdinoefilhopremiacoes.com.br/sorteio/resources/views/finalizar.blade.php ENDPATH**/ ?>