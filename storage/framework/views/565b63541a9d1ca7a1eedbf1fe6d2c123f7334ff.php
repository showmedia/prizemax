

<?php $__env->startSection('title', 'dashboard - Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>
  
<div class="form-create">
        <h4>Cadastrar prêmio ao sorteio "<?php echo e($sorteio->name); ?>" </h4>

        <form action="/produto/<?php echo e($sorteio->id); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="controle">
            <div class="area-upload">
                <label for="upload-file" class="label-upload">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <div class="texto">Imagem do produto do prêmio <br>Clique ou arraste o arquivo</div>
                </label>
                <input type="file" name="image" id='image' class="image" accept="image/jpg,image/png"  multiple/>
                
                <div class="lista-uploads">
                </div>
               
            </div>

            <div class="img-curso">
                <img src="" alt="" class="img-capa-curso" id="img-user">
            </div>
                
                <label for="name" class="group-input">
                    <input type="text" required="required" name="name" id="name">
                    <span>Nome do produto</span>
                </label>
    

                <label for="description" class="group-input description">
                    <textarea name="description" id="description" rows="3" maxlength="500"></textarea>
                    <span>Descrição do produto</span>
                    <p>Limite de 500 caracteres. Resta:<strong id="limite">500</strong></p>
                </label>
            
                <div class="container-btn">
                    <button class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
            
        </form>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projetos\laravel\sorteio\resources\views/premio/create.blade.php ENDPATH**/ ?>