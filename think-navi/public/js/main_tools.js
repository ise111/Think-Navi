/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/main_tools.js ***!
  \************************************/
// header btn
var btnAddChild = document.getElementById('btn-add-child');
var btnAddBro = document.getElementById('btn-add-bro');
var btnDelelte = document.getElementById('btn-delete');
var btnExpand = document.getElementById('btn-expand');
var btnStore = document.getElementById('btn-store');
var btnZoom = document.getElementById('btn-zoom');
var btnZoomOut = document.getElementById('btn-zoom-out');
var dropdownTextSizeAdjustButton = document.getElementById('dropdownTextSizeAdjustButton');
var btnTextSizeUp = document.getElementById('text-size-up');
var btnTextSizeDown = document.getElementById('text-size-down');
var btnCenter = document.getElementById('btn-center');
var btnHelps = document.querySelectorAll('.btn-help');
var btnHelpBacks = document.querySelectorAll('.btn-help-back'); // group btn

var btnAddGroup = document.getElementById('btn-add-group');
var btnsAddGroupContentInGroup = document.querySelectorAll('.add-group-content-in-group'); // sub btn

var btnOpenModals = document.querySelectorAll('.btn-open-modal');
var btnEditFileNames = document.querySelectorAll('.btn-edit-file-name');
var btnOpenDropdowns = document.querySelectorAll('.btn-open-dropdown');
var btnSubmits = document.querySelectorAll('.btn-submit'); // footer btn

var btnComparison = document.getElementById('btn-comparison');
var btnComparisonModalClose = document.getElementById('btn-comparison-modal-close');
var map = document.querySelector('.map');
var editContents = document.querySelectorAll('.edit-content');
var showContents = document.querySelectorAll('.show-content');
var showGroupCategories = document.querySelectorAll('.show-group-category');
var dragStarts = document.querySelectorAll('.drag-start');
var mapArea = document.getElementById('map-area');
var groupPage = document.querySelector('.group-page');
var newParent = document.querySelector('.new-parent'); // input btn

var comparisonInput = document.querySelector('.comparison-input');
var memoInput = document.querySelector('.memo-input');
var navInput = document.querySelector('.nav-input');
var deleteContentInput = document.querySelector('.delete-content-input');
var changeColorInput = document.querySelector('.change-color-input');
var text_size_input = document.querySelector('.text-size-input');
var textSize = document.getElementById('text-size');
var currentMapPositionXInputs = document.querySelectorAll('.current-map-position-x');
var currentMapPositionYInputs = document.querySelectorAll('.current-map-position-y');
var currentMapScaleInputs = document.querySelectorAll('.current-map-scale');
var groupInputs = document.querySelectorAll('.group-input'); // input?????????

function changeEditContent(show_content) {
  show_content.target.classList.toggle('hidden');
  var input_content = show_content.target.previousElementSibling;
  input_content.classList.toggle('hidden');
  input_content.focus();
} // div???????????????


function changeShowContent(content) {
  if (newParent) {
    return;
  }

  content.target.classList.toggle('hidden');
  content.target.nextElementSibling.classList.toggle('hidden');
} // ?????????????????????


function editFileName(btn) {
  var confirm_edit = document.querySelector('.edit-file-name-div');
  var show_think_file = btn.target.closest('.file').querySelector('.show-file');
  var edit_file_name_form = btn.target.closest('.file').querySelector('.edit-file-name');

  if (confirm_edit) {
    confirm_edit.closest('.file').querySelector('.show-file').classList.toggle('hidden');
    confirm_edit.remove();
    return;
  }

  var edit_file_name_div = document.createElement('div');
  var edit_file_name_input = document.createElement('input');
  show_think_file.classList.toggle('hidden');
  edit_file_name_input.type = 'text';
  edit_file_name_input.name = 'edit_file_name';
  edit_file_name_input.value = show_think_file.textContent.trim();
  edit_file_name_div.classList.add('edit-file-name-div', 'absolute', 'top-0', 'left-0', 'flex', 'items-center', 'w-full', 'h-full', 'bg-gray-900', 'px-4');
  edit_file_name_input.classList.add('bg-gray-900', 'text-white', 'w-1/2', 'outline-none');
  edit_file_name_form.appendChild(edit_file_name_div);
  edit_file_name_div.appendChild(edit_file_name_input);
  edit_file_name_input.focus();
} // ??????????????????rgb??????hex?????????


function rgbToHexColor(color) {
  var rgb_colors = color.match(/\d+/g);
  return '#' + rgb_colors.map(function (rgbColor) {
    return ("0" + Number(rgbColor).toString(16)).slice(-2);
  }).join("");
} // ?????????????????????


