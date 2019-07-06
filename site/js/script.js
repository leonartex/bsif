var ultimaPosicao = 0;

window.onload = function(){
    var menu = document.getElementById('menu');
    var lateral = document.getElementById('lateral');

    menu.addEventListener('click', function(){
        menu.childNodes[0].classList.toggle('fa-bars');
        menu.childNodes[0].classList.toggle('fa-times');
        lateral.classList.toggle('ativo');
    });

    var logoDiv = document.getElementById('logo-div');
    var pesquisa = document.getElementById('pesquisa');
    var pesquisar = document.getElementById('pesquisar');
    var campoPesquisa = document.getElementById('campoPesquisa');
    pesquisa.addEventListener('focusin', function(){
        if(document.documentElement.clientWidth < 500){
            logoDiv.classList.add('ativo');
        }
        pesquisar.classList.add('ativo');
        pesquisar.tabIndex = -1;
        campoPesquisa.classList.add('ativo');
        campoPesquisa.tabIndex = 0;
        campoPesquisa.focus();
    });
    campoPesquisa.addEventListener('blur', function(){
        logoDiv.classList.remove('ativo');
        pesquisar.classList.remove('ativo');
        pesquisar.tabIndex = 0;
        campoPesquisa.classList.remove('ativo');
        campoPesquisa.tabIndex = -1;
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