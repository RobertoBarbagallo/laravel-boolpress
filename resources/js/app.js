require('./bootstrap');

window.addEventListener("load", function () {
    const deleteField = document.querySelectorAll(".eraser");
  
    deleteField.forEach(form => {
  
      form.addEventListener("submit", (event) => {
  
        if (!confirm("Stai per eliminare un dato inserito, confermi?")) {
          event.preventDefault();
        }
  
      });
  
    });
  
  });
