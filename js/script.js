const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: 'true',
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
  });








const button = document.querySelector('.checkout');
const form = document.querySelector('.formbox');
const popup = document.querySelector('.popup');
const closeButton = document.querySelector('.close-button');

button.addEventListener('click', () => {
  form.classList.add('formbox_open');
  popup.classList.add('popup_open');
  sendProductsList();
});

closeButton.addEventListener('click', () => {
  form.classList.remove('formbox_open');
  popup.classList.remove('popup_open');
});

function sendProductsList() {
    const data = localStorage.getItem('shoppingCart');
    document.querySelector('input[name="productsList"]').value = data;
}







$( document ).ready(function() {
    ( shoppingCart.countCart() > 0)?cartWrapper.removeClass('empty'):null;
});
let cartWrapper = $('.cd-cart-container'),
    cartTrigger = cartWrapper.children('.cd-cart-trigger');
    cartTrigger.on('click', function(event) {
        event.preventDefault();
        var cartIsOpen = (typeof bool === 'undefined') ? cartWrapper.hasClass('cart-open') : bool;
        if (cartIsOpen) { cartWrapper.removeClass('cart-open'); }
        else {
            cartWrapper.addClass('cart-open');
        }
    });
    cartWrapper.removeClass('cart-open');
// ***************************************************
// Shopping Cart functions
// ***************************************************
const shoppingCart = (function() {
    // Private methods and properties
    let cart = [];

    function Item(product_id, name, price, count, img) {
        this.product_id = product_id;
        this.name = name;
        this.price = price;
        this.count = count;
        this.img = img;
    }

    function saveCart() {
        localStorage.setItem("shoppingCart", JSON.stringify(cart));
    }

    function loadCart() {
        cart = JSON.parse(localStorage.getItem("shoppingCart"));
        if (cart === null) {
            cart = []
        }
    }

    loadCart();

    // Public methods and properties
    var obj = {};

    obj.addItemToCart = function(product_id, name, price, count, img) {
        for (var i in cart) {
            if (cart[i].name === name) {
                cart[i].count += count;
                saveCart();
                return;
            }
        }

        var item = new Item(product_id, name, price, count, img);
        cart.push(item);
        saveCart();
    };

    obj.setCountForItem = function(name, count) {
        for (var i in cart) {
            if (cart[i].name === name) {
                cart[i].count = count;
                break;
            }
        }
        saveCart();
    };

    obj.removeItemFromCart = function(name) { // Removes one item
        for (var i in cart) {
            if (cart[i].name === name) { // "3" === 3 false
                cart[i].count--; // cart[i].count --
                if (cart[i].count === 0) {
                    cart.splice(i, 1);
                }
                break;
            }
        }
        saveCart();
    };

    obj.removeItemFromCartAll = function(name) { // removes all item name
        for (var i in cart) {
            if (cart[i].name === name) {
                cart.splice(i, 1);
                break;
            }
        }
        saveCart();
    };

    obj.clearCart = function() {
        cart = [];
        saveCart();
    };

    obj.countCart = function() { // -> return total count
        var totalCount = 0;
        for (var i in cart) {
            totalCount += cart[i].count;
        }

        return totalCount;
    };

    obj.totalCart = function() { // -> return total cost
        var totalCost = 0;
        for (var i in cart) {
            totalCost += cart[i].price * cart[i].count;
        }
        return totalCost.toFixed(2);
    };

    obj.listCart = function() { // -> array of Items
        var cartCopy = [];
        for (var i in cart) {
            var item = cart[i];
            var itemCopy = {};
            for (var p in item) {
                itemCopy[p] = item[p];
            }
            itemCopy.total = (item.price * item.count).toFixed(2);
            cartCopy.push(itemCopy);
        }
        return cartCopy;
    };

    // ----------------------------
    return obj;
})();
    $(".add-to-cart").click(function(event) {
        event.preventDefault();
        var product_id = $(this).attr("data-product_id");
        var name = $(this).attr("data-name");
        var price = Number($(this).attr("data-price"));
        var img = $(this).attr("data-img");
        shoppingCart.addItemToCart(product_id, name, price, 1 ,img);
        displayCart();
        cartWrapper.removeClass('empty');
    });
    $("#clear-cart").click(function(event) {
        cartWrapper.removeClass('cart-open');
        cartWrapper.addClass('empty');
        shoppingCart.clearCart();
        displayCart();
    });
function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    for (var i in cartArray) {
        output += `<li class='product'>
            <div class="product-image"><a href="#0"><img src="${cartArray[i].img}" alt="${cartArray[i].name}"></a></div>
            <div class='product-details'>
                <h3>${cartArray[i].name}</h3>
                <span class='price'>${cartArray[i].total} грн</span>
                <div class='actions'>
                    <a class='delete-item' data-name='${cartArray[i].name}'>Видалити</a>
                    <div class="quantity">
                    <label for="cd-product-3">Кіл.</label>
                    <span class="select">
                        <select id="cd-product-3" name="quantity" class='item-count' data-name='${cartArray[i].name}' value=''>
                            <option value="">${cartArray[i].count}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </span>
                    </div>
                </div>
            </div>
            </li>`;
    }
    $("#show-cart").html(output);
    $("#count-cart").html(shoppingCart.countCart());
    $("#total-cart").html(shoppingCart.totalCart());
}
    $("#show-cart").on("click", ".delete-item", function(event) {
        event.preventDefault();
        var name = $(this).attr("data-name");
        shoppingCart.removeItemFromCartAll(name);
        displayCart();
        if( shoppingCart.countCart() == 0){
            cartWrapper.removeClass('cart-open');
            cartWrapper.addClass('empty');
        } 
    });
    $("#show-cart").on("click", ".subtract-item", function(event) {
        var name = $(this).attr("data-name");
        shoppingCart.removeItemFromCart(name);
        displayCart();
    });
    $("#show-cart").on("click", ".plus-item", function(event) {
        var name = $(this).attr("data-name");
        shoppingCart.addItemToCart(name, 0, 1);
        displayCart();
    });
    $("#show-cart").on("change", ".item-count", function(event) {
        var name = $(this).attr("data-name");
        var count = Number($(this).val());
        shoppingCart.setCountForItem(name, count);
        displayCart();
    });
displayCart();