function selectContent(content) {
  var confirm_add_content_exist = document.querySelector('.add-new-content');

  if (confirm_add_content_exist) {
    var confirm_other_child_exist = confirm_add_content_exist.closest('.content-area').querySelector('.next-child-area').childElementCount;
    document.querySelector('.add-new-content-beside-border').remove();
    document.querySelector('.add-new-content').remove();

    if (confirm_other_child_exist > 0) {
      document.querySelector('.add-new-content-vertical-border').remove();
      document.querySelector('.previous-content-vertical-border').remove();
    }
  }

  var other_selected_contents = document.querySelectorAll('.selected-content');
  var boder_same_bg_color_contents = document.querySelectorAll('.border-same-bg-color');

  if (!content.shiftKey) {
    if (other_selected_contents) {
      other_selected_contents.forEach(function (other_selected_content) {
        other_selected_content.classList.toggle('selected-content');
        other_selected_content.classList.toggle('border-solid');
        other_selected_content.classList.toggle('border-dashed');
      });
    }

    if (boder_same_bg_color_contents) {
      boder_same_bg_color_contents.forEach(function (boderSameBgColorContent) {
        boderSameBgColorContent.classList.toggle('border-same-bg-color');
        boderSameBgColorContent.style.borderColor = boderSameBgColorContent.style.backgroundColor;
        boderSameBgColorContent.previousElementSibling.style.borderColor = boderSameBgColorContent.style.backgroundColor;
      });
    }
  }

  var color_inputs = document.querySelectorAll('.change-color-inputs');
  color_inputs.forEach(function (color_input) {
    color_input.remove();
  });
  var delete_content_inputs = document.querySelectorAll('.delete-content-inputs');
  delete_content_inputs.forEach(function (delete_content_input) {
    delete_content_input.remove();
  });
  var text_size_inputs = document.querySelectorAll('.text-size-inputs');
  text_size_inputs.forEach(function (text_size_input) {
    text_size_input.remove();
  });

  if (groupPage) {
    var group_inputs = document.querySelectorAll('.group-inputs');
    group_inputs.forEach(function (group_input) {
      group_input.remove();
    });
  }

  content.target.classList.toggle('selected-content');
  content.target.classList.toggle('border-solid');
  content.target.classList.toggle('border-dashed');
  var select_contents = document.querySelectorAll('.selected-content');
  var select_border_color = content.target.style.borderColor;
  var select_bg_color = content.target.style.backgroundColor;
  var select_text_color = content.target.style.color;
  var select_text_size = content.target.style.fontSize.match(/\d+/g);
  var select_content_id = content.target.closest('.content-area').querySelector('.edit-id').value;
  var select_content_id_array = Array();
  document.getElementById('border-color').value = rgbToHexColor(select_border_color);
  document.getElementById('bg-color').value = rgbToHexColor(select_bg_color);
  document.getElementById('text-color').value = rgbToHexColor(select_text_color);
  textSize.value = select_text_size;

  if (content.target.style.borderColor === content.target.style.backgroundColor) {
    content.target.classList.toggle('border-same-bg-color');
    content.target.style.borderColor = '#000000';
    content.target.previousElementSibling.style.borderColor = '#000000';
  }

  if (!content.shiftKey) {
    comparisonInput.value = select_content_id;
    memoInput.value = select_content_id;
    navInput.value = select_content_id;
    deleteContentInput.value = select_content_id;
    changeColorInput.value = select_content_id;
    text_size_input.value = select_content_id;

    if (groupPage) {
      groupInputs.forEach(function (groupInput) {
        groupInput.value = select_content_id;
      });
    }
  } else {
    select_contents.forEach(function (selectContent) {
      var contentId = selectContent.parentNode.parentNode.querySelector('.edit-id').value;
      select_content_id_array.push(contentId);
    });
    deleteContentInput.value = select_content_id_array[0];
    changeColorInput.value = select_content_id_array[0];
    text_size_input.value = select_content_id_array[0];

    if (groupPage) {
      groupInputs.forEach(function (groupInput) {
        groupInput.value = select_content_id_array[0];
      });
    }

    if (select_content_id_array.length > 1) {
      var _loop = function _loop(i) {
        var clone_color_input = changeColorInput.cloneNode(true);
        clone_color_input.className = 'change-color-inputs';
        clone_color_input.value = select_content_id_array[i];
        changeColorInput.after(clone_color_input);
        var clone_delete_content_input = deleteContentInput.cloneNode(true);
        clone_delete_content_input.className = 'delete-content-inputs';
        clone_delete_content_input.value = select_content_id_array[i];
        deleteContentInput.after(clone_delete_content_input);
        var clone_text_size_input = text_size_input.cloneNode(true);
        clone_text_size_input.className = 'text-size-inputs';
        clone_text_size_input.value = select_content_id_array[i];
        text_size_input.after(clone_text_size_input);

        if (groupPage) {
          groupInputs.forEach(function (groupInput) {
            var clone_group_input = groupInput.cloneNode(true);
            clone_group_input.className = 'group-inputs';
            clone_group_input.value = select_content_id_array[i];
            groupInput.after(clone_group_input);
          });
        }
      };

      for (var i = 1; i < select_content_id_array.length; i++) {
        _loop(i);
      }
    }
  }
} // ???????????????????????????????????????


function startSelect() {
  var selected_content = document.querySelector('.selected-content');

  if (selected_content.classList.contains('new-parent')) {
    return;
  }

  var select_border_color = selected_content.style.borderColor;
  var select_bg_color = selected_content.style.backgroundColor;
  var select_text_color = selected_content.style.color;
  var select_content_id = selected_content.closest('.content-area').querySelector('.edit-id').value;
  comparisonInput.value = select_content_id;
  memoInput.value = select_content_id;
  navInput.value = select_content_id;
  deleteContentInput.value = select_content_id;
  changeColorInput.value = select_content_id;

  if (groupPage) {
    groupInputs.forEach(function (groupInput) {
      groupInput.value = select_content_id;
    });
  }

  document.getElementById('border-color').value = rgbToHexColor(select_border_color);
  document.getElementById('bg-color').value = rgbToHexColor(select_bg_color);
  document.getElementById('text-color').value = rgbToHexColor(select_text_color);
  text_size_input.value = select_content_id;

  if (selected_content.style.borderColor === selected_content.style.backgroundColor) {
    selected_content.classList.toggle('border-same-bg-color');
    selected_content.style.borderColor = '#000000';
    selected_content.previousElementSibling.style.borderColor = '#000000';
  }
} // ??????????????????
// function selectGroup(group) {
//     const other_selected_contents = document.querySelectorAll('.selected-content');
//     const otherSelectedGroupCategories = document.querySelectorAll('.selected-group-category');
//     if(!(group.shiftKey)) {
//         if (other_selected_contents) {
//             other_selected_contents.forEach(function(other_selected_content) {
//                 other_selected_content.classList.toggle('selected-content');
//                 other_selected_content.classList.toggle('border-solid');
//                 other_selected_content.classList.toggle('border-dashed');
//             });
//         }
//         if (otherSelectedGroupCategories) {
//             otherSelectedGroupCategories.forEach(function(otherSelectedGroupCategory) {
//                 otherSelectedGroupCategory.classList.toggle('selected-group-category');
//                 otherSelectedGroupCategory.classList.toggle('border-solid');
//                 otherSelectedGroupCategory.classList.toggle('border-dashed');
//             });
//         }
//     }
//     const group_border = group.target.nextElementSibling;
//     group_border.classList.toggle('selected-group-category');
//     group_border.classList.toggle('border-solid');
//     group_border.classList.toggle('border-dashed');
// }
// ??????????????????????????????


