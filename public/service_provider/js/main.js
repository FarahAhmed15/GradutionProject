document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");

  form.addEventListener("submit", function (e) {
   e.preventDefault();

    // Get form values
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm-password").value;
    const experience = document.getElementById("experience").value;
    const serviceType = document.getElementById("service-type").value;
    const subservice = document.getElementById("subservice").value;
    const price = document.getElementById("price").value;

    // Validate passwords
    if (password !== confirmPassword) {
      alert("Passwords do not match!");
      return;
    }

    // Validate subservice and price
    if (!subservice || !price) {
      alert("Please select a subservice and enter a price!");
      return;
    }
    function validatePassword(password) {

      if (password.length < 6) {
          return 'Password must be at least 6 characters long.';
      }


      if (!/[A-Z]/.test(password)) {
          return 'Password must contain at least one uppercase letter.';
      }

      // التحقق من وجود رقم
      if (!/[0-9]/.test(password)) {
          return 'Password must contain at least one number.';
      }

      // التحقق من وجود حرف خاص
      if (!/[!@#$_^&*]/.test(password)) {
          return 'Password must contain at least one special character (!@#$_^&*).';
      }

      // إذا كانت كلمة المرور صحيحة
      return '';
  }

    // Create user data object
    const userData = {
      name,
      email,
      password,
      experience,
      serviceType,
      subservice,
      price,
    };

    localStorage.setItem("userData", JSON.stringify(userData));

    window.location.href = "login.html";
  });

  const services = {
    Plumber: [
      { name: "Fix a leaky faucet" },
      { name: "Install a new sink" },
      { name: "Unclog a drain" },
    ],
    Electrician: [
      { name: "Install a light fixture" },
      { name: "Repair wiring" },
      { name: "Install an outlet" },
    ],
    Carpenter: [
      { name: "Build a shelf" },
      { name: "Repair a door" },
      { name: "Install cabinets" },
    ],
    "HVAC Technician": [
      { name: "Install an AC unit" },
      { name: "Repair a furnace" },
      { name: "Clean air ducts" },
    ],
    "House Cleaner": [
      { name: "Deep cleaning" },
      { name: "Window cleaning" },
      { name: "Carpet cleaning" },
    ],
    Gardener: [
      { name: "Lawn mowing" },
      { name: "Tree trimming" },
      { name: "Planting flowers" },
    ],
  };

  const serviceTypeDropdown = document.getElementById("service-type");
  const subserviceDropdown = document.getElementById("subservice");

  serviceTypeDropdown.addEventListener("change", (event) => {
    const selectedServiceType = event.target.value;

    subserviceDropdown.innerHTML = '<option value="">Select a subservice</option>';

    if (selectedServiceType && services[selectedServiceType]) {
      subserviceDropdown.disabled = false;
      services[selectedServiceType].forEach((subservice) => {
        const option = document.createElement("option");
        option.value = subservice.name;
        option.textContent = subservice.name;
        subserviceDropdown.appendChild(option);
      });
    } else {
      subserviceDropdown.disabled = true;
    }
  });
});
