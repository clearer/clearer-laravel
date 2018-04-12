<modal inline-template is-open="{{ $isOpen }}">
    <div>

        @isset($button)
        <span @click="toggleOpen()">{{ $button }}</span>
        @endisset

        <transition name="fade-in">

            <div class="modal" v-if="isOpen">

                    <div class="modal__content" v-if="isOpen">

                        @isset($header)
                        <div class="modal__header">
                            {{ $header }}
                            <button class="button--dark" @click="toggleOpen()">
                                <i class="material-icons">close</i>
                                Close
                            </button>
                        </div>
                        @endisset

                        @isset($content)
                        <div class="modal__body">
                            {{ $content }}
                        </div>
                        @endisset
                    </div>

                <div class="modal__overlay" @click="toggleOpen()"></div>

            </div>
        </transition>
    </div>
</modal>