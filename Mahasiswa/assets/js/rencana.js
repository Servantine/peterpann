$(document).ready(function () {
    const cardsPerPage = 3; // Number of cards to display per page
    const cardContainer = $('.card-container');
    const totalCards = cardContainer.children().length;
    let currentPage = 1;

    function showPage(page) {
        const startIndex = (page - 1) * cardsPerPage;
        const endIndex = startIndex + cardsPerPage;

        cardContainer.children().each(function (index) {
            $(this).toggle(index >= startIndex && index < endIndex);
        });
    }

    function updatePagination() {
        const totalPages = Math.ceil(totalCards / cardsPerPage);
        const prevPageBtn = $('#prev-page');
        const nextPageBtn = $('#next-page');

        prevPageBtn.toggleClass('disabled', currentPage === 1);
        nextPageBtn.toggleClass('disabled', currentPage === totalPages);

        // Remove existing page indicators
        $('.page-indicator').remove();

        // Add page indicators dynamically
        for (let i = 1; i <= totalPages; i++) {
            const pageIndicator = $('<li class="page-item"><a class="page-link page-indicator" href="#">' + i + '</a></li>');
            pageIndicator.on('click', function () {
                currentPage = i;
                showPage(currentPage);
                updatePagination();
            });
            $('.pagination').children('#next-page').before(pageIndicator);
        }
    }

    function getCurrentDate() {
        const today = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        return today.toLocaleDateString('id-ID', options);
    }

    $('#prev-page').on('click', function (e) {
        e.preventDefault();
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
            updatePagination();
        }
    });

    $('#next-page').on('click', function (e) {
        e.preventDefault();
        const totalPages = Math.ceil(totalCards / cardsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
            updatePagination();
        }
    });

    showPage(currentPage);
    updatePagination();

    // Isi Laporan
    $('#buatLaporan').click(function (e) {
        e.preventDefault();

        const nim = '72210456';
        $.ajax({
            type: 'POST',
            url: 'assets/php/dapatRencanaKegiatan.php',
            data: { nim: nim },
            success: function (activities) {
                activities = JSON.parse(activities);
                Swal.fire({
                    title: `Isi Laporan Kegiatan <p class="text-muted m-0 p-0" style="font-size:14">${getCurrentDate()}</p>`,
                    html: `
                        <form action="" method="POST" id="orderForm" enctype="multipart/form-data">
                            <div class="mb-3 text-start">
                                <label for="judulKegiatan" class="form-label">Judul Kegiatan</label>
                                <input type="text" class="form-control" id="judulKegiatan" name="judulKegiatan" placeholder="Masukan judul kegiatan...">
                            </div>

                            <div class="mb-3 text-start">
                                <label for="laporanTextarea" class="form-label">Bagaimana Rencana Kegiatan kelompok Hari Ini?</label>
                                <textarea class="form-control" id="laporanTextarea" name="logbookTextarea" placeholder="Tuliskan rencana kelompok..." rows="3" required></textarea>
                            </div>
    
                            <div class="mb-3 text-start">
                                <label for="fileUpload" class="form-label">Upload File</label>
                                <input type="file" class="form-control" id="fileUpload" name="fileUpload" accept=".doc, .docx, .pdf">
                            </div>
                        </form>`,
                    focusConfirm: false,
                    showCancel: true,

                    preConfirm: () => {
                        const judulKegiatan = Swal.getPopup().querySelector('#judulKegiatan').value;
                        const isiKegiatan = Swal.getPopup().querySelector('#laporanTextarea').value;
                        const fileUpload = Swal.getPopup().querySelector('#fileUpload').files[0];
                        const nim = '72210456';

                        const formData = new FormData();
                        formData.append('nim', nim);
                        formData.append('judulKegiatan', judulKegiatan);
                        formData.append('isiKegiatan', isiKegiatan);
                        formData.append('fileUpload', fileUpload);

                        $.ajax({
                            type: 'POST',
                            url: 'assets/php/isi_rencana.php',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                Swal.fire('Rencana disimpan!', '', 'success');
                                console.log(response)
                            },
                            error: function (error) {
                                console.error('Error:', error);
                                Swal.fire('Terjadi kesalahan. Silakan coba lagi.', '', 'error');
                            }
                        });
                    }
                });
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    });
});