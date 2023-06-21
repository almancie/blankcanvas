import codeMirror from './modules/codeMirror.js';
import grapick from './modules/grapick.js';

window.addEventListener('load', () => {
  if (! window.vc) return;

  // document.querySelector('#vc_logo').style.background = bc.theme + '/asssets/imgs/BCLogo.svg';

  // const vcRows = {
  //   'vc_row': 'vc_column',
  //   'vc_row_inner': 'vc_column_inner',
  // };

  const rows = {
    'row': 'column',
    'row_inner': 'column_inner',
    'row_inner_inner': 'column_inner_inner',
    'advanced_list': 'advanced_list_item',
    'glide': 'glide_slide',
    'group': 'group_column'
  };

  const containers = {
    ...rows,
    'tabs': 'panel',
  };

  // Enable column sorting for our container elements
  // const sortingSelector = [
  //   ...Object.values(vcRows),
  //   ...Object.values(rows), 
  // ].map(
  //   column => `> [data-element-type=${column}]`
  // ).toString();

  // VcRowView.prototype.sortingSelector = sortingSelector;

  if (window.VcRowView) {
    VcRowView.prototype.sortingSelector += `, 
      > [data-element_type=column], 
      > [data-element_type=column_inner], 
      > [data-element_type=column_inner_inner], 
      > [data-element_type=group_column], 
      > [data-element_type=glide_slide], 
      > [data-element_type=advanced_list_item]`;
  }

  /**
   * Elements title
   */
  vc.events.on('shortcodeView:ready', function(view) {
    const element = view.$el;

    const shortcode = view.model.attributes.shortcode;

    const name = vc.getMapped(shortcode).name;

    // Add title
    if (containers[shortcode] || shortcode === 'section') {
      const control = element.find('> .vc_controls-row .column_add, > .vc_controls .column_move').last();

      control?.after(`<i class="element-title">${name}</i>`)
    }
  });

  /**
   * Elements icons (attribute)
   */
  vc.events.on('shortcodes:add shortcodes:update shortcodes:sync', function(model) {
    const params = model.attributes.params;

    const element = model.view.el;

    const iconParams = ['custom_css', 'custom_js', 'background_image'];

    const icons = iconParams.filter(value => params[value]);

    element.setAttribute('data-icons', icons.join('|'));
  });

  /**
   * Elements icons (HTML)
   */
  vc.events.on('shortcodeView:ready', function(view) {
    const element = view.$el;

    const title = element.find('.element-title');

    if (element.find('> .icons').length) return;

    let icons = `
    <div class="icons">
      <i class="icon-css"></i>
      <i class="icon-js"></i>
      <i class="icon-bg"></i>
    </div>`;

    // If container, append the icons inside controls
    if (rows[view.model.attributes.shortcode]) {
      title.after(icons);

      return;
    };

    element.append(icons);
  });

  /**
   * Alternate elements colors (white/silver)
   */
  vc.events.on('shortcodeView:ready', function(view) {
    const element = view.$el;

    const attributes = view.model.attributes;

    if (['vc_section', 'vc_row', 'section'].includes(attributes.shortcode)) return;

    const parent = vc.app.views[attributes.parent_id];

    // If column, match it with parent.
    if (containers[parent.model.attributes.shortcode]) {
      element.attr('data-alternate', parent.$el.data('alternate'));

      return;
    }

    element.attr('data-alternate', ! parent.$el.data('alternate'));
  });

  /**
   * Hide / Show Element
   */
  vc.events.on('shortcodes:add shortcodes:update shortcodes:sync', function(model) {
    let el = model.view.el;

    let disableElement = model.attributes.params.disable_element;

    el.setAttribute('data-element-disabled', disableElement === 'yes');
  });

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

    if (! rows[parent]) return;

    // Update shortcode
    model.attributes.shortcode = rows[parent];

    let widths = ['xxl', 'xl', 'lg', 'md', 'sm', 'default'];

    widths.forEach(name => {
      delete model.attributes.params[`width_${name}`];
    });

    // A bug :/
    const buggyAttributes = [
      'video_bg_url',
      'parallax_speed_video', 
      'parallax_speed_bg'
    ];

    // Remove extra params
    for (let param in model.attributes.params) {

      // Empty
      if (! model.attributes.params[param]) {
        delete model.attributes.params[param];
      }

      // Non existing
      if (model.attributes.shortcode !== 'row' && buggyAttributes.includes(param)) {
        delete model.attributes.params[param];
      }
    }

    if (model.attributes.shortcode === 'glide_slide') {
      model.attributes.params.width = '1/3';

      return;
    }

    // Set width_default param
    model.attributes.params.width_default = model.attributes.params.width;

    model.view.render();
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
    const parent = vc.shortcodes.get(model.attributes.parent_id).attributes.shortcode;

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
   * Coding fields
   */
  vc.edit_element_block_view.on('afterRender', function () {
    const shortcode = this.model.attributes.shortcode;

    const settings = {
      html: [
        {
          field: '[name="content"]', 
          options: {mode: 'htmlmixed'}
        }
      ],
      glide: [
        {
          field: '[name="config"]',  
          options: {}
        },
        {
          field: '[name="events"]',  
          options: {mode: 'javascript'}
        }
      ]
    };

    settings[shortcode]?.forEach(setting => {
      const element = this.el.querySelector(setting.field);

      codeMirror(element, setting.options);
    });
  });

  vc.edit_element_block_view.on('tabChange', function () {
    const tab = this.$tabsMenu[0].querySelector('.vc_active').querySelector('button').innerText.toLowerCase();

    const settings = {
      style: {
        field: '[name="custom_css"]',
        options: {}
      },
      script: {
        field: '[name="custom_js"]',
        options: {mode: 'javascript'}
      },
      transition: {
        field: '[name="transition_extra"]',
        options: {},
      },
      attributes: {
        field: '[name="attributes"]',
        options: {}
      }
    };

    if (! settings[tab]) return;

    const element = this.el.querySelector(settings[tab].field);

    codeMirror(element, settings[tab].options);
  });

  /**
   * Gradient background field
   */
  vc.edit_element_block_view.on('afterRender', function () {
    const field = 'gradient_background_color';

    if (! this?.mapped_params[field]) return;

    grapick(this.$el.find(`[name="${field}"]`));
  });

  /**
   * Elements highlighter
   */
  // Add checkbox
  document.querySelector('.vc_ui-panel-header-actions').innerHTML +=
    `<div class="elements-highlighter" style="margin-top: 1rem">
      <input type="checkbox" id="bc-elements-highlighter">
      <label for="bc-elements-highlighter">Hide WPBakery Elements</label>
    </div>`;

  const bcElementsOnly = localStorage.getItem('bcElementsOnly');

  // VC elements
  const vcElements = Array.prototype.filter.call(
    document.querySelectorAll('.wpb-elements-list [data-element]'), 
    element => element.dataset.element.slice(0, 3) === 'vc_'
  );

  // Hide VC elements on load
  if (bcElementsOnly == 'true') {
    document.querySelector('.elements-highlighter input').checked = true;

    vcElements.forEach(element => {
      element.classList.toggle('element-hidden', bcElementsOnly);
    });
  }

  // Add onchange listener
  document.querySelector('.elements-highlighter').onchange = (e) => {
    const active = e.target.checked;

    localStorage.setItem('bcElementsOnly', active);

    vcElements.forEach(element => {
      element.classList.toggle('element-hidden', active);
    });
  }

  // Switch to WPBakery backend editor automatically.
  vc.events.trigger("vc:backend_editor:show");
});