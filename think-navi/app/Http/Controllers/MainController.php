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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function showMainStartPage()
    {
        $thinkFiles = ThinkFiles::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        return view('start_page', [
            'think_files' => $thinkFiles,
        ])->with('user', Auth::user());
    }

    public function showMain()
    {
        $thinkFiles = ThinkFiles::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        $thinkTargets = ThinkTargets::get();
        $thinkGoals = ThinkGoals::get();
        
        if(session()->get('select_think_file') === null) {
            return view('start_page', [
                'think_files' => $thinkFiles,
            ])->with('user', Auth::user());
        }
        
        return view('main', [
            'ThinkFiles' => $thinkFiles,
            'select_think_file' => session()->get('select_think_file'),
            'select_thinks' => session()->get('select_thinks'),
            'select_content' => session()->get('select_content'),
            'think_target_files' => session()->get('think_target_files'),
            'think_targets' => $thinkTargets,
            'think_goal_files' => session()->get('think_goal_files'),
            'think_goals' => $thinkGoals,
        ])->with('user', Auth::user());
    }

    /**
     * ファイルの作成
     *
     */
    public function createNewFiles(ThinkFileRequest $request, ThinkFiles $thinkFile, Thinks $thinks)
    {
        $request->validate([
            'name' => ['required'],
        ]);
        $thinkFile->user_id = Auth::id();
        $thinkFile->name = $request->name;
        $thinkFile->save();
        $thinks->name = $request->name;
        $thinks->content_border_color = '#000000';
        $thinks->content_text_color = '#000000';
        $thinks->content_bg_color = '#FFFFFF';
        $thinks->content_font_size = '100';
        $thinks->ThinkFiles_id = $thinkFile->id;
        $thinks->save();
        $select_thinks = Thinks::where('ThinkFiles_id', $thinks->ThinkFiles_id)->get()->toTree();
        $thinkTargetFiles = ThinkTargetFiles::where('ThinkFiles_id', $thinks->ThinkFiles_id)->orderBy('updated_at', 'desc')->get();
        $thinkGoalFiles = ThinkGoalFiles::where('ThinkFiles_id', $thinks->ThinkFiles_id)->orderBy('updated_at', 'desc')->get();
        session()->put('select_think_file', $thinkFile);
        session()->put('select_thinks', $select_thinks);
        session()->put('select_think_target_files', $thinkTargetFiles);
        session()->put('select_think_goal_files', $thinkGoalFiles);
        return redirect()->route('main');
    }

    /**
     * ファイル名変更
     *
     */
    public function editFileName(Request $request)
    {
        $request->validate([
            'edit_file_name' => ['required'],
        ]);
        $thinkFile = ThinkFiles::find($request->edit_file_id);
        $thinkFile->name = $request->edit_file_name;
        $thinkFile->save();

        session()->put('select_think_file', $thinkFile);
        return redirect()->route('main');
    }

    /**
     * コンテンツの更新
     * 
     */
    public function updateContent(Request $request)
    {
        $request->validate([
            'edit_content' => ['required'],
        ]);
        $think = Thinks::find($request->edit_id);
        $think->name = $request->edit_content;
        $think->save();
        $thinkFile = ThinkFiles::find($think->ThinkFiles_id);
        $thinkFile->map_position_x = $request->current_map_position_x;
        $thinkFile->map_position_y = $request->current_map_position_y;
        $thinkFile->map_scale = $request->current_map_scale;
        $thinkFile->save();
        if($think->update()) {
            $thinks = Thinks::where('ThinkFiles_id', $think->ThinkFiles_id)->get()->toTree();
            session()->put('select_thinks', $thinks);
        }

        return redirect()->route('main');
    }

    /**
     * 新規親要素の追加
     * 
     */
    public function newParent(Request $request)
    {
        $defaultContentFontSize = '100';
        $defaultContentStringColor = '#000000';
        $defaultContentBorderColor = '#000000';
        $defaultContentBackgroundColor = '#FFFFFF';
        $newThink = Thinks::create(['name' => $request->edit_content, 'ThinkFiles_id' => $request->edit_file_id, 'content_border_color' => $defaultContentBorderColor, 'content_text_color' => $defaultContentStringColor, 'content_bg_color' => $defaultContentBackgroundColor, 'content_font_size' => $defaultContentFontSize]);
        $newThink->save();
        $thinks = Thinks::where('ThinkFiles_id', $request->edit_file_id)->get()->toTree();
        session()->put('select_thinks', $thinks);

        return redirect()->route('main');
    }

    /**
     * 子要素の追加
     * 
     */
    public function addChildren(Request $request)
    {
        $request->validate([
            'edit_child' => ['required'],
        ]);
        $parent = Thinks::find($request->edit_id);
        $thinkFile = ThinkFiles::find($parent->ThinkFiles_id);
        $defaultContentFontSize = '100';
        $defaultContentStringColor = '#000000';
        $defaultContentStringColorForFirstChild = '#FFFFFF';
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

        $thinkFile->map_position_x = $request->current_map_position_x;
        $thinkFile->map_position_y = $request->current_map_position_y;
        $thinkFile->map_scale = $request->current_map_scale;
        $thinkFile->save();
        session()->put('select_think_file', $thinkFile);
        if($parent->parent_id === null) {
            foreach($defaultContentColors as $defaultContentColor) {
                if(Thinks::where('ThinkFiles_id', $parent->ThinkFiles_id)->where('content_border_color', $defaultContentColor)->count() === 0) {
    
                    $child = $parent->children()->create(['name' => $request->edit_child, 'ThinkFiles_id' => $parent->ThinkFiles_id, 'content_border_color' => $defaultContentColor, 'content_text_color' => $defaultContentStringColorForFirstChild, 'content_bg_color' => $defaultContentColor, 'content_font_size' => $defaultContentFontSize]);
            
                    $child->save();
                    if ($child->update()) {
                        $thinks = Thinks::where('ThinkFiles_id', $child->ThinkFiles_id)->get()->toTree();
                        session()->put('select_thinks', $thinks);
                    }
            
                    return redirect()->route('main');
                }
            }
    
            $child = $parent->children()->create(['name' => $request->edit_child, 'ThinkFiles_id' => $parent->ThinkFiles_id, 'content_border_color' => $defaultContentColors[0], 'content_text_color' => $defaultContentStringColorForFirstChild, 'content_bg_color' => $defaultContentColors[0], 'content_font_size' => $defaultContentFontSize]);
    
            $child->save();
            if ($child->update()) {
                $thinks = Thinks::where('ThinkFiles_id', $child->ThinkFiles_id)->get()->toTree();
                session()->put('select_thinks', $thinks);
            }
    
            return redirect()->route('main');
        } else {
            $child = $parent->children()->create(['name' => $request->edit_child, 'ThinkFiles_id' => $parent->ThinkFiles_id, 'content_border_color' => $parent->content_border_color, 'content_text_color' => $defaultContentStringColor, 'content_bg_color' => $defaultContentBackgroundColor, 'content_font_size' => $defaultContentFontSize]);
    
            $child->save();
            if ($child->update()) {
                $thinks = Thinks::where('ThinkFiles_id', $child->ThinkFiles_id)->get()->toTree();
                session()->put('select_thinks', $thinks);
            }
    
            return redirect()->route('main');
        }
    }

    /**
     * コンテンツの削除
     * 
     */
    public function deleteContent(Request $request)
    {
        $request->validate([
            'delete_content_id.*' => ['required'],
        ]);

        for ($i = 0; $i < count($request->delete_content_id); $i++) {
            $deleteContent = Thinks::find($request->delete_content_id[$i]);
            if($deleteContent->category === null) {
                $deleteContent->delete();
                if($deleteContent->have_navi === 1) {
                    $deleteNavContents = Thinks::where('parent_id', $deleteContent->parent_id)->whereNotNull('category')->get();
                    foreach ($deleteNavContents as $deleteNavContent) {
                        $deleteNavContent->delete();
                    }
                }
            } else {
                $confirmOtherBrotherNavContents = Thinks::where('parent_id', $deleteContent->parent_id)->whereNotNull('category')->whereNotNull('name')->count();

                if($confirmOtherBrotherNavContents === 1) {
                    $deleteNavContents = Thinks::where('parent_id', $deleteContent->parent_id)->whereNotNull('category')->get();
                    foreach($deleteNavContents as $deleteNavContent) {
                        $deleteNavContent->delete();
                    }
                    $parent = Thinks::find($deleteContent->parent_id);
                    $parent->have_navi = 0;
                    $parent->save();
                } else {
                    $deleteContent->name = null;
                    $deleteContent->save();
                }
            }
        }

        $thinks = Thinks::where('ThinkFiles_id', $deleteContent->ThinkFiles_id)->get()->toTree();
        session()->put('select_thinks', $thinks);

        return redirect()->route('main');
    }

    /**
     * ファイルの削除
     * 
     */
    public function deleteFile(Request $request)
    {
        Thinks::where('ThinkFiles_id', $request->id)->delete();
        ThinkFiles::find($request->id)->delete();

        return redirect()->route('main');
    }

    /**
     * ファイルの選択
     * 
     */
    public function selectFile(Request $request)
    {
        $thinkFile = ThinkFiles::find($request->id);
        $thinks = Thinks::where('ThinkFiles_id', $request->id)->get()->toTree();
        $thinkTargetFiles = ThinkTargetFiles::where('ThinkFiles_id', $request->id)->get();
        $thinkGoalFiles = ThinkGoalFiles::where('ThinkFiles_id', $request->id)->get();

        session()->put('select_think_file', $thinkFile);
        session()->put('select_thinks', $thinks);
        session()->put('think_target_files', $thinkTargetFiles);
        session()->put('think_goal_files', $thinkGoalFiles);

        return redirect()->route('main');
    }


    /**
     * メモの追加
     * 
     */
    public function addMemo(Request $request, ThinkMemos $thinkMemo)
    {
        $request->validate([
            'Thinks_id' => ['required', 'unique:ThinkMemos'],
            'memo' => ['required'],
        ]);
        $thinkMemo->memo = $request->memo;
        $thinkMemo->Thinks_id = $request->Thinks_id;
        $thinkMemo->save();
        $think = Thinks::find($request->Thinks_id);
        $thinkFile = ThinkFiles::find($think->ThinkFiles_id);
        $thinkFile->map_position_x = $request->current_map_position_x;
        $thinkFile->map_position_y = $request->current_map_position_y;
        $thinkFile->map_scale = $request->current_map_scale;
        $thinkFile->save();
        $thinks = Thinks::where('ThinkFiles_id', $think->ThinkFiles_id)->get()->toTree();
        session()->put('select_thinks', $thinks);
        return redirect()->route('main');
    }

    /**
     * メモの更新
     * 
     */
    public function updateMemo(Request $request)
    {
        $thinkMemo = ThinkMemos::find($request->edit_memo_id);
        if($request->has('update')){
            $request->validate([
                'memo' => ['required'],
            ]);
            $thinkMemo->memo = $request->memo;
            $thinkMemo->save();
        }
        if($request->has('delete')) {
            $thinkMemo->delete();
        }
        
        $think = Thinks::find($thinkMemo->Thinks_id);
        $thinkFile = ThinkFiles::find($think->ThinkFiles_id);
        $thinkFile->map_position_x = $request->current_map_position_x;
        $thinkFile->map_position_y = $request->current_map_position_y;
        $thinkFile->map_scale = $request->current_map_scale;
        $thinkFile->save();
        $thinks = Thinks::where('ThinkFiles_id', $think->ThinkFiles_id)->get()->toTree();
        session()->put('select_think_file', $thinkFile);
        session()->put('select_thinks', $thinks);
        return redirect()->route('main');
    }

    /**
     * nav項目の反映
     * 
     */
    public function addNavContent(Request $request)
    {
        $parent = Thinks::find($request->edit_id);
        $request->validate([
            'edit_id' => ['required'],
            'nav_category.*' => ['required'],
        ]);
        $defaultContentStringColor = '#000000';
        $defaultContentBackgroundColor = '#FFFFFF';
        $defaultContentFontSize = '100';
        $thinkFile = ThinkFiles::find($parent->ThinkFiles_id);
        $thinkFile->map_position_x = $request->current_map_position_x;
        $thinkFile->map_position_y = $request->current_map_position_y;
        $thinkFile->map_scale = $request->current_map_scale;
        $thinkFile->save();
        session()->put('select_think_file', $thinkFile);
        
        for ($i = 0; $i < count($request->nav_category); $i++) {
            
                $child = $parent->children()->create(['name' => $request->nav_content_name[$i], 'category_group' => $request->nav_category_group[$i], 'category' => $request->nav_category[$i], 'ThinkFiles_id' => $parent->ThinkFiles_id, 'content_border_color' => $parent->content_border_color, 'content_text_color' => $defaultContentStringColor, 'content_bg_color' => $defaultContentBackgroundColor, 'content_font_size' => $defaultContentFontSize]);

                $child->save();
        }
        $parent->have_navi = 1;
        $parent->save();

        if ($child->update()) {
            $thinks = Thinks::where('ThinkFiles_id', $child->ThinkFiles_id)->get()->toTree();
            session()->put('select_thinks', $thinks);
        }

        return redirect()->route('main');
    }

    /**
     * nav項目の更新
     * 
     */
    public function updateNavContents(Request $request)
    {
        $parent = Thinks::find($request->edit_id);
        if($request->has('update')) {
            $request->validate([
                'category.*' => ['required'],
            ]);
            $defaultContentStringColor = '#000000';
            $defaultContentBackgroundColor = '#FFFFFF';
            $defaultContentFontSize = '100';
    
            for ($i = 0; $i < count($request->category); $i++) {
                if (!empty($request->content_id[$i])) {
                    $think = Thinks::find($request->content_id[$i]);
                    $think->name = $request->content_name[$i];
    
                    $think->save();
                } else {
                    $newThink = $parent->children()->create(['name' => $request->content_name[$i], 'category_group' => $request->category_group[$i], 'category' => $request->category[$i], 'ThinkFiles_id' => $parent->ThinkFiles_id, 'content_border_color' => $parent->content_border_color, 'content_text_color' => $defaultContentStringColor, 'content_bg_color' => $defaultContentBackgroundColor, 'content_font_size' => $defaultContentFontSize]);
    
                    $newThink->save();
                }
            }
    
            if($request->delete_content_id) {
                for ($i = 0; $i < count($request->delete_category); $i++) {
                    $deleteThink = Thinks::find($request->delete_content_id[$i]);
                    $deleteThink->delete();
                }
            }
    
        }
        if($request->has('delete')) {
            for ($i = 0; $i < count($request->category); $i++) {
                $think = Thinks::find($request->content_id[$i]);
                $think->delete();
            }
            $parent->have_navi = 0;
            $parent->save();
        }
        $thinkFile = ThinkFiles::find($parent->ThinkFiles_id);
        $thinkFile->map_position_x = $request->current_map_position_x;
        $thinkFile->map_position_y = $request->current_map_position_y;
        $thinkFile->map_scale = $request->current_map_scale;
        $thinkFile->save();
        session()->put('select_think_file', $thinkFile);
        $thinks = Thinks::where('ThinkFiles_id', $parent->ThinkFiles_id)->get()->toTree();
        session()->put('select_thinks', $thinks);

        return redirect()->route('main');
    }


    /**
     * ターゲットファイルの作成
     * 
     */
    public function createNewTargets(Request $request, ThinkTargetFiles $thinkTargetFile)
    {
        $request->validate([
            'title' => ['required'],
            'category.*' =>['required'],
        ]);
        $thinkTargetFile->title = $request->title;
        $thinkTargetFile->ThinkFiles_id = $request->select_ThinkFiles_id;
        $thinkTargetFile->save();
        
        for ($i = 0; $i < count($request->category); $i++) {
            $thinkTarget = ThinkTargets::create(['category_group' => $request->category_group[$i], 'category' => $request->category[$i], 'content' => $request->content_name[$i], 'ThinkFileTargets_id' => $thinkTargetFile->id]);
            
            $thinkTarget->save();
        }
        
        
        $thinkTargetFiles = ThinkTargetFiles::where('ThinkFiles_id', $thinkTargetFile->ThinkFiles_id)->orderBy('updated_at', 'desc')->get();
        session()->put('think_target_files', $thinkTargetFiles);
        

        return redirect()->route('main');
    }

    /**
     * ターゲットファイル名変更
     *
     */
    public function editTargetFileName(Request $request)
    {
        $request->validate([
            'edit_file_name' => ['required'],
        ]);
        $thinkTargetFile = ThinkTargetFiles::find($request->edit_file_id);
        $thinkTargetFile->title = $request->edit_file_name;
        $thinkTargetFile->save();

        $thinkTargetFiles = ThinkTargetFiles::where('ThinkFiles_id', $thinkTargetFile->ThinkFiles_id)->orderBy('updated_at', 'desc')->get();
        session()->put('think_target_files', $thinkTargetFiles);
        return redirect()->route('main');
    }

    /**
     * ターゲットファイルの更新
     * 
     */
    public function updateTargets(Request $request, ThinkTargets $newThinkTarget)
    {
        $request->validate([
            'category.*' => ['required'],
        ]);
        $think_targets = ThinkTargets::where('ThinkFileTargets_id', $request->think_target_file_id)->get();
        
        for ($i = 0; $i < count($request->category); $i++) {
            if(!empty($request->content_id[$i])) {
                $think_target = ThinkTargets::find($request->content_id[$i]);
                $think_target->content = $request->content_name[$i];

                $think_target->save();
            } else {
                $newThinkTarget = ThinkTargets::create(['category_group' => $request->category_group[$i], 'category' => $request->category[$i], 'content' => $request->content_name[$i], 'ThinkFileTargets_id' => $request->think_target_file_id]);

                $newThinkTarget->save();
            }
        }
        return redirect()->route('main');
    }

    /**
     * ターゲットファイルの削除
     * 
     */
    public function deleteTargetFile(Request $request)
    {
        ThinkTargets::where('ThinkFileTargets_id', $request->id)->delete();
        $deleteTargetFile = ThinkTargetFiles::find($request->id);
        $deleteTargetFile->delete();

        $thinkTargetFiles = ThinkTargetFiles::where('ThinkFiles_id', $deleteTargetFile->ThinkFiles_id)->orderBy('updated_at', 'desc')->get();
        session()->put('think_target_files', $thinkTargetFiles);

        return redirect()->route('main');
    }

    /**
     * ゴールファイルの作成
     * 
     */
    public function createNewGoals(Request $request, ThinkGoalFiles $thinkGoalFile)
    {
        $request->validate([
            'title' => ['required'],
            'category.*' => ['required'],
        ]);
        $thinkGoalFile->title = $request->title;
        $thinkGoalFile->ThinkFiles_id = $request->select_ThinkFiles_id;
        $thinkGoalFile->save();


        for ($i = 0; $i < count($request->category); $i++) {
            $thinkGoal = ThinkGoals::create(['category_group' => $request->category_group[$i], 'category' => $request->category[$i], 'content' => $request->content_name[$i], 'ThinkFileGoals_id' => $thinkGoalFile->id]);

            $thinkGoal->save();
        }


        $thinkGoalFiles = ThinkGoalFiles::where('ThinkFiles_id', $thinkGoalFile->ThinkFiles_id)->orderBy('updated_at', 'desc')->get();
        session()->put('think_goal_files', $thinkGoalFiles);


        return redirect()->route('main');
    }

    /**
     * ゴールファイル名変更
     *
     */
    public function editGoalFileName(Request $request)
    {
        $request->validate([
            'edit_file_name' => ['required'],
        ]);
        $thinkGoalFile = ThinkGoalFiles::find($request->edit_file_id);
        $thinkGoalFile->title = $request->edit_file_name;
        $thinkGoalFile->save();

        $thinkGoalFiles = ThinkGoalFiles::where('ThinkFiles_id', $thinkGoalFile->ThinkFiles_id)->orderBy('updated_at', 'desc')->get();
        session()->put('think_goal_files', $thinkGoalFiles);
        return redirect()->route('main');
    }

    /**
     * ゴールファイルの更新
     * 
     */
    public function updateGoals(Request $request, ThinkGoals $newThinkGoal)
    {
        $request->validate([
            'category.*' => ['required'],
        ]);
        $think_goals = ThinkGoals::where('ThinkFileGoals_id', $request->think_goal_file_id)->get();

        for ($i = 0; $i < count($request->category); $i++) {
            if (!empty($request->content_id[$i])) {
                $think_goal = ThinkGoals::find($request->content_id[$i]);
                $think_goal->content = $request->content_name[$i];

                $think_goal->save();
            } else {
                $newThinkGoal = ThinkGoals::create(['category_group' => $request->category_group[$i], 'category' => $request->category[$i], 'content' => $request->content_name[$i], 'ThinkFileGoals_id' => $request->think_goal_file_id]);

                $newThinkGoal->save();
            }
        }
        return redirect()->route('main');
    }

    /**
     * ゴールファイルの削除
     * 
     */
    public function deleteGoalFile(Request $request)
    {
        ThinkGoals::where('ThinkFileGoals_id', $request->id)->delete();
        $deleteGoalFile = ThinkGoalFiles::find($request->id);
        $deleteGoalFile->delete();

        $thinkGoalFiles = ThinkGoalFiles::where('ThinkFiles_id', $deleteGoalFile->ThinkFiles_id)->orderBy('updated_at', 'desc')->get();
        session()->put('think_goal_files', $thinkGoalFiles);

        return redirect()->route('main');
    }

    /**
     * 色変更
     * 
     */
    public function changeColor(Request $request)
    {
        $request->validate([
            'content_id.*' => ['required'],
        ]);

        for ($i =0; $i < count($request->content_id); $i++) {

            $changeColorContent = Thinks::find($request->content_id[$i]);
            $changeColorContent->content_border_color = $request->border_color;
            $changeColorContent->content_bg_color = $request->bg_color;
            $changeColorContent->content_text_color = $request->text_color;
            $changeColorContent->save();

        }
        $thinkFile = ThinkFiles::find($changeColorContent->ThinkFiles_id);
        $thinkFile->map_position_x = $request->current_map_position_x;
        $thinkFile->map_position_y = $request->current_map_position_y;
        $thinkFile->map_scale = $request->current_map_scale;
        $thinkFile->save();
        session()->put('select_think_file', $thinkFile);
        $thinks = Thinks::where('ThinkFiles_id', $changeColorContent->ThinkFiles_id)->get()->toTree();
        session()->put('select_thinks', $thinks);
        return redirect()->route('main');
    }

    /**
     * 文字サイズ変更
     * 
     */
    public function changeTextSize(Request $request) 
    {
        $request->validate([
            'content_id.*' => ['required'],
        ]);

        for($i = 0; $i < count($request->content_id); $i++) {
            $changeTextSizeContent = Thinks::find($request->content_id[$i]);
            $changeTextSizeContent->content_font_size = $request->text_size;
            $changeTextSizeContent->save();
        }
        $thinkFile = ThinkFiles::find($changeTextSizeContent->ThinkFiles_id);
        $thinkFile->map_position_x = $request->current_map_position_x;
        $thinkFile->map_position_y = $request->current_map_position_y;
        $thinkFile->map_scale = $request->current_map_scale;
        $thinkFile->save();
        session()->put('select_think_file', $thinkFile);
        $thinks = Thinks::where('ThinkFiles_id', $changeTextSizeContent->ThinkFiles_id)->get()->toTree();
        session()->put('select_thinks', $thinks);

        return redirect()->route('main');
    }

    /**
     * グループ化カテゴリ作成
     * 
     */
    public function newGroupCategory(Request $request, ThinkGroups $thinkGroup)
    {
        
    }

    /**
     * グループ化へ移動
     * 
     */
    public function showGroup(Request $request)
    {
        $thinkFiles = ThinkFiles::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        $selectThinkFile = ThinkFiles::find($request->thinkFile_id);
        $thinks = Thinks::where('ThinkFiles_id', $request->thinkFile_id)->get()->toTree();
        $thinkGroups = ThinkGroups::where('ThinkFiles_id', $request->thinkFile_id)->get();
        $thinkTargets = ThinkTargets::get();
        $thinkGoals = ThinkGoals::get();

        return view('show_group', [
            'ThinkFiles' => $thinkFiles,
            'select_think_file' => $selectThinkFile,
            'select_thinks' => $thinks,
            'think_groups' => $thinkGroups,
            'select_content' => session()->get('select_content'),
            'think_target_files' => session()->get('think_target_files'),
            'think_targets' => $thinkTargets,
            'think_goal_files' => session()->get('think_goal_files'),
            'think_goals' => $thinkGoals,
        ])->with('user', Auth::user());
    }

    /**
     * 比較画面での更新と新規作成
     * 
     */
    public function updateAndCreateNavByComparison(Request $request)
    {

        $request->validate([
            'category.*' => ['required'],
            'new_think_name' => ['required'],
        ]);
        $parent = Thinks::find($request->edit_id);
        $defaultContentStringColor = '#000000';
        $defaultContentBackgroundColor = '#FFFFFF';
        $defaultContentFontSize = '100';

        for ($i = 0; $i < count($request->category); $i++) {
            if (!empty($request->content_id[$i])) {
                $think = Thinks::find($request->content_id[$i]);
                $think->name = $request->content_name[$i];

                $think->save();
            } else {
                $content_parent = Thinks::find($request->parent_id[$i]);
                $newThink = $content_parent->children()->create(['name' => $request->content_name[$i], 'category_group' => $request->category_group[$i], 'category' => $request->category[$i], 'ThinkFiles_id' => $content_parent->ThinkFiles_id, 'content_border_color' => $content_parent->content_border_color, 'content_text_color' => $defaultContentStringColor, 'content_bg_color' => $defaultContentBackgroundColor, 'content_font_size' => $defaultContentFontSize]);

                $newThink->save();
            }
        }
        $thinkFile = ThinkFiles::find($parent->ThinkFiles_id);
        $thinkFile->map_position_x = $request->current_map_position_x;
        $thinkFile->map_position_y = $request->current_map_position_y;
        $thinkFile->map_scale = $request->current_map_scale;
        $thinkFile->save();
        
        
        
        $newContentParent = Thinks::find($request->new_think_parent_id);
        $defaultContentStringColor = '#000000';
        $defaultContentBackgroundColor = '#FFFFFF';
        $defaultContentFontSize = '100';

        $newSimilarThink = $newContentParent->children()->create(['name' => $request->new_think_name, 'category_group' => '類似から考える', 'category' => '類似物', 'ThinkFiles_id' => $parent->ThinkFiles_id, 'content_border_color' => $parent->content_border_color, 'content_text_color' => $defaultContentStringColor, 'content_bg_color' => $defaultContentBackgroundColor, 'content_font_size' => $defaultContentFontSize]);
        $newSimilarThink->have_navi = 1;
        $newSimilarThink->save();
            
        for ($i = 0; $i < count($request->nav_category); $i++) {

            $newSimilarNav = $newSimilarThink->children()->create(['name' => $request->nav_content_name[$i], 'category_group' => $request->nav_category_group[$i], 'category' => $request->nav_category[$i], 'ThinkFiles_id' => $parent->ThinkFiles_id, 'content_border_color' => $parent->content_border_color, 'content_text_color' => $defaultContentStringColor, 'content_bg_color' => $defaultContentBackgroundColor, 'content_font_size' => $defaultContentFontSize]);

            $newSimilarNav->save();
        }
        session()->put('select_think_file', $thinkFile);
        $thinks = Thinks::where('ThinkFiles_id', $parent->ThinkFiles_id)->get()->toTree();
        session()->put('select_thinks', $thinks);

        return redirect()->route('main');
    }
    
}