function selectAddContent(content) {
  var other_selected_content = document.querySelector('.selected-content');

  if (other_selected_content) {
    other_selected_content.classList.toggle('selected-content');
    other_selected_content.classList.toggle('border-solid');
    other_selected_content.classList.toggle('border-dashed');
  }

  content.classList.toggle('selected-content');
  content.classList.toggle('border-solid');
  content.classList.toggle('border-dashed');
  var color_inputs = document.querySelectorAll('.change-color-inputs');
  color_inputs.forEach(function (color_input) {
    color_input.remove();
  });
  var delete_content_inputs = document.querySelectorAll('.delete-content-inputs');
  delete_content_inputs.forEach(function (delete_content_input) {
    delete_content_input.remove();
  });
  var text_size_inputs = document.querySelectorAll('.text-size-inputs');
  text_size_inputs.forEach(function (text_size_input) {
    text_size_input.remove();
  });

  if (groupPage) {
    var group_inputs = document.querySelectorAll('.group-inputs');
    group_inputs.forEach(function (group_input) {
      group_input.remove();
    });
  }

  memoInput.value = '';
  navInput.value = '';
  deleteContentInput.value = '';
  comparisonInput.value = '';
  changeColorInput.value = '';
  text_size_input.value = '';
} // ???????????????????????????????????????


function contentAdjustWidth(content_value) {
  content_value.target.previousElementSibling.textContent = content_value.target.value;
} // ???????????????


function addChild() {
  if (newParent) {
    return;
  }

  var selected_content = document.querySelector('.selected-content');

  if (!selected_content) {
    operateMessage(btnAddChild, '??????????????????????????????????????????????????????????????????????????????');
    return;
  }

  var confirm_child_exist = selected_content.closest('.content-area').querySelector('.next-child-area').children;
  var confirm_add_content_exist = document.querySelector('.add-new-content');
  var confirm_other_child_exist = selected_content.closest('.content-area').querySelector('.next-child-area').childElementCount;
  var previous_selected_content = selected_content.closest('.content-area').querySelector('.show-content');

  if (confirm_add_content_exist) {
    document.querySelector('.add-new-content-beside-border').remove();
    document.querySelector('.add-new-content').remove();
    previous_selected_content.classList.toggle('selected-content');
    previous_selected_content.classList.toggle('border-dashed');

    if (confirm_other_child_exist > 0) {
      document.querySelector('.add-new-content-vertical-border').remove();
      document.querySelector('.previous-content-vertical-border').remove();
    }

    return;
  }

  if (!(confirm_child_exist.length === 0)) {
    var add_content_area = selected_content.closest('.content-area').querySelector('.next-child-area');
    var form = add_content_area.lastElementChild;
    var beside_border = document.createElement('div');
    beside_border.classList.add('add-new-content-beside-border', 'w-10', 'border-t-4', 'border-black');
    var content_area = document.createElement('div');
    content_area.classList.add('add-new-content', 'relative', 'inline-block', 'my-2');
    var dummy = document.createElement('div');
    dummy.classList.add('invisible', 'inline-block', 'px-4', 'py-3');
    var input = document.createElement('input');
    input.type = 'text';
    input.setAttribute('name', 'edit_child');
    input.classList.add('add_content', 'text-center', 'outline-none', 'rounded', 'h-10', 'border-solid', 'border-4', 'border-gray-900', 'absolute', 'top-0', 'left-0', 'w-full', 'px-3', 'py-2');

    if (confirm_other_child_exist > 0) {
      var previous_child = form.previousElementSibling;
      var vertical_border = document.createElement('div');
      vertical_border.classList.add('add-new-content-vertical-border', 'absolute', 'top-0', 'left-0', 'h-1/2', 'border-l-4', 'border-black');
      var previous_child_vertical_border = document.createElement('div');
      previous_child_vertical_border.classList.add('previous-content-vertical-border', 'absolute', 'bottom-0', 'left-0', 'h-1/2', 'border-l-4', 'border-black');
      previous_child.appendChild(previous_child_vertical_border);
      form.appendChild(vertical_border);
    }

    form.appendChild(beside_border);
    form.appendChild(content_area);
    content_area.appendChild(dummy);
    content_area.appendChild(input);
    selectAddContent(input);
    input.focus();
    input.addEventListener('input', contentAdjustWidth);
    moveFocus();
  } else {
    var _add_content_area = selected_content.closest('.content-area');

    var _form = _add_content_area.querySelector('.add-content-area');

    var _beside_border = document.createElement('div');

    _beside_border.classList.add('add-new-content-beside-border', 'w-10', 'border-t-4', 'border-black');

    var _content_area = document.createElement('div');

    _content_area.classList.add('add-new-content', 'relative', 'inline-block', 'my-2');

    var _dummy = document.createElement('div');

    _dummy.classList.add('invisible', 'inline-block', 'px-4', 'py-3');

    var _input = document.createElement('input');

    _input.type = 'text';

    _input.setAttribute('name', 'edit_child');

    _input.classList.add('add_content', 'text-center', 'outline-none', 'rounded', 'h-10', 'border-solid', 'border-4', 'border-gray-900', 'absolute', 'top-0', 'left-0', 'w-full', 'px-3', 'py-2');

    if (confirm_other_child_exist > 0) {
      var _previous_child = _form.previousElementSibling;

      var _vertical_border = document.createElement('div');

      _vertical_border.classList.add('add-new-content-vertical-border', 'absolute', 'top-0', 'left-0', 'h-1/2', 'border-l-4', 'border-black');

      var _previous_child_vertical_border = document.createElement('div');

      _previous_child_vertical_border.classList.add('previous-content-vertical-border', 'absolute', 'bottom-0', 'left-0', 'h-1/2', 'border-l-4', 'border-black');

      _previous_child.appendChild(_previous_child_vertical_border);

      _form.appendChild(_vertical_border);
    }

    _form.appendChild(_beside_border);

    _form.appendChild(_content_area);

    _content_area.appendChild(_dummy);

    _content_area.appendChild(_input);

    selectAddContent(_input);

    _input.focus();

    _input.addEventListener('input', contentAdjustWidth);

    moveFocus();
  }
} // ?????????????????????


