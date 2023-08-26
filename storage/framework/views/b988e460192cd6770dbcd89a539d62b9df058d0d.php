

<?php $__env->startSection('title', 'Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>

                        <div class="header">
                            <span>
                            <ion-icon class="icon" name="cart-outline"></ion-icon> 
                            <strong> <?php echo e(Auth::user()->name); ?> </strong> 
                            <small> Meus Númemros</small>
                            </span>
                        </div>

                        <?php $__currentLoopData = Auth::user()->compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="body">
                                    <div class="item-sorteio" onclick="link('/user/sorteio/show/<?php echo e($compra->sorteio->id); ?>')">
                                        <img src="/img/cursos/<?php echo e($compra->sorteio->image); ?>" alt="<?php echo e($compra->sorteio->name); ?>">
                                        <div class="info-item">
                                            <strong> <?php echo e($compra->sorteio->name); ?> </strong><br>
                                            <small> <?php echo e(mb_strimwidth($compra->sorteio->regulamento, 0, 50, "...")); ?> </small>
                                            <div class="info-pisca">
                                                <?php if($compra->sorteio->status == 0): ?>
                                                Concorrendo!
                                                <?php else: ?>
                                                Concluído 
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                   <div class="cotas"  onclick="link('venda/show/<?php echo e($compra->id); ?>')">
                                   <?php $__currentLoopData = $compra->cotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php if($cota->number == $compra->sorteio->sorteado): ?>
                                    <div class="ct premiado"><?php echo e(sprintf("%04s",$cota->number)); ?></div>
                                   <?php else: ?>
                                        <div class="ct"><?php echo e(sprintf("%04s",$cota->number)); ?></div>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projetos\laravel\sorteio\resources\views/meusnumeros.blade.php ENDPATH**/ ?>