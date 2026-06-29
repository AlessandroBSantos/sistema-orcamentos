document.addEventListener("DOMContentLoaded", function () {

    const sidebar = document.getElementById("sidebar");
    const content = document.getElementById("content");

    // Garante que a página inicie com o menu fechado
    sidebar.classList.remove("ativo");
    content.classList.remove("menu-aberto");

    // Função global chamada pelo botão
    window.toggleMenu = function () {

        sidebar.classList.toggle("ativo");
        content.classList.toggle("menu-aberto");

    };

});