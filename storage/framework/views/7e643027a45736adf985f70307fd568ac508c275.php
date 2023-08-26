

<?php $__env->startSection('title', 'Galdino & Filho Premiações'); ?>

<?php $__env->startSection('content'); ?>

                        <div class="header">
                            <span>
                            <ion-icon class="icon" name="flash"></ion-icon> 
                            <strong>Contato </strong> 
                            <small> Tire suas dúvidas</small>
                            </span>
                        </div>

                        <div class="form-create">
    
        <form action="/contato" method="POST">
            <?php echo csrf_field(); ?>
            <div class="controle">

                <label for="name" class="group-input">
                    <input type="text" required="required" 
                    <?php if(auth()->guard()->check()): ?> value="<?php echo e(Auth::user()->name); ?>"  <?php endif; ?>
                    name="name" id="name">
                    <span>Nome</span>
                </label>

                <label for="phone" class="group-input">
                    <input type="text" required="required" name="phone" id="phone"
                    <?php if(auth()->guard()->check()): ?> value="<?php echo e(Auth::user()->phone); ?>" <?php endif; ?>
                    >
                    <span>Telefone</span>
                </label>

                <label for="email" class="group-input">
                    <input type="email" required="required"
                    <?php if(auth()->guard()->check()): ?> value="<?php echo e(Auth::user()->email); ?>"<?php endif; ?>
                    name="email" id="email">
                    <span>E-mail</span>
                </label>

                <label for="sorteio" class="group-input group-select">
                    <select required="required"
                    name="sorteio" id="sorteio">
                    <option value="nenhum">Deseja falar sobre um sorteio?</option>

                    <?php $__currentLoopData = $sorteios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sorteio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <option value="<?php echo e($sorteio->name); ?>"> <?php echo e($sorteio->name); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                    <span>Sorteio</span>
                </label>
    

                <label for="description" class="group-input description">
                    <textarea name="mensagem" id="description" rows="3" maxlength="500"></textarea>
                    <span>Mensagem</span>
                    <p>Limite de 500 caracteres. Resta:<strong id="limite">500</strong></p>
                </label>
            
                <div class="container-btn">
                    <button class="btn btn-primary btn-form">   
                    Enviar
                    <ion-icon class="icon" name="send"></ion-icon> 
                    </button>
                </div>
            </div>
            
        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projetos\laravel\sorteio\resources\views/contato.blade.php ENDPATH**/ ?>