let openShopping = document.querySelector(".shopping");
let closeShopping = document.querySelector(".closeShopping");
let list = document.querySelector(".list");
let listCard = document.querySelector(".listCard");
let body = document.querySelector("body");
let total = document.querySelector(".total");
let quantity = document.querySelector(".quantity");
let checkOut = document.querySelector(".btnCheckOut");

openShopping.addEventListener("click", () => {
  body.classList.add("active");
});
closeShopping.addEventListener("click", () => {
  body.classList.remove("active");
});

let products = [
  {
    id: 1,
    name: "Pizza",
    image: "pizza.jpg",
    price: 3000,
  },
  {
    id: 2,
    name: "Burgers",
    image: "Burgers.jpg",
    price: 700,
  },
  {
    id: 3,
    name: "Pasta",
    image: "pasta.jpg",
    price: 700,
  },
  {
    id: 4,
    name: "Avocado toast",
    image: "Avocado toast.jpg",
    price: 1120,
  },
  {
    id: 5,
    name: "Laksha",
    image: "Laksa.webp",
    price: 1220,
  },
  {
    id: 6,
    name: "Tacos",
    image: "Tacos.jpg",
    price: 1700,
  },
  {
    id: 7,
    name: "Sushi Burritos",
    image: "Sushi Burritos.jpg",
    price: 1500,
  },
  {
    id: 8,
    name: "Fries",
    image: "Fries.jpg",
    price: 700,
  },
  {
    id: 9,
    name: "Acai Bowls",
    image: "Acai Bowls.jpg",
    price: 1300,
  },
  {
    id: 10,
    name: "milk",
    image: "milk.jpg",
    price: 250,
  },
  {
    id: 11,
    name: "Smoothies",
    image: "Smoothies.webp",
    price: 450,
  },
  {
    id: 12,
    name: "Coffee",
    image: "Coffee.jpg",
    price: 300,
  },
  {
    id: 13,
    name: "Tea",
    image: "Teas.jpg",
    price: 150,
  },
  {
    id: 14,
    name: "Kombucha",
    image: "Kombucha.jpg",
    price: 500,
  },
  {
    id: 15,
    name: "Matcha Lattes",
    image: "Matcha Lattes.jpg",
    price: 500,
  },
  {
    id: 16,
    name: "Coconut Water",
    image: "Coconut Water.jpg",
    price: 200,
  },
  {
    id: 17,
    name: "Vegetable Juices",
    image: "Vegetable Juices.jpg",
    price: 300,
  },
  {
    id: 18,
    name: "Sparkling Water",
    image: "Sparkling Water.jpeg",
    price: 150,
  },
];
var cartList = [];
function initApp() {
  products.forEach((value, key) => {
    let newDiv = document.createElement("div");
    newDiv.classList.add("item");
    newDiv.innerHTML = `
            <img src="images/${value.image}">
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
    list.appendChild(newDiv);
  });
}
initApp();
function addToCard(key) {
  if (cartList[key] == null) {
    // copy product form list to list card
    cartList[key] = JSON.parse(JSON.stringify(products[key]));
    cartList[key].quantity = 1;
  }
  reloadCard();
}
function reloadCard() {
  listCard.innerHTML = "";
  let count = 0;
  let totalPrice = 0;
  cartList.forEach((value, key) => {
    totalPrice = totalPrice + value.price;
    count = count + value.quantity;
    if (value != null) {
      let newDiv = document.createElement("li");
      newDiv.innerHTML = `
                <div><img src="images/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${
        value.quantity - 1
      })">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${
        value.quantity + 1
      })">+</button>
                </div>`;
      listCard.appendChild(newDiv);
    }
  });
  total.innerText = totalPrice.toLocaleString();
  quantity.innerText = count;
}
function changeQuantity(key, quantity) {
  if (quantity == 0) {
    // delete cartList[key];
    cartList.splice(key, 1);
  } else {
    cartList[key].quantity = quantity;
    cartList[key].price = quantity * products[key].price;
  }
  reloadCard();
}

checkOut.addEventListener("click", () => {
  fetch("./placeOrder.php", {
    "method": "POST",
    "headers": {
      "Content-Type": "application/json; charset=utf-8" 
    },
    "body": JSON.stringify(cartList)
  })
    .then(function (res) {
      return res.text();
    }).then(function (data) {
      alert(data);
      cartList = [];
      reloadCard();
    });
});
