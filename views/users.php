<div class="container">
  <div class="row float-right m-4">
      <button type="button" id="create_user_btn" class="btn btn-success">+</button>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Supprimer</th>
        <th scope="col">Modifier</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
        <td><button type="button" class="btn btn-info">Modifier</button></td>
      </tr>
    </tbody>
  </table>
</div>

<script>
  $(document).ready(function () {
    $('#create_user_btn').click(function () {
        $.ajax({
          type: "POST",
          url: "controller/Controller.php",
          data: {
            "route": "create_user",
            "name": "Antoine"

          },
          datatype: "text/html",
          success: function (response) {
            var datosJSON = JSON.parse(response);
            console.log(datosJSON);
          },
          fail: function (response) {
            console.log('request failed' + response);
          }
        });    
      });
  });
</script>