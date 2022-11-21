// If the modal window has the error ID then it appears and clicking on the cross makes it disappear.
$error = $("#error");
$closeModal = $("#closeModal");
$success = $("#success");

if ($error) {
    $closeModal.css("display", "block");
    closeModal("error");
}

// If the modal window has the ID success then it appears and clicking on the cross makes it disappear.
if ($success) {
    $closeModal.css("display", "block");
    closeModal("success");
}

/**
 * Removes the modal window by clicking on the cross.
 * @param idModal
 */
function closeModal (idModal) {
    $closeModal.click(() =>  {
        $("#" + idModal).css("display","none");
    });
}