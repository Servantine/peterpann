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

    // Fungsi untuk mendapatkan tanggal-tanggal yang dapat dipilih
    function getAvailableLogbookDates($nim) {
        // $nim = nim;
        return new Promise((resolve, reject) => {
            $.ajax({
                type: 'GET',
                url: 'assets/php/ambilTanggalLogbookTerisi.php',
                // data: { nim: nim },
                success: function (response) {
                    const availableDates = JSON.parse(response);
                    resolve(availableDates);
                },
                error: function (error) {
                    console.error('Error:', error);
                    reject(error);
                }
            });
        });
    }

    function getKKNDateRange($nim) {
        // $nim = nim;
        return new Promise((resolve, reject) => {
            $.ajax({
                type: 'GET',
                url: 'assets/php/kknRange.php',
                // data: { nim: nim },
                success: function (response) {
                    const availableDates = JSON.parse(response);
                    resolve(availableDates);
                },
                error: function (error) {
                    console.error('Error:', error);
                    reject(error);
                }
            });
        });
    }

    function isValidDate(selectedDate, tanggalMulai, tanggalSelesai) {
        const date = new Date(selectedDate);
        return date >= new Date(tanggalMulai) && date <= new Date(tanggalSelesai);
    }

    // Buat Logbook
    $('#buatLogbook').click(function (e) {
        e.preventDefault();

        Promise.all([
            getKKNDateRange('72210456'),
            getAvailableLogbookDates('72210456')
        ]).then(([kknDateRange, availableDates]) => {
            Swal.fire({
                title: `Isi Logbook Harian<p class="text-muted m-0 p-0" style="font-size:14">${getCurrentDate()}</p>`,
                html: `
                    <form action="" method="POST" id="orderForm">
                        <div class="mb-3 text-start">
                            <label for="tanggalLogbook" class="form-label">Pilih Tanggal</label>
                            <input type="date" class="form-control" id="tanggalLogbook" name="tanggalLogbook" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="logbookTextarea" class="form-label">Bagaimana Kegiatanmu hari ini?</label>
                            <textarea class="form-control" id="logbookTextarea" name="logbookTextarea" placeholder="Tuliskan kegiatan Anda hari ini..." rows="3" required></textarea>
                        </div>
                    </form>`,
                focusConfirm: false,
                showCancel: true,

                preConfirm: () => {
                    const selectedDate = Swal.getPopup().querySelector('#tanggalLogbook').value;

                    console.log()
                    if (isValidDate(selectedDate, kknDateRange.tanggalMulai, kknDateRange.tanggalSelesai) && !availableDates.includes(selectedDate)) {
                        const isiLogbook = Swal.getPopup().querySelector('#logbookTextarea').value;
                        const nim = '72210456';

                        $.ajax({
                            type: 'POST',
                            url: 'assets/php/isi_logbook.php',
                            data: { nim: nim, isiLogbook: isiLogbook, tanggalLogbook: selectedDate },
                            success: function (response) {
                                Swal.fire('Logbook disimpan!', '', 'success');
                            },
                            error: function (error) {
                                console.error('Error:', error);
                                Swal.fire('Terjadi kesalahan. Silakan coba lagi.', '', 'error');
                            }
                        });
                    } else {
                        Swal.showValidationMessage(`Logbook Sudah Terisi '${selectedDate}'`);
                        return false;
                    }
                },
                didOpen: () => {
                    const tanggalInput = Swal.getPopup().querySelector('#tanggalLogbook');
                    tanggalInput.setAttribute('min', kknDateRange.tanggalMulai);
                    tanggalInput.setAttribute('max', kknDateRange.tanggalSelesai);
                }

            });
        }).catch(error => {
            console.error('Error:', error);
        });
    });
});