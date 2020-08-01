
$(document).ready(function () {
    function getMessages() {
        return new Promise((resolve) => {
            $.ajax({
                method: 'GET',
                url: '/messageboard-jerry/index.php/api/ControllerApi',
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
                    <th>留言者</th>
                    <th>留言內容</th>
                    <th>時間</th>
                    <th><input type="button" value="刪除" onclick="location.href=' http://127.0.0.1/messageboard-jerry/index.php/api/ControllerApi/remove/${message.id} '"></th>
                </tr>
                <tr>
                    <td>${message.author}</td>
                    <td>${message.liuyan}</td>
                    <td>${message.time}</td>
                    <td><input type="button" class="update" value="修改" onclick="location.href=' http://127.0.0.1/messageboard-jerry/index.php/MessageBoardController/edit/${message.id} '"></td>
                </tr>
            `)
        });
    })

});