

<?php $__env->startSection('title', 'Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>

<?php if(count($sorteios) == 0): ?>
<div class="header">
                            <span>
                            <ion-icon class="icon" name="compass"></ion-icon> 
                            <strong> Sorteios </strong> 
                            <small> Ganhadores</small>
                            </span>
                        </div>
<div class="alert alert-info" role="alert">
    Ainda não tivemos a conclusão da venda das cotas do primeiro sorteio
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projetos\laravel\sorteio\resources\views/sorteio/ganhadores.blade.php ENDPATH**/ ?>