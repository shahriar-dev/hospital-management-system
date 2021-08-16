const medicines = [
    {
        id: 1,
        medicineName : 'paracetamol',
        price : 100,
        img : './../../../../Hospital-Management-System/Patient/assets/medicine-img/med-1.png'
    },
    {
        id : 2,
        medicineName : 'Amoxillin',
        price : 100,
        img : './../../../../Hospital-Management-System/Patient/assets/medicine-img/med-2.jpg',
    },
    {
        id : 3,
        medicineName : 'Cyclophosphamide',
        price : 100,
        img : './../../../../Hospital-Management-System/Patient/assets/medicine-img/med-3.png',
    },
    {
        id : 4,
        medicineName : 'Ifosfamide',
        price : 100,
        img : './../../../../Hospital-Management-System/Patient/assets/medicine-img/med-4.png',
    },
    {
        id : 5,
        medicineName : 'Deptomycin',
        price : 100,
        img : './../../../../Hospital-Management-System/Patient/assets/medicine-img/med-5.jpg',
    },
    {
        id : 6,
        medicineName : 'Acyclovir',
        price : 100,
        img : './../../../../Hospital-Management-System/Patient/assets/medicine-img/med-6.png',
    },
    {
        id : 7,
        medicineName : 'Famciclovir',
        price : 100,
        img : './../../../../Hospital-Management-System/Patient/assets/medicine-img/med-7.png',
    },
    {
        id : 8,
        medicineName : 'Methotrexate',
        price : 100,
        img : './../../../../Hospital-Management-System/Patient/assets/medicine-img/med-8.gif',
    }
]

const cart = localStorage.getItem('cart') ? localStorage.getItem('cart') : [];
const productCenter = document.querySelectorAll('.product-center');

productCenter.forEach((div, i) => {
    if(i === 0) {
        for(let i = 0; i<4 ; i++) {
            const product = document.createElement('div');
            product.classList.add('product');
            product.setAttribute('key', medicines[i].id);
            product.innerHTML += `            
                <div class="product-header">
                    <img src="${medicines[i].img}" alt="" srcset="">
                    <ul class="icons">
                        <span><i class="bx bx-heart"></i></span>
                        <span><i class="bx bx-shopping-bag addCart"></i></span>
                        <span><i class="bx bx-search"></i></span>
                    </ul>
                </div>
                <div class="product-footer">
                    <a href="" class="medicine">
                        <h3>${medicines[i].medicineName}</h3>
                    </a>
                    <div class="rating">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                    </div>
                    <h4 class="price">$${medicines[i].price}</h4>
                </div>
        `
        div.appendChild(product);
        }       
    } else {
        for(let i = 4; i<medicines.length ; i++) {
            const product = document.createElement('div');
            product.classList.add('product');
            product.setAttribute('key', medicines[i].id);
            product.innerHTML += `            
                <div class="product-header">
                    <img src="${medicines[i].img}" alt="" srcset="">
                    <ul class="icons">
                        <span><i class="bx bx-heart"></i></span>
                        <span><i class="bx bx-shopping-bag addCart"></i></span>
                        <span><i class="bx bx-search"></i></span>
                    </ul>
                </div>
                <div class="product-footer">
                    <a href="" class="medicine">
                        <h3>${medicines[i].medicineName}</h3>
                    </a>
                    <div class="rating">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                    </div>
                    <h4 class="price">$${medicines[i].price}</h4>
                </div>
        `
        div.appendChild(product);
        }       
    }
})

var totalPrice = 0;
var quantity = 0;

document.querySelectorAll('.addCart').forEach(item => item.addEventListener('click', e => {
    const id = e.target.parentNode.parentNode.parentNode.parentNode.getAttribute('key');    
    for(let i = 0; i < cart.length; i++) {
        if(cart[i].id === id) {
            cart[i].quantity += 1;
            quantity++;
            updateCart();
            return;
        }
    }
    cart.push({id,quantity:1});
    quantity++;
    updateCart();
}));

const medicineSection = document.getElementsByClassName('medicine-section');
const medicineNav = document.querySelectorAll('.medicine-nav');

console.log(document.getElementsByClassName('medicine-section'));



medicineNav.forEach((input, index) => { 
    input.addEventListener('click', () => {
        for(let i = 0; i<medicineSection.length; i++) {
            medicineSection[i].style.display = (index === i) ? 'block' : 'none';
        }
    })
})

// const cartList = document.querySelector('.cart-list');
function updateCart() {
    totalPrice = quantity * 100;
    const cartList = document.querySelector('.cart-list');
    cartList.innerHTML = '';
    cartList.innerHTML = `<h1 class="title">Cart Items</h1>`;
    medicines.forEach((medicine, mid) => {
    for(let i = 0; i<cart.length; i++) {
        // console.log(cart[i], medicine);
        if(cart[i].id == medicine.id) { 
            const product = document.createElement('div');
            product.classList.add('product');
            product.innerHTML += `            
                <div class="product-header">
                    <img src="${medicine.img}" alt="" srcset="">
                    <ul class="icons">
                        <span><i class="bx bx-heart"></i></span>
                        <span><i class="bx bx-shopping-bag"></i></span>
                        <span><i class="bx bx-search"></i></span>
                    </ul>
                </div>
                <div class="product-footer">
                    <a href="" class="medicine">
                        <h3 class ="name">${medicine.medicineName}</h3>
                    </a>
                    <div class="rating">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                    </div>
                    <h4 class="price">$${medicine.price * cart[i].quantity}</h4>
                </div>
        `;
        cartList.appendChild(product);
        }
    }
})
}
console.log(totalPrice);

function placeMedicineOrder() {
    const medicineName = document.querySelectorAll('.name');
    const medicineQuantity = document.querySelectorAll('.price');
    // console.log(medicineQuantity);
    const mNameList = [];
    const mQuantityList = [];
    medicineName.forEach(mname => {
        mNameList.push(mname.innerHTML);
        // console.log(mNameList);
    })
    medicineQuantity.forEach(mlist => {
        mQuantityList.push(mlist.innerHTML);
        
    })
    // medicines.forEach((medicine, mid) => {
    //     for(let i = 0; i<cart.length; i++) {
    //         if(cart[i].id == medicine.id) {
    //             var XML = new XMLHttpRequest();
    //             XML.onload =function() {
    //                 if(i == cart.length -1) {

    //                 }
    //             }

    //             XML.open("POST", "./../../../../Hospital-Management-System/Patient/Controllers/Validation/buy-reserve-medicine.php");
    //             XML.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //             XML.send("medicineName=" + )
    //         }
    //     }
    // })
}





