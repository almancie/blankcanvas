import codeMirror from '../../../../assets/js/modules/code-mirror.js';

window.addEventListener('load', () => {
  const cf7Field = document.querySelector('#wpcf7-form');
  
  if (! cf7Field) return;

  codeMirror(cf7Field, {
    mode: 'htmlmixed'
  });
});