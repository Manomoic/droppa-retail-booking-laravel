const imagesliderFN = (image) => document.querySelector('#select_motor_vehicle').src = image;

const selectVehicle = document.querySelector('#vehicle');
const number_of_labour = document.querySelector('#number_of_labour');

selectVehicle.addEventListener('click', (e) => {
    e.preventDefault();

    const costPrice = document.querySelector('#price');

    if (e.target.innerText === "Mini Van") {
        costPrice.value = number_of_labour.value * 70;
    } else if (e.target.innerText === "1 Ton") {
        costPrice.value = number_of_labour.value * 100;
    } else if (e.target.innerText === "1.5 Ton") {
        costPrice.value = number_of_labour.value * 120;
    } else if (e.target.innerText === "4 Ton") {
        costPrice.value = number_of_labour.value * 320;
    } else if (e.target.innerText === "8 Ton") {
        costPrice.value = number_of_labour.value * 420;
    } else {
        costPrice.value = 0;
    }
});
