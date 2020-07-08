
$(document).ready(function () {
    function getMessages() {
        return new Promise((resolve) => {
            $.ajax({
                method: 'GET',
                url: 'http://127.0.0.1/messageboard-jerry/index.php/api/ControllerApi',
                dataType: 'json',
                success: (response) => {
                    //console.log(data);
                    resolve(response);
                }
            });
        })
    }


    getMessages().then((messages) => {
        messages.forEach((message) => {
            $('thead').append(`
        <tr>
            <th width="100px" height="50px">留言者</th>
            <th width="100px" height="50px">${message.author}</th>
            <th width="100px" height="50px">時間</th>
            <th width="100px" height="50px">${message.time}</th>
            <th width="100px" height="50px"><input type="button" value="刪除" onclick="location.href=' http://127.0.0.1/messageboard-jerry/index.php/api/ControllerApi/remove/${message.id} '"></th>
            </tr>
        <tr>
          <td align="center" width="100px">留言內容</td>
          <td width="100px" height="50px" colspan="3" align="center">${message.liuyan}</td>
          <td align="center" width="100px"><input type="button" class="update" value="修改" onclick="location.href=' http://127.0.0.1/messageboard-jerry/index.php/MessageBoardController/edit/${message.id} '"></td>
        </tr>
        `)
        });
    })

});