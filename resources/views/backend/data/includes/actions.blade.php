@if (auth()->user()->isAdmin())
    <x-utils.edit-button :href="route('admin.data.' . $modul . '.edit', $model)" />
    <x-utils.delete-button :href="route('admin.data.' . $modul . '.destroy', $model)" />
@endif
