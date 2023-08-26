

<?php $__env->startSection('title', 'dashboard - Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>

<div class="listar-vendas">

<?php $__currentLoopData = $vendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="venda"> 
        <b>Data: </b> <?php echo e(date('d/m/Y - H:i', strtotime($v->created_at))); ?> <br>
        <b>Nome: </b> <?php echo e($v->user->name); ?> <br>
        <b>email: </b> <?php echo e($v->user->email); ?> <br>
        <b>Telefone: </b> <?php echo e($v->user->phone); ?> <br>
        <b>Sorteio: </b> <?php echo e($v->sorteio->name); ?> <br>
        <b>Quantidade de cotas: </b>  <?php echo e($v->quantidade); ?> <br>
        <b>Cotas: </b> <?php $__currentLoopData = $v->cotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(sprintf("%04s",$cota->number)); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <br>
        <b>Status: </b> <?php if($v->status == 0): ?> Pendente <?php else: ?> Pago <?php endif; ?> <br>


        <?php if($v->status == 0): ?>
            <div class="botoes">
                <div class="bt">
                    <form action="/venda/status/<?php echo e($v->id); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-sm btn-success">Pagou em dinheiro</button>
                    </form>
                 </div>

                <div class="bt">
                    <form action="/venda/delete/<?php echo e($v->id); ?>" method="post">
                      <?php echo csrf_field(); ?> 
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-sm btn-danger">Apagar</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>

       
    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<a href="/vendas/all" class="btn btn-sm btn-warning">Ver todas</a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/impac075/galdinoefilhopremiacoes.com.br/sorteio/resources/views/venda/list.blade.php ENDPATH**/ ?>