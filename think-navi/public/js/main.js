/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
var btnAddChild = document.getElementById('btn-add-child');
var btnAddBro = document.getElementById('btn-add-bro');
var showContents = document.querySelectorAll('.show-content'); // コンテンツ選択

function selectContent(content) {
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
  content.target.classList.toggle('selected-content');
  content.target.classList.toggle('border-solid');
  content.target.classList.toggle('border-dashed');
  var select_contents = document.querySelectorAll('.selected-content');
  var select_border_color = content.target.style.borderColor;
  var select_bg_color = content.target.style.backgroundColor;
  var select_text_color = content.target.style.color;
  var select_content_id = content.target.closest('.content-area').querySelector('.edit-id').value;
  var select_content_id_array = Array();
  document.getElementById('border-color').value = rgbToHexColor(select_border_color);
  document.getElementById('bg-color').value = rgbToHexColor(select_bg_color);
  document.getElementById('text-color').value = rgbToHexColor(select_text_color);

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
  } else {
    select_contents.forEach(function (selectContent) {
      var contentId = selectContent.parentNode.parentNode.querySelector('.edit-id').value;
      select_content_id_array.push(contentId);
    });
    deleteContentInput.value = select_content_id_array[0];
    changeColorInput.value = select_content_id_array[0];
    text_size_input.value = select_content_id_array[0];

    if (select_content_id_array.length > 1) {
      for (var i = 1; i < select_content_id_array.length; i++) {
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
      }
    }
  }
} // 子要素追加


function addChild() {
  var selected_content = document.querySelector('.selected-content');

  if (!selected_content) {
    operateMessage(btnAddChild, 'マップから要素を選択してからボタンを押してください。');
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
    input.addEventListener('click', selectContent);
    input.addEventListener('input', contentAdjustWidth);
    moveFocus();
  } else {
    var _add_content_area = selected_content.closest('.content-area');

    var _form = _add_content_area.querySelector('.add-content-area');

    console.log(_add_content_area);

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

    _input.addEventListener('click', selectContent);

    _input.addEventListener('input', contentAdjustWidth);

    moveFocus();
  }
} // 兄弟要素の追加


function addBro() {
  var selected_content = document.querySelector('.selected-content');

  if (!selected_content) {
    operateMessage(btnAddBro, 'マップから要素を選択してからボタンを押してください。');
    return;
  }

  if (selected_content.classList.contains('parent')) {
    operateMessage(btnAddBro, 'テーマに兄弟を追加することは出来ません。');
    return;
  }

  var confirm_add_content_exist = document.querySelector('.add-new-content');
  var confirm_nav_content = selected_content.classList.contains('for-nav');
  var previous_selected_content_parent = selected_content.closest('.content-area').querySelector('.show-content');

  if (confirm_nav_content) {
    operateMessage(btnAddBro, 'navで追加した項目内にこのボタンで兄弟は追加出来ません。nav画面で追加してください。');
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
}

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
  memoInput.value = '';
  navInput.value = '';
  deleteContentInput.value = '';
}

btnAddChild.addEventListener('click', addChild);
btnAddBro.addEventListener('click', addBro);
showContents.forEach(function (content) {
  content.addEventListener('click', selectContent);
});
/******/ })()
;