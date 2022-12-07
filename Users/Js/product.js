/////////////////////////////////////////////////////////////////////////////////////////////

function handleXMLOrder(str, selector, query) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(query);
      if (selector.length == 0) {
      } else if (query.includes("removeFromCart"))
        document.querySelector('div[p-id="' + str + '"]').remove();
      else if (query.includes("addtocartxx")) {
        document.getElementById("myDIV").innerHTML = this.responseText;
      } else if (query.includes("addtoadmincartxx")) {
        document.getElementById("myDIV").innerHTML = this.responseText;
      } else {
        console.log(this.responseText.value);
        if (this.responseText.includes("here"))
          document.querySelector(
            'div[p-id="' + str + '"] p.quantity'
          ).innerHTML = this.responseText;
        else document.querySelector(selector).innerHTML += this.responseText;
      }
    }
  };

  xmlhttp.open("GET", "requests.php?" + query, true);
  xmlhttp.send();
}

///////////////////////////////////////////////////////////////////////

function createOrder(id, value) {
  displayAlert("Item has been removed from cart successfully");
  handleXMLOrder(id, "", "addtocartxx=" + id, value);
}

function deleteItem(id) {
  handleXMLOrder(id, "", "removeFromCart=" + id);
  event.target.parentElement.parentElement.remove();
}

//////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////

function incrementValue() {
  var value =
    event.target.parentElement.previousElementSibling.children[0].value;
  if (isNaN(value) || value < 1) {
    value = 1;
  }

  value++;
  event.target.parentElement.previousElementSibling.children[0].value = value;
  product_id = event.target.getAttribute("data-product-id");
  //productpagetotal();
  //productpagemaxtotal();
  handleXMLOrder(value, "", "increasQuantity=" + value + "&p_id=" + product_id);
}

function decrementValue() {
  var value = event.target.parentElement.nextElementSibling.children[0].value;
  if (isNaN(value) || value < 1) {
    value = 1;
  }

  value--;
  event.target.parentElement.nextElementSibling.children[0].value = value;
  product_id = event.target.getAttribute("data-product-id");
  handleXMLOrder(
    value,
    "",
    "increasadminQuantity=" + value + "&p_id=" + product_id
  );

  //productpagetotal();
  //productpagemaxtotal();
}

function productpagetotal() {
  console.log(hello);
  var totalPrice = parseInt(
    document.querySelector("#product-total-price").dataset.price
  );
  let quantity = document.querySelectorAll('input[name="quantity"]');
  var sum = totalPrice * quantity;
  sum = Math.round(sum * 100) / 100;
  totalPrice.innerHTML = "$" + sum;
}

function productpagemaxtotal() {
  var totalPrice = document.querySelector(".product-maxtotal-price");

  let quantity = document.querySelectorAll('input[name="quantity"]');
  let price = document.querySelectorAll("#product-total-price");

  let sum = 0;
  for (let i = 0; i < price.length; i++) {
    console.log(price[i].innerText);
    console.log(quantity[i].value);
    sum += parseInt(price[i].innerText) * parseInt(quantity[i].value);
  }

  totalPrice.innerHTML = sum;
}

////////////////////////////////////////////////////////////////////////////////////
