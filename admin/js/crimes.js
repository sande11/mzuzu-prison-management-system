const sectionCenter = document.querySelector('.table-content');

//load item
window.addEventListener('DOMContentLoaded', function () {
    getCrimes();

});

function getCrimes() {

    $.ajax({
        url: '../ajax.php?action=get_crimes',
        type: 'GET',
        data: {
            id: 1,
        },
        error: function () {
            alert('Something is wrong, couldn\'t get crimes');
        },
        success: function (resp) {
            if (resp) {
                resp = JSON.parse(resp)

                displayCrimesItems(resp);
                // displayMenuButtons();
            }

        }
    });


}
function displayCrimesItems(crimesItems) {
    let displayCrimes = crimesItems.map(function (item) {
        return `<tr class="table-row">
                                                <td>
                                                    ${item.crime}
                                                </td>
                                                <td><button class="btn" onclick="archiveAppointment(${item.booking_id})" ><i class="fas fa-trash"></i></button></td>
                                            
                    </tr>
                     `;
    });
    displayCrimes = displayCrimes.join("");
    sectionCenter.innerHTML = displayCrimes;
}
function archiveAppointment(booking_id) {
    if (window.confirm("Do you really want send this to archives? ")) {
        $.ajax({
            url: '../ajax.php?action=delete_product',
            type: 'GET',
            data: {
                booking_id: booking_id
            },
            error: function () {
                toastr.error('Something is wrong, couldn\'t delete product', 'Error');
            },
            success: function (resp) {
                if (resp) {
                    resp = JSON.parse(resp)
                    if (resp == 1) {
                        toastr.warning("Can't delete, product in uses by stock", 'Warning');

                    }
                    if (resp === 2) {
                        toastr.success("Product deleted", 'Success');
                        getProducts();
                    }
                }
            }
        });
    }
}
function pagination() {
    function getPageList(totalPages, page, maxLength) {
        function range(start, end) {
            return Array.from(Array(end - start + 1), (_, i) => i + start);
        }
        var sideWidth = maxLength < 9 ? 1 : 2;
        var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
        var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;
        if (totalPages <= maxLength) {
            return range(1, totalPages);
        }
        if (page <= maxLength - sideWidth - 1 - rightWidth) {
            return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
        }
        if (page >= maxLength - sideWidth - 1 - rightWidth) {
            return range(1, sideWidth).concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages));
        }
        return range(1, sideWidth).concat(0, range(page - leftWidth, page - rightWidth), 0, range(totalPages - sideWidth + 1, totalPages));
    }
    $(function () {
        var numberOfItems = $(".table-content .table-row").length;
        var limitPerPage = 4; //how many table item to be visible per page
        var totalPages = Math.ceil(numberOfItems / limitPerPage);
        var paginationSize = 5; //how many pages element visible in the pagination
        var currentPage;

        function showPage(whichPage) {
            if (whichPage < 1 || whichPage > totalPages) return false;

            currentPage = whichPage;

            $(".table-content .table-row").hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();
            $(".pagination li").slice(1, -1).remove();
            getPageList(totalPages, currentPage, paginationSize).forEach(item => {
                $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots")
                    .toggleClass("active", item === currentPage).append($("<a>").addClass("page-link")
                        .attr({ href: "javascript:void(0)" }).text(item || "...")).insertBefore(".next-page");
            });
            $(".previous-page").toggleClass("disabled", currentPage === 1);
            $(".next-page").toggleClass("disabled", currentPage === totalPages);
            return true;
        }
        $(".pagination").append(
            $("<li>").addClass("page-item").addClass("previous-page").append($("<a>").addClass("page-link").attr({ href: "javascript:void(0)" }).text("Prev")),
            $("<li>").addClass("page-item").addClass("next-page").append($("<a>").addClass("page-link").attr({ href: "javascript:void(0)" }).text("Next")),
        )
        $(".table-content").show();
        showPage(1);

        $(document).on("click", ".pagination li.current-page:not(.active)", function () {
            return showPage(+$(this).text());
        });
        $(".next-page").on("click", function () {
            return showPage(currentPage + 1);
        });
        $(".previous-page").on("click", function () {
            return showPage(currentPage - 1);
        });
    });
}