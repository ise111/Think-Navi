/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/group.js ***!
  \*******************************/
var btnTextSizeUpInGroup = document.getElementById('text-size-up-in-group');
var btnTextSizeDownInGroup = document.getElementById('text-size-down-in-group');
var btnTextSizeUpGroupInGroup = document.getElementById('text-size-up-group-in-group');
var btnTextSizeDownGroupInGroup = document.getElementById('text-size-down-group-in-group');
var showContentsInGroup = document.querySelectorAll('.show_content_in_group');
var textSize = document.getElementById('text-size-in-group');
var deleteContentInputInGroup = document.querySelector('.delete-content-input-in-group');
var changeColorInputInGroup = document.querySelector('.change-color-input-in-group');
var textSizeInputInGroup = document.querySelector('.text-size-input-in-group');
var borderColorInGroup = document.getElementById('border-color-in-group');
var bgColorInGroup = document.getElementById('bg-color-in-group');
var textColorInGroup = document.getElementById('text-color-in-group');
var btnsAddGroupContentInGroup = document.querySelectorAll('.add-group-content-in-group');
var showContents = document.querySelectorAll('.show_content');
var showGroups = document.querySelectorAll('.show_group');
var groupInputs = document.querySelectorAll('.group-input');
var deleteGroupInputInGroup = document.querySelector('.delete-group-input-in-group');
var changeColorGroupInputInGroup = document.querySelector('.change-color-group-input-in-group');
var textSizeGroupInputInGroup = document.querySelector('.text-size-group-input-in-group'); // inputに変更

function changeEditContent(show_content) {
  show_content.target.classList.toggle('hidden');
  var input_content = show_content.target.previousElementSibling;
  input_content.classList.toggle('hidden');
  input_content.focus();
} // グループ化内でのグループ選択


