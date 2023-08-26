function link(url){
    window.location.href = url;
}






alterarString();
function alterarString(){

    $('#qtnCotas').mask('99999');
    $('#valorCota').mask('99,99');
    $('#phone').mask('(99) 99999-9999');
    $("#inicial").mask('99999');
    $("#final").mask('99999');


    
    


    $("#text-regulamento-disable").hide();
     $("#text.regulamento").text('teste');
    var texto = $("#text-regulamento-disable").text();
    
    letra = texto.split(". ");
    letra.sort();
    texto = letra.join(".\n\n");

    const a = texto.replace(/\r?\n/g, '<br/>');

    document.getElementById('text-regulamento').innerHTML = a;
}


abrir();
function abrir(){
    $("#desconto").hide();
    var vll = $("#vlr").text();
    $("#comprar").text(vll);
}

function somar(num,valor){
    var number = parseFloat(document.getElementById("numberCotas").value);
    num = parseFloat(num);
    var total = num+number;
    $("#numberCotas").val(total);
    valor = parseFloat(valor);
    total = total * valor;
    $("#comprar").text(total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
}

function calcular(valor,conf){

        if(conf == 1){
            add(1);
        }else if(conf == 0){
            remove(1);
        }
        
        var number = parseFloat(document.getElementById("numberCotas").value);

        if(number == 10 || number == 20 || number == 30){
            valor = 1.35;
            $("#desconto").show();
        }else{
            $("#desconto").hide();
            valor = parseFloat(valor);
        }
        
        
        total = number * valor;
        $("#comprar").text(total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
}
function add(nu){
    var number = parseFloat($("#numberCotas").val());
    $("#numberCotas").val(number + nu);
}

function remove(nu){
    var number = parseFloat($("#numberCotas").val());
    if(number > 1){
        $("#numberCotas").val(number - nu);
    }  
}
$(document).ready(function(){

    
  
    

    

    $(document).on("input", "#description", function () {
        var limite = 500;
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;
    
        if(caracteresRestantes == 0) {
            $(this).addClass('limite');
        }else{
            $(this).removeClass('limite');
        }
        $("#limite").text(caracteresRestantes);
    });

    
    var $input    = document.getElementById('image'),
    $fileName = document.getElementById('file-name');

    $input.addEventListener('change', function(){
        $fileName.textContent = this.value;
    });
     
    setTime();
    
   function setTime() {

    const img = document.querySelector("#image");

    img.addEventListener("change", function(e) {
        const tgt = e.target || window.event.srcElement;
        const files = tgt.files;
        const fr = new FileReader();

        fr.onload = function() {
            document.querySelector("#img-user").src = fr.result;
        }

        fr.readAsDataURL(files[0]);
    });

      setTimeout(setTime, 1000);
   }


    let drop_ = document.querySelector('.area-upload #upload-file');
    drop_.addEventListener('dragenter', function(){
        document.querySelector('.area-upload .label-upload').classList.add('highlight');
    });
    drop_.addEventListener('dragleave', function(){
        document.querySelector('.area-upload .label-upload').classList.remove('highlight');
    });
    drop_.addEventListener('drop', function(){
        document.querySelector('.area-upload .label-upload').classList.remove('highlight');
    });
    
    

});
