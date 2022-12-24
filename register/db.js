// UI Variables
const ordersLink = document.querySelector('.orders-link');
const messagesLink = document.querySelector('.messages-link');
const usersLink = document.querySelector('.users-link');

const orderHeading = document.querySelector('.order-h2');
const messageHeading = document.querySelector('.message-h2');
const usersHeading = document.querySelector('.users-h2');

const orders = document.querySelector('.orders-data');
const messages = document.querySelector('.messages-data');
const users = document.querySelector('.user-data');
// const individual = document.querySelector('.individual-data');

// DOM Event Listerners
ordersLink.addEventListener('click',loadOrders);
messagesLink.addEventListener('click', loadMessages);
usersLink.addEventListener('click', loadUsers);

// Load Functions

// Orders Load
function loadOrders(e){
  console.log('Orders')

  orders.style.display = 'block';
  messages.style.display = 'none';
  users.style.display = 'none';
  // individual.style.display = 'none';
  orderHeading.style.display = 'block';
  messageHeading.style.display = 'none';
  usersHeading.style.display = 'none';
//   ordersLink.style.borderLeft = '2rem solid blue';
//   ordersLink.style.background = 'rgba(0, 153, 255, 0.445)'


  e.preventDefault();
  
}
// Messages Load
function loadMessages(e){
  console.log('messages')

  messages.style.display = 'block';
  orders.style.display = 'none';
  users.style.display = 'none';
  // individual.style.display = 'none';
  orderHeading.style.display = 'none';
  messageHeading.style.display = 'block';
  usersHeading.style.display = 'none';
//   messagesLink.style.borderLeft = '2px solid rgb(126, 8, 67)';
//   ordersLink.style.borderLeft = 'none';
//   usersLink.style.borderLeft = 'none';
  e.preventDefault();
}
// Users Load
function loadUsers(e){
  console.log('users')

  users.style.display = 'block';
  messages.style.display = 'none';
  orders.style.display = 'none';
  // individual.style.display = 'none';
  orderHeading.style.display = 'none';
  messageHeading.style.display = 'none';
  usersHeading.style.display = 'block';
//   usersLink.style.borderLeft = '2px solid rgb(126, 8, 67)';
//   messagesLink.style.borderLeft = 'none';
//   ordersLink.style.borderLeft = 'none';
  e.preventDefault();
}
