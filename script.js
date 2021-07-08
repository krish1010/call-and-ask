let clientName = document.querySelector(".name").value;
// let number = document.querySelector(".number").value;
// let email = document.querySelector(".email").value;

// For Modal
const modal = document.querySelector(".modal");
const modalTerms = document.querySelector(".modal-terms");
const overlay = document.querySelector(".overlay");
const btnCloseModal = document.querySelector(".close-modal");
const btnCloseModalTerms = document.querySelector(".close-modal-terms");
const btnShowModal = document.querySelector(".show-modal");
const termsModal = document.getElementById("show-mod");

const openModal = function () {
  modal.classList.remove("hidden");
  overlay.classList.remove("hidden");
};

const openModalTerms = function () {
  modalTerms.classList.remove("hidden");
  overlay.classList.remove("hidden");
};

const closeModal = function () {
  modal.classList.add("hidden");
  overlay.classList.add("hidden");
};

const closeModalTerms = function () {
  modalTerms.classList.add("hidden");
  overlay.classList.add("hidden");
};

// for (let i = 0; i < btnShowModal.length; i++) {
//   btnShowModal[i].addEventListener("click", openModal);
// }
btnShowModal.addEventListener("click", openModal);
termsModal.addEventListener("click", openModalTerms);

btnCloseModal.addEventListener("click", closeModal);
btnCloseModalTerms.addEventListener("click", closeModalTerms);
overlay.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModalTerms);

document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hidden")) {
    closeModal();
  }
  if (e.key === "Escape" && !modalTerms.classList.contains("hidden")) {
    closeModalTerms();
  }
});

// For Submit Btn Activation

const checkbox = document.getElementById("check");
const submit = document.getElementById("submit-btn");

// const checking = function () {
//   if (checkbox.checked === true) {
//     submit.removeAttribute("disabled");
//   } else {
//     submit.setAttribute("disabled", true);
//     submit.getAttribute("disabled");
//   }
// };

// checkbox.addEventListener("click", checking);

// Email and Number Validation

const errMsg = document.querySelector(".error-msg");
const errMsgmobile = document.querySelector(".error-msg-mobile");

function validate() {
  const emailId = document.getElementById("email").value;
  const mobNumber = document.getElementById("contact").value;

  const regmobile = /^[6-9][0-9]{9}$/g;
  const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (re.test(emailId) && regmobile.test(mobNumber)) {
    return true;
  }
  // 
  if (re.test(emailId)=== false) {
    errMsg.classList.remove("hidden");
    return false;
  }
  else {
    errMsg.classList.add("hidden");
  }
  // 

  if (regmobile.test(mobNumber) === false) {
    errMsgmobile.classList.remove("hidden");
    return false;
  }
  else {
    errMsgmobile.classList.add("hidden");
  }
}

// Scroll to Form


function smoothScroll(target, duration) {
  var target = document.querySelector(target);
  var targetPosition = target.getBoundingClientRect().top;
  var startPosition = window.pageYOffset;
  var distance = targetPosition - startPosition;
  var startTime = null;
  
  function animation(currentTime) {
    if (startTime === null) startTime = currentTime;
    var timeElapsed = currentTime - startTime;
    var run = ease(timeElapsed, startPosition, distance, duration);
    window.scrollTo(0, run);
    if (timeElapsed < duration) requestAnimationFrame(animation);
  }

  function ease (t, b, c, d) {
    t /= d/2;
    if (t < 1) return c/2*t*t + b;
    t--;
    return -c/2 * (t*(t-2) - 1) + b;
  };

  requestAnimationFrame(animation);
}

const formBtn = document.querySelector(".form-btn");

formBtn.addEventListener('click', function() {
    smoothScroll(".submit-form", 500);
})

// For Media Queries 
const knowMore = document.getElementById('know-more');
// const termsCond = document.getElementById('show-mod');

if (window.innerWidth < 480) {
  knowMore.addEventListener('click', function () {
    smoothScroll(".know-mob", 500);
  });
  
}

// For API request

const functionPost = function () {
  var myHeaders = new Headers();
  myHeaders.append("X-API-Key", "59FA5E18F8B0D0FB1125CC3D481A69CB");
  myHeaders.append("Accept", "application/json");
  myHeaders.append("Content-Type", "application/json");

  var raw = JSON.stringify({
    name: clientName,
    email: email,
    subject: "Lorem Ipsum",
    topicId: "1",
    message:
      "data:text/html,Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lobortis sagittis turpis vel bibendum. Nunc eget tincidunt leo. Suspendisse a nibh vulputate, ultrices leo mollis, maximus nisl.",
  });

  var requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: raw,
    redirect: "follow",
  };

  fetch(
    "https://lsfs.co.in/taskmanager/api/http.php/tickets.json",
    requestOptions
  )
    .then((response) => response.text())
    .then((result) => console.log(result))
    .catch((error) => console.log("error", error));
};

submit.addEventListener("click", functionPost);
