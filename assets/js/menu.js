document.addEventListener("DOMContentLoaded",()=>{

    const sidebar=document.getElementById("sidebar");

    const content=document.getElementById("content");

    window.toggleMenu=function(){

        sidebar.classList.toggle("ativo");

        content.classList.toggle("menu-aberto");

    }

});