
$(document).ready(function () {

  $('.rocketpager-modal').each(function () {

    const modal = $(this).find('.modal-wrapper').first();


    const showModal = $(this).find('.show-modal').first();
    const closeModal = $(this).find('.close-modal').first();

    showModal.on('click', function () {
      modal.removeClass('hidden');
    });

    closeModal.on('click', function () {
      modal.addClass('hidden');
    });
  });
});