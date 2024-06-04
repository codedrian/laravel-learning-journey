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
            /*NOTE: Edit logic here*/ /*TODO: FIX THE BUG, CANNOT TARGET THE TH VALUE*/
            $("form[name='edit-phonebook']").on('submit', async function (event) {
                event.preventDefault()
                const name = $(this).closest('tr').find('.name').text().trim()
                const contactNumber = $(this).closest('tr').find('.contact_number').text().trim();
                let id = $(this).closest('tr').find('.name').data('id');
                let action = $(this).attr('action');
                let csrfToken = $(this).find("input[name='_token']").val();
                console.log(csrfToken);

                const { value: formValues } = await Swal.fire({
                    title: "Multiple inputs",
                    html: `
                            <input type="hidden" id="swal-input1" class="swal2-input" name="_token" value="${csrfToken}">
                            <input type="hidden" id="swal-input2" class="swal2-input" name="id" value="${id}">
                            <input id="swal-input3" class="swal2-input" name="name" value="${name}">
                            <input id="swal-input4" class="swal2-input" name="contact_number" value="${contactNumber}">
                          `,
                    focusConfirm: false,
                    preConfirm: () => {
                        return [
                            document.getElementById("swal-input1").value,
                            document.getElementById("swal-input2").value,
                            document.getElementById("swal-input3").value,
                            document.getElementById("swal-input4").value,
                        ];
                    }
                });
                if (formValues) {
                    /*if formValues have value*/
                    console.log(formValues);
                    $.ajax({
                        url: action,
                        method: 'POST',
                        data: formValues,
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                        },
                        error: function (xhr) {
                            Swal.fire('Error!', 'Something went wrong!', 'error');
                        }
                    });
                }

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
