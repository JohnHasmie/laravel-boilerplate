@if (auth()->user()->isAdmin())
    <x-utils.edit-button :href="route('admin.employee.' . $division . '.edit', $model)" />
    <x-utils.delete-button :href="route('admin.employee.' . $division . '.destroy', $model)" />
@endif
