<form method="post" class="add-content-area flex items-center m-0 relative" action="{{ route('main.add-children') }}">
    @csrf
    <input class="edit-id" type="hidden" name="edit_id" value="{{ optional($select_think_child)->parent_id }}">
    <input class="current-map-position-x" type="hidden" name="current_map_position_x">
    <input class="current-map-position-y" type="hidden" name="current_map_position_y">
    <input class="current-map-scale" type="hidden" name="current_map_scale">
</form>