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

        Swal.fire({
            title: `Isi Laporan Kegiatan <p class="text-muted m-0 p-0" style="font-size:14">${getCurrentDate()}</p>`,
            html:
                `
                <form action="" method="POST" id="orderForm">
                    <div class="mb-3 text-start">
                        <label for="judul" class="form-label">Bagaimana Rencana Kegiatan kelompok Hari Ini?</label>    
                        <input class="form-control" type="text" name="judul" id="judul" placeholder="Tuliskan judul kegiatan" required>
                    </div>
                    
                    <div class="mb-3 text-start">
                        <label for="logbookTextarea" class="form-label">Bagaimana Rencana Kegiatan kelompok Hari Ini?</label>
                        <textarea class="form-control" id="laporanTextarea" name="logbookTextarea" placeholder="Tuliskan rencana kelompok..." rows="3" required></textarea>
                    </div>
                </form>`,
            focusConfirm: false,
            showCancel : true,

            preConfirm: () => {
                const isiLaporan = Swal.getPopup().querySelector('#laporanTextarea').value;
                const judulLaporan = Swal.getPopup().querySelector('#judul').value;
                const nim = '72210456';

                $.ajax({
                    type: 'POST',
                    url: 'assets/php/isi_laporan.php',
                    data: { nim: nim, judulLaporan:judulLaporan, isiLaporan: isiLaporan },
                    success: function (response) {
                        Swal.fire('Laporan disimpan!', '', 'success');
                    },
                    error: function (error) {
                        console.error('Error:', error);
                        Swal.fire('Terjadi kesalahan. Silakan coba lagi.', '', 'error');
                    }
                });
            }
        });
    });
});