<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="dist/assets/css/app.css">
</head>
<body>
<div class="wrapper" id="app">
    <header class="header">
        <div class="header-top header-desktop">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-1 col-md-2 ">
                        <div class="logo">
                            <img src="/dist/assets/images/LOGO.png"/>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-md-2">
                        <div class="address">
                            <img class="icon" src="/dist/assets/images/Vector.png"/>
                            <div>Ростов-на-Дону</div>
                            <div class="subtext">ул. Ленина, 2Б</div>
                        </div>
                    </div>
                    <div class="col-xxl-5 offset-xxl-4 col-md-6 offset-md-2">
                        <div class="right-part">
                            <div class="whatsapp">
                                <img src="/dist/assets/images/whatsapp.png"/>
                                <a href="tel: +7(863) 000 00 00">+7(863) 000 00 00</a>
                            </div>
                            <button class="btn btn-primary" onclick="swa()">Записаться на прием</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu">
            <div class="container">
                <ul class="menu">
                    <li class="menu-item">
                        <a href="#">О клинике</a>
                    </li>
                    <li class="menu-item">
                        <a href="#">Услуги</a>
                    </li>
                    <li class="menu-item">
                        <a href="#">Специалисты</a>
                    </li>
                    <li class="menu-item">
                        <a href="#">Цены</a>
                    </li>
                    <li class="menu-item">
                        <a href="#">О клинике</a>
                    </li>
                    <button class="btn btn-light btn-mobile" onclick="swa()">Записаться на прием</button>
                </ul>
            </div>
        </div>
        <div class="header-mobile">
            <div class="mobile-wrapper">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="logo">
                    <img src="/dist/assets/images/LOGO.png"/>
                </div>
                <div class="address">
                    <a href="tel: +7(863) 000 00 00">+7(863) 000 00 00</a>
                    <div>Ростов-на-Дону</div>
                </div>
            </div>
        </div>
    </header>
    <section class="main-banner">
        <div class="row">
            <div class="col-md-6 order-new-last">
                <div class="content-wrapper">
                    <div class="content">
                        <div class="title">Многопрофильная клиника для детей и взрослых</div>
                        <div class="text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 order-new-first">
                <img src="/dist/assets/images/background/main-img.png"/>
            </div>
        </div>
    </section>
    <section class="main-slider">
        <slider-component></slider-component>
    </section>
    <footer class="footer">
        <div id="overlay">
            <div class="popup">
                <button class="close" title="Закрыть окно" onclick="swa2()"></button>
                <form class="mail-form">
                    <div class="title">
                        <h4 class="text-center">Записаться на прием</h4>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="exampleInputEmail1" class="form-label">ФИО <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="fio" name="fio" placeholder="ФИО" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span style="color: red">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Телефон <span style="color: red">*</span></label>
                        <input type="tel" class="form-control tel" id="phone" name="phone" placeholder="+7 (999) 99 99 999" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
            <div class="alert alert-success success-form" role="alert">
                <button class="close" title="Закрыть окно" onclick="swa2()"></button>
                Ваша заявка отправлена!
            </div>
        </div>
        <div class="container">
            <div class="footer-menu">
                <a href="#" class="logo">
                    <img src="/dist/assets/images/LOGO-FOOTER.png">
                </a>
                <ul class="menu">
                    <li>
                        <a href="#">О клинике</a>
                    </li>
                    <li>
                        <a href="#">Услуги</a>
                    </li>
                    <li>
                        <a href="#">Специалисты</a>
                    </li>
                    <li>
                        <a href="#">Цены</a>
                    </li>
                    <li>
                        <a href="#">О клинике</a>
                    </li>
                </ul>
                <div class="social-link">
                    <img src="/dist/assets/images/instagram.png">
                    <img src="/dist/assets/images/whatsapp-footer.png">
                    <img src="/dist/assets/images/telegram.png">
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/dist/assets/js/app.js"></script>
</body>
</html>
<script>
    const b = document.getElementById('overlay');
    const feedback = document.querySelector('.feedback-form');
    function swa(){
        b.style.visibility = 'visible';
        b.style.opacity = '1';
        b.style.transition = 'all 0.7s ease-out 0s';
        const success = document.querySelector('.success-form');
        const popup = document.querySelector('.popup');
        popup.style.visibility = 'visible';
        popup.style.opacity = '1';
        popup.style.transition = 'all 0.7s ease-out 0s';
        success.style.visibility = 'hidden';
        success.style.opacity = '0';
        success.style.transition = 'all 0.7s ease-out 0s';
    }
    function swa2(){
        b.style.visibility = 'hidden';
        b.style.opacity = '0';
        const popup = document.querySelector('.popup');
        popup.style.visibility = 'hidden';
        popup.style.opacity = '0';
    }
</script>
