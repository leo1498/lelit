<div class="popup">
    <div class="popup__container">
        <div class="popup__wrapper">
            <div class="formbox">
                <div class="formbox-text">
                    <span>Замовте зараз</span>
                    <p>та наш менеджер перездвонить Вам за 10 хвилин!</p>
                </div>
                <form id="order_form" class="main-order-form main-form" action="zakaz.php" method="post">
                    <input type="hidden" name="productsList">
                    <input class="field" name="name" type="text" placeholder="Ваше ім'я" required>
                    <input class="field" name="phone" type="tel" placeholder="Ваш телефон" required>
                    <button class="pay">Замовити зараз</button>
                </form>
                <button class="close-button"><img src="img/close.png" alt=""></button>
            </div>
        </div>
    </div>
</div>
