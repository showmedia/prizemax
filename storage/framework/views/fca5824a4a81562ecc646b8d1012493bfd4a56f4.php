

<?php $__env->startSection('title', 'dashboard - Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>

<div class="fluid-container show-sorteio">
    <h4> <?php echo e($sorteio->name); ?> - 
    <a href="/produto/<?php echo e($sorteio->id); ?>" class="btn btn-primary btn-sm">Adicionar Prêmio</a>
    <a href="/sorteio/edit/<?php echo e($sorteio->id); ?>" class="btn btn-info btn-sm">Editar Sorteio</a>
    </h4>
   
    <?php if($sorteio->image): ?>
        <img src="/img/cursos/<?php echo e($sorteio->image); ?>" alt="" class="img img-sorteio">
    <?php endif; ?>
    <div>
        <br>
        <?php if($sorteio->is_favorite): ?>
            <a href="/sorteio/favorito/<?php echo e($sorteio->id); ?>" class="btn btn-danger btn-sm">Desfovoritar</a> 
        <?php else: ?>
            <a href="/sorteio/favorito/<?php echo e($sorteio->id); ?>" class="btn btn-primary btn-sm">Favoritar</a>
        <?php endif; ?>
    </div>

    <div class="sorteio-premios">
        <h5>Prêmios do Sorteio</h5>
        <?php $cont = 0; ?>
        <div class="premio-list">
        <?php $__currentLoopData = $sorteio->premios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $premio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $cont++; ?>
            
                <div class="premio">
                    <img src="/img/cursos/<?php echo e($premio->image); ?>" alt="" class="img-premio img">
                    <div class="premio-name">
                    <a href="/premio/edit/<?php echo e($premio->id); ?>">
                    <span> <?php echo e($premio->name); ?> </span>
                    </a>
                    <p> <strong>Descrição: </strong> <?php echo e($premio->description); ?> </p>
                    </div>
                </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if($cont == 0): ?>
        <br>
            <div class="alert alert-warning" role="alert">
                você ainda não tem premio cadastrado neste sorteio
            </div>
        <?php endif; ?>
    </div>

    <?php if($sorteio->qtnVenda == $sorteio->qtnCotas): ?>
        <div class="parabens">
            <strong>Parabéns, você vendeu todas cotas</strong> <br>
            <a href="/sorteio/finalizar" class="btn btn-success btn-sm">Adicionar número sorteado</a>
        </div>
    <?php endif; ?>

    <div class="sorteio-infos">
        <h5>Informações do Sorteio</h5>

        <a href="/vendas/paginate" class="btn btn-sm btn-primary">Ver vendas</a>
        <a href="/sorteio/vencedor/<?php echo e($sorteio->id); ?>" class="btn btn-success btn-sm">Adicionar vencedor</a>

        <div class="infos">
            <div class="info-qtnCota info-item">
                <div class="header">
                    Cotas
                </div>
                <div class="body">
                    <?php echo e($sorteio->qtnCotas); ?> 
                </div>
                
            </div>
            <div class="info-valor info-item">
                <div class="header">
                    Valor Cota
                </div>
                <div class="body">
                     <?php echo e('R$ '.number_format($sorteio->valorCota, 2, ',', '.')); ?> 
                </div>    
                
            </div>
            <div class="info-venda info-item"> 
                <div class="header">
                    Vendido
                </div>
                <div class="body">
                    <?php echo e($sorteio->qtnVenda); ?> 
                </div>
               
            </div>
            <div class="info-vlrVendido info-item"> 
                <div class="header">
                    Valor Vendido
                </div>
                <div class="body">
                    <?php echo e('R$ '.number_format($sorteio->valorCota * $sorteio->qtnVenda, 2, ',','.')); ?> 
                </div>
                
            </div>
        </div>

        <?php
            $pct = ($sorteio->qtnVenda / $sorteio->qtnCotas) * 100;
        ?>

        <div class="progress">
            <div class="progress-bar bg-success progress-bar-striped"  role="progressbar" aria-label="Success example" style="width: <?php echo e(ceil($pct)); ?>%" aria-valuenow="<?php echo e(ceil($pct)); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e(ceil($pct)); ?>%</div>
        </div>
        
        <div class="regulamento">
            <p> <strong>Regulamento: </strong> <?php echo e($sorteio->regulamento); ?> </p>
        </div>
    </div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projetos\laravel\sortemax\sorteio\resources\views/sorteio/show.blade.php ENDPATH**/ ?>