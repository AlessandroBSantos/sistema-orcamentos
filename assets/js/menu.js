document.addEventListener("DOMContentLoaded", function() {
    const sidebar=document.getElementById('sidebar');
    const content=document.getElementById('content');
    window.toggleSidebar=function(){
        sidebar.classList.toggle('ativo');
        content.classList.toggle('menu-aberto');
    }
});