<div wire:key="form-chart-1">
    <div class="d-md-flex justify-content-between mb-3">
        <div class="d-md-flex">
            <div class="mb-3 mb-md-0">
                <div wire:key="selected-model" class="p-2">
                    <label for="selected-model" class="mb-2"> @lang('Type') </label>
                    <select wire:model="type" id="selected-model" class="form-control">
                        <option value=""></option>
                        <option value="rank">@lang('Rank')</option>
                        <option value="corps">@lang('Corps')</option>
                        <option value="workunit">@lang('WorkUnit')</option>
                        <option value="position">@lang('Position')</option>
                        <option value="status">@lang('Status')</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 mb-md-0">
                <div wire:key="selected-model" class="p-2">
                    <label for="selected-model" class="mb-2"> @lang('Start Periode') </label>
                    <input wire:model="start_periode" type="date" class="form-control">
                </div>
            </div>
            <div class="mb-3 mb-md-0">
                <div wire:key="selected-model" class="p-2">
                    <label for="selected-model" class="mb-2"> @lang('End Periode') </label>
                    <input wire:model="end_periode" type="date" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="border-top pt-3" style="height: 32rem;">
        @if (!empty($columnChartModel))
            <livewire:livewire-line-chart
                key="{{ $columnChartModel->reactiveKey() }}"
                :line-chart-model="$columnChartModel"
            />
        @endif
    </div>
</div>