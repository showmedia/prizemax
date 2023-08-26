Parabéns, você acabou de efetuar uma compra de <?php echo e(count($venda->cotas)); ?> para o sorteio 
<?php echo e($venda->sorteio->name); ?>. <br><br>

Seus números: <?php $__currentLoopData = $venda->cotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(sprintf("%04s",$cota->number)); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><br><br>

Efetue o pagamento para garantir sua participação no sorteio. <br><br>

Se atente ao regulamento: <br>

<?php echo e($venda->sorteio->regulamento); ?>


<?php /**PATH /home/storage/9/cf/31/galdinoefilhopre1/public_html/sorteio/resources/views/mail/compra.blade.php ENDPATH**/ ?>