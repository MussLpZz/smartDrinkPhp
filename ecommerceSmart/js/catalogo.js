document.addEventListener('DOMContentLoaded', () => {
    const botones = document.querySelectorAll('.filtro-cat');
    const secciones = document.querySelectorAll('.categoria-bebida');
    const toggleCategorias = document.getElementById("toggleCategorias");
    const categoriaBotones = document.getElementById("categoriaBotones");

    botones.forEach(btn => {
        btn.addEventListener('click', () => {
            const categoria = btn.getAttribute('data-categoria');
            botones.forEach(b => {
                if (b === btn) {
                    b.classList.add('bg-indigo-600', 'text-white');
                    b.classList.remove('bg-gray-300', 'text-gray-800');
                } else {
                    b.classList.remove('bg-indigo-600', 'text-white');
                    b.classList.add('bg-gray-300', 'text-gray-800');
                }
            });
            secciones.forEach(sec => {
                if (categoria === 'all' || sec.getAttribute('data-categoria') === categoria) {
                    sec.style.display = '';
                } else {
                    sec.style.display = 'none';
                }
            });
        });
    });
    if (toggleCategorias) {
        toggleCategorias.addEventListener("click", () => {
            categoriaBotones.classList.toggle("hidden");
        });
    }
});
