var ultimaPosicao = 0;

window.onload = function(){
    var menu = document.getElementById('menu');
    var lateral = document.getElementById('lateral');

    menu.addEventListener('click', function(){
        menu.childNodes[0].classList.toggle('fa-bars');
        menu.childNodes[0].classList.toggle('fa-times');
        lateral.classList.toggle('ativo');
    });

    window.addEventListener('scroll', function(){
        if ((document.body.getBoundingClientRect()).top < ultimaPosicao && !lateral.classList.contains('ativo')){
            document.getElementById('cabecalho').classList.add('cima')
            ultimaPosicao = (document.body.getBoundingClientRect()).top
        }else{
            document.getElementById('cabecalho').classList.remove('cima')
            ultimaPosicao = (document.body.getBoundingClientRect()).top
        }   
    });
}