const modal = document.querySelector('.modal-wrapper-search');

const showModal = document.querySelector('.show-modal-search');
const closeModal = document.querySelectorAll('.close-modal-search');

showModal.addEventListener('click', function (){
  modal.classList.remove('hidden')
});

closeModal.forEach(close => {
  close.addEventListener('click', function (){
    modal.classList.add('hidden')
  });
});