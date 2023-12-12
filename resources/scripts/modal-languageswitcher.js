export function setupLanguageswitcherModal() {
  const $modal = $('#modal-languageswitcher');
  const $showModal = $('#show-modal-languageswitcher');
  const $closeModal = $('#close-modal-languageswitcher');

  $showModal.on('click', function (event) {
    event.preventDefault();
    $modal.removeClass('hidden');
    $modal.find('.search-input')[0].focus();
  });

  $closeModal.on('click', function () {
    $modal.addClass('hidden');
  });

  // Event-Handler für die Escape-Taste hinzufügen
  $(document).on('keydown', function (event) {
    if (event.key === 'Escape') {
      $modal.addClass('hidden');
    }
  });
  
}