<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @vite('./resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function(){
            $('#profile').on('click', function () {
                $('#profile-dropdown').toggle();
            })

            $("form[name='destroy-contact']").on('submit', function (event) {
                event.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    /*If user click the confirm button*/
                }).then((result) => {
                    if (result.isConfirmed) {
                        let contact = $(this).closest('tr');
                        let action = $(this).attr('action');
                        let formData = new FormData(this);

                        $.ajax({
                            url: action,
                            method: 'POST',
                            data: formData,
                            dataType: 'json',
                            processData : false,
                            contentType:false,
                            success: function(response) {
                                contact.remove();
                                if (response) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: "Theres a problem deleting the contact. Please try again later.",
                                        icon: "warning"
                                    })
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log('Error deleting contact:', jqXHR, textStatus, errorThrown);
                            }
                        });

                    }
                });
            });
        });

    </script>
</head>
<body>
<x-navbar></x-navbar>
<h1>Contacts {{ Auth::user()->name }}</h1>
<x-contact-table :contacts="$contacts"/>


</body>
</html>
