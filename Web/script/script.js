function conditionActivate() {

  if(document.querySelector('#condition:checked') !== null) {
  
    document.getElementById('displayCondition').style.display = 'block';
  } else {
  
    document.getElementById('displayCondition').style.display = 'none';
  }
  
}

function myFunction() {
    document.getElementById("my-dropdown").classList.toggle("display-content");
  }
  
  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropdown-btn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('display-content')) {
          openDropdown.classList.remove('display-content');
        }
      }
    }
}