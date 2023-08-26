

<?php $__env->startSection('title', 'dashboard - Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>

<div class="text-center">
<?php echo e($sorteio->name); ?>

</div> <br>

<form action="/sorteio/pesquisar" method="get">


    <div class="input-group mb-3">
        <button class="btn btn-outline-primary" type="submit" id="button-addon1">Pesquisar</button>
        <input type="search" name="cota" id="cota" class="form-control" aria-label="Example text with button addon" aria-describedby="button-addon1">
    </div>

</form>


<b>Vencedor:</b>  <?php if($vencedor): ?> <?php echo e($vencedor); ?>  <?php endif; ?><br><br>    
<div class="text-center">
<b>MAIS COTAS</b> 
</div>
<div>
    <table class="table table-hover">
        <tbody>
            <tr>
                <td><b>Primeiro:</b></td>
                <td><?php echo e($primeiro); ?> - <?php echo e($pri); ?> cotas </td>
            </tr>
            <tr>
                <td><b>Segundo:</b></td>
                <td><?php echo e($segundo); ?> - <?php echo e($seg); ?> cotas</td>
            </tr>
            <tr>
                <td><b>Terceiro:</b></td>
                <td> <?php echo e($terceiro); ?> - <?php echo e($terc); ?> cotas</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="text-end">
<form action="/sorteio/vencedor/save" method="post">
    <?php echo csrf_field(); ?> 
    <?php echo method_field('PUT'); ?>
    <input type="hidden" name="vencedor" required value="<?php echo e($vencedor); ?>">
    <input type="hidden" name="id" required value="<?php echo e($sorteio->id); ?>">
    <button class="btn btn-primary btn-sm">Salvar</button>
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/impac075/galdinoefilhopremiacoes.com.br/sorteio/resources/views/sorteio/sortear.blade.php ENDPATH**/ ?>