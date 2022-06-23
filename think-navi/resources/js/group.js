const btnTextSizeUpInGroup = document.getElementById('text-size-up-in-group');
const btnTextSizeDownInGroup = document.getElementById('text-size-down-in-group');
const btnTextSizeUpGroupInGroup = document.getElementById('text-size-up-group-in-group');
const btnTextSizeDownGroupInGroup = document.getElementById('text-size-down-group-in-group');
const showContentsInGroup = document.querySelectorAll('.show_content_in_group');
const textSize = document.getElementById('text-size-in-group');
const deleteContentInputInGroup = document.querySelector('.delete-content-input-in-group');
const changeColorInputInGroup = document.querySelector('.change-color-input-in-group');
const textSizeInputInGroup = document.querySelector('.text-size-input-in-group');
const borderColorInGroup = document.getElementById('border-color-in-group');
const bgColorInGroup = document.getElementById('bg-color-in-group');
const textColorInGroup = document.getElementById('text-color-in-group');

const btnsAddGroupContentInGroup = document.querySelectorAll('.add-group-content-in-group');

const showContents = document.querySelectorAll('.show_content');
const showGroups = document.querySelectorAll('.show_group');

const groupInputs = document.querySelectorAll('.group-input');
const deleteGroupInputInGroup = document.querySelector('.delete-group-input-in-group');
const changeColorGroupInputInGroup = document.querySelector('.change-color-group-input-in-group');
const textSizeGroupInputInGroup = document.querySelector('.text-size-group-input-in-group');


// inputに変更
function changeEditContent(show_content) {
    show_content.target.classList.toggle('hidden');
    const input_content = show_content.target.previousElementSibling;
    input_content.classList.toggle('hidden');
    input_content.focus();
}




