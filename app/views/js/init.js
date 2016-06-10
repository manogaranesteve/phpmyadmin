/**
* Created by stevemanogarane on 03/06/2016.
*/

$(document).ready(function(){
  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  $('.modal-trigger').leanModal();
});

$('#modal1').openModal();
$('#modal1').closeModal();


$('input[name="db_name"]').keyup(function () {
  $(this).val($(this).val().replace(/[_\W]+/g, ""));
});
