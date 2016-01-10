<div class="fast-order">
    <form class="fast-order-form-tag">
        <div class="fast-order-title">
            Быстрый заказ
        </div>
        <div class="fast-order-form">
            <div class="fast-order-text">Пожалуйста, укажите имя и свой номер телефона, чтобы мы могли связаться с Вами.</div>
            <div class="fast-order-inputs">
                <input class="fast-order-form-name" required name="name" placeholder="Имя"  oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Введите свое имя')">
                <input class="fast-order-form-phone" type="tel" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Введите корректный номер телефона')" pattern="[\+0-9 \-\(\)]+" required name="phone" placeholder="Телефон"></div>
            <div class="fast-order-comment">
                <textarea class="fast-order-form-comment" cols="50" rows="7" name="comment" placeholder="Комментарий"></textarea>
            </div>
        </div>
        <div class="fast-order-submit">
            <input class="fast-order-submit-button button" type="submit" value="Заказать">
            <span class="fast-order-success">Ваш заказ приянт. Наш менеджер в ближайшее время с Вами свяжется.</span>
            <span class="fast-order-failure">Ошибка при создании заказа. Попробуйте повторить свой заказ.</span>
        </div>
    </form>
</div>
<script>
    <?
    $rnd = md5(rand());
    Yii::app()->session->add("verifyCode", $rnd);
    ?>
    $( document ).ready(function() {
        $('.fast-order-form-tag').submit(function () {
            $('.fast-order-submit-button').prop('disabled', true);
            $('.fast-order-success').hide();
            $('.fast-order-failure').hide();
            var data = {
                name: $('.fast-order-form-name').val(),
                phone: $('.fast-order-form-phone').val(),
                comment: $('.fast-order-form-comment').val(),
                verifyCode: '<?=$rnd?>'
            };
            $.get('/site/order/', data, function (resp) {
                //$('.fast-order-submit-button').prop('disabled', false);
                console.log(resp);
                console.log(resp.code);
                if( resp.code == 'ok' ) {
                    $('.fast-order-success').show();
                } else {
                    $('.fast-order-failure').show();
                }
            });
            return false;
        });
    });
</script>