<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loading...</title>
  <style>
    body {
      background-color: #151515;
      font-family: 'Courier New', Courier, monospace;
    }

    .loading {
      position: absolute;
      top: 40%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .title {
      color: #999;
      font-style: italic;
      font-size: 30px;
      font-weight: 300px;
      text-align: center;
      margin-bottom: 50px;
    }

    .progress-bar {
      width: 406px;
      height: 10px;
      background: #111;
      border-radius: 7px;
      padding: 3px;
      box-sizing: border-box;
    }

    .progress {
      width: 10px;
      height: 5px;
      background: white;
      border-radius: 7px;
    }
  </style>
</head>

<body>
  <div class="loading">
    <div class="title">Loading...</div>
    <div class="progress-bar">
      <div class="progress"></div>
    </div>
  </div>

  <script>
    function progress() {
      let progress = document.querySelector(".progress");
      let step = 16;
      let loading = setInterval(move, 50);

      function move() {
        if (step == 400) {
          clearInterval(loading);
          document.location = "auth/login.php";
        } else {
          step += 4;
          progress.style.width = step + "px";
        }
      }
    }
    progress();
  </script>
</body>

</html>