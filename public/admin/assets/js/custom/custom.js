
 $(document).ready(function() {
    $("#AddNoteButton").click(function(){
        $("#addNoteModal").modal('show');
    });

    $(".closeModal").click(function(){
        $("#addNoteModal").modal('hide');

    })

    $("#addNoteBtn").click(function(){
        let title = $("#title").val();
        let description = $("#description").val();

        const data ={
            title,
            description
        }

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: "/note/store",
            type: "POST",
            data: data,

            success: function (response) {
                // console.log("submit form data == : ", response);

                if (response.status === "success") {

                    $("#addNoteModal").modal("hide");

                    Swal.fire({
                                icon: 'success',
                                title: 'Product Updated',
                                text: 'The Product has been successfully update.',
                                timer: 5000,
                                showConfirmButton: true
                              })
                              showAllProductDataOnTabel();
                }

            },
            error: function (xhr, status, error) {
                console.log("Error: ", error);
                var response = JSON.parse(xhr.responseText);
                console.log("Error Message: ", response.message);
            },
        });
    });


    })
});


