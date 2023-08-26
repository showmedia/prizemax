

<?php $__env->startSection('title', 'Sortemax Indicados'); ?>



<?php $__env->startSection('content'); ?>

<div class="header">

<span>

<ion-icon class="icon" name="flash"></ion-icon> 

<strong>Indicados</strong> 

<small></small>

</span>

</div>

<div class="body">

    <div class="col-xl-12">
        <div class="head2 text-center">
            <div class="iten">
                Indicados <br>
                <?php echo e(count(Auth::user()->indicados)); ?>

            </div>
            <div class="iten">
                Sorteios Ativos <br>
                <?php 
                $contador = count(collect($sorteios)->filter(function ($sorteio) {
                    return $sorteio->status == 0;
                }));
                ?>
                <?php echo e($contador); ?>

            </div>
            <div class="iten">
                Ganho Total <br>
                R$ <?php echo e(number_format(Auth::user()->conta->ganhototal,2,',','.')); ?>

            </div>
            <div class="iten">
                Ganho Pago <br>
                R$ <?php echo e(number_format(Auth::user()->conta->ganhopago,2,',','.')); ?>

            </div>
            <div class="iten bg-success">
                Saldo em Conta <br>
                R$ <?php echo e(number_format(Auth::user()->conta->saldo,2,',','.')); ?>

            </div>
        </div>
    </div>

    <div class="text-center col-12">
    <button <?php echo e(Auth::user()->conta->saldo > 0.99 ? '' : 'disabled'); ?> class="btn btn-success btn-sm m-2" data-bs-toggle="modal" data-bs-target="#sacar"><ion-icon name="cash-outline"></ion-icon> Solicitar Saque</button>
    </div>

    

    <div class="text-center col-12">
       <?php $__currentLoopData = Auth::user()->saques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saque): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($saque->status == 0): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(date('d/m/Y h:i', strtotime($saque->created_at))); ?> - R$ <?php echo e(number_format($saque->valor,2,',','.')); ?>

                </div>
                <?php endif; ?>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="p-2">
        <br>
        <?php $__currentLoopData = Auth::user()->indicados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-12">
       
            <div class="head3 col-xl-12">
            <?php echo e($indicado->name); ?> - <?php echo e($indicado->phone); ?>

        
            </div>
        <div class="head2 text-center indicado">
            <div class="iten">
                Compras <br>
                <?php echo e(count($indicado->compras->filter(function($item) {
    return $item->status == 1; 
}))); ?>

            </div>
          
            <div class="iten">
                Valor Compras <br>
                R$ <?php echo e(number_format($indicado->compras->filter(function($item) {
    return $item->status == 1;
})->sum('valueAll'), 2, ',', '.')); ?>

            </div>
            <div class="iten">
                Percentual comissão <br>
                <?php echo e(Auth::user()->comissao * 100); ?>%
            </div>
            <div class="iten">
                Comissão <br>
                R$ <?php echo e(number_format($indicado->compras->filter(function($item) {
    return $item->status == 1;
})->sum('valueAll') * Auth::user()->comissao,2,',','.')); ?>

            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
    </div>


<!-- Modal -->
<div class="modal fade" id="sacar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitar Saque</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/saque" method="post">
        <?php echo csrf_field(); ?>
      <div class="modal-body">
        
      <div class="mb-3">
      <label for="tipo" class="form-label">Tipo de Chave</label>

      <select class="form-select" id="tipo" name="tipo" aria-label="Default select example">
        <option selected>Telefone</option>
        <option value="1">Email</option>
        <option value="2">CPF</option>
        </select>
      </div>
        
        <div class="mb-3">
            <label for="chave" class="form-label">Chave Pix</label>
            <input type="text" name="chave" class="form-control" id="chave" required='required'>
        </div>
        <label for="valorpix" class="form-label">Valor Saque</label>
        <div class="input-group mb-3">
           <input type="hidden" id="saldoconta" value="<?php echo e(Auth::user()->conta->saldo); ?>">
            <span class="input-group-text" id="basic-addon1">R$</span>
            <input type="text" value="<?php echo e(floor(Auth::user()->conta->saldo)); ?>" class="form-control" data-mask-reverse="true" id="valorpix" name="valorpix" aria-describedby="basic-addon1">
            <span class="input-group-text" id="basic-addon1">,00</span>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" onclick="this.form.submit(); this.disabled=true; this.innerHTML='Solicitando...'" class="btn btn-primary">Solicitar</button>
      </div>
      </form>
    </div>
  </div>
</div>

  
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projetos\laravel\sortemax\sorteio\resources\views/user/indicado.blade.php ENDPATH**/ ?>