document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('li.menu-item > a');
  
    menuItems.forEach(item => {
      item.addEventListener('click', (event) => {
        // Evitar que el enlace navegue inmediatamente
        event.preventDefault();
        
        // Obtener el elemento padre <li>
        const parentLi = item.parentElement;
        
        // Alternar la clase 'active'
        parentLi.classList.toggle('active');
        
        // Cerrar otros submenús
        menuItems.forEach(otherItem => {
          if (otherItem !== item) {
            otherItem.parentElement.classList.remove('active');
          }
        });
      });
    });
  });
  