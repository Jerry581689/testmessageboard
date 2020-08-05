
$(document).ready(function () {

    function getMessages() {
        return new Promise((resolve) => {
            $.ajax({
                method: 'GET',
                url: '/wednesday/index.php/api/ControllerApi',
                dataType: 'json',
                success: (response) => {
                    console.log(response);
                    resolve(response);
                }
            });
        })
    }
    getMessages().then((messages) => {
        messages.forEach((message) => {
            $('thead').append(`
                <tr>
                    <td>${message.author}</td>
                    <td>${message.liuyan}</td>
                    <td>${message.time}</td>
                    <td width="100px">
                        <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModal" data-whatever="${message.liuyan}" data-what="${message.id}">修改</button>
                        <button type="button" class="btn btn-outline-light" onclick="location.href=' http://127.0.0.1/wednesday/index.php/api/ControllerApi/remove/${message.id} '">刪除</button>
                    </td>
                </tr>
            `)
        });
    })

    $('#create1').on("click", function () {
        let name = $("input[name='input-user']").val();
        let content = $("textarea[name='input-content']").val();
        $.ajax({
            type: 'POST',
            url: 'http://127.0.0.1/wednesday/index.php/api/ControllerApi/create/',
            dataType: 'JSON',
            data: {
                'name': name,
                'content': content,
            },
            success: function (response) {
                console.log(response);
                $.each(response, function (key, val) {
                    alert(val);
                    //Swal.fire(val);
                });
                // $('thead').append(`
                // <tr>
                //     <td>${message.author}</td>
                //     <td>${message.liuyan}</td>
                //     <td>${message.time}</td>
                //     <td width="100px">
                //         <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModal" data-whatever="${message.liuyan}" data-what="${message.id}">修改</button>
                //         <button type="button" class="btn btn-outline-light" onclick="location.href=' http://127.0.0.1/wednesday/index.php/api/ControllerApi/remove/${message.id} '">刪除</button>
                //     </td>
                // </tr>
                // `);
                console.log(response);
                window.location = "http://127.0.0.1/wednesday/";
            }
        })
    });

    //function EditMessage() {
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var id = button.data('what');
            console.log(recipient + id);
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('修改留言 ');
            modal.find('.modal-body input').val(recipient);

            $('#editcheck').on("click", function () {
                let changemessage = $("#recipient-name").val();
                $.ajax({
                    type: 'POST',
                    url: 'http://127.0.0.1/wednesday/index.php/api/ControllerApi/update/' + id,
                    dataType: 'JSON',
                    data: {
                        'changemessage': changemessage,
                    },
                    success: function (response) {
                        $.each(response, function (key, val) {
                            alert(val);
                            window.location = "http://127.0.0.1/wednesday/"
                        });
                        console.log(response);
                    }
                })
            })
        })
    //}

});