function selectGroupInGroup(content) {
  var other_selected_contents = document.querySelectorAll('.selected-content-in-group');
  var other_selected_groups = document.querySelectorAll('.selected-group-in-group');
  var selected_group_borders = document.querySelectorAll('.selected-group-border');

  if (!content.shiftKey) {
    if (other_selected_groups) {
      other_selected_groups.forEach(function (otherSelectedGroup) {
        otherSelectedGroup.classList.toggle('selected-group-in-group');
      });
      selected_group_borders.forEach(function (selectedGroupBorder) {
        selectedGroupBorder.classList.toggle('selected-group-border');
        selectedGroupBorder.classList.toggle('border-solid');
        selectedGroupBorder.classList.toggle('border-dashed');
      });
    }
  }

  if (other_selected_contents) {
    other_selected_contents.forEach(function (otherSelectedContent) {
      otherSelectedContent.classList.toggle('selected-content-in-group');
      otherSelectedContent.classList.toggle('border-solid');
      otherSelectedContent.classList.toggle('border-dashed');
    });
  }

  changeColorInputInGroup.value = '';
  var color_inputs = document.querySelectorAll('.change-color-inputs-in-group');
  color_inputs.forEach(function (color_input) {
    color_input.remove();
  });
  deleteContentInputInGroup.value = '';
  var delete_content_inputs = document.querySelectorAll('.delete-content-inputs-in-group');
  delete_content_inputs.forEach(function (delete_content_input) {
    delete_content_input.remove();
  });
  textSizeInputInGroup.value = '';
  var text_size_inputs = document.querySelectorAll('.text-size-inputs-in-group');
  text_size_inputs.forEach(function (text_size_input) {
    text_size_input.remove();
  });
  changeColorGroupInputInGroup.value = '';
  var color_group_inputs = document.querySelectorAll('.change-color-group-inputs-in-group');
  color_group_inputs.forEach(function (color_group_input) {
    color_group_input.remove();
  });
  deleteGroupInputInGroup.value = '';
  var delete_group_inputs = document.querySelectorAll('.delete-group-inputs-in-group');
  delete_group_inputs.forEach(function (delete_group_input) {
    delete_group_input.remove();
  });
  textSizeGroupInputInGroup.value = '';
  var text_size_group_inputs = document.querySelectorAll('.text-size-group-inputs-in-group');
  text_size_group_inputs.forEach(function (text_size_group_input) {
    text_size_group_input.remove();
  });
  var select_group_border = content.target.closest('.group-area').querySelector('.group-border');
  content.target.classList.toggle('selected-group-in-group');
  select_group_border.classList.toggle('border-solid');
  select_group_border.classList.toggle('border-dashed');
  select_group_border.classList.toggle('selected-group-border');
  var selectGroups = document.querySelectorAll('.selected-group-in-group');

  function rgbToHexColorInGroup(color) {
    var rgb_colors = color.match(/\d+/g);
    return '#' + rgb_colors.map(function (rgbColor) {
      return ("0" + Number(rgbColor).toString(16)).slice(-2);
    }).join("");
  }

  var select_border_color = select_group_border.style.borderColor;
  var select_bg_color = select_group_border.style.backgroundColor;
  var select_text_color = content.target.style.color;
  var select_text_size = content.target.style.fontSize.match(/\d+/g);
  var select_group_id = content.target.parentNode.querySelector('.think-group-id').value;
  var select_group_id_array = Array();
  borderColorInGroup.value = rgbToHexColorInGroup(select_border_color);
  bgColorInGroup.value = rgbToHexColorInGroup(select_bg_color);
  textColorInGroup.value = rgbToHexColorInGroup(select_text_color);
  textSize.value = select_text_size;

  if (!content.shiftKey) {
    deleteGroupInputInGroup.value = select_group_id;
    changeColorGroupInputInGroup.value = select_group_id;
    textSizeGroupInputInGroup.value = select_group_id;
  } else {
    selectGroups.forEach(function (selectGroup) {
      var group_id = selectGroup.parentNode.querySelector('.think-group-id').value;
      select_group_id_array.push(group_id);
    });
    deleteGroupInputInGroup.value = select_group_id_array[0];
    changeColorGroupInputInGroup.value = select_group_id_array[0];
    textSizeGroupInputInGroup.value = select_group_id_array[0];

    if (select_group_id_array.length > 1) {
      for (var i = 1; i < select_group_id_array.length; i++) {
        var clone_color_group_input = changeColorGroupInputInGroup.cloneNode(true);
        clone_color_group_input.className = 'change-color-group-inputs-in-group';
        clone_color_group_input.value = select_group_id_array[i];
        changeColorGroupInputInGroup.after(clone_color_group_input);
        var clone_delete_group_input = deleteGroupInputInGroup.cloneNode(true);
        clone_delete_group_input.className = 'delete-group-inputs-in-group';
        clone_delete_group_input.value = select_group_id_array[i];
        deleteGroupInputInGroup.after(clone_delete_group_input);
        var clone_text_size_group_input = textSizeGroupInputInGroup.cloneNode(true);
        clone_text_size_group_input.className = 'text-size-group-inputs-in-group';
        clone_text_size_group_input.value = select_group_id_array[i];
        textSizeGroupInputInGroup.after(clone_text_size_group_input);
      }
    }
  }
} // グループ化内でのコンテンツ選択


