//show and hide logo in the company edit file
let buttonYes = document.getElementById("button-yes");
let buttonNo = document.getElementById("button-no");
let hideDisplay = document.getElementById("hide-show");

//show and hide password in the company edit file
let passwordBlockBtnYes = document.getElementById("passwordBlockBtn-yes");
let passwordBlockBtnNo = document.getElementById("passwordBlockBtn-no");
let hideDisplayPassword = document.getElementById("HideShowPasswordBlock");
let hidePassword = document.getElementById("input_password");
let hidePasswordConfirm = document.getElementById("input_password_confirm");

/**
 * We are modifying the company edit file
 * We want to show and hide some inputs fields such as logo and password
 * The user will have the choice to add a logo by clicking on the button edit logo. Once it clicked we will create the input logo using javascrip and append it to the parrent inputlogo
 * we will do the same for the password inputs, so that the client chooses if he want to change the logo or password
 */
function showAndHideBlock(paramYes, paramNo, ParamBlock) {
  paramYes.addEventListener("click", () => {
    ParamBlock.classList.remove("d-none");
    paramNo.classList.remove("d-none");

    if (paramYes.classList.contains("edit-logo")) {
      //creating the logo input field inside hideDisplay div
      let inputLogo = document.createElement("input");
      inputLogo.setAttribute("type", "file");
      inputLogo.setAttribute("name", "logo");
      inputLogo.setAttribute("class", "custom-file-input");
      inputLogo.setAttribute("id", "logo_id");
      hideDisplay.appendChild(inputLogo);
    } else if (paramYes.classList.contains("edit-password")) {
      //Creating  the password input field
      let inputPassword = document.createElement("input");
      inputPassword.setAttribute("type", "password");
      inputPassword.setAttribute("name", "password");
      inputPassword.setAttribute("class", "form-control");
      inputPassword.setAttribute("id", "remove_input_password");
      hidePassword.appendChild(inputPassword);
      //Creating the password_confirm
      let inputPasswordConfirm = document.createElement("input");
      inputPasswordConfirm.setAttribute("type", "password");
      inputPasswordConfirm.setAttribute("name", "password_confirm");
      inputPasswordConfirm.setAttribute("class", "form-control");
      inputPasswordConfirm.setAttribute("id", "remove_input_password_confirm");
      hidePasswordConfirm.appendChild(inputPasswordConfirm);
    }
  });
  paramNo.addEventListener("click", () => {
    ParamBlock.classList.add("d-none");
    paramNo.classList.add("d-none");

    //Removing the logo input field inside hideDisplay div
    let captureLogoInput = document.getElementById("logo_id");
    captureLogoInput.remove();
    //Removing the password input field
    let capturePasswordInput = document.getElementById("remove_input_password");
    let capturePasswordConfirmInput = document.getElementById(
      "remove_input_password_confirm"
    );
    capturePasswordInput.remove();
    capturePasswordConfirmInput.remove();
  });
}
//Calling the function to show and hide logo block
showAndHideBlock(buttonYes, buttonNo, hideDisplay);

//Calling the function to show and hide password block
showAndHideBlock(passwordBlockBtnYes, passwordBlockBtnNo, hideDisplayPassword);
