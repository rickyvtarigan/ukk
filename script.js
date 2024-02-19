const { Notyf } = require("notyf");

function showOptionValue(value) {
	const user_level = document.querySelector("#user_level");
	const form_dokter_wrapper = document.querySelector(".form_dokter_wrapper");

	if (user_level.value == "dokter") {
		// console.log("FORM EXTENDS TERBUKA");
		form_dokter_wrapper.classList.remove("d-none");
	} else {
		form_dokter_wrapper.classList.add("d-none");
	}
}
