function notifNoAuto(data) {
	swal({
		type: 'error',
		title: 'Perhatian !',
		html: data,
		showConfirmButton: false,
		timer: 2000
	})
};

function notifYesAuto(data) {
	swal({
		type: 'success',
		title: 'Berhasil',
		html: data,
		showConfirmButton: false,
		timer: 2000
	})
};

function notifNo(data) {
	swal({
		type: 'error',
		title: 'Perhatian !',
		html: data,
		confirmButtonColor: '#0f9647',
	})
};

function notifYes(data) {
	swal({
		type: 'success',
		title: 'Berhasil',
		html: data,
		confirmButtonColor: '#0f9647',
	})
};

function notifCancle(data) {
	swal({
		type: 'warning',
		title: 'Dibatalkan',
		text: data,
		showConfirmButton: false,
		timer: 2000
	})
};

function loadingShow() {
	$('#loading').show();
}

function loadingHide() {
	$('#loading').hide();
}

$(document).ready(function () {
	// Setting Modal and Sweet Alert 2
	$("div#MyModal").on('shown.bs.modal', function (e) {
		e.preventDefault();
		$('body').removeAttr('style');
	});
	$("div#MyModal").on('hidden.bs.modal', function (e) {
		e.preventDefault();
		$('h5#MyModalTitle').empty();
		$("div#MyModalContent").empty();
		$("div#MyModalFooter").empty();
		$('div.modal-dialog').removeClass('modal-lg');
		$('div.modal-dialog').removeClass('modal-sm');
	});
});