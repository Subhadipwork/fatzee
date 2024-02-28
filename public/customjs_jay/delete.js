$(document).ready(function () {
    $(".delete").on("click", function (e) {
        e.preventDefault();

        // Function to create and configure a Toast
        function createToast(icon, title) {
            return Swal.mixin({
                toast: true,
                position: "top-right",
                iconColor: icon || "success",
                customClass: {
                    popup: "colored-toast",
                },
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            }).fire({
                icon: icon || "success",
                title: title || "Default Message",
            });
        }

        var $this = $(this);
        var url = $this.data("link");
        var token = $this.data("token");

        if (!url) {
            alert("Url not found in data attribute");
            return;
        }
        if (!token) {
            if (!token) {
                token = "{{ csrf_token() }}";
                $this.attr("data-token", token);
            }
        }

        // Create dynamic Swal.fire options
        var swalOptions = {
            title: "Are you sure you want to delete this row?",
            text: "It will be gone forever",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        };

        // Use dynamic options for Swal.fire
        Swal.fire(swalOptions).then((willDelete) => {
            if (willDelete.isConfirmed) {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: token,
                        _method: "DELETE",
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.status == "success") {
                            createToast("success", response.message);

                            // Dynamically handle row removal
                            setTimeout(function () {
                                try {
                                    var row = $this.closest("tr");
                                    row.fadeOut();

                                    if (row.is(":last-child")) {
                                        row.closest("table")
                                            .find("tr:last-child")
                                            .remove();
                                    }
                                } catch (error) {
                                    location.reload();
                                }
                            }, 1500);
                        }
                    },
                    error: function (error) {
                        console.log(error);
                        console.log(error.responseJSON);
                    },
                });
            }
        });
    });
});
