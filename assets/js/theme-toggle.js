(function() {
  const storageKey = 'theme-preference';
  
  const onChange = () => {
    // flip current value
    theme.value = theme.value === 'light'
      ? 'dark'
      : 'light';

    setPreference();
  }
  
  const getColorPreference = () => {
    if (localStorage.getItem(storageKey)) {
      return localStorage.getItem(storageKey)
    }

    return window.matchMedia('(prefers-color-scheme: dark)').matches
      ? 'dark'
      : 'light'
  }

  const setPreferenceAs = value => {
    if (! value) return;

    theme.value = value;

    setPreference();
  }

  const setPreference = () => {
    localStorage.setItem(storageKey, theme.value)
    reflectPreference();
  }

  const reflectPreference = () => {
    // document.firstElementChild.classList.add('theme-updating');

    document.firstElementChild
      .setAttribute('data-bs-theme', theme.value);

    document
      .querySelectorAll('.theme-toggle-input')
        .forEach(element => {
          element.setAttribute('aria-label', theme.value);

          element.checked = theme.value == 'dark';
        });

    theme.onChange.handlers.forEach(handler => {
      handler.call();
    })

    // setTimeout(() => {
    //   document.firstElementChild.classList.remove('theme-updating');
    // }, 600);
  }

  const theme = {
    value: getColorPreference(),
    onChange: {
      handlers: [],
      add: (handler) => {
        theme.onChange.handlers.push(handler);
      }
    },
    setPreferenceAs
  }

  // set early so no page flashes / CSS is made aware
  reflectPreference()

  window.onload = () => {

    // set on load so screen readers can see latest value on the button
    reflectPreference()

    // now this script can find and listen for clicks on the control
    document
      .querySelectorAll('.theme-toggle-input')
        .forEach(element => {
          element.addEventListener('change', onChange)
        });
  }

  // sync with system changes
  window
    .matchMedia('(prefers-color-scheme: dark)')
    .addEventListener('change', ({matches:isDark}) => {
      theme.value = isDark ? 'dark' : 'light'
      setPreference()
    })

  // add ability to change theme manually
  window.theme = theme;
})();