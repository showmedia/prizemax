

<?php $__env->startSection('title', 'Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>
    <div class="item-show">
        <img src="/img/cursos/<?php echo e($sorteio->image); ?>" alt="">
        <div class="info-item">
            <h3> <?php echo e($sorteio->name); ?> </h3>
            <small> Extração da Loteria Federal </small>
            <div class="info-pisca">
                Compre agora!
            </div>
        </div>
    </div>

    <div class="info-valor">
        POR APENAS <span id="vlr"> <?php echo e('R$ '.number_format($sorteio->valorCota, 2, ',', '.')); ?> </span>
    </div>

    <div class="info-regulamento">
        <p id="text-regulamento-disable"><?php echo e($sorteio->regulamento); ?></p>
        <div id="text-regulamento"></div>
    </div>

    <div class="links-social">
        <a href="https://wa.me/5511916853771"><ion-icon class="whatsapp btn2" name="logo-whatsapp"></ion-icon></a>
        <a href="https://www.instagram.com/galdinoefilho_premios/"><ion-icon class="instagram btn2" name="logo-instagram"></ion-icon></a>
        <a href="https://www.facebook.com/gefpremiacoes"><ion-icon class="facebook btn2" name="logo-facebook"></ion-icon></a>
        <a href=""><ion-icon class="telegram btn2" name="send"></ion-icon></a>
    </div>

    <div class="header">
        <span>
                            <ion-icon class="icon" name="flash"></ion-icon> 
                            <strong>Cotas</strong> 
                            <small>Escolha sua sorte</small>
                            </span>
    </div>
<!-- 
    <div class="show-cotas">
        <div class="cotas btn-cotas">
            <div class="p">Cotas
            </div>
            <div class="span"> <?php echo e($sorteio->qtnCotas); ?>  </div>
        </div>
        <div class="livres btn-cotas">
            <div class="center">
            <div class="p">Livres
            </div>
            <div class="span"> <?php echo e($sorteio->qtnCotas - $sorteio->qtnVenda); ?>  </div>
           
            </div>
        </div>
        <div class="pagos btn-cotas">

        <div class="p">Pagos
            </div>
            <div class="span"> <?php echo e($sorteio->qtnVenda); ?> </div>
        </div>
        
    </div> -->

    <div class="meus-numeros" onclick="link('/meusnumeros')">
    <a href="/meusnumeros"><ion-icon name="rocket"></ion-icon> Ver meus números</a>
    </div>
    <?php
            $pct = ($sorteio->qtnVenda / $sorteio->qtnCotas) * 100;
        ?>
    <div class="progress">
            <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-label="Success example" style="width: <?php echo e(ceil($pct)); ?>%" aria-valuenow="<?php echo e(ceil($pct)); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo e(ceil($pct)); ?>%</div>
        </div>

        <div class="rodape">
            <div class="grupo-whats"></div>
            <div class="compra-automatica">
                <p><strong>Compra automática</strong> <br>
                <small>O site escolhe números aleatórios para você</small></p>

                <div class="selecoes">
                    <div class="ops">
                        <div class="op" onclick="somar(2,<?php echo e($sorteio->valorCota); ?>)">
                            <p>
                                <small>+</small>
                                <strong>02</strong> <br>
                                <span>SELECIONAR</span>
                            </p>
                        </div>
                        <div class="op" onclick="somar(5,<?php echo e($sorteio->valorCota); ?>)">
                            <p>
                                <small>+</small>
                                <strong>05</strong> <br>
                                <span>SELECIONAR</span>
                            </p>
                        </div>
                    </div>
                    <div class="ops">
                    <div class="op" onclick="somar(10,<?php echo e($sorteio->valorCota); ?>)">
                            <p>
                                <small>+</small>
                                <strong>10</strong> <br>
                                <span>SELECIONAR</span>
                            </p>
                        </div>
                        <div class="op" onclick="somar(25,<?php echo e($sorteio->valorCota); ?>)">
                            <p>
                                <small>+</small>
                                <strong>25</strong> <br>
                                <span>SELECIONAR</span>
                            </p>
                        </div>
                    </div>
                    <div class="ops">
                    <div class="op" onclick="somar(50,<?php echo e($sorteio->valorCota); ?>)">
                            <p>
                                <small>+</small>
                                <strong>50</strong> <br>
                                <span>SELECIONAR</span>
                            </p>
                        </div>
                        <div class="op" onclick="somar(100,<?php echo e($sorteio->valorCota); ?>)">
                            <p>
                                <small>+</small>
                                <strong>100</strong> <br>
                                <span>SELECIONAR</span>
                            </p>
                        </div>
                    </div>
                </div>

                <form action="/sorteio/comprar/<?php echo e($sorteio->id); ?>" method="post">
                <div class="input-compra">
               
                    <?php echo csrf_field(); ?>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="menos" onclick="calcular(<?php echo e($sorteio->valorCota); ?>,0)"><ion-icon class="menos" name="remove-circle-outline"></ion-icon></span>
                    <input type="text" class="form-control" name="qtn" id="numberCotas" value="1" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text" id="mais" onclick="calcular(<?php echo e($sorteio->valorCota); ?>,1)"><ion-icon class="mais" name="add-circle-outline"></ion-icon></span>
                </div>
                <div class="input-botao">
                    <button class="bg-success">Comprar <span id="comprar"></span></button>
                </div>
                
                </div>
                </form>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projetos\laravel\sorteio\resources\views/sorteio/user/show.blade.php ENDPATH**/ ?>