function selectContentInGroup(content) {
  var other_selected_contents = document.querySelectorAll('.selected-content-in-group');
  var other_selected_groups = document.querySelectorAll('.selected-group-in-group');
  var selected_group_borders = document.querySelectorAll('.selected-group-border');
  var boder_same_bg_color_contents = document.querySelectorAll('.border-same-bg-color');

  if (!content.shiftKey) {
    if (other_selected_contents) {
      other_selected_contents.forEach(function (otherSelectedContent) {
        otherSelectedContent.classList.toggle('selected-content-in-group');
        otherSelectedContent.classList.toggle('border-solid');
        otherSelectedContent.classList.toggle('border-dashed');
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

  if (other_selected_groups) {
    other_selected_groups.forEach(function (otherSelectedGroup) {
      otherSelectedGroup.classList.toggle('selected-group-in-group');
    });
    selected_group_borders.forEach(function (selectedGroupBorder) {
      selectedGroupBorder.classList.toggle('selected-group-border');
      selectedGroupBorder.classList.toggle('border-solid');
      selectedGroupBorder.classList.toggle('border-dashed');
    });
  }

  changeColorInputInGroup.value = '';
  var color_inputs = document.querySelectorAll('.change-color-inputs-in-group');
  color_inputs.forEach(function (color_input) {
    color_input.remove();
  });
  deleteContentInputInGroup.value = '';
  var delete_content_inputs = document.querySelectorAll('.delete-content-inputs-in-group');
  delete_content_inputs.forEach(function (delete_content_input) {
    delete_content_input.remove();
  });
  textSizeInputInGroup.value = '';
  var text_size_inputs = document.querySelectorAll('.text-size-inputs-in-group');
  text_size_inputs.forEach(function (text_size_input) {
    text_size_input.remove();
  });
  changeColorGroupInputInGroup.value = '';
  var color_group_inputs = document.querySelectorAll('.change-color-group-inputs-in-group');
  color_group_inputs.forEach(function (color_group_input) {
    color_group_input.remove();
  });
  deleteGroupInputInGroup.value = '';
  var delete_group_inputs = document.querySelectorAll('.delete-group-inputs-in-group');
  delete_group_inputs.forEach(function (delete_group_input) {
    delete_group_input.remove();
  });
  textSizeGroupInputInGroup.value = '';
  var text_size_group_inputs = document.querySelectorAll('.text-size-group-inputs-in-group');
  text_size_group_inputs.forEach(function (text_size_group_input) {
    text_size_group_input.remove();
  });
  content.target.classList.toggle('selected-content-in-group');
  content.target.classList.toggle('border-solid');
  content.target.classList.toggle('border-dashed');
  var select_contents = document.querySelectorAll('.selected-content-in-group');

  function rgbToHexColorInGroup(color) {
    var rgb_colors = color.match(/\d+/g);
    return '#' + rgb_colors.map(function (rgbColor) {
      return ("0" + Number(rgbColor).toString(16)).slice(-2);
    }).join("");
  }

  var select_border_color = content.target.style.borderColor;
  var select_bg_color = content.target.style.backgroundColor;
  var select_text_color = content.target.style.color;
  var select_text_size = content.target.style.fontSize.match(/\d+/g);
  var select_content_id = content.target.closest('.content-area-in-group').querySelector('.content-id').value;
  var select_content_id_array = Array();

  if (content.target.style.borderColor === content.target.style.backgroundColor) {
    content.target.classList.toggle('border-same-bg-color');
    content.target.style.borderColor = '#000000';
    content.target.previousElementSibling.style.borderColor = '#000000';
  }

  borderColorInGroup.value = rgbToHexColorInGroup(select_border_color);
  bgColorInGroup.value = rgbToHexColorInGroup(select_bg_color);
  textColorInGroup.value = rgbToHexColorInGroup(select_text_color);
  textSize.value = select_text_size;

  if (!content.shiftKey) {
    deleteContentInputInGroup.value = select_content_id;
    changeColorInputInGroup.value = select_content_id;
    textSizeInputInGroup.value = select_content_id;
  } else {
    select_contents.forEach(function (selectContent) {
      var content_id = selectContent.closest('.content-area-in-group').querySelector('.content-id').value;
      select_content_id_array.push(content_id);
    });
    deleteContentInputInGroup.value = select_content_id_array[0];
    changeColorInputInGroup.value = select_content_id_array[0];
    textSizeInputInGroup.value = select_content_id_array[0];

    if (select_content_id_array.length > 1) {
      for (var i = 1; i < select_content_id_array.length; i++) {
        var clone_color_input = changeColorInputInGroup.cloneNode(true);
        clone_color_input.className = 'change-color-inputs-in-group';
        clone_color_input.value = select_content_id_array[i];
        changeColorInputInGroup.after(clone_color_input);
        var clone_delete_content_input = deleteContentInputInGroup.cloneNode(true);
        clone_delete_content_input.className = 'delete-content-inputs-in-group';
        clone_delete_content_input.value = select_content_id_array[i];
        deleteContentInputInGroup.after(clone_delete_content_input);
        var clone_text_size_input = textSizeInputInGroup.cloneNode(true);
        clone_text_size_input.className = 'text-size-inputs-in-group';
        clone_text_size_input.value = select_content_id_array[i];
        textSizeInputInGroup.after(clone_text_size_input);
      }
    }
  }
} // グループ内の文字サイズ調整UP


function textSizeUpInGroup() {
  var confirm_selected_group = document.querySelector('.selected-group-in-group');
  var confirm_selected_content_in_group = document.querySelector('.selected-content-in-group');

  if (!confirm_selected_group && !confirm_selected_content_in_group) {
    operateMessageInGroup(btnTextSizeUpInGroup, '要素またはグループを選択してください。');
    return;
  }

  if (document.querySelector('.selected-content-in-group')) {
    var select_input = document.querySelector('.selected-content-in-group').previousElementSibling;
    var select_dummy = select_input.previousElementSibling;
    var selected_content_font_size_number = Number(document.querySelector('.selected-content-in-group').style.fontSize.match(/\d+/g)[0]);
    var new_font_size = selected_content_font_size_number * 1.2;
    var selected_contents = document.querySelectorAll('.selected-content-in-group');
    selected_contents.forEach(function (selectedContent) {
      selectedContent.style.fontSize = new_font_size + '%';
    });
    select_input.style.fontSize = new_font_size + '%';
    select_dummy.style.fontSize = new_font_size + '%';
    textSize.value = new_font_size;
  } else {
    var _select_input = document.querySelector('.selected-group-in-group').previousElementSibling;

    var _selected_content_font_size_number = Number(document.querySelector('.selected-group-in-group').style.fontSize.match(/\d+/g)[0]);

    var _new_font_size = _selected_content_font_size_number * 1.2;

    var selected_groups = document.querySelectorAll('.selected-group-in-group');
    selected_groups.forEach(function (selectedGroup) {
      selectedGroup.style.fontSize = _new_font_size + '%';
    });
    _select_input.style.fontSize = _new_font_size + '%';
    textSize.value = _new_font_size;
  }
} // グループ内の文字サイズ調整　DOWN


function textSizeDownInGroup() {
  var confirm_selected_group = document.querySelector('.selected-group-in-group');
  var confirm_selected_content_in_group = document.querySelector('.selected-content-in-group');

  if (!confirm_selected_group && !confirm_selected_content_in_group) {
    operateMessageInGroup(btnTextSizeUpInGroup, '要素またはグループを選択してください。');
    return;
  }

  if (document.querySelector('.selected-content-in-group')) {
    var select_input = document.querySelector('.selected-content-in-group').previousElementSibling;
    var select_dummy = select_input.previousElementSibling;
    var selected_content_font_size_number = Number(document.querySelector('.selected-content-in-group').style.fontSize.match(/\d+/g)[0]);
    var new_font_size = selected_content_font_size_number / 1.2;
    var selected_contents = document.querySelectorAll('.selected-content-in-group');
    selected_contents.forEach(function (selectedContent) {
      selectedContent.style.fontSize = new_font_size + '%';
    });
    select_input.style.fontSize = new_font_size + '%';
    select_dummy.style.fontSize = new_font_size + '%';
    textSize.value = new_font_size;
  } else {
    var _select_input2 = document.querySelector('.selected-group-in-group').previousElementSibling;

    var _selected_content_font_size_number2 = Number(document.querySelector('.selected-group-in-group').style.fontSize.match(/\d+/g)[0]);

    var _new_font_size2 = _selected_content_font_size_number2 / 1.2;

    var selected_groups = document.querySelectorAll('.selected-group-in-group');
    selected_groups.forEach(function (selectedGroup) {
      selectedGroup.style.fontSize = _new_font_size2 + '%';
    });
    _select_input2.style.fontSize = _new_font_size2 + '%';
    textSize.value = _new_font_size2;
  }
} //予期せぬ操作の注意コメント表示（グループ化内）


function operateMessageInGroup(btn, comment) {
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
}

showContentsInGroup.forEach(function (show_content_in_group) {
  show_content_in_group.addEventListener('click', selectContentInGroup);
  show_content_in_group.addEventListener('dblclick', changeEditContent);
  show_content_in_group.parentNode.firstElementChild.textContent = show_content_in_group.textContent;
});
btnTextSizeUpInGroup.addEventListener('click', textSizeUpInGroup);
btnTextSizeDownInGroup.addEventListener('click', textSizeDownInGroup);
showGroups.forEach(function (showGroup) {
  showGroup.addEventListener('click', selectGroupInGroup);
  showGroup.addEventListener('dblclick', changeEditContent);
});
/******/ })()
;