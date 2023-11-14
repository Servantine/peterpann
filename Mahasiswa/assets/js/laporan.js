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
});