

<?php $__env->startSection('title', 'Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>

                        <div class="header">
                            <span>
                            <ion-icon class="icon" name="cart-outline"></ion-icon> 
                            <strong> <?php echo e($nota->name); ?> </strong> 
                            <small> Números</small> 
                            
                            </span><br>
                            <h6> <?php echo e($nota->email); ?> - <?php echo e($nota->phone); ?> </h6>
                        </div>

                        <div class="alert alert-info" role="alert">
                            Adicione as cotas separadas para este cliente
                        </div>

                        <div class="cotas">
                            
                            <?php $__currentLoopData = $nota->numeros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="ct"  data-bs-toggle="modal" data-bs-target="#modal<?php echo e($cota->id); ?>"><?php echo e(sprintf("%04s",$cota->numero)); ?></div>
                                <!-- Modal -->
<div class="modal fade" id="modal<?php echo e($cota->id); ?>" tabindex="-1" aria-labelledby="modal<?php echo e($cota->id); ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar cota</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Deletar a cota <b><?php echo e($cota->numero); ?></b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="/nota/numero/<?php echo e($cota->id); ?>" method="post">
            <?php echo csrf_field(); ?> 
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
        
      </div>
    </div>
  </div>
</div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        </div>
<br>
                        <div class="form-create">
    
    <form action="/nota/numero/<?php echo e($nota->id); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="controle">

        <div class="alert alert-warning" role="alert">
                Adicione uma cota por vez!
            </div>
      

            <label for="cota" class="group-input">
                <input type="text" required="required"
                    name="cota" id="cota">
                <span>Informe a cota</span>
            </label>
         
            <div class="container-btn">
                <button class="btn btn-primary btn-form">   
                Adicionar
                <ion-icon class="icon" name="send"></ion-icon> 
                </button>
            </div>
        </div>
        
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/impac075/galdinoefilhopremiacoes.com.br/sorteio/resources/views/nota/show.blade.php ENDPATH**/ ?>