<?php $__env->startSection('title', 'dashboard - Galdino & Filho Premiações'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/css/style.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">

    <?php if($sorteios): ?>

    <?php $__currentLoopData = $sorteios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sorteio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-xl-12">
        <div class="sorteio-item">
        <a href="/sorteio/show/<?php echo e($sorteio->id); ?>">
            <img src="/img/cursos/<?php echo e($sorteio->image); ?>" alt="">
</a>
            <div class="infos infor">
            <div class="info-qtnCota info-item">
                <div class="header">
                    Cotas <br>
                    <?php echo e($sorteio->qtnCotas); ?> 
                </div>
            </div>

            <div class="info-valor info-item">
                <div class="header">
                    Valor Cota <br>
                    <?php echo e('R$ '.number_format($sorteio->valorCota, 2, ',', '.')); ?>

                </div>
            </div>

            <div class="info-venda info-item"> 
                <div class="header">
                    Vendido <br>
                    <?php echo e($sorteio->qtnVenda); ?> 
                </div>               
            </div>
            <div class="info-vlrVendido info-item"> 
                <div class="header">
                    Valor Vendido <br>
                    <?php echo e('R$ '.number_format($sorteio->valorCota * $sorteio->qtnVenda, 2, ',','.')); ?> 
                </div>
            
                
            </div>
        </div>

        <?php
            $pct = ($sorteio->qtnVenda / $sorteio->qtnCotas) * 100;
        ?>

        <div class="progresso">
            <div class="value-progresso" style="width: <?php echo e($pct); ?>%"></div>
        </div>
            <div class="body">
                <a href="/sorteio/show/<?php echo e($sorteio->id); ?>"><?php echo e($sorteio->name); ?></a>
            </div>
        </div>
    
    </div>
    
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php else: ?>
    <div class="alert alert-primary" role="alert">
        Você ainda não tem nenhum sorteio cadastrado!
    </div>
    <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/storage/9/cf/31/galdinoefilhopre1/public_html/sorteio/resources/views/dashboard.blade.php ENDPATH**/ ?>