<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AJAX PHP</title>
  </head>

  <body>
    <h2>Añadir a la base de datos</h2>
    <form action="" method="POST" id="form">
      <input type="text" name="name" placeholder="Nombre" />
      <input type="text" name="lastname" placeholder="Apellido" />
      <input type="submit" value="Enviar" />
    </form>
    <h2>Comprobar existencia en la base de datos</h2>
    <form action="" method="POST" id="formLogin">
      <input type="text" name="name" placeholder="Nombre" />
      <input type="text" name="lastname" placeholder="Apellido" />
      <input type="submit" value="Enviar" />
    </form>
    <h2>Optener información de la base de datos</h2>
    <button onclick="getData()">Obtener datos</button>
    <pre id="data"></pre>
    <script>
      document
        .getElementById('form')
        .addEventListener('submit', function (evt) {
          evt.preventDefault();
          console.log(evt.target);
          // var name = document.getElementById('name').value;
          // var lastname = document.getElementById('lastname').value;
          // var data = new FormData();
          // data.append('name', name);
          // data.append('lastname', lastname);
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'insert_user.php', true);
          xhr.onload = function () {
            document.getElementById('data').innerHTML = this.responseText;
            if (this.status == 200) {
              document.getElementById('data').innerHTML = this.responseText;
            }
          };
          // xhr.send(data);
          xhr.send(new FormData(evt.target));
        });

      document
        .getElementById('formLogin')
        .addEventListener('submit', function (evt) {
          evt.preventDefault();
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'check_user.php', true);
          xhr.onload = function () {
            document.getElementById('data').innerHTML = this.responseText;
            if (this.status == 200) {
              document.getElementById('data').innerHTML = this.responseText;
            }
          };
          xhr.send(new FormData(evt.target));
        });

      function getData() {
        var objXMLHttpRequest = new XMLHttpRequest();
        objXMLHttpRequest.onreadystatechange = function () {
          if (objXMLHttpRequest.readyState === 4) {
            if (objXMLHttpRequest.status === 200) {
              document.getElementById('data').innerHTML =
                objXMLHttpRequest.responseText;
            } else {
              alert('Error Code: ' + objXMLHttpRequest.status);
              alert('Error Message: ' + objXMLHttpRequest.statusText);
            }
          }
        };
        objXMLHttpRequest.open('GET', 'request_ajax_data.php');
        objXMLHttpRequest.send();
      }
    </script>
  </body>
</html>