function addBro() {
  if (newParent) {
    return;
  }

  var selected_content = document.querySelector('.selected-content');

  if (!selected_content) {
    operateMessage(btnAddBro, '??????????????????????????????????????????????????????????????????????????????');
    return;
  }

  if (selected_content.classList.contains('parent')) {
    operateMessage(btnAddBro, '????????????????????????????????????????????????????????????');
    return;
  }

  var confirm_add_content_exist = document.querySelector('.add-new-content');
  var confirm_nav_content = selected_content.classList.contains('for-nav');
  var previous_selected_content_parent = selected_content.closest('.content-area').querySelector('.show-content');

  if (confirm_nav_content) {
    operateMessage(btnAddBro, 'nav??????????????????????????????????????????????????????????????????????????????nav????????????????????????????????????');
    return;
  }

  if (confirm_add_content_exist) {
    document.querySelector('.add-new-content-beside-border').remove();
    document.querySelector('.add-new-content').remove();
    document.querySelector('.add-new-content-vertical-border').remove();
    document.querySelector('.previous-content-vertical-border').remove();
    previous_selected_content_parent.classList.toggle('selected-content');
    previous_selected_content_parent.classList.toggle('border-dashed');
    return;
  }

  var add_content_area = selected_content.closest('.next-child-area');
  var form = add_content_area.lastElementChild;
  var previous_child = form.previousElementSibling;
  var previous_child_vertical_border = document.createElement('div');
  previous_child_vertical_border.classList.add('previous-content-vertical-border', 'absolute', 'bottom-0', 'left-0', 'h-1/2', 'border-l-4', 'border-black');
  var beside_border = document.createElement('div');
  beside_border.classList.add('add-new-content-beside-border', 'w-10', 'border-t-4', 'border-black');
  var vertical_border = document.createElement('div');
  vertical_border.classList.add('add-new-content-vertical-border', 'absolute', 'top-0', 'left-0', 'h-1/2', 'border-l-4', 'border-black');
  var content_area = document.createElement('div');
  content_area.classList.add('add-new-content', 'relative', 'inline-block', 'my-2');
  var dummy = document.createElement('div');
  dummy.classList.add('invisible', 'inline-block', 'px-4', 'py-3');
  var input = document.createElement('input');
  input.type = 'text';
  input.setAttribute('name', 'edit_child');
  input.classList.add('add_content', 'text-center', 'outline-none', 'rounded', 'h-10', 'border-solid', 'border-4', 'border-gray-900', 'absolute', 'top-0', 'left-0', 'w-full', 'px-3', 'py-2');
  previous_child.appendChild(previous_child_vertical_border);
  form.appendChild(beside_border);
  form.appendChild(vertical_border);
  form.appendChild(content_area);
  content_area.appendChild(dummy);
  content_area.appendChild(input);
  selectAddContent(input);
  input.focus();
  input.addEventListener('click', selectContent);
  input.addEventListener('input', contentAdjustWidth);
  moveFocus();
} // ??????????????????


function expand() {
  if (newParent) {
    return;
  }

  var confirm_add_content_exist = document.querySelector('.add-new-content');

  if (confirm_add_content_exist) {
    return;
  }

  var selected_content = document.querySelector('.selected-content');
  var to_children_border = selected_content.closest('.content-area').querySelector('.to-children-border');

  if (!selected_content.parentNode.querySelector('.store-effect')) {
    operateMessage(btnExpand, '???????????????????????????????????????');
    return;
  }

  selected_content.parentNode.querySelector('.store-effect').remove();

  if (selected_content.classList.contains('parent')) {
    var descendants = selected_content.closest('#map-area').lastElementChild;
    descendants.classList.toggle('hidden');
    to_children_border.classList.toggle('hidden');
  } else {
    var _descendants = selected_content.closest('.content-area').lastElementChild;

    _descendants.classList.toggle('hidden');

    to_children_border.classList.toggle('hidden');
  }

  mapCenter();
} // ??????????????????


function store() {
  var selected_content = document.querySelector('.selected-content');
  var confirm_child_exist = selected_content.closest('.content-area').querySelector('.next-child-area').children;

  if (confirm_child_exist.length === 0) {
    operateMessage(btnStore, '??????????????????????????????????????????');
    return;
  }

  if (newParent) {
    operateMessage(btnStore, '??????????????????????????????????????????');
    return;
  }

  var confirm_add_content_exist = document.querySelector('.add-new-content');

  if (confirm_add_content_exist) {
    operateMessage(btnStore, '????????????????????????????????????');
    return;
  }

  var to_children_border = selected_content.closest('.content-area').querySelector('.to-children-border');

  if (selected_content.parentNode.querySelector('.store-effect')) {
    return;
  }

  var store_effect = document.createElement('div');
  store_effect.classList.add('store-effect', 'rounded', 'h-10', 'border-solid', 'border-4', 'border-gray-900', 'absolute', 'top-1.5', 'left-1.5', 'w-full', 'px-3', 'py-2');
  selected_content.parentNode.appendChild(store_effect);

  if (selected_content.classList.contains('parent')) {
    var descendants = selected_content.closest('#map-area').lastElementChild;
    descendants.classList.toggle('hidden');
    to_children_border.classList.toggle('hidden');
  } else {
    var _descendants2 = selected_content.closest('.content-area').lastElementChild;

    _descendants2.classList.toggle('hidden');

    to_children_border.classList.toggle('hidden');
  }

  mapCenter();
} // nav?????????????????????????????????????????????


function expandStoreInNav() {
  var nav_bars = document.querySelectorAll('.content-bar');
  nav_bars.forEach(function (navBar) {
    var nav_content = navBar.nextElementSibling;
    var expand_store_icon = navBar.firstElementChild;
    navBar.addEventListener('click', function () {
      nav_content.classList.toggle('hidden');

      if (expand_store_icon.hasAttribute('transform')) {
        expand_store_icon.removeAttribute('transform');
      } else {
        expand_store_icon.setAttribute('transform', 'rotate(90)');
      }
    });
  });
} // nav???????????????????????????????????????


function addContentInNav() {
  var add_category_contents = document.querySelectorAll('.add-category-content');
  add_category_contents.forEach(function (addCategoryContent) {
    var nav_content_area = addCategoryContent.closest('.nav-content-area');
    addCategoryContent.addEventListener('click', function () {
      var cloned_content = nav_content_area.cloneNode(true);
      cloned_content.querySelector('.add-category-content').remove();
      cloned_content.querySelector('.delete-category-content').classList.remove('hidden');
      nav_content_area.after(cloned_content);
      deleteContentInNav();
    });
  });
} // nav???????????????????????????????????????


function deleteContentInNav() {
  var btn_delete_category_contents = document.querySelectorAll('.delete-category-content');
  btn_delete_category_contents.forEach(function (deleteCategoryContent) {
    var nav_content_area = deleteCategoryContent.closest('.nav-content-area');
    deleteCategoryContent.addEventListener('click', function () {
      nav_content_area.remove();
    });
  });
} // nav?????????????????????????????????(????????????????????????)


