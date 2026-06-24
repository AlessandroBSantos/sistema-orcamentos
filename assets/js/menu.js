function toggleMenu(){
    const sidebar =
    document.getElementById('sidebar');

    const menuToggle =
    document.querySelector('.content');

    sidebar.classList.toggle('oculto');

    if(content){
        content.classList.toggle('expandido');
    }
}