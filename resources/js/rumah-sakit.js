import $ from "jquery";

$(document).ready(function () {
    function loadRsData() {
        $("#rs-body").html(`
            <tr>
                <td colspan="5" class="text-center">Memuat data...</td>
            </tr>
        `);

        $.get("/rumah-sakit", function (html) {
            // Ekstrak bagian tbody dari response
            const tempDom = document.createElement("div");
            tempDom.innerHTML = html;
            const newTbody = $(tempDom).find("#rs-body").html();

            $("#rs-body").html(newTbody);
        }).fail(function () {
            $("#rs-body").html(`
                <tr>
                    <td colspan="5" class="text-danger text-center">Gagal memuat data.</td>
                </tr>
            `);
        });
    }

    $(document).on("click", ".btn-delete", function () {
        if (confirm("Yakin hapus data ini?")) {
            const id = $(this).data("id");

            $.ajax({
                url: `/rumah-sakit-delete/${id}`,
                type: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                beforeSend: function () {
                    $("#rs-body").html(`
                        <tr>
                            <td colspan="5" class="text-center">Menghapus data...</td>
                        </tr>
                    `);
                },
                success: function () {
                    loadRsData();
                },
                error: function () {
                    alert("Gagal menghapus data.");
                    loadRsData(); // Tetap reload biar gak stuck
                },
            });
        }
    });
});