// グループ化内でのグループ選択
function selectGroupInGroup(content) {
    const other_selected_contents = document.querySelectorAll('.selected-content-in-group');
    const other_selected_groups = document.querySelectorAll('.selected-group-in-group');
    const selected_group_borders = document.querySelectorAll('.selected-group-border');
    if(!(content.shiftKey)) {
        if(other_selected_groups) {
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
        other_selected_contents.forEach(function(otherSelectedContent) {
            otherSelectedContent.classList.toggle('selected-content-in-group');
            otherSelectedContent.classList.toggle('border-solid');
            otherSelectedContent.classList.toggle('border-dashed');
        });
    }
    
    changeColorInputInGroup.value = '';
    const color_inputs = document.querySelectorAll('.change-color-inputs-in-group');
    color_inputs.forEach(function (color_input) {
        color_input.remove();
    });
    deleteContentInputInGroup.value = '';
    const delete_content_inputs = document.querySelectorAll('.delete-content-inputs-in-group');
    delete_content_inputs.forEach(function (delete_content_input) {
        delete_content_input.remove();
    });
    textSizeInputInGroup.value = ''; 
    const text_size_inputs = document.querySelectorAll('.text-size-inputs-in-group');
    text_size_inputs.forEach(function (text_size_input) {
        text_size_input.remove();
    });
    changeColorGroupInputInGroup.value = '';
    const color_group_inputs = document.querySelectorAll('.change-color-group-inputs-in-group');
    color_group_inputs.forEach(function (color_group_input) {
        color_group_input.remove();
    });
    deleteGroupInputInGroup.value = '';
    const delete_group_inputs = document.querySelectorAll('.delete-group-inputs-in-group');
    delete_group_inputs.forEach(function (delete_group_input) {
        delete_group_input.remove();
    });
    textSizeGroupInputInGroup.value = ''; 
    const text_size_group_inputs = document.querySelectorAll('.text-size-group-inputs-in-group');
    text_size_group_inputs.forEach(function (text_size_group_input) {
        text_size_group_input.remove();
    });
    const select_group_border = content.target.closest('.group-area').querySelector('.group-border');
    content.target.classList.toggle('selected-group-in-group');
    select_group_border.classList.toggle('border-solid');
    select_group_border.classList.toggle('border-dashed');
    select_group_border.classList.toggle('selected-group-border');
    const selectGroups = document.querySelectorAll('.selected-group-in-group');
    function rgbToHexColorInGroup(color) {
        const rgb_colors = color.match(/\d+/g);
        return '#' + rgb_colors.map(function (rgbColor) {
            return ("0" + Number(rgbColor).toString(16)).slice( -2 );
        }).join("");
    }
    
    const select_border_color = select_group_border.style.borderColor;
    const select_bg_color = select_group_border.style.backgroundColor;
    const select_text_color = content.target.style.color;
    const select_text_size = content.target.style.fontSize.match(/\d+/g);
    const select_group_id = content.target.parentNode.querySelector('.think-group-id').value;
    const select_group_id_array = Array();
    borderColorInGroup.value = rgbToHexColorInGroup(select_border_color);
    bgColorInGroup.value = rgbToHexColorInGroup(select_bg_color);
    textColorInGroup.value = rgbToHexColorInGroup(select_text_color);
    textSize.value = select_text_size;
    if (!(content.shiftKey)) {
        deleteGroupInputInGroup.value = select_group_id;
        changeColorGroupInputInGroup.value = select_group_id;
        textSizeGroupInputInGroup.value = select_group_id;    
    } else {
        selectGroups.forEach(function(selectGroup) {
            const group_id = selectGroup.parentNode.querySelector('.think-group-id').value;
            select_group_id_array.push(group_id);
        });
        deleteGroupInputInGroup.value = select_group_id_array[0];
        changeColorGroupInputInGroup.value = select_group_id_array[0];
        textSizeGroupInputInGroup.value = select_group_id_array[0]; 

        if (select_group_id_array.length > 1) {
            for(let i = 1; i < select_group_id_array.length; i++) {
                const clone_color_group_input = changeColorGroupInputInGroup.cloneNode(true);
                clone_color_group_input.className = 'change-color-group-inputs-in-group';
                clone_color_group_input.value = select_group_id_array[i];
                changeColorGroupInputInGroup.after(clone_color_group_input);

                const clone_delete_group_input = deleteGroupInputInGroup.cloneNode(true);
                clone_delete_group_input.className = 'delete-group-inputs-in-group';
                clone_delete_group_input.value = select_group_id_array[i];
                deleteGroupInputInGroup.after(clone_delete_group_input);

                const clone_text_size_group_input = textSizeGroupInputInGroup.cloneNode(true);
                clone_text_size_group_input.className = 'text-size-group-inputs-in-group';
                clone_text_size_group_input.value = select_group_id_array[i];
                textSizeGroupInputInGroup.after(clone_text_size_group_input);
            }
        }
    }
}

// グループ化内でのコンテンツ選択
function selectContentInGroup(content) {
    const other_selected_contents = document.querySelectorAll('.selected-content-in-group');
    const other_selected_groups = document.querySelectorAll('.selected-group-in-group');
    const selected_group_borders = document.querySelectorAll('.selected-group-border');
    const boder_same_bg_color_contents = document.querySelectorAll('.border-same-bg-color');
    if(!(content.shiftKey)) {
        if (other_selected_contents) {
            other_selected_contents.forEach(function(otherSelectedContent) {
                otherSelectedContent.classList.toggle('selected-content-in-group');
                otherSelectedContent.classList.toggle('border-solid');
                otherSelectedContent.classList.toggle('border-dashed');
            });
        }
        if (boder_same_bg_color_contents) {
            boder_same_bg_color_contents.forEach(function(boderSameBgColorContent) {
                boderSameBgColorContent.classList.toggle('border-same-bg-color');
                boderSameBgColorContent.style.borderColor = boderSameBgColorContent.style.backgroundColor;
                boderSameBgColorContent.previousElementSibling.style.borderColor = boderSameBgColorContent.style.backgroundColor;
            });
        }
    }
    if(other_selected_groups) {
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
    const color_inputs = document.querySelectorAll('.change-color-inputs-in-group');
    color_inputs.forEach(function (color_input) {
        color_input.remove();
    });
    deleteContentInputInGroup.value = '';
    const delete_content_inputs = document.querySelectorAll('.delete-content-inputs-in-group');
    delete_content_inputs.forEach(function (delete_content_input) {
        delete_content_input.remove();
    });
    textSizeInputInGroup.value = ''; 
    const text_size_inputs = document.querySelectorAll('.text-size-inputs-in-group');
    text_size_inputs.forEach(function (text_size_input) {
        text_size_input.remove();
    });
    changeColorGroupInputInGroup.value = '';
    const color_group_inputs = document.querySelectorAll('.change-color-group-inputs-in-group');
    color_group_inputs.forEach(function (color_group_input) {
        color_group_input.remove();
    });
    deleteGroupInputInGroup.value = '';
    const delete_group_inputs = document.querySelectorAll('.delete-group-inputs-in-group');
    delete_group_inputs.forEach(function (delete_group_input) {
        delete_group_input.remove();
    });
    textSizeGroupInputInGroup.value = ''; 
    const text_size_group_inputs = document.querySelectorAll('.text-size-group-inputs-in-group');
    text_size_group_inputs.forEach(function (text_size_group_input) {
        text_size_group_input.remove();
    });
    
    content.target.classList.toggle('selected-content-in-group');
    content.target.classList.toggle('border-solid');
    content.target.classList.toggle('border-dashed');
    const select_contents = document.querySelectorAll('.selected-content-in-group');
    function rgbToHexColorInGroup(color) {
        const rgb_colors = color.match(/\d+/g);
        return '#' + rgb_colors.map(function (rgbColor) {
            return ("0" + Number(rgbColor).toString(16)).slice( -2 );
        }).join("");
    }
    
    const select_border_color = content.target.style.borderColor;
    const select_bg_color = content.target.style.backgroundColor;
    const select_text_color = content.target.style.color;
    const select_text_size = content.target.style.fontSize.match(/\d+/g);
    const select_content_id = content.target.closest('.content-area-in-group').querySelector('.content-id').value;
    const select_content_id_array = Array();
    if(content.target.style.borderColor === content.target.style.backgroundColor) {
        content.target.classList.toggle('border-same-bg-color');
        content.target.style.borderColor = '#000000';
        content.target.previousElementSibling.style.borderColor = '#000000';
    }
    borderColorInGroup.value = rgbToHexColorInGroup(select_border_color);
    bgColorInGroup.value = rgbToHexColorInGroup(select_bg_color);
    textColorInGroup.value = rgbToHexColorInGroup(select_text_color);
    textSize.value = select_text_size;
    
    if (!(content.shiftKey)) {
        deleteContentInputInGroup.value = select_content_id;
        changeColorInputInGroup.value = select_content_id;
        textSizeInputInGroup.value = select_content_id;    
    } else {
        select_contents.forEach(function(selectContent) {
            const content_id = selectContent.closest('.content-area-in-group').querySelector('.content-id').value;
            select_content_id_array.push(content_id);
        });
        deleteContentInputInGroup.value = select_content_id_array[0];
        changeColorInputInGroup.value = select_content_id_array[0];
        textSizeInputInGroup.value = select_content_id_array[0]; 

        if (select_content_id_array.length > 1) {
            for(let i = 1; i < select_content_id_array.length; i++) {
                const clone_color_input = changeColorInputInGroup.cloneNode(true);
                clone_color_input.className = 'change-color-inputs-in-group';
                clone_color_input.value = select_content_id_array[i];
                changeColorInputInGroup.after(clone_color_input);

                const clone_delete_content_input = deleteContentInputInGroup.cloneNode(true);
                clone_delete_content_input.className = 'delete-content-inputs-in-group';
                clone_delete_content_input.value = select_content_id_array[i];
                deleteContentInputInGroup.after(clone_delete_content_input);

                const clone_text_size_input = textSizeInputInGroup.cloneNode(true);
                clone_text_size_input.className = 'text-size-inputs-in-group';
                clone_text_size_input.value = select_content_id_array[i];
                textSizeInputInGroup.after(clone_text_size_input);
            }
        }
    }
}

// グループ内の文字サイズ調整UP
function textSizeUpInGroup()  {
    const confirm_selected_group = document.querySelector('.selected-group-in-group');
    const confirm_selected_content_in_group = document.querySelector('.selected-content-in-group');
    if(!(confirm_selected_group) && !(confirm_selected_content_in_group)) {
        operateMessageInGroup(btnTextSizeUpInGroup, '要素またはグループを選択してください。')
        return;
    }
    if (document.querySelector('.selected-content-in-group')) {
        const select_input = document.querySelector('.selected-content-in-group').previousElementSibling;
        const select_dummy = select_input.previousElementSibling;
        const selected_content_font_size_number = Number(document.querySelector('.selected-content-in-group').style.fontSize.match(/\d+/g)[0]);
        const new_font_size = selected_content_font_size_number * 1.2;
        const selected_contents = document.querySelectorAll('.selected-content-in-group');
        selected_contents.forEach(function (selectedContent) {
            selectedContent.style.fontSize = new_font_size + '%'; 
        });
        select_input.style.fontSize = new_font_size + '%';
        select_dummy.style.fontSize = new_font_size + '%';
        textSize.value = new_font_size;
    } else {
        const select_input = document.querySelector('.selected-group-in-group').previousElementSibling;
        const selected_content_font_size_number = Number(document.querySelector('.selected-group-in-group').style.fontSize.match(/\d+/g)[0]);
        const new_font_size = selected_content_font_size_number * 1.2;
        const selected_groups = document.querySelectorAll('.selected-group-in-group');
        selected_groups.forEach(function (selectedGroup) {
            selectedGroup.style.fontSize = new_font_size + '%'; 
        });
        select_input.style.fontSize = new_font_size + '%';
        textSize.value = new_font_size;
    }
    }

// グループ内の文字サイズ調整　DOWN
function textSizeDownInGroup() {
    const confirm_selected_group = document.querySelector('.selected-group-in-group');
    const confirm_selected_content_in_group = document.querySelector('.selected-content-in-group');
    if(!(confirm_selected_group) && !(confirm_selected_content_in_group)) {
        operateMessageInGroup(btnTextSizeUpInGroup, '要素またはグループを選択してください。')
        return;
    }
    if (document.querySelector('.selected-content-in-group')) {
        const select_input = document.querySelector('.selected-content-in-group').previousElementSibling;
        const select_dummy = select_input.previousElementSibling;
        const selected_content_font_size_number = Number(document.querySelector('.selected-content-in-group').style.fontSize.match(/\d+/g)[0]);
        const new_font_size = selected_content_font_size_number / 1.2;
        const selected_contents = document.querySelectorAll('.selected-content-in-group');
        selected_contents.forEach(function (selectedContent) {
            selectedContent.style.fontSize = new_font_size + '%'; 
        });
        select_input.style.fontSize = new_font_size + '%';
        select_dummy.style.fontSize = new_font_size + '%';
        textSize.value = new_font_size;
    } else {
        const select_input = document.querySelector('.selected-group-in-group').previousElementSibling;
        const selected_content_font_size_number = Number(document.querySelector('.selected-group-in-group').style.fontSize.match(/\d+/g)[0]);
        const new_font_size = selected_content_font_size_number / 1.2;
        const selected_groups = document.querySelectorAll('.selected-group-in-group');
        selected_groups.forEach(function (selectedGroup) {
            selectedGroup.style.fontSize = new_font_size + '%'; 
        });
        select_input.style.fontSize = new_font_size + '%';
        textSize.value = new_font_size;
    }
}

//予期せぬ操作の注意コメント表示（グループ化内）
function operateMessageInGroup(btn, comment) {
    const speech_bubble = document.createElement('div');
    const btn_height = btn.getBoundingClientRect().top;
    const btn_width = Number(btn.getBoundingClientRect().left) + 'px';
    const massage_position_y = (btn_height + 50) + 'px';
    speech_bubble.classList.add('rounded', 'absolute', 'top-0', 'left-0', 'bg-gray-500', 'text-white', 'p-2', 'z-50');
    speech_bubble.style.transform = `translateX(${btn_width}) translateY(${massage_position_y})`;
    speech_bubble.textContent = comment;
    btn.appendChild(speech_bubble);
    const message_timer = setTimeout(function() {
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