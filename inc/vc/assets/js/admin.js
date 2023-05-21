import cmEditor from './modules/codeMirrorEditor.js';
import grapick from './modules/grapick.js';

window.addEventListener('load', () => {
  if (! window.vc) return;

  // Switch to WPBakery backend editor automatically.
  vc.events.trigger("vc:backend_editor:show");

  /**
   * Section Element
   * 
   * Creates new section
   */ 
  vc.events.on('shortcodes:section:add', function(model) {
    let colModel = vc.shortcodes.get(model.attributes.parent_id);

    if (! colModel) return;

    vc.shortcodes.create({
      shortcode: 'section',
      oldRowModel: vc.shortcodes.get(colModel.attributes.parent_id)
    });
  });

  /**
   * Section View
   * 
   * Removes old section
   */ 
  vc.events.on('shortcodeView:ready:section', function(view) {
    if (! view.model.attributes.oldRowModel) return;

    // Remove old row model.
    view.model.attributes.oldRowModel.attributes.destroy();
  });

  /**
   * Column
   */ 
  vc.events.on('shortcodes:vc_column:add', function(model) {
    let parent = vc.shortcodes.get(model.attributes.parent_id).attributes.shortcode;

    let containers = {
      'advanced_list': 'advanced_list_item',
      'row': 'column',
      'row_inner': 'column_inner',
      'row_inner_inner': 'column_inner_inner',
    }

    if (containers[parent]) {
      model.attributes.shortcode = containers[parent];
    }

    let params = model.attributes.params;

    let widthParams = ['xxl', 'xl', 'lg', 'md', 'sm', 'default'];

    widthParams.forEach(name => {
      delete model.attributes.params['width_'+name];
    })

    params.width_default = params.width;
  });

  /**
   * Column Responsive Settings
   */
  jQuery('#vc_ui-panel-edit-element').on('change', '[name^="width_"]', e => {
    let editPanel = e.delegateTarget;

    let width = editPanel.querySelector('[name="width"]');

    // Store the initial VC width value
    if (! width.dataset.initialWidth) {
      width.setAttribute('data-initial-width', width.value);
    }

    let fields = [...editPanel.querySelectorAll('[name^="width_"]')];

    let largestWidth = fields.find(field => field.value);

    if (largestWidth) {
      width.value = largestWidth.value;

      return;
    }

    // If all fields are set to inherit, reset to original.
    width.value = width.dataset.initialWidth;

    editPanel.querySelector('[name="width_default"]').value = width.value;
  });

  /**
   * Icon
   */
  vc.events.on('shortcodes:bootstrap_icon:add shortcodes:bootstrap_icon:update shortcodes:bootstrap_icon:sync', function(model) {
    let element = document.querySelector(`[data-model-id="${model.id}"]`);

    let icon = element.querySelector('.vc_element-icon');

    let iconClass = model.attributes.params['icon_name'];

    if (icon.dataset.icon) {
      icon.classList.remove('bi-' + icon.dataset.icon);
    }

    if (iconClass) {
      icon.setAttribute('data-icon', iconClass);

      icon.classList.add('bi-' + iconClass);
    }
  });

  /**
   * Tabs
   */
  vc.events.on('shortcodes:tabs:sync', function(model) {
    let activePanelIndex = model.attributes.params.active_section ?? 1;

    let activePanelModelId = model.view.$content.children()[activePanelIndex - 1]?.dataset['modelId'];

    if (activePanelModelId) {
      model.view.changeActiveSection(activePanelModelId);

      return;
    }

    model.view.makeFirstSectionActive();
  });

  /**
   * Accordion
   */
  vc.events.on('shortcodes:accordion:update', function(model) {
    if (model.attributes.params.always_close !== 'yes') return;

    if (model.attributes.params.el_id) return;

    model.attributes.params.el_id = 'accordion-' + vc_guid();
  });

  /**
   * Panel item / Accordion item
   */
  vc.events.on('shortcodes:vc_tta_section:add', function(model) {
    let parentId = model.attributes.parent_id;

    let parent = vc.shortcodes.get(model.attributes.parent_id).attributes.shortcode;

    if (parent === 'tabs') {
      model.attributes.shortcode = 'panel';
    }

    if (parent === 'accordion') {
      model.attributes.shortcode = 'accordion_item';
    }

    // Remove unnecessary params added by WPBakery.
    model.attributes.params = {};
  });

  /**
   * HTML
   */
  vc.edit_element_block_view.on('afterRender', function () {
    if (this.model.attributes.shortcode !== 'html') return;

    cmEditor(this.el.querySelector('[name="content"]'), {
      mode: 'htmlmixed'
    });
  });

  /**
   * Gradient background field
   */
  vc.edit_element_block_view.on('afterRender', function () {
    let field = 'gradient_background_color';

    if (! this?.mapped_params[field]) return;

    grapick(this.$el.find(`[name="${field}"]`));
  });

  /**
   * CSS & JS fields
   */
  vc.edit_element_block_view.on('tabChange', function () {
    let tab = this.$tabsMenu[0].querySelector('.vc_active').querySelector('button').innerText.toLowerCase();

    // CSS
    if (tab === 'style') {
      this.cssEditor = cmEditor(this.el.querySelector('[name="custom_css"]'));
    }

    // JS
    if (tab === 'script') {
      this.jsEditor = cmEditor(this.el.querySelector('[name="custom_js"]'), {
        mode: 'javascript'
      });
    }
  });

  /**
   * Elements colors (white/silver)
   */
  vc.events.on('shortcodes:add shortcodes:sync', function(model) {
    let element = model.view.$el;
    let parent = vc.app.views[model.attributes.parent_id];

    if (! parent) {
      element.attr('data-alternate', false);

      return;
    }

    let containers = ['row', 'row_inner', 'row_inner_inner', 'advanced_list','tabs', 'accordion'];

    if (containers.includes(parent.model.attributes.shortcode)) {
      element.attr('data-alternate', parent.$el.data('alternate'));

      return;
    }

    element.attr('data-alternate', ! parent.$el.data('alternate'));
  })

  /**
   * Hide / Show Element
   */
  vc.events.on('shortcodes:update shortcodes:sync', function(model) {
    let el = model.view.el;

    let disableElement = model.attributes.params.disable_element;

    if (disableElement === 'yes') {
      el.classList.add('element-disabled');

      return;
    }

    if (el.classList.contains('element-disabled')) {
      el.classList.remove('element-disabled');
    }
  });
});