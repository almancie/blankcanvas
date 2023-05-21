export default function($field) {
  let fieldName = $field.attr('name');
  const types = ['linear', 'radial', 'repeating-linear', 'repeating-radial'];
  const directions = ['top', 'right', 'bottom', 'left'];

  let typeOptions = types.map(
    value => `<option value="${value}">${value}</option>`
  );

  let directionOptions = directions.map(
    value => `<option value="${value}">${value}</option>`
  );

  $field.after(
    `<div class="grapick-wrapper">
      <div id="${fieldName}" class="grapick"></div>
      <select name="grapick_type">${typeOptions}</select>
      <select name="grapick_direction">${directionOptions}</select>
    </div>`
  );

  let $typeEl = $field.siblings('.grapick-wrapper').find('[name="grapick_type"]');
  let $directionEl =$field.siblings('.grapick-wrapper').find('[name="grapick_direction"]');

  const gp = new Grapick({
    el: `#${fieldName}`,
    height: '25px',
  });

  if ($field.val()) {
    gp.setValue($field.val());
  }

  // Type field
  $typeEl.val(gp.getType());

  // Direction field
  let direction = gp.getDirection();

  $directionEl.val(direction.substring(direction.lastIndexOf(' ') + 1));

  gp.on('change', complete => {
    let value = gp.getSafeValue();

    if (! value) return;

    $field.val(value);
  });

  $typeEl.on('change', function () {
    gp.setType(this.value);
    gp.setDirection($directionEl.val());
  });

  $directionEl.on('change', function () {
    gp.setDirection(this.value);
  });

  return gp;
}