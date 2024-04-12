'use strict';


const add = document.querySelector('.cloth');
const form = document.querySelector('.add_form');
const overlay = document.querySelector('.overlay');
const add_item = document.querySelector('.add');

const open_model = function(){
    event.preventDefault();
    form.classList.remove("hidden");
    overlay.classList.remove("hidden");
};


// for (let i = 0; i < add.length; i++) {
//     add[i].addEventListener("click", open_model);
// };


    add.addEventListener("click", open_model);




const close_model = function(){
    form.classList.add('hidden');
    overlay.classList.add('hidden');
  };


overlay.addEventListener('click', close_model)

add_item.addEventListener('click',close_model);


