(()=>{
    const CloseModal = document.querySelector(".modal-header .close");
    CloseModal.addEventListener("click", ()=>{
        const Modal = document.getElementById("modal-visualizar-empresa");
        Modal.style.display = "none";
    });
})();

function AbrirModal(id) {
    const Modal = document.getElementById("modal-visualizar-empresa");
    Modal.style.display = "flex";
}