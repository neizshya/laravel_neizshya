import $ from "jquery";

$(document).ready(function () {
    function loadData(rsId = "") {
        $("#pasien-body").html(`
            <tr>
                <td colspan="5" class="text-center">Memuat data...</td>
            </tr>
        `);

        $.get("/filter-pasien/" + rsId, function (data) {
            $("#pasien-body").html(data);
        }).fail(function () {
            $("#pasien-body").html(`
                <tr>
                    <td colspan="5" class="text-center text-danger">Gagal memuat data.</td>
                </tr>
            `);
        });
    }

    $("#filter-rs").on("change", function () {
        loadData($(this).val());
    });

    $(document).on("click", ".btn-delete", function () {
        if (confirm("Hapus data ini?")) {
            let id = $(this).data("id");
            $.ajax({
                url: "/pasien-delete/" + id,
                type: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                success: function () {
                    loadData($("#filter-rs").val());
                },
            });
        }
    });

    loadData();
});
