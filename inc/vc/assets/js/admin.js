import codeMirror from '../../../../assets/js/modules/code-mirror.js';
import grapick from './modules/grapick.js';

/**
 * On content load
 */
window.addEventListener('DOMContentLoaded', () => {
  if (! window.vc) return;

  // Prepare bcWPBakery from local storage
  let bcWPBakeryDefaults = {
    // toggleElements: [],
    bcElementsOnly: false
  };

  let bcWPBakery = localStorage.getItem('bcWPBakery') 
    ?  JSON.parse(localStorage.getItem('bcWPBakery')) 
    : bcWPBakeryDefaults;

  const updateBcWPBakery = () => {
    localStorage.setItem('bcWPBakery', JSON.stringify(bcWPBakery));
  }

  const rows = {
    'row': 'column',
    'row_inner': 'column_inner',
    'row_inner_inner': 'column_inner_inner',
    'glide': 'glide_slide',
    // 'group': true
  };

  // const containers = {
  //   ...rows,
  //   'tabs': 'panel',
  //   'accordion': 'accordion_item',
  // };

  // VcRowView.prototype.sortingSelector += `, 
  //   > [data-element_type=column], 
  //   > [data-element_type=column_inner], 
  //   > [data-element_type=column_inner_inner], 
  //   > [data-element_type=glide_slide]`;

  /**
   * Elements title
   */
  // vc.events.on('shortcodeView:ready', function(view) {
  //   const element = view.$el;

  //   const shortcode = view.model.attributes.shortcode;

  //   const name = vc.getMapped(shortcode).name;

  //   // Add title
  //   if (containers[shortcode] || shortcode === 'section') {
  //     // const control = element.find('> .vc_controls-row .column_add, > .vc_controls .column_move').last();
  //     const control = element.find('> .vc_controls-row > div:first-child');

  //     control?.after(`<div class="element-title">${name}</div>`)
  //   }

  //   // Wrap old title text node
  //   element.find('> .wpb_element_wrapper > .wpb_element_title').contents().filter(function() { 
  //     return this.nodeType === 3  && this.data.trim().length > 0;
  //   }).wrap('<span class="text-node"></span>');
  // });

  /**
   * Elements icons (attribute)
   */
  // vc.events.on('shortcodes:add shortcodes:update shortcodes:sync', function(model) {
  //   const params = model.attributes.params;

  //   const element = model.view.el;

  //   const iconParams = ['custom_css', 'custom_js', 'background_image'];

  //   const icons = iconParams.filter(value => params[value]);

  //   element.setAttribute('data-icons', icons.join('|'));
  // });

  /**
   * Elements icons (HTML)
   */
  // vc.events.on('shortcodeView:ready', function(view) {
  //   const element = view.$el;

  //   const title = element.find('.element-title');

  //   if (element.find('> .icons').length) return;

  //   let icons = `
  //   <div class="icons">
  //     <i class="icon-css"></i>
  //     <i class="icon-js"></i>
  //     <i class="icon-bg"></i>
  //   </div>`;

  //   const shortcode = view.model.attributes.shortcode;

  //   // If container or section, append the icons inside controls
  //   if (rows[shortcode] || shortcode === 'section') {
  //     title.after(icons);

  //     return;
  //   };

  //   element.append(icons);
  // });

  /**
   * Alternate elements colors (white/silver)
   */
  // vc.shortcodes.on('shortcodes:add', function(collection) {
  //   console.log(123);
  //   if (collection.models === undefined) {
  //     collection = [collection];
  //   }

  //   collection.forEach(model => {
  //     const element = model.view.$el;
    
  //     const attributes = model.view.model.attributes;
  
  //     if (['vc_section', 'vc_row'].includes(attributes.shortcode)) return;
  
  //     // If column, match it with parent.
  //     const parent = vc.app.views[attributes.parent_id];

  //     // if (! parent) return;
  
  //     const parentShortcode = parent.model.attributes.shortcode;
  
  //     if (containers[parentShortcode] && typeof containers[parentShortcode] === 'string') {
  //       element.attr('data-alternate', parent.$el.data('alternate'));
  
  //       return;
  //     }
  
  //     element.attr('data-alternate', ! parent.$el.data('alternate'));
  //   })
  // });


  /**
   * Open edit window on [Style] tab when double clicking an element
   */
  vc.events.on('shortcodeView:ready', function(view) {
    console.log('ready');
    view.$el.on('dblclick', e => {
      e.stopPropagation();
      
      view.editElement();
    });
  });
  
  /**
   * Hide / Show Element
  */
 vc.events.on('shortcodes:update shortcodes:sync', function(model) {
    console.log(model);
    let el = model.view.el;

    let value = model.attributes.params.disable_element;

    el.setAttribute('data-element-disabled', value === 'yes');

    // We have to remove them and rely on our data attribute 
    // because they use !important and cannot be overridden.
    el.classList.remove('vc_hidden-xs', 'vc_hidden-sm', 'vc_hidden-md', 'vc_hidden-lg');
  });

  /**
   * Section Element
   * 
   * Creates new section
   */ 
  // vc.events.on('shortcodes:section:add', function(model) {
  //   let colModel = vc.shortcodes.get(model.attributes.parent_id);

  //   if (! colModel) return;

  //   vc.shortcodes.create({
  //     shortcode: 'section',
  //     oldRowModel: vc.shortcodes.get(colModel.attributes.parent_id)
  //   });
  // });

  // /**
  //  * Section View
  //  * 
  //  * Removes old section
  //  */ 
  // vc.events.on('shortcodeView:ready:section', function(view) {
  //   if (! view.model.attributes.oldRowModel) return;

  //   // Remove old row model.
  //   view.model.attributes.oldRowModel.attributes.destroy();
  // });

  /**
   * Column
   */
  vc.events.on('shortcodes:vc_column:add', function(model) {
    // let parent = vc.shortcodes.get(model.attributes.parent_id).attributes.shortcode;

    // if (! rows[parent]) return;

    // // Update shortcode
    // model.attributes.shortcode = rows[parent];

    // let widths = ['xxl', 'xl', 'lg', 'md', 'sm', 'default'];

    // widths.forEach(name => {
    //   delete model.attributes.params[`width_${name}`];
    // });

    // A bug :/
    // const buggyAttributes = [
    //   'video_bg_url',
    //   'parallax_speed_video', 
    //   'parallax_speed_bg'
    // ];

    // Remove extra params
    // for (let param in model.attributes.params) {

    //   // Empty
    //   if (! model.attributes.params[param]) {
    //     delete model.attributes.params[param];
    //   }

    //   // Non existing
    //   // if (model.attributes.shortcode !== 'row' && buggyAttributes.includes(param)) {
    //   //   delete model.attributes.params[param];
    //   // }
    // }

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
   * Tab
   */
  vc.events.on('shortcodes:vc_tta_section:add', function(model) {
    let parent = vc.shortcodes.get(model.attributes.parent_id).attributes.shortcode;

    const map = {
      tabs: 'panel',
      accordion: 'accordion_item'
    };

    if (! map[parent]) return;
  
    // Update shortcode
    model.attributes.shortcode = map[parent];

    model.view.render();
  });

  /**
   * Text
   */ 
  vc.events.on('shortcodes:text:add shortcodes:text:update shortcodes:text:sync', function(model) {
    const contentEl = model.view.el.querySelector('[name="content"]');
    contentEl.innerHTML = contentEl.innerText;
  });

  /**
   * Icon
   */
  // vc.events.on('shortcodes:bootstrap_icon:add shortcodes:bootstrap_icon:update shortcodes:bootstrap_icon:sync', function(model) {
  //   let element = document.querySelector(`[data-model-id="${model.id}"]`);

  //   let icon = element.querySelector('.vc_element-icon');

  //   let iconClass = model.attributes.params['icon_name'];

  //   if (icon.dataset.icon) {
  //     icon.classList.remove('bi-' + icon.dataset.icon);
  //   }

  //   if (iconClass) {
  //     icon.setAttribute('data-icon', iconClass);

  //     icon.classList.add('bi-' + iconClass);
  //   }
  // });

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
   * Elements toggle
   */
  // VcRowView.prototype.events['click > .vc_controls [data-vc-control="toggle"]'] = "toggleElementAndSave";

  // VcRowView.prototype.toggleElementAndSave = function (e) {
  //   e && e.preventDefault && e.preventDefault();

  //   this.toggleElement();

  //   let toggleElements = bcWPBakery.toggleElements;

  //   const index = toggleElements.indexOf(this.model.cid);

  //   // If does not exist, add it.
  //   if (index === -1) {
  //     toggleElements.push(this.model.cid);
  //   } else {
  //     delete toggleElements[index];

  //     bcWPBakery.toggleElements = toggleElements.filter(id => id);
  //   }

  //   updateBcWPBakery();
  // }

  /**
   * Elements toggle on load
   */

  // vc.events.on('app.addAll', () => {
  //   bcWPBakery.toggleElements.forEach(id => {
  //     const model = vc.shortcodes.get(id);

  //     // Does not work because changing elements order changes the id.
  //     console.log(model.view);

  //     model.view?.toggleElement();
  //   });
  // });

  /**
   * Elements edit panel
   * 
   * Work around to allow saving while keeping the edit panel open if needed
   */
  // vc.edit_element_block_view.hide = () => {
  //   // if (this.stay) {
  //   //   return vc.app.preview();
  //   // }

  //   vc.EditElementPanelView.__super__.hide.call(this);
  // };

  /**
   * Keyboard save shortcut
   */
  // document.addEventListener('keydown', e => {
  //   if (! (e.ctrlKey && e.key !== 's')) return;

  //   if (! vc.edit_element_block_view.isVisible()) return;

  //   e.preventDefault();

  //   vc.edit_element_block_view.stay = true;
    
  //   // This saves and closes the panel
  //   vc.edit_element_block_view.save();

  //   delete vc.edit_element_block_view.stay;
  // });

  /**
   * Elements filter
   */
  // Add checkbox
  document.querySelector('.vc_ui-panel-header-actions').innerHTML +=
    `<div class="elements-filter" style="margin-top: 1rem">
      <input type="checkbox" id="bc-elements-filter">
      <label for="bc-elements-filter">Hide WPBakery Elements</label>
    </div>`;

    
  const toggleVcElements = (value) => {
    document.querySelector('.elements-filter input').checked = value;
    
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
  document.querySelector('.elements-filter').onchange = (e) => {
    const active = e.target.checked;
    
    bcWPBakery.bcElementsOnly = active;
    
    updateBcWPBakery();

    toggleVcElements(active);
  }

  /**
   * Context menu
   */
  const contextMenu = CtxMenu('#wpbakery_content');

  const getModel = element => vc.shortcodes.get(element.closest('[data-element_type]').dataset.modelId);

  contextMenu.addEventListener('open', function() {
    this.menuContainer.dataset.element = getModel(this._elementClicked);
  })
  
  // Enable / disable element
  contextMenu.addItem("Disable / Enable", element => {    
    const model = getModel(element);
    
    const value = model.attributes.params.disable_element;
    
    if (value === 'yes') {
      delete model.attributes.params.disable_element;
    } else {
      model.attributes.params.disable_element = 'yes';
    }
    
    // vc.storage.update(model);
    model.save();
    vc.events.trigger("shortcodes:update", model);
  });

  contextMenu.addSeparator();
  
  // Copy
  contextMenu.addItem("Copy", element => {
    getModel(element).view.copy();
  });

  // Paste
  contextMenu.addItem("Paste", element => {
    getModel(element).view.paste();
  });

  // Clone
  contextMenu.addItem("Clone", element => {
    getModel(element).view.clone();
  });

  contextMenu.addSeparator();
  
  // Copy style
  contextMenu.addItem("Copy style", element => {
    navigator.clipboard.writeText(getModel(element).attributes.params.custom_css);
  });

  // Paste style
  contextMenu.addItem("Paste style", element => {    
    vc.edit_element_block_view.once('afterRender', function () {
      this.$tabsMenu.find(':contains("Style")').find('button').click();

      const style = this.$el.find('[name="custom_css"]');
      
      navigator.clipboard.readText().then(clipText => style[0].editor.setValue(clipText));
      
      setTimeout(() => style[0].editor.focus(), 100);
    });
    
    getModel(element).view.editElement();
  });

  contextMenu.addSeparator();

  // Copy class
  contextMenu.addItem("Copy class", element => {
    navigator.clipboard.writeText(getModel(element).attributes.params.el_class);
  });
  
  // Paste class
  contextMenu.addItem("Paste class", element => {    
    vc.edit_element_block_view.once('afterRender', function () {
      this.$tabsMenu.find(':contains("Style")').find('button').click();
      
      const cssInput = this.$el.find('[name="el_class"]')
      
      navigator.clipboard.readText().then(clipText => cssInput.val(clipText));
      
      setTimeout(() => {
        cssInput.focus();
        const inputLength = cssInput.val().length;
        cssInput[0].setSelectionRange(inputLength, inputLength);
      }, 100);
    });
    
    getModel(element).view.editElement();
  });

  // Change section order
  // contextMenu.addItem("Change section order", element => {    
  //   const model = getModel(element);

  //   const section = vc.shortcodes.get(model.attributes.root_id);

  //   // vc.storage.update(model);
    
  //   const value = parseInt(prompt("Order:"));

  //   section.attributes.order = value;

  //   console.log(section);

  //   section.save();
  //   // vc.events.trigger("shortcodes:update", model);
  // });
  
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
      html: {
        field: '[name="content"]', 
        options: {mode: 'htmlmixed'}
      },
      glide: {
        field: '[name="config"]',  
        options: {}
      }
    };

    settings[shortcode]?.forEach(setting => {
      const element = this.el.querySelector(setting.field);

      codeMirror(element, setting.options);
    });
  });

  vc.edit_element_block_view.on('tabChange', function () {
    const tab = this.el.querySelector('.vc_ui-tabs-line .vc_active button').innerText.toLowerCase();

    const settings = {
      style: {
        field: '[name="custom_css"]',
        options: {}
      },
      script: {
        field: '[name="custom_js"]',
        options: {mode: 'javascript'}
      },
      attributes: {
        field: '[name="attributes"]',
        options: {}
      },
      events: {
        field: '[name="events"]',
        options: {mode: 'javascript'}
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

  // Switch to WPBakery backend editor automatically.
  vc.events.trigger("vc:backend_editor:show");
});