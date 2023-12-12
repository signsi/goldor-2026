export function setupSearchModal() {
  const $modal = $('#modal-search');
  const $showModal = $('#show-modal-search');
  const $closeModal = $('#close-modal-search');

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
