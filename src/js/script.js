document.addEventListener("DOMContentLoaded", function() {
    window.addEventListener("DOMContentLoaded", function() {
        [].forEach.call( document.querySelectorAll('.tel'), function(input) {
            var keyCode;
            function mask(event) {
                event.keyCode && (keyCode = event.keyCode);
                var pos = this.selectionStart;
                if (pos < 3) event.preventDefault();
                var matrix = "+7 (___) ___ ____",
                        i = 0,
                        def = matrix.replace(/\D/g, ""),
                        val = this.value.replace(/\D/g, ""),
                        new_value = matrix.replace(/[_\d]/g, function(a) {
                            return i < val.length ? val.charAt(i++) || def.charAt(i) : a
                        });
                i = new_value.indexOf("_");
                if (i != -1) {
                    i < 5 && (i = 3);
                    new_value = new_value.slice(0, i)
                }
                var reg = matrix.substr(0, this.value.length).replace(/_+/g,
                        function(a) {
                            return "\\d{1," + a.length + "}"
                        }).replace(/[+()]/g, "\\$&");
                reg = new RegExp("^" + reg + "$");
                if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
                if (event.type == "blur" && this.value.length < 5)  this.value = ""
            }

            input.addEventListener("input", mask, false);
            input.addEventListener("focus", mask, false);
            input.addEventListener("blur", mask, false);
            input.addEventListener("keydown", mask, false)
        });
    });
    const form = document.querySelector('.mail-form');
    form.addEventListener('submit',function(event){
        event.preventDefault();
        let name = document.getElementById('fio').value;
        let phone = document.getElementById('phone').value;
        let email = document.getElementById('email').value;
        const data = {
            name: name,
            phone: phone,
            email: email,
        };
        $.ajax({
            type: 'POST',
            url: '/ajax/postForm.php', //обращаемся к обработчику
            data:data,
            success: function(data) {  //в случае успеха выводим результаты в div "results"
                if(data == 'success'){
                    const success = document.querySelector('.success-form');
                    const popup = document.querySelector('.popup');
                    console.log(popup);
                    popup.style.visibility = 'hidden';
                    popup.style.opacity = '0';
                    popup.style.transition = 'all 0.7s ease-out 0s';
                    success.style.visibility = 'visible';
                    success.style.opacity = '1';
                    success.style.transition = 'all 0.7s ease-out 0s';
                }
            },
            error:  function(xhr, str){ //ошибка выводит соответствующее сообщение
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });
    });
    window.addEventListener('DOMContentLoaded', () => {
        const menu = document.querySelector('.header-menu'),
                menuItem = document.querySelectorAll('.menu_item'),
                hamburger = document.querySelector('.hamburger'),
                body = document.querySelector('body');
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('hamburger_active');
            menu.classList.toggle('header-menu_active');
            body.classList.toggle('o-hidd');
        });

        menuItem.forEach(item => {
            item.addEventListener('click', () => {
                hamburger.classList.toggle('hamburger_active');
                menu.classList.toggle('menu_active');
                body.style.overflow = 'auto';
            })
        })
    })
    // const slidesToShow = 2;
    // const slidesToScroll = 1;
    // const items = document.querySelectorAll('.slider-item');
    // const container = document.querySelector('.slider-container');
    // const track = document.querySelector('.slider-track');
    // const btnPrev = document.querySelector('.btn-prev');
    // const btnNext = document.querySelector('.btn-next');
    // const itemWidth = container.clientWidth / slidesToShow;
    // const movePosition = slidesToScroll * itemWidth;
    // const itemsCount = items.length;
    // let position = 0;
    // items.forEach((item) => {
    //     item.style.minWidth = `${itemWidth}px`;
    // })
    // btnPrev.addEventListener('click', ()=>{
    //     const itemsLeft = Math.abs(position) / itemWidth;
    //     console.log(position);
    //     position += itemsLeft >= slidesToScroll ? movePosition : itemsLeft * itemWidth;
    //     setPosition();
    //     checkBtn();
    // });
    // btnNext.addEventListener('click', ()=>{
    //     const itemsLeft = itemsCount - (Math.abs(position) + slidesToShow * itemWidth) / itemWidth;
    //     position -= itemsLeft >= slidesToScroll ? movePosition : itemsLeft * itemWidth;
    //     setPosition();
    //     checkBtn();
    // });
    // const setPosition = () => {
    //     track.style.transform = `translateX(${position}px)`;
    // };
    // const checkBtn = () => {
    //     btnPrev.disabled = position === 0;
    //     btnNext.disabled = position <= -(itemsCount - slidesToShow) * itemWidth;
    // }
    // checkBtn();

});
