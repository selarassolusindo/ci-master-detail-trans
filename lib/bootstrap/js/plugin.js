$(function() {

	'use strict';

	$('#add-address').on('click', addAddress);
	$('.btn-delete-address').on('click', deleteAddress);

	function addAddress() {
		var html = '' +
		'<tr>' +
            '<td><input type="text" class="form-control" name="title[]" required></input></td> ' +
            '<td><input type="text" class="form-control" name="address[]" required></input></td> ' +
            '<td class="text-center">' +
            	'<button type="button" class="btn btn-danger btn-sm btn-delete-address"><i class="fa fa-trash-o"></i></button>' +
            '</td> ' +
        '</tr>';

		$('#table-address tbody').append(html);

		$('.btn-delete-address').on('click', deleteAddress);
	}

	function deleteAddress() {
		var row = $(this).parents('tr').first();

		if (row.length > 0) $(row[0]).remove();
	}

});