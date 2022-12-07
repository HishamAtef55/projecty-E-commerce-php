///////////////////////////////////////////////////

function go(event) {
  const elementRegex = {
    userName: /^[a-zA-Z]{3,}$/,
    password: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/,
    phone: /01[0125][0-9]{8}$/,
    email: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,
  };

  const elements = document.querySelectorAll("input");
  elements.forEach((element) => {
    element.oninput = (e) => {
      if (e.target.value.match(elementRegex[element.id])) {
        element.className = "form-control is-valid";
      } else {
        element.className = "form-control is-invalid";
      }
    };
  });
  if (!userName.value.match(elementRegex["userName"])) {
    userName.className = "form-control is-invalid";
    event.preventDefault();
  } else if (!email.value.match(elementRegex["email"])) {
    email.className = "form-control is-invalid";
    event.preventDefault();
  }
  // validate username duplication

  // validate phone
  else if (!phone.value.match(elementRegex["phone"])) {
    phone.className = "form-control is-invalid";
    event.preventDefault();
  }

  // validate password
  else if (!password.value.match(elementRegex["password"])) {
    password.className = "form-control is-invalid";
    event.preventDefault();
  } else {
    userName.className = "form-control is-valid";
    password.className = "form-control is-valid";
    phone.className = "form-control is-valid";
  }
}
