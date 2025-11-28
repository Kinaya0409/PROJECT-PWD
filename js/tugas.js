document.addEventListener("DOMContentLoaded", function () {

    const table = document.querySelector("#taskTable");

    // Tombol Edit
    table.addEventListener("click", function(e) {
        if (e.target.classList.contains("edit")) {
            let id = e.target.closest("tr").dataset.id;
            window.location = "EditTugas.php?id_tugas=" + id;
        }
    });

    // Tombol Hapus
    table.addEventListener("click", function(e) {
        if (e.target.classList.contains("delete")) {
            let id = e.target.closest("tr").dataset.id;
            if(confirm("Yakin ingin menghapus tugas ini?")){
                window.location = "DeleteTugas.php?id_tugas=" + id;
            }
        }
    });

});