function deleteContentInTable() {
  var btn_delete_category_contents_in_table = document.querySelectorAll('.delete-category-content-in-table');
  btn_delete_category_contents_in_table.forEach(function (btnDeleteCategoryContentInTable) {
    var nav_content_area = btnDeleteCategoryContentInTable.closest('.nav-content-area');
    btnDeleteCategoryContentInTable.addEventListener('click', function () {
      nav_content_area.querySelector('.content_id').name = 'delete_content_id[]';
      nav_content_area.querySelector('.category-group').name = 'delete_category_group[]';
      nav_content_area.querySelector('.category-value').name = 'delete_category[]';

      if (nav_content_area.querySelector('.nav-content')) {
        nav_content_area.querySelector('.nav-content').name = 'delete_content_name[]';
      } else {
        nav_content_area.querySelector('.content-name').name = 'delete_content_name[]';
      }

      nav_content_area.classList.add('hidden');
    });
  });
} // nav????????????????????????????????????


function addCategoryInNav() {
  var add_categories = document.querySelectorAll('.add-category');
  add_categories.forEach(function (addCategory) {
    addCategory.addEventListener('click', function () {
      var clone_category = addCategory.parentNode.previousElementSibling;
      var cloned_category = clone_category.cloneNode(true);

      if (cloned_category.querySelector('.category-value').type === 'hidden') {
        addCategory.parentNode.querySelector('.delete-category').classList.toggle('hidden');
      }

      if (cloned_category.querySelector('.category-name')) {
        cloned_category.querySelector('.category-name').remove();
      }

      cloned_category.querySelector('.category-value').setAttribute('type', 'text');
      cloned_category.querySelector('.category-value').setAttribute('value', '');
      cloned_category.querySelector('.category-value').classList.add('w-15', 'h-6', 'rounded-sm', 'border-solid', 'border-2', 'border-gray-500', 'outline-none');

      if (cloned_category.querySelector('.nav-content')) {
        cloned_category.querySelector('.nav-content').setAttribute('value', '');
      } else {
        cloned_category.querySelector('.content-name').setAttribute('value', '');
      }

      if (cloned_category.querySelector('.content_id') !== null) {
        cloned_category.querySelector('.content_id').setAttribute('value', '');
      }

      clone_category.after(cloned_category);
    });
  });
} // nav?????????????????????????????????????????????


function deleteCategoryInNav() {
  var btn_delete_categories = document.querySelectorAll('.delete-category');
  btn_delete_categories.forEach(function (btnDeleteCategory) {
    btnDeleteCategory.addEventListener('click', function () {
      var delete_category = btnDeleteCategory.parentNode.previousElementSibling;

      if (delete_category.querySelector('.category-value').type === 'text') {
        delete_category.remove();
      } else {
        btnDeleteCategory.classList.toggle('hidden');
      }
    });
  });
} // nav???????????????????????????


function openNavHelp(btn_nav_help) {
  var nav_work_area = btn_nav_help.target.closest('.nav-work-area');
  var nav_help_area = btn_nav_help.target.closest('.nav-contents-area').querySelector('.nav-help-area');
  nav_help_area.classList.toggle('hidden');
  nav_work_area.classList.toggle('hidden');
} // nav????????????????????????????????????


function closeNavHelp(btn_nav_help) {
  var nav_work_area = btn_nav_help.target.closest('.nav-contents-area').querySelector('.nav-work-area');
  var nav_help_area = btn_nav_help.target.closest('.nav-help-area');
  nav_help_area.classList.toggle('hidden');
  nav_work_area.classList.toggle('hidden');
} // ?????????????????????


function drag_modal(e) {
  this.closest('.modal').classList.add('drag');
  var drag_modal = document.querySelector('.drag');
  var shiftX = e.clientX - drag_modal.getBoundingClientRect().left;
  var shiftY = e.clientY - drag_modal.getBoundingClientRect().top;
  document.body.append(drag_modal);
  moveAt(e.pageX, e.pageY);

  function moveAt(pageX, pageY) {
    drag_modal.style.left = pageX - shiftX + 'px';
    drag_modal.style.top = pageY - shiftY + 'px';
  }

  function dragMoveModal(e) {
    moveAt(e.pageX, e.pageY);
  }

  function dragOutModal(e) {
    drag_modal.classList.remove('drag');
    drag_modal.removeEventListener('mousemove', dragMoveModal);
  }

  drag_modal.addEventListener('mousemove', dragMoveModal);
  drag_modal.addEventListener('mouseup', dragOutModal);
} // ??????????????????


function drag_map(e) {
  mapArea.classList.add('drag');
  var drag_map = document.querySelector('.drag');
  var mouse_position_x = e.pageX;
  var mouse_position_y = e.pageY;
  var map_position = drag_map.style.transform.match(/-?\d+(\.\d+)?/g);
  var map_position_x = Number(map_position[0]);
  var map_position_y = Number(map_position[1]);
  var current_map_scale = Number(map_position[2]);
  moveAt(e.pageX, e.pageY);

  function moveAt(pageX, pageY) {
    var position_x = pageX - mouse_position_x + map_position_x + 'px';
    var position_y = pageY - mouse_position_y + map_position_y + 'px';
    mapArea.style.transform = "translateX(".concat(position_x, ") translateY(").concat(position_y, ") scale(").concat(current_map_scale, ")");
  }

  function dragMoveMap(e) {
    moveAt(e.pageX, e.pageY);
  }

  function dragOutMap(e) {
    drag_map.classList.remove('drag');
    map.removeEventListener('mousemove', dragMoveMap);
  }

  map.addEventListener('mousemove', dragMoveMap);
  map.addEventListener('mouseup', dragOutMap);
} // ???????????????????????????


function mapCenterForNew() {
  var win_height = window.innerHeight;
  var win_width = window.innerWidth;
  var map_height = mapArea.clientHeight;
  var map_width = mapArea.clientWidth;
  var map_transform = mapArea.style.transform.match(/-?\d+(\.\d+)?/g);
  var position_y = Math.floor((win_height - map_height) / 2) + 'px';
  var position_x = Math.floor((win_width - map_width) / 2) + 'px';

  if (groupPage) {
    var position_x_in_group = Math.floor((win_width - map_width) / 2) / 2 + 'px';
    mapArea.style.transform = "translateX(".concat(position_x_in_group, ") translateY(").concat(position_y, ") scale(1)");
    return;
  }

  if (!map_transform) {
    mapArea.style.transform = "translateX(".concat(position_x, ") translateY(").concat(position_y, ") scale(1)");
  }
} // ???????????????????????????


