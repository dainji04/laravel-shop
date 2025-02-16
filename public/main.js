$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
function removeRow(id, url) {
    if (confirm("Bạn có chắc chắn muốn xóa không?")) {
        $.ajax({
            url: url,
            type: "DELETE",
            dataType: "JSON",
            data: {
                id,
            },
            success: function (result) {
                if (result.error == false) {
                    location.reload();
                    alert(`${result.message}`);
                }
            },
        });
    }
}
