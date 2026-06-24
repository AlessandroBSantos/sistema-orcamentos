function toggleMenu() {

    const sidebar = document.getElementById("sidebar");
    const content = document.getElementById("content");

    if (!sidebar || !content) {
        console.log("Sidebar ou Content não encontrado");
        return;
    }

    sidebar.classList.toggle("ativo");
    content.classList.toggle("menu-aberto");
}