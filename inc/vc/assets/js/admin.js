import codeMirror from '../../../../assets/js/modules/code-mirror.js';
import grapick from './modules/grapick.js';
import Ctx from './modules/ctxmenu.js';

/**
 * On content load
 */
window.addEventListener('DOMContentLoaded', () => {
  if (! window.vc) return;

  // WPBakery storage
  const vcStorage = {
    copied: null
  };

  // Prepare bcWPBakery from local storage
  let bcWPBakeryDefaults = {
    bcElementsOnly: false
  };

  let bcWPBakery = localStorage.getItem('bcWPBakery') 
    ?  JSON.parse(localStorage.getItem('bcWPBakery')) 
    : bcWPBakeryDefaults;

  const updateBcWPBakery = () => {
    localStorage.setItem('bcWPBakery', JSON.stringify(bcWPBakery));
  }

  VcRowView.prototype.sortingSelector += `, 
    > [data-element_type=column_inner_inner], 
    > [data-element_type=glide_slide]`;

  /**
   * Open edit window on [Style] tab when double clicking an element
   */
  vc.events.on('shortcodeView:ready', function(view) {
    view.$el.on('dblclick', e => {
      e.stopPropagation();
      
      view.editElement();
    });
  });

  /**
   * Extend VcBackendTtaTourView to override some functions
   */
  window.TabsView = window.VcBackendTtaTabsView.extend({
    addSection: function(e) {
      e = {
          shortcode: 'panel',
          params: {
              title: this.defaultSectionTitle
          },
          parent_id: this.model.get("id"),
          order: _.isBoolean(e) && e ? vc.add_element_block_view.getFirstPositionIndex() : vc.shortcodes.getNextOrder(),
          prepend: e
      };
      return vc.shortcodes.create(e);
    }
  });

  /**
   * Extend VcBackendTtaTourView to override some functions
   */
  window.AccordionView = window.VcBackendTtaAccordionView.extend({
    addSection: function(e) {
      e = {
          shortcode: 'accordion_item',
          params: {
              title: this.defaultSectionTitle
          },
          parent_id: this.model.get("id"),
          order: _.isBoolean(e) && e ? vc.add_element_block_view.getFirstPositionIndex() : vc.shortcodes.getNextOrder(),
          prepend: e
      };
      return vc.shortcodes.create(e);
    }
  });

  /**
   * Hide / Show Element
   */
  vc.events.on('shortcodeView:ready shortcodes:update shortcodes:sync', function(modelView) {
    const view = modelView.view ?? modelView;

    const el = view.el;

    const disable = view.model.attributes.params.disable_element;
    
    el.setAttribute('data-element-disabled', disable === 'yes');
    
    // We have to remove them and rely on our data attribute 
    // because they use !important and cannot be overridden.
    el.classList.remove('vc_hidden-xs', 'vc_hidden-sm', 'vc_hidden-md', 'vc_hidden-lg');
  });

  /**
   * Column + Inner Column
   */
  vc.events.on('shortcodes:add', function(model) {
    const columns = ['vc_column', 'vc_column_inner', 'column_inner_inner'];

    if (columns.indexOf(model.attributes.shortcode) === -1) return;

    // Set width_default param
    model.attributes.params.width_default = model.attributes.params.width;

    model.save();
  });

  /**
   * Glide slide
   */
  vc.events.on('shortcodes:vc_column:add', function(model) {
    let parent = vc.shortcodes.get(model.attributes.parent_id).attributes.shortcode;

    if (parent !== 'glide') return;
  
    model.attributes.params.width = '1/3';
    model.attributes.shortcode = 'glide_slide';
  });

  /**
   * Inner Inner Column
   */
  vc.events.on('shortcodes:vc_column:add', function(model) {
    let parent = vc.shortcodes.get(model.attributes.parent_id).attributes.shortcode;

    if (parent !== 'row_inner_inner') return;

    delete model.attributes.params.parallax;
    delete model.attributes.params.parallax_speed_bg;

    model.attributes.shortcode = 'column_inner_inner';
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
   * Text
   */ 
  vc.events.on('shortcodes:text:add shortcodes:text:update shortcodes:text:sync', function(model) {
    const contentEl = model.view.el.querySelector('[name="content"]');
    contentEl.innerHTML = contentEl.innerText;
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
   * Elements filter
   */
  document.querySelector('.vc_ui-panel-header-actions').innerHTML +=
  `<div class="bc-switch bc-elements-filter">
    <div class="bc-switch-toggle">
      <input type="checkbox" class="bc-switch-input" id="blankCanvasElement">
      <label class="bc-switch-slider" for="blankCanvasElement"></label>
    </div>
    <label class="bc-switch-label" for="blankCanvasElement">Blank Canvas elements only</label>
  </div>`;

  const toggleVcElements = (value) => {
    document.querySelector('.bc-elements-filter input').checked = value;

    // VC elements
    const vcElements = Array.prototype.filter.call(
      document.querySelectorAll('.wpb-elements-list [data-element]'), 
      // element => element.dataset.element.slice(0, 3) === 'vc_'
      element => ! element.classList.contains('bc-element_o')
    );

    vcElements.forEach(element => {
      element.classList.toggle('element-hidden', value);
    });
  }

  // Hide VC elements on load
  if (bcWPBakery.bcElementsOnly) {
    toggleVcElements(true);
  }

  // Add onchange listener
  document.querySelector('.bc-elements-filter').onchange = (e) => {
    const active = e.target.checked;
    
    bcWPBakery.bcElementsOnly = active;
    
    updateBcWPBakery();

    toggleVcElements(active);
  }

  /**
   * Context menu
   */
  const ctx = Ctx.createMenu('#wpbakery_content');

  const getModel = element => vc.shortcodes.get(element.closest('[data-element_type]').dataset.modelId);

  const notifyUpdate = element => {
    element.closest('[data-model-id]').setAttribute('data-element-updated', 'true');

    setTimeout(() => {
      element.closest('[data-model-id]').removeAttribute('data-element-updated');
    }, 1000);
  }

  ctx.on('open', function() {
    this.container.dataset.element = getModel(this._elementClicked);
  });

  ctx.addItems({
    'Copy': element => {
      getModel(element).view.copy();

      vcStorage.copied = getModel(element);
    },
    'Paste': element => {
      let view = getModel(element).view;

      if (view.el.classList.contains('wpb_content_element') || view.el.dataset.element_type === 'row_inner_inner') {
        view = vc.shortcodes.get(view.model.attributes.parent_id).view;
      }

      view.paste();
    },
    'Separator': null,
    'Paste settings': element => {
      if (! vcStorage.copied) return;
      
      const model = getModel(element);
      
      if (model.attributes.shortcode !== vcStorage.copied.attributes.shortcode) return;
      
      const updatedParams = {...vcStorage.copied.attributes.params};
      
      delete updatedParams.content;
      delete updatedParams.image;
      delete updatedParams.source;
      delete updatedParams.link;

      model.save('params', {
        ...model.attributes.params,
        ...updatedParams
      });

      notifyUpdate(element);
    },
    'Paste content': element => {
      if (! vcStorage.copied) return;
      
      const model = getModel(element);
      
      if (model.attributes.shortcode !== vcStorage.copied.attributes.shortcode) return;
      
      const params = vcStorage.copied.attributes.params;
      
      const updatedParams = {};

      if (params.content) {
        updatedParams.content = params.content;
      }

      if (params.image) {
        updatedParams.image = params.image;
      }
      
      model.save('params', {
        ...model.attributes.params,
        ...updatedParams
      });
      
      notifyUpdate(element);
    },
    'Paste Attributes': element => {
      if (! vcStorage.copied) return;

      const model = getModel(element);

      const params = vcStorage.copied.attributes.params;

      model.save('params', {
        ...model.attributes.params,
        attributes: params.attributes,
      });

      notifyUpdate(element);
    },
    'Paste style': element => {
      if (! vcStorage.copied) return;

      const model = getModel(element);

      // const targetParams = model.attributes.params;

      const params = vcStorage.copied.attributes.params;

      const updatedParams = {};
      
      if (model.attributes.shortcode === vcStorage.copied.attributes.shortcode) { 
        for (const param in params) {
          if (! param.endsWith('_class')) continue;
          
          updatedParams[param] = params[param];
        }
      }

      model.save('params', {
        ...model.attributes.params,
        ...updatedParams,
        el_class: params.el_class,
        custom_css: params.custom_css,
        internal_css: params.internal_css
      });
      
      notifyUpdate(element);
    },
    'Paste style on similar': () => {
      if (! vcStorage.copied) return;
      
      const models = vc.shortcodes.models.filter(model => model.attributes.shortcode === vcStorage.copied.attributes.shortcode);

      const params = vcStorage.copied.attributes.params;

      const updatedParams = {};

      // CSS fields
      for (const param in params) {
        if (! param.endsWith('_class')) continue;
        
        updatedParams[param] = params[param];
      }

      for (const model of models) {
        model.save('params', {
          ...model.attributes.params,
          ...updatedParams,
          el_class: params.el_class,
          custom_css: params.custom_css,
          internal_css: params.internal_css
        });

        notifyUpdate(model.view.el);
      }
    },
    'Separator2': null,
    'Disable / Enable': element => {    
      const model = getModel(element);
      
      const value = model.attributes.params.disable_element;
      
      if (value === 'yes') {
        delete model.attributes.params.disable_element;
      } else {
        model.attributes.params.disable_element = 'yes';
      }

      model.save();

      vc.events.trigger("shortcodes:update", model);
    }
  });
});

/**
 * On scripts load
 */
window.addEventListener('load', () => {
  if (! window.vc) return;

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
        }
      ]
    };

    if (! settings[shortcode]) return;

    settings[shortcode].forEach(setting => {
      const element = this.el.querySelector(setting.field);

      codeMirror(element, setting.options);
    });
  });

  vc.edit_element_block_view.on('tabChange', function () {
    const tab = this.el.querySelector('.vc_ui-tabs-line .vc_active button').innerText.toLowerCase();

    const settings = {
      style: [
        {
          field: '[name="custom_css"]',
          options: {}
        },
        {
          field: '[name="internal_css"]',
          options: {mode: 'text/css'}
        }
      ],
      script: [
        {
          field: '[name="custom_js"]',
          options: {mode: 'javascript'}
        }
      ],
      attributes: [
        {
          field: '[name="attributes"]',
          options: {}
        }
      ],
      events: [
        {
          field: '[name="events"]',
          options: {mode: 'javascript'}
        }
      ]
    };

    if (! settings[tab]) return;

    for (const fieldSettings of settings[tab]) {
      const element = this.el.querySelector(fieldSettings.field);

      codeMirror(element, fieldSettings.options);
    }
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
   * Attach video field
   */
  function initVideoField(field) {
    if (! field) return;

    const button = field.querySelector('.attach-video-button');
    const input = field.querySelector('input.wpb_vc_param_value');
    const preview = field.querySelector('.video-preview');
    
    if (!button || !input || !preview) return;

    button.addEventListener('click', function (e) {
      e.preventDefault();

      const frame = wp.media({
        title: 'Select or Upload a Video',
        button: {
            text: 'Use this video'
        },
        library: {
            type: 'video'
        },
        multiple: false
      });

      frame.on('select', function () {
        const attachment = frame.state().get('selection').first().toJSON();
        input.value = attachment.id;
        input.dispatchEvent(new Event('change'));
        preview.innerHTML = `<video width="300" controls><source src="${attachment.url}">`;
      });

      frame.open();
    });
  }

  vc.edit_element_block_view.on('afterRender', function () {
    const field = this.$el.find('.custom-video-attach-wrapper')[0];

    if (field) initVideoField(field);
  });

  // Switch to WPBakery backend editor automatically.
  // vc.events.trigger("vc:backend_editor:show");
});