document.addEventListener("DOMContentLoaded", function () {
  const categoryDropdown = document.getElementById("category_id");
  const subserviceDropdown = document.getElementById("subservice");

  categoryDropdown.addEventListener("change", function () {
      const categoryId = this.value;
      subserviceDropdown.innerHTML = '<option value="">Select a subservice</option>';
      subserviceDropdown.disabled = true;

      if (categoryId) {
          const subserviceOptions = document.querySelector(`.subservice-options[data-category="${categoryId}"]`);
          
          if (subserviceOptions) {
              subserviceDropdown.innerHTML = subserviceOptions.innerHTML;
              subserviceDropdown.disabled = false;
          }
      }
  });
});
