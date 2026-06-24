function toggleMenu() {

    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');

    sidebar.classList.toggle('ativo');

    if(content){
        content.classList.toggle('menu-aberto');
    }

}