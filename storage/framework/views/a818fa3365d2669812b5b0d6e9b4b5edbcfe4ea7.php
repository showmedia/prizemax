

<?php $__env->startSection('title', 'Sortemax Vendedores'); ?>

<?php $__env->startSection('content'); ?>

<div class="header">

<span>

<ion-icon class="icon" name="flash"></ion-icon> 

<strong>Vendedores</strong> 

<small></small>

</span>

</div>

<div class="body">

    <div class="col-xl-12">
        <div class="head2 text-center">
            <div class="iten">
                Vendedores <br>
                <?php echo e(count($vendedores)); ?>

            </div>
            <div class="iten">
                Comissão Total <br>
                R$ <?php echo e(number_format($vendedores->pluck('conta.ganhototal')->sum(),2,',','.')); ?>

            </div>
            <div class="iten">
                Comissão Paga <br>
                R$ <?php echo e(number_format($vendedores->pluck('conta.ganhopago')->sum(),2,',','.')); ?>

            </div>
            <div class="iten">
                Saldo a pagar <br>
                R$ <?php echo e(number_format($vendedores->pluck('conta.saldo')->sum(),2,',','.')); ?>

            </div>
            <div class="iten">
                Saques solicitados <br>
                R$ <?php echo e(number_format($saques->sum('valor'),2,',','.')); ?>

            </div>
        </div>
    </div>
<br>
    <div class="text-center col-12" style="cursor:pointer;">
       <?php $__currentLoopData = $saques->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saque): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-success" data-bs-toggle="modal" data-bs-target="#saque<?php echo e($saque->id); ?>" role="alert">
                    <?php echo e(date('d/m/Y h:i', strtotime($saque->created_at))); ?> - <strong><?php echo e($saque->user->name); ?></strong> - Valor Solicitado R$ <?php echo e(number_format($saque->valor,2,',','.')); ?>

                </div>

                <!-- Modal -->
<div class="modal fade" id="saque<?php echo e($saque->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Saque Solicitado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/saque/<?php echo e($saque->id); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
      <div class="modal-body">

      <div class="p-2 text-center">
            <p>
                <strong><?php echo e($saque->user->name); ?></strong><br>
                Data: <?php echo e(date('d/m/y h:i', strtotime($saque->created_at))); ?> <br>
                Valor: <?php echo e(number_format($saque->valor,2,',','.')); ?> <br>
                Tipo Chave: <?php echo e($saque->tipochave ?? ''); ?> <br>
                Chave Pix: <?php echo e($saque->chave ?? ''); ?>

            </p>
      </div>
 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Depois</button>
        <button type="button" onclick="this.form.submit(); this.disabled=true; this.innerHTML='Pagando...'" class="btn btn-success">Pagar</button>
      </div>
      </form>
    </div>
  </div>
</div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


    <div class="p-2">
        <br>
        <?php $__currentLoopData = $vendedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-12">
       
            <div class="head3 col-xl-12">
            <?php echo e($indicado->name); ?> - <?php echo e($indicado->phone); ?>

        
            </div>
        <div class="head2 text-center indicado">
            <div class="iten">
                Indicados <br>
                <?php echo e(count($indicado->indicados)); ?>

            </div>
          
            <div class="iten">
                Ganho Total <br>
                R$ <?php echo e(number_format($indicado->conta->sum('ganhototal'), 2, ',', '.')); ?>

            </div>
            <div class="iten">
                Ganho Pago <br>
                R$ <?php echo e(number_format($indicado->conta->sum('ganhopago'), 2, ',', '.')); ?>

            </div>
            <div class="iten">
                Saldo a Pagar <br>
                R$ <?php echo e(number_format($indicado->conta->sum('saldo'),2,',','.')); ?>

            </div>
            <div class="iten">
                Saque solicitado <br>
                R$ <?php echo e(number_format($indicado->saques->filter(function($item) {
    return $item->status == 0;
})->sum('valor'),2,',','.')); ?>

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
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projetos\laravel\sortemax\sorteio\resources\views/user/vendedores.blade.php ENDPATH**/ ?>