const imagesliderFN = (image) => document.querySelector('#select_motor_vehicle').src = image;

const number_of_labour = document.querySelector('#number_of_labour');
const costPrice = document.querySelector('#price');
console.log(number_of_labour);
try {
    document.querySelector('#vehicle').addEventListener('click', (e) => {
        e.preventDefault();

        if (e.target.innerText == "Mini Van") {
            costPrice.value = 300;
        } else if (e.target.innerText == "1 Ton") {
            costPrice.value = 500;
        } else if (e.target.innerText == "1.5 Ton") {
            costPrice.value = 70;
        } else if (e.target.innerText == "4 Ton") {
            costPrice.value = 900;
        } else if (e.target.innerText == "8 Ton") {
            costPrice.value = 1500;
        } else {
            costPrice.value = 0;
        }
    });
} catch (error) {
    console.log(error)
}
