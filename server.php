
<?php $f=file_get_contents(dirname($_SERVER['SCRIPT_FILENAME']).'/scripts/config.json'); settype($f, 'string'); $parsed=json_decode($f, true);?>
<?php if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone']) && isset($_POST['color'])){mail($parsed['mail'], 'Новый заказ (Banana Air)!', $_POST['surname'].' '.$_POST['name'].' (.'.$_POST['phone'].') заказал(а) Banana Air, цвет: '.$_POST['color'].'.', "Content-type: text/plain; charset=utf-8");}?><!DOCTYPE html>
<html lang="uk">
  <head>
    <script src="scripts/jquery.js"></script>
    <script src="scripts/mask.js"></script>
    <script defer src="scripts/custom.js"></script>
    <script src="styles/bootstrap/js/modal.js"></script>
    <script defer src="styles/slick/slick.min.js"></script>
    <link rel="stylesheet" href="styles/custom.css">
    <link rel="stylesheet" href="styles/slick/slick.css">
    <link rel="stylesheet" href="styles/slick/slick-theme.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Banana Air</title>
  </head>
  <body>
    <div class="container-fluid screen-1">
      <div class="overlay">
        <div class="row header-info">
          <div class="col-md-4 header-info-left"><img src="images/np.png" alt="Нова Пошта"><span class="delivery-desc">Доставка по <span class='xs-hidden'>всей</span> Украине</span></div>
          <div class="col-md-2 col-md-offset-1 header-info-center"><img src="images/ukraine-map.png" alt="Ukraine"></div>
          <div class="col-md-2 col-md-offset-3 header-info-right"><span>+38 (066) 881 06 22</span></div>
        </div>
        <div class="row intro">
          <div class="col-md-6 intro-text">
            <div class="row">
              <h1 class="intro-main">Banana Air</h1><span class="intro-secondary">Сделай свое лето более комфортным!</span>
            </div>
          </div>
          <div class="col-md-6 intro-img"><img src="images/yellow-sofa.png" alt="Yellow Sofa"></div>
        </div>
        <div class="row">
          <div class="col-md-6 order-info">
            <div class="col-xs-12 price"><span>1999грн</span></div>
            <div class="col-xs-12 button">
              <button class="order order-yellow">Заказать!</button>
            </div>
          </div>
          <div class="col-md-6 benefits">
            <ul>
              <li>Не нужен насос</li>
              <li>Компактный, прочный и легкий</li>
              <li>Готов к использованию за 20 секунд</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid screen-2">
      <div class="row overlay">
        <div class="row">
          <div class="col-xs-12 video-header">
            <h1>Банан надувается без насоса, смотри как легко:</h1>
          </div>
        </div>
        <div class="row">
          <video preload="preload" controls="controls" class="col-xs-12 col-sm-8 col-sm-offset-2">
            <source src="video/usingSofa.mp4">
            <source src="video/usingSofa.webm">
          </video>
        </div>
      </div>
    </div>
    <div class="container-fluid screen-3">
      <div class="row">
        <div class="slick-slider col-xs-8 col-xs-offset-2"><img src="images/slider/0.jpg"><img src="images/slider/1.jpg"><img src="images/slider/2.jpg"></div>
      </div>
    </div>
    <div id="order-screen" class="container-fluid screen-4">
      <div id="order-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <div class="container-fluid">
                <h4>Заказажите Banana Air со скидкой!</h4>
                <button type="button" data-dismiss="modal" class="btn btn-danger close pull-right">&times;</button>
              </div>
            </div>
            <div class="modal-body">
              <center>
                <form id="form" method="post">
                  <table>
                    <tr>
                      <td>Ваше имя:</td>
                      <td>
                        <input id="name" type="text" autocomplete="off" name="name">
                      </td>
                    </tr>
                    <tr>
                      <td>Ваша фамилия:</td>
                      <td>
                        <input id="surname" type="text" autocomplete="off" name="surname">
                      </td>
                    </tr>
                    <tr>
                      <td>Номер телефона:</td>
                      <td>
                        <input id="phone" type="text" autocomplete="off" name="phone">
                      </td>
                    </tr>
                    <tr>
                      <td class="left"><span>Цвет:</span></td>
                      <td class="right">
                        <select name="color">
                          <option>Черный</option>
                          <option>Розовый</option>
                          <option>Серый</option>
                          <option>Голубой</option>
                        </select>
                      </td>
                    </tr>
                  </table>
                  <div class="button-wrapper">
                    <button id="order" class="order order-yellow">Отправить заказ</button>
                  </div>
                </form>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>