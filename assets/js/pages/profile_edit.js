$("#btn_simpan").click(function() {

    let nama   = $("#nama").val().trim();
    let email  = $("#email").val().trim();
    let no_hp  = $("#no_hp").val().trim();
    let alamat = $("#alamat").val().trim();

    if (nama === "" || email === "" || no_hp === "" || alamat === "") {
        Swal.fire({
            icon: "warning",
            title: "Tidak Boleh Kosong!",
            text: "Semua data identitas wajib diisi.",
            showConfirmButton: false,
            timer: 1500
        });
        return;
    }

    $("#loading_overlay").fadeIn(200);

    $.ajax({
        url: origin + "/profile/update",
        type: "POST",
        data: {
            nama: nama,
            email: email,
            no_hp: no_hp,
            alamat: alamat
        },
        dataType: "json",

        success: function(res) {

            $("#loading_overlay").fadeOut(200);

            Swal.fire({
                icon: res.sts == "1" ? "success" : "error",
                title: res.msg,
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                if (res.sts == "1") location.reload();
            });
        },

        error: function() {

            $("#loading_overlay").fadeOut(200);

            Swal.fire({
                icon: "error",
                title: "Gagal!",
                text: "Terjadi kesalahan saat menyimpan data."
            });
        }
    });
});


$("#btn_upload_foto").click(function () {

    var file = $("#foto")[0].files[0];

    if (!file) {
        Swal.fire({
            icon: "warning",
            title: "Oops!",
            text: "Kamu belum memilih foto.",
            showConfirmButton: false,
            timer: 1500
        });
        return;
    }

    let formData = new FormData();
    formData.append("foto", file);
    formData.append("old_foto", $("#old_foto").val());

    $("#loading_overlay").fadeIn(200);

    $.ajax({
        url: origin + "/profile/upload_foto",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",

        success: function(res) {
            location.reload(); 
        },
        error: function() {
            $("#loading_overlay").fadeOut(200);
            Swal.fire({
                icon: "error",
                title: "Upload gagal!",
                text: "Terjadi kesalahan saat mengupload foto."
            });
        }
    });
});
;

