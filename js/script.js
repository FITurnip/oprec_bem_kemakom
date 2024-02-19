$(document).ready(function () {
    // Kondisi saat user mengklik submit
    $("#submissionFormButton").click(function () {
        var nimInput = $("#nim").val().trim();
        // Kondisi apabila user belum inputkan NIM, maka akan menampilkan pesan
        if (nimInput === '') {
            $("#pesan-no-nim").html(`
            <h1 class ="mx-auto">Mohon Isi NIMnya Dulu King!😁👊</h1>
            <p class ="font-italic text-opacity-25">*Keliatan banget pengen nyenggol King Zharif!☕🗿</p>
        `);
        // Kondisi apabila user sudah menginputkan NIM
        } else {
            var formData = $("#submissionForm").serialize();
            
            // Permintaan AJAX pertama
            $.ajax({
                type: "POST",
                url: "database/capengurus.php",
                data: formData,
                success: function (response) {
                    // Pendeklarasian variabel untuk tanggapan
                    var mantaps = JSON.parse(response);
                    var kalimatStatus = (mantaps.Kelolosan == 1);
                    // Menampilkan tanggapan 
                    console.log(mantaps);
                    // Konidisi modal header (kalimat pengumuman) status jika calon diterima
                    if (kalimatStatus) {
                        // Pesan Diterima
                        $(".modal-header").html(`
                            <p class="mx-auto"> Selamat <strong>` + mantaps.Nama + `</strong>! Kamu <Strong>Diterima</strong> Sebagai <strong>Calon Aggota BEM KEMAKOM 2024-2025</strong></p>
                        `);
                        // Konidisi status jika calon gagal
                    } else {
                        // Pesan Gagal
                        $(".modal-header").html(`
                            <p class="mx-auto">Maaf <strong>` + mantaps.Nama + `</strong>! Kamu <strong>Belum Beruntung</strong> Menjadi Bagian dari Kami!😓</p>
                        `);
                    }

                    // Permintaan AJAX kedua
                    $.ajax({
                        // Persayarat permintaan AJAX Kedua 
                        type: "POST",
                        url: "database/ucapanMotivasi.php",
                        data: { idUcapanMotivasi: mantaps.Kelolosan },
                        success: function (response) {
                            // Pendeklarasian variabel untuk tanggapan 2
                            var mantaps2 = JSON.parse(response);
                            var kalimatStatus2 = (mantaps2.Kelolosan == 1);
                            // Menampilakn tanggapan 2
                            console.log(mantaps2);

                            // Konidisi modal footer (kalimat motivasi) status jika calon diterima
                            if (kalimatStatus2) {
                                $("#motivasi").html(`
                                        <strong>Keren!</strong> `+ mantaps2.Ucapan + `
                                    `);
                            } else {
                                $("#motivasi").html(`
                                    <strong>Jangan menyerah!</strong> `+ mantaps2.Ucapan + `
                                `);
                            }
                            // Tampilkan modal footer (kalimat motivasi)
                            var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                            myModal.show();
                        },
                        // Pengecekan ajax jika eror dalam modal footer
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                    // Tampilkan modal header (kalimat pengumuan)
                    var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                    myModal.show();
                },
                // Pengecekan ajax jika eror dalam modal footer
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });

    // Event handler untuk menangani saat modal ditutup
    $('#myModal').on('hidden.bs.modal', function () {
        // Redirect pengguna kembali ke halaman semula
        window.location.href = 'index.php'; 
    });
});
