{{--

COMPONENT: dropdown

DESCRIPTION: blade companion to the vue component; works as a dropdown menu

SLOTS:
    - label: area that toggles the menu open
    - menu: populates the menu
--}}

<dropdown inline-template>
    <div class="dropdown">
                
        <div class="dropdown__label" @click="toggleOpen()" v-on-clickaway="close">
            {{ $label }}
        </div>
        <transition name="slide-down">
            <div class="dropdown__menu" v-cloak v-if="isOpen">
                {{ $menu }}
            </div>  
        </transition>
    </div>
</dropdown>