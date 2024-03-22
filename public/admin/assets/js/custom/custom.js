    $("#AddNoteButton").click(function(){
        $("#addNoteModal").modal('show');
        $("#title").val('');
        $("#description").val('');
    });

    $(".closeModal").click(function(){
        $("#addNoteModal").modal('hide');

    })

    //dynamic table start here
    const showAllNote=(data)=>{
        let container = $('#noteContainer');
        container.empty();

        if (data.length === 0) {
            container.append('<div class="col-12"><p>No notes found.</p></div>');
            return;
        }

        $.each(data, function(index, note) {
            let cardHtml = `
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 g-1 pb-2">
                    <div class="card shadow-md">
                        <div class="card-header">
                            <h5 class="card-title">${note.title}</h5>
                            <span class="d-block">Creation Date: ${formatDate(note.created_at)}</span>
                            <span>Last Modified Date :${formatDate(note.updated_at)}</span>

                        </div>
                        <div class="card-body">
                            <p class="card-text">${note.description}</p>
                        </div>
                        <div class="card-footer" >
                        <button onClick="editNote(event)" value="${note.id}" class="btn btn-success btn-sm">Edit</button>
                        <button class="btn btn-success btn-sm" onClick="deleteNote(event)" value="${note.id}">Delete</button>

                        </div>
                    </div>
                </div>
            `;

            container.append(cardHtml);
        });
    }
    //dynamic table end here


    

    //dynamic formateDate start here
    const formatDate = (dateString) => {
        const date = new Date(dateString);
        const options = { day: '2-digit', month: 'short', year: 'numeric' };
        return date.toLocaleDateString('en-GB', options);
    };
    //dynamic formateDate end here


    //get all note start here
    const getAllNote = () => {
        $.ajax({
            url: "/get/note",
            type: "GET",
            success: function (response) {
                // console.log("Get All Note  == : ", response);

                if (response.status === "success") {
                    showAllNote(response.allNote);
                }
            },
            error: function (xhr, status, error) {
                console.log("Error: ", error);
                var response = JSON.parse(xhr.responseText);
                console.log("Error Message: ", response.message);
            }
        });
    };
    //get all note end here

    //call getAllNote() for showing the dynamic note
    getAllNote();

    //add note start here

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
                console.log("submit form data == : ", response);

                if (response.status === "success") {

                    $("#addNoteModal").modal('hide');

                    Swal.fire({
                                icon: 'success',
                                title: 'Note Added',
                                text: 'The Note has been successfully added.',
                                timer: 5000,
                                showConfirmButton: true
                              })
                              getAllNote();
                            }

            },
            error: function (xhr, status, error) {
                console.log("Error: ", error);
                var response = JSON.parse(xhr.responseText);
                console.log("Error Message: ", response.message);
            },
        });
    });

    //add note end here


//edit note start here

function editNote(event) {
    event.preventDefault();
    $("#editNoteModal").modal('show');
    const noteId = event.target.value;
    $("#updateNoteBtn").val(noteId);


    $.ajax({
        url: "/note/edit/"+noteId,
        type: "GET",
        success: function (response) {
            console.log("submit form data == : ", response);

            if (response.status === "success") {
                $("#titleE").val(response.note.title);
                $("#descriptionE").text(response.note.description);

                console.log("Note title:", response.note.title);
            }
        },
        error: function (xhr, status, error) {
            console.log("Error: ", error);
            var response = JSON.parse(xhr.responseText);
            console.log("Error Message: ", response.message);
        }
    });


}
//edit note end here



//update note start here

$("#updateNoteBtn").click(function(event){
    event.preventDefault();
    const noteId = event.target.value;

    let title =  $("#titleE").val();
    let description =  $("#descriptionE").val();

    const data={
        noteId,
        title,
        description

    }
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/note/update",
        type: "POST",
        data: data,

        success: function (response) {
            console.log("submit form data == : ", response);

            if (response.status === "success") {

                $("#editNoteModal").modal('hide');

                Swal.fire({
                            icon: 'success',
                            title: 'Note Updated',
                            text: 'The Note has been successfully update.',
                            timer: 5000,
                            showConfirmButton: true
                          })
                          getAllNote();
                        }

        },
        error: function (xhr, status, error) {
            console.log("Error: ", error);
            var response = JSON.parse(xhr.responseText);
            console.log("Error Message: ", response.message);
        },
    });
    console.log("smakdlnas",data);


})
//delete note end here



//delete note start here

function deleteNote(event){
    event.preventDefault();
    const noteId = event.target.value;

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      })
    .then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/note/delete/"+noteId,
                type: "GET",
                success: function (res) {
                    if (res.status === "success") {

                        Swal.fire({
                            title:"Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                          });
                        getAllNote();

                    }
                },
            });
        }
      });

}
//delete note end here



//search by note title start here
$("#searchByTile").on("input", function(event) {
    let searchValue = event.target.value;

    $.ajax({
        url: "/get/note",
        type: "GET",
        data: {searchValue },
        success: function (response) {
            // console.log("Get All Note  == : ", response);

            if (response.status === "success"){
                showAllNote(response.allNote);
            }
        },
        error: function (xhr, status, error) {
            console.log("Error: ", error);
            var response = JSON.parse(xhr.responseText);
            console.log("Error Message: ", response.message);
        }
    });

});
//search by note title end here



