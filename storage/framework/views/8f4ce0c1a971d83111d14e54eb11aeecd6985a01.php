

<?php $__env->startSection('title', 'dashboard - Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>

<div class="form-create">
        <h4>Abrir Novo Sorteio</h4>

        <form action="/sorteio" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="controle">
            <div class="area-upload">
                <label for="upload-file" class="label-upload">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <div class="texto">Imagem de capa do sorteio (1920x1080) <br>Clique ou arraste o arquivo</div>
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
                    <span>Nome do sorteio</span>
                </label>
<br><br>
                <label for="qtnCotas" class="group-input">
                    <input type="text" required="required" name="qtnCotas" id="qtnCotas">
                    <span>Quantidade de cotas a serem vendidas</span>
                </label>
<br><br>
                <label for="valorCota" class="group-input">
                    <input type="text" required="required" name="valorCota" id="valorCota">
                    <span>Valor por cota</span>
                </label>
<br><br>
                <label for="inicial" class="group-input">
                    <input type="text" required="required" name="inicial" id="inicial">
                    <span>Digite a cota inicial</span>
                </label>
<br><br>
                <label for="final" class="group-input">
                    <input type="text" required="required" name="final" id="final">
                    <span>Digite a cota final</span>
                </label>

                <label for="description" class="group-input description">
                    <textarea name="description" id="description" rows="3" maxlength="500"></textarea>
                    <span>Regulamento</span>
                    <p>Limite de 500 caracteres. Resta:<strong id="limite">500</strong></p>
                </label>
            
                <div class="container-btn">
                    <button class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
            
        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projetos\laravel\sorteio\resources\views/sorteio/create.blade.php ENDPATH**/ ?>