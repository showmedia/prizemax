<?php $__env->startSection('title', 'Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>

                        <div class="header">
                            <span>
                            <ion-icon class="icon" name="cart-outline"></ion-icon> 
                            <strong> Cotas vendidas pelo talão </strong> 
                            <small> todas vendas</small>
                            </span>
                        </div>
                        <form action="/notas" method="get">
                        <div class="input-group mb-3">
                           
                           <input type="text" class="form-control" placeholder="Pesquise pelo nome" name="search" aria-label="Recipient's username" aria-describedby="button-addon2">
                           <button class="btn btn-outline-success" type="submit" id="button-addon2">Pesquisar</button>
                           </div> 
                                </form>
                        

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
            
                                    <th>Qtn cotas</th>
                                    <th> <a href="/nota" class="btn btn-primary btn-sm"> <ion-icon name="add-outline"></ion-icon> </a> </th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                                        <?php $__currentLoopData = $notas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($nota->name); ?></td>
                                            
                                
                                            <td> <?php echo e(count($nota->numeros)); ?> </td>
                                            <td> <a class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo e($nota->id); ?>"><ion-icon name="trash-outline"></ion-icon></a>                                      
                                             <a href="/nota/<?php echo e($nota->id); ?>" class="btn btn-sm btn-success"> <ion-icon name="add-circle-outline"></ion-icon> </a> </td>
                                        </tr>

                                            
                        <!-- Modal -->
<div class="modal fade" id="deleteModal<?php echo e($nota->id); ?>" tabindex="-1" aria-labelledby="deleteModal<?php echo e($nota->id); ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar cotas desse cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo e($nota->name); ?> <br>
        <?php $__currentLoopData = $nota->numeros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e(sprintf("%04s",$num->numero)); ?> - 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="/nota/<?php echo e($nota->id); ?>" method="post">
            <?php echo csrf_field(); ?> 
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
        
      </div>
    </div>
  </div>
</div>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                            </tbody>
                        </table>

           
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/storage/9/cf/31/galdinoefilhopre1/public_html/sorteio/resources/views/nota/list.blade.php ENDPATH**/ ?>