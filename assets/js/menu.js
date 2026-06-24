function toggleMenu(){

    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');

    if(sidebar){
        sidebar.classList.toggle('ativo');
        content.classList.toggle('menu-aberto');
    }

}