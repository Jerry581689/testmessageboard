$(document).ready(function () {
  $.ajax({
    type: 'GET',
    url: 'http://127.0.0.1/messageboard-jerry/index.php/api/ControllerApi/',
    success: function (response) {
      $('thead').append(`
        <tr>
          <th for="input-user">姓名</th>
          <th>
            <input name="input-user" placeholder="name" />
          </th>
        </tr>
        <tr>
          <th align="center" for="input-content">留言</th>
          <th align="center">
            <textarea name="input-content" placeholder="message"></textarea>
          </th>
        </tr>
        `);
    }
  });

  $(document).on("click", "#create1", function () {
    let name = $("input[name='input-user']").val();
    let content = $("textarea[name='input-content']").val();
    $.ajax({
      type: 'POST',
      url: 'http://127.0.0.1/messageboard-jerry/index.php/api/ControllerApi/create/',
      dataType: 'JSON',
      data: {
        'name': name,
        'content': content,
      },
      success: function (response) {
        window.location = "http://127.0.0.1/messageboard-jerry/"
        console.log(response);
      }
    })
  });
});