$(document).on('click', '.delete-button', function (e) {
    e.preventDefault();

    var form = $(this).closest('form');
    var link = form.attr("action");

    Swal.fire({
        title: 'Are you sure?',
        text: "Delete This Data?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Menggunakan metode DELETE
            $.ajax({
                url: link,
                method: 'DELETE',
                data: form.serialize(),  // Menggunakan serialize untuk mengirim _token
                success: function (response) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    // Lakukan sesuatu setelah penghapusan berhasil
                },
                error: function () {
                    // Handle error jika terjadi kesalahan pada penghapusan
                    Swal.fire(
                        'Error!',
                        'Failed to delete the file.',
                        'error'
                    )
                }
            });
        }
    });
});
