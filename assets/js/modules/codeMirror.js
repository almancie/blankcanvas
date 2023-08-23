export default function(field, settings = {}) {

  // Check if exists
  if (! field) return;

  // Check if already initilized
  if (field.dataset.init) return;

  let editorSettings = {
    lineNumbers: true,
    indentUnit: 2,
    indentWithTabs: false,
    continueComments: true,
    extraKeys: {
      "Ctrl-/": "toggleComment",
      "Cmd-/":  "toggleComment",
      "Alt-F":  "findPersistent",
      "Ctrl-F": "findPersistent",
      "Cmd-F":  "findPersistent",
      'Tab': function (cm) {
        if (cm.somethingSelected()) {
          cm.indentSelection("add");
        } else {
          cm.replaceSelection(cm.getOption("indentWithTabs")? "\t":
            Array(cm.getOption("indentUnit") + 1).join(" "), "end", "+input");
        }
      },
    },
    autoCloseBrackets: true,
    styleActiveLine: true,
    ...settings
  };

  let editor = wp.CodeMirror.fromTextArea(field, editorSettings);

  if (settings?.mode === 'htmlmixed') {
    editor.on("keypress", function(cm, e) {
      if (e.key !== '<') return;

      editor.execCommand("autocomplete");
    })
  }

  if (settings?.mode === 'javascript') {
    editor.on("keyup", function(cm, e) {
      if (e.key !== '.') return;

      editor.execCommand("autocomplete");
    })
  }

  editor.setValue(field.value);

  editor.on('change', function (codeMirror, changeObj) {
    field.value = editor.getValue();
  });

  // Stamp as initilized.
  field.setAttribute('data-init', true);

  return editor;
}