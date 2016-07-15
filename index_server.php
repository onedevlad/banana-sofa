
<?php $f=file_get_contents(dirname($_SERVER['SCRIPT_FILENAME']).'/scripts/config.json'); settype($f, 'string'); $parsed=json_decode($f, true);?>
<?php if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone']) && isset($_POST['color'])){mail($parsed['mail'], 'Новый заказ (iGlove)!', $_POST['surname'].' '.$_POST['name'].' (.'.$_POST['phone'].') заказал(а) iGlove, цвет: '.$_POST['color'].'.', "Content-type: text/plain; charset=utf-8");}?><!DOCTYPE html>
<html lang="uk">
  <head><script>var originalPrice='<?php echo $parsed["original-price"]; ?>'; var discount='<?php echo $parsed["discount-percent"]; ?>'; var newPrice='<?php echo $parsed["new-price"]; ?>'; var specialSuggestionPrice='<?php echo $parsed["special-suggestion"]; ?>';</script>
    <script type="text/javascript" async="" src="https://mc.yandex.ru/metrika/watch.js"></script>
    <script src="scripts/jquery.js"></script>
    <script src="scripts/mask.js"></script>
    <script defer src="scripts/custom.js"></script>
    <link rel="stylesheet" href="styles/custom.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>iGloves.in.ua</title>
  </head>
  <body>
    <div class="container-fluid screen-1">
      <div class="overlay">
        <div class="row header-info">
          <div class="col-md-4 header-info-left pull-left"><img src="images/np.png" alt=""><span>Доставка по всей Украине</span></div>
          <div class="col-md-2 pull-right header-info-right"><span>+38 (066) 881 06 22</span></div>
        </div>
        <div class="row divider">
          <div class="col-lg-12">
            <div class="left"></div>
            <div class="inner"></div>
            <div class="right"></div>
          </div>
        </div>
        <div class="row header">
          <h1>iGlove</h1>
        </div>
        <div class="row order-box-wrapper">
          <div class="col-sm-5 desc-box">
            <h3>Пользоваться смартфоном в зимнее время стало удобнее!</h3>
            <iframe src="https://www.youtube.com/embed/xsp91M4ifz0" frameborder="0" allowfullscreen class="video"></iframe>
          </div>
          <div class="col-sm-4 col-sm-push-3 order-box">
            <div class="discount"><img src="images/discount.png" alt="" class="discount-img">
              <nobr class="discount-text">-<span class="discount-value">65</span>%</nobr>
            </div>
            <h3>Закажите сейчас</h3><span class="original-price"><span class="original-price-value"></span> грн</span><span class="new-price">Новая цена: <span class="new-price-value"></span> грн</span>
            <hr>
            <form id="special-form" method="POST">
              <table>
                <tr>
                  <td class="left"><span>Ваше имя:</span></td>
                  <td class="right">
                    <input id="special-name" name="name" size="18">
                  </td>
                </tr>
                <tr>
                  <td class="left"><span>Ваша фамилия:</span></td>
                  <td class="right">
                    <input id="special-surname" name="surname" size="18">
                  </td>
                </tr>
                <tr>
                  <td class="left"><span>Номер телефона:</span></td>
                  <td class="right">
                    <input id="special-phone" name="phone" size="18">
                  </td>
                </tr>
                <tr>
                  <td class="left"><span>Цвет перчаток:</span></td>
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
            </form>
            <button id="special-order" class="order">Заказать!</button>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid screen-2">
      <div class="container">
        <h1>Преимущества перчаток</h1>
        <div class="row properties">
          <div class="col-md-3"><img src="images/devices.png" alt=""><span> <b>iGlove </b>- это универсальные перчатки, которые подойдут к любому устройству</span></div>
          <div class="col-md-3"><img src="images/energy.png" alt=""><span>Благодаря уникальной технологии Touch Silver энергия от пальцев легко проходит к экрану </span></div>
          <div class="col-md-3"><img src="images/ok.png" alt=""><span>Многолетний опыт использования <b>iGlove </b>показывает качество, практичность и<br>удобство таких перчаток</span></div>
          <div class="col-md-3"><img src="images/glove.png" alt=""><span>Перчатки подойдут каждому, независимо от размера руки</span></div>
        </div>
      </div>
      <div class="row divider">
        <div class="col-lg-12">
          <div class="left"></div>
          <div class="inner"></div>
          <div class="right"></div>
        </div>
      </div>
    </div>
    <div class="container-fluid screen-3">
      <h1>Характеристики</h1>
      <div class="row desc">
        <div class="hidden-xs hidden-sm line line-1"></div>
        <div class="hidden-xs hidden-sm line line-2"></div>
        <div class="hidden-xs hidden-sm line line-3"></div>
        <div class="hidden-xs hidden-sm line line-4"></div>
        <div class="col-sm-3 hidden-xs hidden-sm desc-text"><span class="desc-text-1">Современный стиль</span><span class="desc-text-3">Сильные морозы вам не страшны!</span></div>
        <div class="col-sm-6 col-sm-offset-3 col-md-offset-0 desc-img"><img src="images/gloves-benefits.png"></div>
        <div class="col-sm-3 hidden-xs hidden-sm desc-text"><span class="desc-text-2">Состав:<br>75% - акрил,<br>20% - шерсть,<br>5% - электропроводящая нить</span><span class="desc-text-4">iGlove не боятся стирки</span></div>
        <div class="col-xs-12 hidden-md hidden-lg"><span class="desc-text-1">Современный стиль</span><span class="desc-text-2">Состав:<br>75% - акрил,<br>20% - шерсть,<br>5% - электропроводящая нить</span><span class="desc-text-3">Сильные морозы вам не страшны!</span><span class="desc-text-4">iGlove не боятся стирки</span></div>
      </div>
      <button class="order">Заказать сейчас!</button>
      <div class="row divider">
        <div class="col-lg-12">
          <div class="left"></div>
          <div class="inner"></div>
          <div class="right"></div>
        </div>
      </div>
    </div>
    <div class="container-fluid screen-4">
      <div class="row description-title">
        <h1>Выберите свой iGlove</h1>
      </div>
      <div class="row description">
        <div class="col-md-3"><img src="images/black.png" alt=""><span>Черный</span></div>
        <div class="col-md-3"><img src="images/pink.png" alt=""><span>Розовый</span></div>
        <div class="col-md-3"><img src="images/gray.png" alt=""><span>Серый</span></div>
        <div class="col-md-3"><img src="images/blue.png" alt=""><span>Голубой</span></div>
      </div>
      <div class="row divider">
        <div class="col-lg-12">
          <div class="left"></div>
          <div class="inner"></div>
          <div class="right"></div>
        </div>
      </div>
    </div>
    <div class="container-fluid screen-5">
      <h1>1+1</h1>
      <div class="row"><span class="special-suggestion">Цена на второю пару iGlove &mdash; всего <span class="red-selection"><span class="special-suggestion-price"></span>грн!</span></span></div>
      <div class="row">
        <div class="col-sm-5"><img src="images/black-left.png" class="img-left"></div>
        <div class="col-sm-2 plus-sign"><span>+</span></div>
        <div class="col-sm-5"><img src="images/black.png" class="img-right"></div>
      </div>
      <div class="row divider">
        <div class="col-lg-12">
          <div class="left"></div>
          <div class="inner"></div>
          <div class="right"></div>
        </div>
      </div>
    </div>
    <div class="container-fluid screen-6">
      <div class="row description-title">
        <h1 class="col-lg-12">Как мы работаем</h1>
      </div>
      <div class="row description">
        <div class="col-md-3"><img src="images/form.png" alt=""><span>Заполните форму заказа</span></div>
        <div class="col-md-3"><img src="images/reply.png" alt=""><span>Мы свяжемся с вами в течение часа</span></div>
        <div class="col-md-3"><img src="images/edit.png" alt=""><span>Уточните детали заказа</span></div>
        <div class="col-md-3"><img src="images/deliever.png" alt=""><span>Получите ваш заказ</span></div>
      </div>
      <div class="row divider">
        <div class="col-lg-12">
          <div class="left"></div>
          <div class="inner"></div>
          <div class="right"></div>
        </div>
      </div>
    </div>
    <div id="order-screen" class="container-fluid screen-7">
      <h1>Закажите iGloves со скидкой</h1>
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
              <td class="left"><span>Цвет перчаток:</span></td>
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
        </form>
        <button id="order" class="order">Отправить заказ</button>
      </center>
    </div>
  </body>
</html>