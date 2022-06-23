<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThinkRequest;
use App\Http\Requests\ThinkFileRequest;
use App\Models\Models\ThinkFiles;
use App\Models\Models\ThinkMemos;
use App\Models\Models\ThinkTargetFiles;
use App\Models\Models\ThinkTargets;
use App\Models\Models\ThinkGoals;
use App\Models\Models\ThinkGoalFiles;
use App\Models\Models\ThinkGroups;
use App\Models\User;
use App\Models\Models\Thinks;
use App\Models\Models\ThinksInGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GroupController extends Controller
{
    /**
     * グループ追加
     * 
     */
    public function createNewGroup(Request $request, ThinkGroups $ThinkGroup)
    {
        $request->validate([
            'edit_group' => ['required'],
        ]);
        $defaultContentFontSize = '100';
        $defaultContentStringColor = '#000000';
        $defaultContentBackgroundColor = '#FFFFFF';
        $defaultContentColors = [
            '#0033FF',
            '#6633CC',
            '#006400',
            '#A52A2A',
            '#FF69B4',
            '#FF4500',
            '#FFD700',
            '#8B4513',
            '#00BFFF',
            '#9400D3',
            '#7CFC00',
            '#FFB6C1',
            '#FF1493',
            '#FFA500',
            '#7FFFD4',
            '#40E0D0',
            '#6A5ACD',
            '#A0522D',
        ];
        $ThinkGroup->ThinkFiles_id = $request->ThinkFiles_id;
        $ThinkGroup->category = $request->edit_group;
        $ThinkGroup->content_text_color = $defaultContentStringColor;
        $ThinkGroup->content_bg_color = $defaultContentBackgroundColor;
        $ThinkGroup->content_font_size = $defaultContentFontSize;
        foreach ($defaultContentColors as $defaultContentColor) {
            if (ThinkGroups::where('content_border_color', $defaultContentColor)->count() === 0) {

                $ThinkGroup->content_border_color = $defaultContentColor;

                $ThinkGroup->save();
                if ($ThinkGroup->update()) {
                    $thinkGroups = ThinkGroups::where('ThinkFiles_id', $ThinkGroup->ThinkFiles_id)->get();
                    session()->put('think_groups', $thinkGroups);
                }

                return redirect()->route('main.show-group',['thinkFile_id' => $request->thinkFile_id]);
            } 
        }

        $ThinkGroup->content_border_color = $defaultContentColors[0];

        $ThinkGroup->save();
        

        return redirect()->route('main.show-group', ['thinkFile_id' => $request->thinkFile_id]);
    }

    /**
     * グループ名の更新
     * 
     */
    public function updateGroupCategoryInGroup(Request $request)
    {
        $request->validate([
            'edit_group_title' => ['required'],
        ]);
        $editGroupTitle = ThinkGroups::find($request->thinkGroup_id);
        $editGroupTitle->category = $request->edit_group_title;
        $editGroupTitle->save();

        return redirect()->route('main.show-group', ['thinkFile_id' => $request->thinkFile_id]);
    }

    /**
     * マップからグループ内のコンテンツ追加
     * 
     */
    public function addContentInGroupFromThinks(Request $request, ThinksInGroup $ThinksInGroup)
    {
        $request->validate([
            'content_ids.*' => ['required'],
        ]);
        for ($i = 0; $i < count($request->content_ids); $i++) {

            $selectContent = Thinks::find($request->content_ids[$i]);
            $ThinksInGroup = ThinksInGroup::create([
                'ThinkGroups_id' => $request->thinkGroup_id,
                'name' => $selectContent->name,
                'content_border_color' => $selectContent->content_border_color,
                'content_text_color' => $selectContent->content_text_color,
                'content_bg_color' => $selectContent->content_bg_color,
                'content_font_size' => $selectContent->content_font_size,
            ]);
            $ThinksInGroup->save();
        }
        if ($ThinksInGroup->update()) {
            $thinks = ThinksInGroup::where('ThinkGroups_id', $ThinksInGroup->ThinkGroups_id)->get();
            session()->put('$thinks_in_group', $thinks);
        }

        return redirect()->route('main.show-group', ['thinkFile_id' => $request->thinkFile_id]);
    }

    /**
     * グループ内のコンテンツ追加
     * 
     */
    public function addContentInGroup(Request $request)
    {
        $request->validate([
            'edit_group_content' => ['required'],
        ]);
        $defaultContentFontSize = '100';
        $defaultContentTextColor = '#000000';
        $defaultContentBackgroundColor = '#FFFFFF';
        $defaultContentBorderColor = '#000000';
        $addContent = ThinksInGroup::create(['ThinkGroups_id' => $request->thinkGroup_id, 'name' => $request->edit_group_content, 'content_border_color' => $defaultContentBorderColor, 'content_text_color' => $defaultContentTextColor, 'content_bg_color' => $defaultContentBackgroundColor, 'content_font_size' => $defaultContentFontSize]);
        $addContent->save();

        return redirect()->route('main.show-group', ['thinkFile_id' => $request->thinkFile_id]);
    }

    /**
     * グループ内のコンテンツ更新
     * 
     */
    public function updateContentInGroup(Request $request)
    {
        $request->validate([
            'edit_content' => ['required'],
        ]);
        $editThinkInGroup = ThinksInGroup::find($request->content_id);
        $editThinkInGroup->name = $request->edit_content;
        $editThinkInGroup->save();
        return redirect()->route('main.show-group', ['thinkFile_id' => $request->thinkFile_id]);
    }

    /**
     * コンテンツの削除
     * 
     */
    public function deleteContentInGroup(Request $request)
    {
        
        if (!($request->content_id[0] === null)) {
            for ($i = 0; $i < count($request->content_id); $i++) {
                $deleteContent = ThinksInGroup::find($request->content_id[$i]);
                $deleteContent->delete();
            }
        } elseif (!($request->group_id[0] === null)) {
            for ($i = 0; $i < count($request->group_id); $i++) {
                $deleteGroup = ThinkGroups::find($request->group_id[$i]);
                $deleteContents = ThinksInGroup::where('ThinkGroups_id', $request->group_id[$i])->get();
                foreach ($deleteContents as $deleteContent) {
                    $deleteContent->delete();
                }
                $deleteGroup->delete();
            }
        }

        return redirect()->route('main.show-group', ['thinkFile_id' => $request->thinkFile_id]);
    }

    /**
     * 色変更
     * 
     */
    public function changeColorInGroup(Request $request)
    {
        if($request->content_id[0]) {
            for ($i = 0; $i < count($request->content_id); $i++) {
    
                $changeColorContent = ThinksInGroup::find($request->content_id[$i]);
                $changeColorContent->content_border_color = $request->border_color;
                $changeColorContent->content_bg_color = $request->bg_color;
                $changeColorContent->content_text_color = $request->text_color;
                $changeColorContent->save();
            }
        }
        if ($request->group_id[0]) {
            for ($i = 0; $i < count($request->group_id); $i++) {

                $changeColorContent = ThinkGroups::find($request->group_id[$i]);
                $changeColorContent->content_border_color = $request->border_color;
                $changeColorContent->content_bg_color = $request->bg_color;
                $changeColorContent->content_text_color = $request->text_color;
                $changeColorContent->save();
            }
        }

        return redirect()->route('main.show-group', ['thinkFile_id' => $request->thinkFile_id]);
    }

    /**
     * 文字サイズ変更
     * 
     */
    public function changeTextSizeInGroup(Request $request)
    {
        if($request->content_id[0]){
            for ($i = 0; $i < count($request->content_id); $i++) {
                $changeTextSizeContent = ThinksInGroup::find($request->content_id[$i]);
                $changeTextSizeContent->content_font_size = $request->text_size;
                $changeTextSizeContent->save();
            }
        }
        if ($request->group_id[0]) {
            for ($i = 0; $i < count($request->group_id); $i++) {
                $changeTextSizeContent = ThinkGroups::find($request->group_id[$i]);
                $changeTextSizeContent->content_font_size = $request->text_size;
                $changeTextSizeContent->save();
            }
        }

        return redirect()->route('main.show-group', ['thinkFile_id' => $request->thinkFile_id]);
    }
}
