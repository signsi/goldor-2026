const $modal = $('#modal-search');
const $showModal = $('#show-modal-search');
const $closeModal = $('#close-modal-search');


export function setupSearchModal(){
  $showModal.on('click', function (event){
    event.preventDefault();
    $modal.removeClass('hidden');
    $modal.find('.search-input')[0].focus();
  });

  $closeModal.on('click', function (){
      $modal.addClass('hidden');
  });
}