function mapCenter() {
  var win_height = window.innerHeight;
  var win_width = window.innerWidth;
  var map_height = mapArea.clientHeight;
  var map_width = mapArea.clientWidth;
  var map_transform = mapArea.style.transform.match(/-?\d+(\.\d+)?/g);
  var position_y = Math.floor((win_height - map_height) / 2) + 'px';
  var position_x = Math.floor((win_width - map_width) / 2) + 'px';
  var current_map_scale = Number(map_transform[2]);

  if (groupPage) {
    var position_x_in_group = Math.floor((win_width - map_width) / 2) / 2 + 'px';
    mapArea.style.transform = "translateX(".concat(position_x_in_group, ") translateY(").concat(position_y, ") scale(").concat(current_map_scale, ")");
    return;
  }

  mapArea.style.transform = "translateX(".concat(position_x, ") translateY(").concat(position_y, ") scale(").concat(current_map_scale, ")");
} // ????????????????????????????????????


function moveFocus() {
  mapCenter();
  var selected_content = document.querySelector('.selected-content');
  var win_height = window.innerHeight;
  var win_width = window.innerWidth;
  var map_height = mapArea.clientHeight;
  var map_width = mapArea.clientWidth;
  var selectedContent_height = selected_content.getBoundingClientRect().top;
  var selectedContent_width = selected_content.getBoundingClientRect().left;
  var map_transform = mapArea.style.transform.match(/-?\d+(\.\d+)?/g);
  var map_scale = Number(map_transform[2]);

  if (groupPage) {
    var position_x_in_group = Math.floor((win_height - map_height) / 2 + win_height / 2 - selectedContent_height) / 2 + 'px';
    mapArea.style.transform = "translateX(".concat(position_x_in_group, ") translateY(").concat(position_y, ") scale(").concat(map_scale, ")");
    return;
  }

  var position_y = Math.floor((win_height - map_height) / 2 + win_height / 2 - selectedContent_height) + 'px';
  var position_x = Math.floor((win_width - map_width) / 2 + win_width / 2 - selectedContent_width) + 'px';
  mapArea.style.transform = "translateX(".concat(position_x, ") translateY(").concat(position_y, ") scale(").concat(map_scale, ")");
  currentMapPositionXInputs.forEach(function (currentMapPositionX) {
    currentMapPositionX.value = position_x;
  });
  currentMapPositionYInputs.forEach(function (currentMapPostionY) {
    currentMapPostionY.value = position_y;
  });
  currentMapScaleInputs.forEach(function (current_map_scale) {
    current_map_scale.value = map_scale;
  });
} // ?????????????????????


function currentMapPosition() {
  var map_transform = mapArea.style.transform.match(/-?\d+(\.\d+)?/g);
  currentMapPositionXInputs.forEach(function (currentMapPositionX) {
    currentMapPositionX.value = Number(map_transform[0]) + 'px';
  });
  currentMapPositionYInputs.forEach(function (currentMapPostionY) {
    currentMapPostionY.value = Number(map_transform[1]) + 'px';
  });
  currentMapScaleInputs.forEach(function (current_map_scale) {
    current_map_scale.value = Number(map_transform[2]);
  });
} // ???????????????


function mapZoom() {
  var map_transform = mapArea.style.transform.match(/-?\d+(\.\d+)?/g);
  var map_position_x = Number(map_transform[0]) + 'px';
  var map_position_y = Number(map_transform[1]) + 'px';
  var map_scale = Number(map_transform[2]) + 0.1;
  mapArea.style.transform = "translateX(".concat(map_position_x, ") translateY(").concat(map_position_y, ") scale(").concat(map_scale, ")");
}

function mapZoomOut() {
  var map_transform = mapArea.style.transform.match(/-?\d+(\.\d+)?/g);
  var map_position_x = Number(map_transform[0]) + 'px';
  var map_position_y = Number(map_transform[1]) + 'px';
  var map_scale = Number(map_transform[2]) - 0.1;
  mapArea.style.transform = "translateX(".concat(map_position_x, ") translateY(").concat(map_position_y, ") scale(").concat(map_scale, ")");
} // ?????????????????????UP


function textSizeUp() {
  var confirm_add_content_exist = document.querySelector('.add-new-content');
  var confirm_selected_content_exist = document.querySelector('.selected-content');

  if (confirm_add_content_exist) {
    operateMessage(dropdownTextSizeAdjustButton, '??????????????????????????????????????????');
    return;
  }

  if (!confirm_selected_content_exist) {
    operateMessage(dropdownTextSizeAdjustButton, '???????????????????????????????????????????????????');
    return;
  }

  if (newParent) {
    operateMessage(dropdownTextSizeAdjustButton, '?????????????????????????????????????????????');
    return;
  }

  var select_input = document.querySelector('.selected-content').previousElementSibling;
  var select_dummy = select_input.previousElementSibling;
  var selected_content_font_size_number = Number(document.querySelector('.selected-content').style.fontSize.match(/\d+/g)[0]);
  var new_font_size = selected_content_font_size_number * 1.2;
  var text_size_input = document.getElementById('text-size');
  var selected_contents = document.querySelectorAll('.selected-content');
  selected_contents.forEach(function (selected_content) {
    selected_content.style.fontSize = new_font_size + '%';
  });
  select_input.style.fontSize = new_font_size + '%';
  select_dummy.style.fontSize = new_font_size + '%';
  text_size_input.value = new_font_size;
} // ????????????????????????DOWN


