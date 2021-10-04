@inject('division', '\App\Models\Data\Division')

<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('img/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('img/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div><!--c-sidebar-brand-->

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.dashboard')"
                :active="activeClass(Route::is('admin.dashboard'), 'c-active')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Dashboard')" />
        </li>

        <!-- Human Resource --> 

        @if (
            $logged_in_user->hasAllAccess() || 
            $logged_in_user->can('admin.access.persmil') || 
            $logged_in_user->can('admin.access.persip')
        )
            <li class="c-sidebar-nav-title">@lang('Human Resource')</li>
            
            <li class="c-sidebar-nav-item">
                <x-utils.link
                    class="c-sidebar-nav-link"
                    :href="route('admin.employee.all.index')"
                    :active="activeClass(Route::is('admin.employee.all'), 'c-active')"
                    icon="c-sidebar-nav-icon cil-user"
                    :text="__('Personnel')" />
            </li>
        @endif

        @php
            $divisionAccess = []; 
            if ($logged_in_user->can('admin.access.persmil')) array_push($divisionAccess, 'military');
            if ($logged_in_user->can('admin.access.persip')) array_push($divisionAccess, 'civil');
        @endphp

        @foreach ($division::all() as $division)

            @if ($logged_in_user->hasAllAccess() || in_array($division->name, $divisionAccess))

                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        class="c-sidebar-nav-link"
                        :href="route('admin.employee.' . $division->name .'.index')"
                        :active="activeClass(Route::is('admin.employee.' . $division->name .'.*'), 'c-active')"
                        icon="c-sidebar-nav-icon {{ $division->name == 'military' ? 'cil-contact' : 'cil-user' }}"
                        :text="__($division->label . ' Personnel')" />
                </li>
            @endif

        @endforeach

        <!-- End Human Resource -->

        <!-- Data Resource -->

        @if (
            $logged_in_user->hasAllAccess() || $logged_in_user->can('admin.access.data')
        )
            <li class="c-sidebar-nav-title">@lang('Data Resource')</li>

            @if (
                $logged_in_user->hasAllAccess() ||
                (
                    $logged_in_user->can('admin.access.corps') ||
                    $logged_in_user->can('admin.access.corps.list') 
                )
            )
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        :href="route('admin.data.corps.index')"
                        class="c-sidebar-nav-link"
                        icon="c-sidebar-nav-icon cil-shield-alt"
                        :text="__('Corps')"
                        :active="activeClass(Route::is('admin.data.corps.*'), 'c-active')" />
                </li>
            @endif

            @if (
                $logged_in_user->hasAllAccess() ||
                (
                    $logged_in_user->can('admin.access.rank') ||
                    $logged_in_user->can('admin.access.rank.list')
                )
            )
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        :href="route('admin.data.rank.index')"
                        class="c-sidebar-nav-link"
                        icon="c-sidebar-nav-icon cil-chevron-double-down"
                        :text="__('Rank')"
                        :active="activeClass(Route::is('admin.data.rank.*'), 'c-active')" />
                </li>
            @endif

            @if (
                $logged_in_user->hasAllAccess() ||
                (
                    $logged_in_user->can('admin.access.position') ||
                    $logged_in_user->can('admin.access.position.list')
                )
            )
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        :href="route('admin.data.position.index')"
                        class="c-sidebar-nav-link"
                        icon="c-sidebar-nav-icon cil-tags"
                        :text="__('Position')"
                        :active="activeClass(Route::is('admin.data.position.*'), 'c-active')" />
                </li>
            @endif

            @if (
                $logged_in_user->hasAllAccess() ||
                (
                    $logged_in_user->can('admin.access.workunit') ||
                    $logged_in_user->can('admin.access.workunit.list')
                )
            )
                <li class="c-sidebar-nav-item">
                    <x-utils.link
                        :href="route('admin.data.workunit.index')"
                        class="c-sidebar-nav-link"
                        icon="c-sidebar-nav-icon cil-flag-alt"
                        :text="__('WorkUnit')"
                        :active="activeClass(Route::is('admin.data.workunit.*'), 'c-active')" />
                </li>
            @endif
            
        @endif

        <!-- End Data Resource -->

        @if (
            $logged_in_user->hasAllAccess() ||
            (
                $logged_in_user->can('admin.access.user.list') ||
                $logged_in_user->can('admin.access.user.deactivate') ||
                $logged_in_user->can('admin.access.user.reactivate') ||
                $logged_in_user->can('admin.access.user.clear-session') ||
                $logged_in_user->can('admin.access.user.impersonate') ||
                $logged_in_user->can('admin.access.user.change-password')
            )
        )
            <li class="c-sidebar-nav-title">@lang('System')</li>

            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-user"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Access')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    @if (
                        $logged_in_user->hasAllAccess() ||
                        (
                            $logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')
                        )
                    )
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.user.index')"
                                class="c-sidebar-nav-link"
                                :text="__('User Management')"
                                :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
                        </li>
                    @endif

                    @if ($logged_in_user->hasAllAccess())
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.role.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Role Management')"
                                :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')" />
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if ($logged_in_user->hasAllAccess())
            <!-- <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-list"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Logs')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Dashboard')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::logs.list')"
                            class="c-sidebar-nav-link"
                            :text="__('Logs')" />
                    </li>
                </ul>
            </li> -->
        @endif
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div><!--sidebar-->
