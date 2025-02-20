export default function initMenuActive(options = {}) {
  const defaults = {
    menuSelector: '.c-menu',
    parentSelector: '.c-menu__item.has-child',
    childSelector: '.c-menu__child',
    parentActiveClass: 'is-active',
    childActiveClass: 'is-active',
  };

  const settings = { ...defaults, ...options };

  const menu = document.querySelector(settings.menuSelector);
  if (!menu) return;

  const pairs = new Map();

  menu.querySelectorAll(settings.parentSelector).forEach(parent => {
    const id = parent.getAttribute('data-has-child');
    if (id) {
      if (!pairs.has(id)) pairs.set(id, {});
      pairs.get(id).parent = parent;
    }
  });

  menu.querySelectorAll(settings.childSelector).forEach(child => {
    const id = child.getAttribute('data-id');
    if (id) {
      if (!pairs.has(id)) pairs.set(id, {});
      pairs.get(id).child = child;
    }
  });

  const updatePair = (pair) => {
    const parentHovered = pair.parent && pair.parent.matches(':hover');
    const childHovered = pair.child && pair.child.matches(':hover');
    if (parentHovered || childHovered) {
      pair.parent && pair.parent.classList.add(settings.parentActiveClass);
      pair.child && pair.child.classList.add(settings.childActiveClass);
    } else {
      pair.parent && pair.parent.classList.remove(settings.parentActiveClass);
      pair.child && pair.child.classList.remove(settings.childActiveClass);
    }
  };

  menu.addEventListener('mouseover', () => {
    pairs.forEach(updatePair);
  });
  menu.addEventListener('mouseout', () => {
    pairs.forEach(updatePair);
  });
}