function textSizeDown() {
  var confirm_add_content_exist = document.querySelector('.add-new-content');
  var confirm_selected_content_exist = document.querySelector('.selected-content');

  if (confirm_add_content_exist) {
    operateMessage(dropdownTextSizeAdjustButton, '??????????????????????????????????????????');
    return;
  }

  if (!confirm_selected_content_exist) {
    operateMessage(dropdownTextSizeAdjustButton, '???????????????????????????????????????????????????');
    return;
  }

  if (newParent) {
    operateMessage(dropdownTextSizeAdjustButton, '?????????????????????????????????????????????');
    return;
  }

  var select_input = document.querySelector('.selected-content').previousElementSibling;
  var select_dummy = select_input.previousElementSibling;
  var selected_content_font_size_number = Number(document.querySelector('.selected-content').style.fontSize.match(/\d+/g)[0]);
  var new_font_size = selected_content_font_size_number / 1.2;
  var text_size_input = document.getElementById('text-size');
  var selected_contents = document.querySelectorAll('.selected-content');
  selected_contents.forEach(function (selected_content) {
    selected_content.style.fontSize = new_font_size + '%';
  });
  select_input.style.fontSize = new_font_size + '%';
  select_dummy.style.fontSize = new_font_size + '%';
  text_size_input.value = new_font_size;
} // ???????????????????????????nav?????????


function shareComparisonSelectNav() {
  var modal_contents_area = document.querySelector('.modal-contents-area');
  var modal_contents = document.createElement('div');
  modal_contents.classList.add('modal-contents', 'flex');
  modal_contents_area.appendChild(modal_contents);
  var selected_nav_parent_id = comparisonInput.value;

  if (!document.getElementById(selected_nav_parent_id + 'naviModal')) {
    return;
  }

  var clone_selected_nav = document.getElementById(selected_nav_parent_id + 'naviModal').querySelector('.modal-content').cloneNode(true);
  var clone_selected_nav_body = document.getElementById(selected_nav_parent_id + 'naviModal').querySelector('.modal-body').cloneNode(true);
  var clone_selected_nav_body_btn_helps = clone_selected_nav_body.querySelectorAll('.btn-help');
  var clone_selected_nav_body_nav_help_areas = clone_selected_nav_body.querySelectorAll('.nav-help-area');
  clone_selected_nav.querySelector('.nav-form').remove();
  clone_selected_nav.classList.remove('rounded-lg');
  clone_selected_nav.classList.add('rounded-t-lg');
  clone_selected_nav.querySelector('.btn-close').remove();
  clone_selected_nav_body.querySelector('.modal-footer').remove();
  clone_selected_nav_body_btn_helps.forEach(function (clone_selected_nav_body_btn_help) {
    clone_selected_nav_body_btn_help.remove();
  });
  clone_selected_nav_body_nav_help_areas.forEach(function (clone_selected_nav_body_nav_help_area) {
    clone_selected_nav_body_nav_help_area.remove();
  });
  modal_contents.appendChild(clone_selected_nav);
  clone_selected_nav.appendChild(clone_selected_nav_body);
  var confirm_similar_exist = clone_selected_nav.querySelector('.similar-content').value;

  if (confirm_similar_exist) {
    var similar_contents = clone_selected_nav.querySelectorAll('.similar-content');
    similar_contents.forEach(function (similarContent) {
      var similar_content_id = similarContent.closest('.nav-content-area').querySelector('.content_id').value;
      var confirm_similar_nav_exist = document.getElementById(similar_content_id + 'naviModal');

      if (confirm_similar_nav_exist) {
        var clone_similar_nav = document.getElementById(similar_content_id + 'naviModal').querySelector('.modal-content').cloneNode(true);
        var clone_similar_nav_body = document.getElementById(similar_content_id + 'naviModal').querySelector('.modal-body').cloneNode(true);
        var clone_similar_nav_body_btn_helps = clone_similar_nav_body.querySelectorAll('.btn-help');
        var clone_similar_nav_body_nav_help_areas = clone_similar_nav_body.querySelectorAll('.nav-help-area');
        clone_similar_nav.querySelector('.nav-form').remove();
        clone_similar_nav.classList.remove('rounded-lg');
        clone_similar_nav.classList.add('rounded-t-lg');
        clone_similar_nav.querySelector('.btn-close').remove();
        clone_similar_nav_body.querySelector('.modal-footer').remove();
        clone_similar_nav_body_btn_helps.forEach(function (clone_similar_nav_body_btn_help) {
          clone_similar_nav_body_btn_help.remove();
        });
        clone_similar_nav_body_nav_help_areas.forEach(function (clone_similar_nav_body_nav_help_area) {
          clone_similar_nav_body_nav_help_area.remove();
        });
        modal_contents.appendChild(clone_similar_nav);
        clone_similar_nav.appendChild(clone_similar_nav_body);
      }
    });
  }

  var clone_new_similar_nav = document.getElementById('modalNav').querySelector('.modal-content').cloneNode(true);
  var clone_new_similar_nav_body = document.getElementById('modalNav').querySelector('.modal-body').cloneNode(true);
  var clone_new_similar_nav_body_btn_helps = clone_new_similar_nav_body.querySelectorAll('.btn-help');
  var clone_new_similar_nav_body_nav_help_areas = clone_new_similar_nav_body.querySelectorAll('.nav-help-area');
  var new_similar_think = document.createElement('input');
  var title_area = clone_new_similar_nav.querySelector('.nav-header-area');
  clone_new_similar_nav.querySelector('.nav-form').remove();
  clone_new_similar_nav.classList.remove('rounded-lg');
  clone_new_similar_nav.classList.add('rounded-t-lg');
  clone_new_similar_nav.querySelector('.btn-close').remove();
  clone_new_similar_nav.querySelector('.drag-start').remove();
  clone_new_similar_nav_body_btn_helps.forEach(function (clone_new_similar_nav_body_btn_help) {
    clone_new_similar_nav_body_btn_help.remove();
  });
  clone_new_similar_nav_body_nav_help_areas.forEach(function (clone_new_similar_nav_body_nav_help_area) {
    clone_new_similar_nav_body_nav_help_area.remove();
  });
  new_similar_think.name = 'new_think_name';
  new_similar_think.type = 'text';
  new_similar_think.classList.add('my-auto', 'font-semibold', 'text-white', 'bg-gray-800', 'border', 'border-gray-200', 'focus:outline-none', 'rounded', 'w-1/2');
  clone_new_similar_nav_body.querySelector('.modal-footer').remove();
  modal_contents.appendChild(clone_new_similar_nav);
  title_area.prepend(new_similar_think);
  clone_new_similar_nav.appendChild(clone_new_similar_nav_body);
  expandStoreInNav();
  addContentInNav();
  addCategoryInNav();
  deleteContentInNav();
  deleteContentInTable();
  deleteCategoryInNav();
}

