document.querySelector('.dropdown-button').addEventListener('click', function() {
  document.querySelector('.dropdown-list').classList.toggle('dropdown-list--visible');
});

document.querySelectorAll('.dropdown-list__item').forEach(function(listItem){
  listItem.addEventListener('click', function(event){
    event.stopPropagation();
    document.querySelector('.dropdown-button').innerText = this.innerText;
    document.querySelector('.dropdown-input-hidden').value = this.dataset.value;
    document.querySelector('.dropdown-list').classList.remove('dropdown-list--visible');
  })
});

document.addEventListener('click', function(event){
  if (!event.target.closest('.dropdown')) {
    document.querySelector('.dropdown-list').classList.remove('dropdown-list--visible');
  }
})
document.addEventListener('keydown', function(event){
  if(event.key === 'Tab' || event.key === 'Escape') {
      document.querySelector('.dropdown-list').classList.remove('dropdown-list--visible');
  }
})