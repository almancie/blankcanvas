window.addEventListener('load', () => {
  document.querySelectorAll('[data-name="menu_item_icon"]').forEach(field => {
    const value = field.querySelector('input').value;
    
    if (! value) return;
    
    const desc = field.querySelector('.description');
    
    const valueField = document.createElement('div');
    
    valueField.classList.add('acf-value');
    
    valueField.style.marginTop = '6px';
    
    valueField.innerHTML = `Current: <i class="bi bi-${value}"></i>`;
    
    desc.before(valueField);
  })
})