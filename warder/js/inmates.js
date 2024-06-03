const sectionCenter = document.querySelector('.table-content');



//load item
window.addEventListener('DOMContentLoaded', function () {
    getInmates();
    getPrisons();
    getCrimes();

});

function getInmates() {

    $.ajax({
        url: '../ajax.php?action=get_inmates',
        type: 'GET',
        data: {
            id: 1,
        },
        error: function () {
            alert('Something is wrong, couldn\'t get inmates');
        },
        success: function (resp) {
            if (resp) {
                resp = JSON.parse(resp)

                displayInmatesItems(resp);
                // displayMenuButtons();
            }

        }
    });


}
function displayInmatesItems(inmatesItems) {
    let displayInmates = inmatesItems.map(function (item) {
        return `<tr class="table-row">
                                                <td>
                                                    ${item.code}
                                                </td>
                                                <td>${item.inmate}</td>
                                                
                                                <td>
                                                 <button class="btn" onclick="displayInmateInfo(${item.id})" ><i class="fas fa-info"></i></button>
                                                <button class="btn" onclick="archiveAppointment(${item.booking_id})" ><i class="fas fa-archive"></i></button></td>
                                            
                    </tr>
                     `;
    });
    displayInmates = displayInmates.join("");
    sectionCenter.innerHTML = displayInmates;
}
function displayInmateInfo(inmate_id) {
    var nw = window.open("", "_blank", "width=" + ($(window).width() * .8) + ",left=" + ($(window).width() *
        .1) + ",height=" + ($(window).height() * .8) + ",top=" + ($(window).height() * .1))
    nw.document.write($('head').html())
    nw.document.write($('noscript').html())
    nw.document.write($('#printable').html())
    nw.document.close()
    start_loader()
    setTimeout(() => {
        nw.print()
        setTimeout(() => {
            nw.close()
            end_loader()
        }, 200);
    }, 300);
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
function getPrisons() {
    $.ajax({
        type: "GET",
        url: '../ajax.php?action=get_prisons',
        data: 1,
        success: function (resp) {
            options = JSON.parse(resp)
            var select = document.getElementById("myPrison"); // Get the select element
            for (var i = select.options.length - 1; i > 0; i--) {
                select.remove(i);
            }

            options.forEach(option => {
                const optionElement = document.createElement(
                    "option"); // Create a new option element

                optionElement.value = option.id // Set the value attribute of the option element
                optionElement.text = option.prison; // Set the text content of the option element
                select.add(optionElement); // Add the option element to the select element
            });
        }
    });
}
function getCrimes() {
    $.ajax({
        type: "GET",
        url: '../ajax.php?action=get_crimes',
        data: 1,
        success: function (resp) {
            options = JSON.parse(resp)
            var select = document.getElementById("myCrime"); // Get the select element
            for (var i = select.options.length - 1; i > 0; i--) {
                select.remove(i);
            }

            options.forEach(option => {
                const optionElement = document.createElement(
                    "option"); // Create a new option element

                optionElement.value = option.id // Set the value attribute of the option element
                optionElement.text = option.crime; // Set the text content of the option element
                select.add(optionElement); // Add the option element to the select element
            });
        }
    });
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