/*
 * Ukrainian Phone Mask
 */
function phoneMask() {
  document.querySelectorAll('input[type="tel"]').forEach(input => {

    // Ensure +380 is there on load
    if (!input.value.startsWith('+380')) {
      input.value = '+380';
    }

    // Prevent deleting +380
    input.addEventListener('input', () => {
      if (!input.value.startsWith('+380')) {
        input.value = '+380';
      }
    });

    // Keep cursor after +380 on focus
    input.addEventListener('focus', () => {
      if (input.selectionStart < 4) {
        input.setSelectionRange(4, 4);
      }
    });

    // Also when clicking
    input.addEventListener('click', () => {
      if (input.selectionStart < 4) {
        input.setSelectionRange(4, 4);
      }
    });
  });
}

export default phoneMask;
