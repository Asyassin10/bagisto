<div class="fixed top-14 z-[1000] h-full w-[270px] bg-white pt-4 shadow-[0px_8px_10px_0px_rgba(0,_0,_0,_0.2)] transition-all duration-300 group-[.sidebar-collapsed]/container:w-[70px] dark:bg-gray-900 max-lg:hidden">
    <div class="journal-scroll h-[calc(100vh-100px)] overflow-auto group-[.sidebar-collapsed]/container:overflow-visible">
        <nav class="grid w-full gap-2">
            <!-- Navigation Menu -->
            @foreach (menu()->getItems('admin') as $menuItem)
    @if ($menuItem->key != 'societe')
        <div class="group/item relative">
            <a href="{{ $menuItem->getUrl() }}"
                class="flex gap-2.5 p-1.5 items-center cursor-pointer hover:rounded-lg {{ $menuItem->isActive() ? 'bg-blue-600 rounded-lg' : 'hover:bg-gray-100 hover:dark:bg-gray-950' }} peer">
                <span class="{{ $menuItem->getIcon() }} text-2xl {{ $menuItem->isActive() ? 'text-white' : '' }}"></span>
                <p class="text-gray-600 dark:text-gray-300 font-semibold whitespace-nowrap group-[.sidebar-collapsed]/container:hidden {{ $menuItem->isActive() ? 'text-white' : '' }}">
                    {{ $menuItem->getName() }}
                </p>
            </a>

            @if ($menuItem->haveChildren())
                <div class="{{ $menuItem->isActive() ? ' !grid bg-gray-100 dark:bg-gray-950' : '' }} hidden min-w-[180px] ltr:pl-10 rtl:pr-10 pb-2 rounded-b-lg z-[100]">
                    @foreach ($menuItem->getChildren() as $subMenuItem)
                        <a href="{{ $subMenuItem->getUrl() }}"
                            class="text-sm text-{{ $subMenuItem->isActive() ? 'blue' : 'gray' }}-600 dark:text-{{ $subMenuItem->isActive() ? 'blue' : 'gray' }}-300 whitespace-nowrap py-1 group-[.sidebar-collapsed]/container:px-5 group-[.sidebar-collapsed]/container:py-2.5 group-[.inactive]/item:px-5 group-[.inactive]/item:py-2.5 hover:text-blue-600 dark:hover:bg-gray-950">
                            {{ $subMenuItem->getName() }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    @endif
@endforeach

{{-- Manually add the "Societe" menu item if the role ID is 3 --}}
@if (auth()->guard('admin')->user()->role_id == 3 || auth()->guard('admin')->user()->role_id == 1 )
<div class="group/item relative">
    <a href="{{ route('admin.societe.index') }}"
        class="flex gap-2.5 p-1.5 items-center cursor-pointer hover:rounded-lg {{ request()->routeIs('admin.societe.index') ? 'bg-blue-600 rounded-lg' : 'hover:bg-gray-100 hover:dark:bg-gray-950' }} peer">
        <span
            class="icon-sales text-2xl {{ request()->routeIs('admin.societe.index') ? 'text-white' : '' }}"></span>
        <p
            class="text-gray-600 dark:text-gray-300 font-semibold whitespace-nowrap group-[.sidebar-collapsed]/container:hidden {{ request()->routeIs('admin.societe.index') ? 'text-white' : '' }}">
            Societe
        </p>
    </a>
</div>
@endif
{{-- Manually add the "Societe"  --}}
@if (auth()->guard('admin')->user()->role_id == 1 )
<div class="group/item relative">
 <a href="{{ url('/admin/settings/channels/edit/1') }}"
     class="flex gap-2.5 p-1.5 items-center cursor-pointer hover:rounded-lg peer">
     <span
         class="icon-cms text-2xl "></span>
     <p
         class="text-gray-600 dark:text-gray-300 font-semibold whitespace-nowrap group-[.sidebar-collapsed]/container:hidden ">
         Page accueil
     </p>
 </a>
</div>
<div class="group/item relative">
    <a href="{{ route('admin::societe-admin.index') }}"
        class="flex gap-2.5 p-1.5 items-center cursor-pointer hover:rounded-lg {{ request()->routeIs('admin::societe-admin.index') ? 'bg-blue-600 rounded-lg' : 'hover:bg-gray-100 hover:dark:bg-gray-950' }} peer">
        <span
            class="icon-sales text-2xl {{ request()->routeIs('admin::societe-admin.index') ? 'text-white' : '' }} "></span>
        <p
            class="text-gray-600 dark:text-gray-300 font-semibold whitespace-nowrap group-[.sidebar-collapsed]/container:hidden {{ request()->routeIs('admin::societe-admin.index') ? 'text-white' : '' }}">
            Gérer des sociétés
        </p>
    </a>
   </div>
@endif


        </nav>
    </div>

    <!-- Collapse menu -->
    <v-sidebar-collapse></v-sidebar-collapse>
</div>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-sidebar-collapse-template"
    >
        <div
            class="fixed bottom-0 w-full max-w-[270px] cursor-pointer border-t border-gray-200 bg-white px-4 transition-all duration-300 hover:bg-gray-100 dark:border-gray-800 dark:bg-gray-900 dark:hover:bg-gray-950"
            :class="{'max-w-[70px]': isCollapsed}"
            @click="toggle"
        >
            <div class="flex items-center gap-2.5 p-1.5">
                <span
                    class="icon-collapse text-2xl transition-all"
                    :class="[isCollapsed ? 'ltr:rotate-[180deg] rtl:rotate-[0]' : 'ltr:rotate-[0] rtl:rotate-[180deg]']"
                ></span>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-sidebar-collapse', {
            template: '#v-sidebar-collapse-template',

            data() {
                return {
                    isCollapsed: {{ request()->cookie('sidebar_collapsed') ?? 0 }},
                }
            },

            methods: {
                toggle() {
                    this.isCollapsed = parseInt(this.isCollapsedCookie()) ? 0 : 1;

                    var expiryDate = new Date();

                    expiryDate.setMonth(expiryDate.getMonth() + 1);

                    document.cookie = 'sidebar_collapsed=' + this.isCollapsed + '; path=/; expires=' + expiryDate.toGMTString();

                    this.$root.$refs.appLayout.classList.toggle('sidebar-collapsed');
                },

                isCollapsedCookie() {
                    const cookies = document.cookie.split(';');

                    for (const cookie of cookies) {
                        const [name, value] = cookie.trim().split('=');

                        if (name === 'sidebar_collapsed') {
                            return value;
                        }
                    }

                    return 0;
                },
            },
        });
    </script>

    <script>
        const adjustSubMenuPosition = (event) => {
            let menuContainer = event.currentTarget;

            let subMenuContainer = menuContainer.lastElementChild;

            if (subMenuContainer) {
                const menuTopOffset = menuContainer.getBoundingClientRect().top;

                const subMenuHeight = subMenuContainer.offsetHeight;

                const availableHeight = window.innerHeight - menuTopOffset;

                let subMenuTopOffset = menuTopOffset;

                if (subMenuHeight > availableHeight) {
                    subMenuTopOffset = menuTopOffset - (subMenuHeight - availableHeight);
                }

                subMenuContainer.style.top = `${subMenuTopOffset}px`;
            }
        };
    </script>
@endpushOnce
