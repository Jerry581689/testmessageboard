$(document).ready(function () {
    var url = location.href;
    var ary1 = url.split('edit/');
    var id = ary1[1];
    console.log(id);
    $.ajax({
        type: 'GET',
        url: 'http://127.0.0.1/messageboard-jerry/index.php/api/ControllerApi/',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (data, messages) {
                console.log(messages);
                if (messages.id == id) {
                    $('thead').append(`
            <tr>
            <th width="100px">留言者</th>
            <th width="100px" colspan="2">${messages.author}</th>
            <th width="100px" name="time">時間</th>
            <th width="100px" colspan="2">${messages.time}</th>
            </tr>
            <tr>
            <td align="center" width="100px">原留言內容</td>
            <td width="100px" colspan="2" align="center">${messages.liuyan}</td>
            <form class="editmessage"  method="POST">
            <td align="center" width="100px">修改為</td>
                <td align="center">
                    <textarea name="changemessage" placeholder="Your Message"></textarea>
                </td>
                <td align="center">
                <input id="edit1" type="submit"  value="修改確定" />
                </td>
            </form>
            </tr>
        `);
                }
            });
        }
    });

    $(document).on("click", "#edit1", function () {
        let changemessage = $("textarea[name='changemessage']").val();
        console.log(changemessage);
        $.ajax({
            type: 'POST',
            url: 'http://127.0.0.1/messageboard-jerry/index.php/api/ControllerApi/update/' + id,
            dataType: 'JSON',
            data: {
                'changemessage': changemessage,
            },
            success: function (response) {
                window.location = "http://127.0.0.1/messageboard-jerry/"
                console.log(response);
            }
        })
    });
});