; // ???????????????????????????????????????????????????

function comparisonClose() {
  document.querySelector('.modal-contents').remove();
} //?????????????????????????????????????????????


function operateMessage(btn, comment) {
  var speech_bubble = document.createElement('div');
  var btn_height = btn.getBoundingClientRect().top;
  var btn_width = Number(btn.getBoundingClientRect().left) + 'px';
  var massage_position_y = btn_height + 50 + 'px';
  speech_bubble.classList.add('rounded', 'absolute', 'top-0', 'left-0', 'bg-gray-500', 'text-white', 'p-2', 'z-50');
  speech_bubble.style.transform = "translateX(".concat(btn_width, ") translateY(").concat(massage_position_y, ")");
  speech_bubble.textContent = comment;
  btn.appendChild(speech_bubble);
  var message_timer = setTimeout(function () {
    speech_bubble.remove();
    clearTimeout(message_timer);
  }, 2000);
} //???????????????????????????????????????????????????(?????????????????????)


function validationMessage() {
  var speech_bubble = document.querySelector('.error-message');
  var message_timer = setTimeout(function () {
    speech_bubble.remove();
    clearTimeout(message_timer);
  }, 2000);
} // ??????????????????????????????????????????


function addGroupInGroup() {
  var confirm_add_group_exit = document.querySelector('.add-group-content-area');

  if (confirm_add_group_exit) {
    confirm_add_group_exit.remove();
    return;
  }

  var form = document.querySelector('.new-group');
  var content_area = document.createElement('div');
  content_area.classList.add('add-group-content-area', 'relative', 'inline-block', 'my-5', 'ml-4');
  var dummy = document.createElement('div');
  dummy.classList.add('invisible', 'inline-block', 'px-4', 'py-3');
  var input = document.createElement('input');
  input.type = 'text';
  input.setAttribute('name', 'edit_group');
  input.classList.add('add-group', 'text-center', 'outline-none', 'rounded', 'h-10', 'border-dashed', 'border-4', 'border-gray-900', 'absolute', 'top-0', 'left-0', 'w-full', 'px-3', 'py-2');
  form.appendChild(content_area);
  content_area.appendChild(dummy);
  content_area.appendChild(input);
  input.focus();
  input.addEventListener('input', contentAdjustWidth);
} // ?????????????????????????????????????????????


function addGroupContentInGroup(btn) {
  var confirm_add_content_exit = document.querySelector('.add_content_in_group_area');

  if (confirm_add_content_exit) {
    confirm_add_content_exit.remove();
    return;
  }

  var form = btn.target.parentNode.parentNode.querySelector('.new-group-content');
  var content_area = document.createElement('div');
  content_area.classList.add('add_content_in_group_area', 'relative', 'inline-block', 'my-5', 'ml-4');
  var dummy = document.createElement('div');
  dummy.classList.add('invisible', 'inline-block', 'px-4', 'py-3');
  var input = document.createElement('input');
  input.type = 'text';
  input.setAttribute('name', 'edit_group_content');
  input.classList.add('add_group', 'text-center', 'outline-none', 'rounded', 'h-10', 'border-dashed', 'border-4', 'border-gray-900', 'absolute', 'top-0', 'left-0', 'w-full', 'px-3', 'py-2');
  form.appendChild(content_area);
  content_area.appendChild(dummy);
  content_area.appendChild(input);
  input.focus();
  input.addEventListener('input', contentAdjustWidth);
} // ????????????


btnAddChild.addEventListener('click', addChild);
btnAddBro.addEventListener('click', addBro);
btnStore.addEventListener('click', store);
btnExpand.addEventListener('click', expand);
btnTextSizeUp.addEventListener('click', textSizeUp);
btnTextSizeDown.addEventListener('click', textSizeDown);
btnCenter.addEventListener('click', mapCenter);
btnZoom.addEventListener('click', mapZoom);
btnZoomOut.addEventListener('click', mapZoomOut);
btnOpenModals.forEach(function (btnOpenModal) {
  btnOpenModal.addEventListener('click', currentMapPosition);
});
btnOpenDropdowns.forEach(function (btnOpenDropdown) {
  btnOpenDropdown.addEventListener('click', currentMapPosition);
});
btnEditFileNames.forEach(function (btnEditFileName) {
  btnEditFileName.addEventListener('click', editFileName);
});
btnHelps.forEach(function (btnHelp) {
  btnHelp.addEventListener('click', openNavHelp);
});
btnHelpBacks.forEach(function (btnHelpBack) {
  btnHelpBack.addEventListener('click', closeNavHelp);
});
editContents.forEach(function (editContent) {
  editContent.addEventListener('input', contentAdjustWidth);
  editContent.addEventListener('blur', changeShowContent);
});
showContents.forEach(function (content) {
  content.addEventListener('click', selectContent);
  content.addEventListener('dblclick', changeEditContent);
  content.parentNode.firstElementChild.textContent = content.textContent;
}); // showGroupCategories.forEach(function(group) {
//     group.addEventListener('click', selectGroup);
// })

dragStarts.forEach(function (dragStart) {
  dragStart.addEventListener('mousedown', drag_modal);
});
map.addEventListener('mousedown', drag_map);
btnComparison.addEventListener('click', shareComparisonSelectNav);
btnComparisonModalClose.addEventListener('click', comparisonClose);
document.addEventListener('DOMContentLoaded', expandStoreInNav);
document.addEventListener('DOMContentLoaded', addContentInNav);
document.addEventListener('DOMContentLoaded', deleteContentInNav);
document.addEventListener('DOMContentLoaded', deleteContentInTable);
document.addEventListener('DOMContentLoaded', addCategoryInNav);
document.addEventListener('DOMContentLoaded', deleteCategoryInNav);
document.addEventListener('DOMContentLoaded', startSelect);
document.addEventListener('DOMContentLoaded', mapCenterForNew);

if (document.querySelector('.error-message')) {
  document.addEventListener('DOMContentLoaded', validationMessage);
}

if (groupPage) {
  btnAddGroup.addEventListener('click', addGroupInGroup);
  btnsAddGroupContentInGroup.forEach(function (btnAddGroupContentInGroup) {
    btnAddGroupContentInGroup.addEventListener('click', addGroupContentInGroup);
  });
}
/******/ })()
;