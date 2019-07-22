$(function() {
   $('#find-room-modal').on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var roomType = button.data('room-type');
        var roomPrice = button.data('room-price');
        var imgSrc = button.data('img-src');
        var modal = $(this);
        modal.find('#modal-room-img').attr('src',imgSrc);
        modal.find('#room-type-input').val(roomType);
        modal.find('#room-type-input').prop('disabled', true);
        modal.find('#room-price-input').val(roomPrice);
       modal.find('#room-price-input').prop('disabled', true);
   });
})
