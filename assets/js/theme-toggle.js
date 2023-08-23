(function() {
  const storageKey = 'theme-preference'

  const onClick = () => {
    // flip current value
    theme.value = theme.value === 'light'
      ? 'dark'
      : 'light'

    setPreference()
  }

  const getColorPreference = () => {
    if (localStorage.getItem(storageKey))
      return localStorage.getItem(storageKey)
    else
      return window.matchMedia('(prefers-color-scheme: dark)').matches
        ? 'dark'
        : 'light'
  }

  const setPreference = () => {
    localStorage.setItem(storageKey, theme.value)
    reflectPreference()
  }

  const reflectPreference = () => {
    document.firstElementChild.classList.add('theme-updating');

    document.firstElementChild
      .setAttribute('data-bs-theme', theme.value)

    document
      .querySelectorAll('.theme-toggle')
        .forEach(element => {
          element.setAttribute('aria-label', theme.value)
        });
    
    setTimeout(() => {
      document.firstElementChild.classList.remove('theme-updating');
    }, 600);
  }

  const theme = {
    value: getColorPreference(),
  }

  // set early so no page flashes / CSS is made aware
  reflectPreference()

  window.onload = () => {

    // set on load so screen readers can see latest value on the button
    reflectPreference()

    // now this script can find and listen for clicks on the control
    document
      .querySelectorAll('.theme-toggle')
        .forEach(element => {
          element.addEventListener('click', onClick)
        });
      
  }

  // sync with system changes
  window
    .matchMedia('(prefers-color-scheme: dark)')
    .addEventListener('change', ({matches:isDark}) => {
      theme.value = isDark ? 'dark' : 'light'
      setPreference()
    })
})();