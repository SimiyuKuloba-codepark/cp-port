// INPUT-FIELDS
// INPUT-FIELDS
// INPUT-FIELDS

// ALERTS
// ALERTS
class Notification{
  constructor(name, email, phone, message) {
    this.name = name;
    this.email = email;
    this.phone = phone;
    this.message = message;
  }
}


class UI{

  // SHOW-ALERT
  // SHOW-ALERT
  showAlert(message, className){
    // create-a-div
    const div = document.createElement('div');

    // add-className
    div.className = `alert ${className}`;

    // add-text
    div.appendChild(document.createTextNode(message));

    // get-parent
    const container = document.querySelector('#contact-form');

    const form = document.querySelector('#not');

    // insert-alert
    container.insertBefore(div, form);

    // timeout-after-3-seconds
    setTimeout(function(){
      document.querySelector('.alert').remove();
    }, 115000);
  }

  // CLEAR-FIELDS
  // CLEAR-FIELDS
  clearFields(){
    document.getElementById('name').value = '';
    document.getElementById('email').value = '';
    document.getElementById('phone').value = '';
    document.getElementById('message').value = '';
  }

} 


// EVENT-LISTENERS-FOR-GET-MESSAGE
document.getElementById('contact-form').addEventListener('submit', function(e){

  // get-form-values
  const name = document.getElementById('name').value;

  const email = document.getElementById('email').value;

  const phone = document.getElementById('phone').value;
  
  const message = document.getElementById('message').value;

  // instatiate-UI
  const ui = new UI();

  // validation
  if(name === '' || email === '' || phone === '' || message ==='' ){
    // show-error-alert
    ui.showAlert('Please fill all fields', 'error');
  }else{

    // show-success-alert
    ui.showAlert('Message Sent', 'success');

    // clear-fields
    ui.clearFields();
  }

  e.preventDefault();
})