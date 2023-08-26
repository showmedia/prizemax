<?php $__env->startSection('title', 'Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>

                        <div class="header">
                            <span>
                            <ion-icon class="icon" name="flash"></ion-icon> 
                            <strong>Prêmios</strong> 
                            <small>Escolha sua sorte</small>
                            </span>
                        </div>

                        <div class="body">
                            <?php $__currentLoopData = $sorteios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sorteio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($sorteio->status == 0 && $sorteio->is_favorite == 1): ?>
                                <div class="item-show" onclick="link('/user/sorteio/show/<?php echo e($sorteio->id); ?>')">
                                    <img src="/img/cursos/<?php echo e($sorteio->image); ?>" alt="">
                                    <div class="info-item">
                                        <h3> <?php echo e($sorteio->name); ?> </h3>
                                        <small> Extração da Loteria Federal </small>
                                        <div class="info-pisca">
                                            Compre agora!
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $sorteios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sorteio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($sorteio->status == 0 && $sorteio->is_favorite == 0): ?>
                                    <div class="item-sorteio" onclick="link('/user/sorteio/show/<?php echo e($sorteio->id); ?>')">
                                        <img src="/img/cursos/<?php echo e($sorteio->image); ?>" alt="<?php echo e($sorteio->name); ?>">
                                        <div class="info-item">
                                            <strong> <?php echo e($sorteio->name); ?> </strong><br>
                                            <small> <?php echo e(mb_strimwidth($sorteio->regulamento, 0, 50, "...")); ?> </small>
                                            <div class="info-pisca">
                                                Concorra agora!
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="duvida" id="duvida" onclick="link('/contato')">
                                <p>Dúvidas<br>
                                    <small>Fale conosco</small>
                                </p> 
                            </div>

                            <div class="header">
                                <span>
                                <ion-icon class="icon" name="golf"></ion-icon>
    
                                <strong>Ganhadores</strong> 
                                <small>Premiados</small>
                                </span>
                            </div>
                            <!-- Adicionar lista de ganhadores dos ultimos sorteios -->
                            <div class="alert alert-success" role="alert">
                                Ainda não teve nenhum ganhador
                            </div>
                        

                        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projetos\laravel\sorteio\resources\views/welcome.blade.php ENDPATH**/ ?>