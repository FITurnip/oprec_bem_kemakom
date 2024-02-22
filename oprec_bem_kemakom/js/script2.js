$(document).ready(function () {
    // Kondisi saat user menekan tombol enter di dalam input field
    $("#nim").keypress(function (event) {
        if (event.which === 13) { // 13 adalah kode untuk tombol enter
            event.preventDefault(); // Menghentikan aksi default (submit form)
            $("#submissionFormButton").click(); // Memanggil click event pada tombol submit
        }
    });
    // Kondisi saat user mengklik submit
    $("#submissionFormButton").click(function () {
        var nimInput = $("#nim").val().trim();
        // Kondisi apabila user belum inputkan NIM, maka akan menampilkan pesan
        if (nimInput === '') {
            $("#pesan-no-nim").html(`
            <h1 class ="mx-auto">Mohon Isi NIM Terlebih Dahulu!</h1>
            `);
        } else {
            // Bersihkan pesan jika NIM sudah diisi
            $("#pesan-no-nim").html('');

            var formData = $("#submissionForm").serialize();

            // Permintaan AJAX pertama
            $.ajax({
                type: "POST",
                url: "database/capengurus.php",
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response != null) {
                        // Konidisi modal header (kalimat pengumuman) status jika calon diterima
                        if (response.Kelolosan == 1) {
                            // Pesan Diterima
                            $(".modal-header").html(`
                                <p class="mx-auto"> Selamat <strong>` + response.Nama + `</strong>!<br/> Kamu <Strong>diterima</strong> sebagai <strong>anggota BEM KEMAKOM 2024-2025</strong></p>
                            `);
                            $(".animasi").html(`
                            <img class="img-fluid" src="assets/selamat.gif"alt="">
                        `);
                            // Konidisi status jika calon gagal
                        } else {
                            // Pesan Gagal
                            $(".modal-header").html(`
                                <p class="mx-auto">Maaf <strong>` + response.Nama + `</strong>!<br/> Kamu <strong>belum beruntung</strong> menjadi bagian dari kami!😓</p>
                            `);
                            $(".animasi").html(`
                            <img class="img-fluid" src="assets/tetap-semangat.gif" alt="">
                        `);
                        }

                        // Permintaan AJAX kedua
                        $.ajax({
                            // Persayarat permintaan AJAX Kedua 
                            type: "POST",
                            url: "database/ucapanMotivasi.php",
                            data: { idUcapanMotivasi: response.Kelolosan },
                            dataType: 'json',
                            success: function (response) {
                                // Konidisi modal footer (kalimat motivasi) status jika calon diterima
                                if (response.Kelolosan == 1) {
                                    $("#motivasi").html(`
                                            <strong>Keren!</strong> `+ response.Ucapan + `
                                        `);
                                } else {
                                    $("#motivasi").html(`
                                        <strong>Jangan menyerah!</strong> `+ response.Ucapan + `
                                    `);
                                }
                            },
                            // Pengecekan ajax jika eror dalam modal footer
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });

                        // Memuat ulang halaman saat modal ditutup
                        $('#myModal').on('hidden.bs.modal', function () {
                            location.reload();
                        });
                    } else {
                        // Pesan Gagal
                        $(".modal-header").html(`<p class="mx-auto">Maaf <strong>NIM Tidak Ditemukan</strong>!</p>`);
                        $("#motivasi").html(`<strong>Gunakan NIM terdaftar</strong>`);
                    }
                },
                // Pengecekan ajax jika eror dalam modal footer
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});
